<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionRptegraficodestinos() {
        $this->layout = 'column1';

        $this->render('rpte_grafico_destinos', array(
        ));
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        /*
         * $this->layout='column1';
         * Si no hay sesion
         */
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        if (Yii::app()->user->isGuest) {
            $this->layout = 'column1';
        } else {
            //verificando si el usuario no es un cliente
            $sql = "SELECT COUNT(*)FROM usuario_rol where idrol=4 and idusuario=" . Yii::app()->user->getId();
            if (Yii::app()->db->createCommand($sql)->queryScalar() > 0) {
                $sql = "SELECT COUNT(*)FROM usuario_rol where idusuario=" . Yii::app()->user->getId();
                if (Yii::app()->db->createCommand($sql)->queryScalar() > 1) {
                    //es solo un cliente
                    $this->layout = 'column1';
                } else {
                    //aparte de ser cliente es un trabajador
                    $this->layout = 'column1';
                }
            } else {
                //es solo un trabajador
                $this->layout = 'columnSistema';
            }
        }

        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contactenos', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->layout = 'column1';
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRegistro() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        if (Yii::app()->user->isGuest) {
            $this->layout = 'formularioContacto';
        } else {
            //verificando si el usuario no es un cliente
            $sql = "SELECT COUNT(*)FROM usuario_rol where idrol=4 and idusuario=" . Yii::app()->user->getId();
            if (Yii::app()->db->createCommand($sql)->queryScalar() > 0) {
                $sql = "SELECT COUNT(*)FROM usuario_rol where idusuario=" . Yii::app()->user->getId();
                if (Yii::app()->db->createCommand($sql)->queryScalar() > 1) {
                    //es solo un cliente
                    $this->layout = 'formularioContacto';
                } else {
                    //aparte de ser cliente es un trabajador
                    $this->layout = 'formularioContacto';
                }
            } else {
                //es solo un trabajador
                $this->layout = 'columnSistema';
            }
        }

        $model = new Cliente;
        $modelPersona = new Persona;
        $modelUsuario = new Usuario;
        $modelUsuarioRol = new UsuarioRol;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Cliente'])) {
            $correo = $_POST['Cliente']['correo'];
            $existeCorreo = "select * from cliente where correo = '$correo'";
            $rows = Yii::app()->db->createCommand($existeCorreo)->queryAll();
            if ($rows == null || empty($rows)) {
                $model->attributes = $_POST['Cliente'];

                $dataPersona = array(
                    'dni' => $_POST['Cliente']['nrodoc'],
                    'nombres' => $_POST['Cliente']['nombres'],
                    'idempresa' => 1
                );
                $modelPersona->attributes = $dataPersona;
                        $modelPersona->save();

                $dataUsuario = array(
                    'email' => $_POST['Cliente']['correo'],
                    'password' => $_POST['Cliente']['contrasenia'],
                    'estado' => 1,
                    'idpersona' => $modelPersona->idpersona,
                    'idoficina' => 1,
                );
                $modelUsuario->attributes = $dataUsuario;
                        $modelUsuario->save();

                $dataUsuarioRol = array(
                    'idusuario' => $modelUsuario->idusuario,
                    'idrol' => 4,
                );
                $modelUsuarioRol->attributes = $dataUsuarioRol;
                        $modelUsuarioRol->save();

                        if($model->save())
				$this->redirect(array('registro'));
            } else {
                echo '<script>alert("el correo ya esta registrado");</script>';
            }
        }

        $this->render('contacto');
    }

}
