<?php

class PersonaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Verfoto','ListarHorariosXruta','GenerarNumBoleto','Buscar_x_nrodoc','Buscar_ruta_x_id','ListarJsonBoletos'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionListarJsonBoletos(){

		$data = array();
		$sql = "SELECT b.*,concat(c.nombres,' ',c.apellidos)as nombres,c.nrodoc,concat(b.serie,'-',b.numero)as serie_numero,".
			" ori.ciudaddesc as origend,des.ciudaddesc as destinod,bu.placa as placabus	FROM boleto b".
			" inner join cliente c".
			" on b.idcliente = c.idcliente".
			" inner join bus bu".
			" on b.idbus=bu.idbus".
			" inner join ciudad ori".
			" on ori.idciudad=b.origen".
			" inner join ciudad des".
			" on des.idciudad=b.destino order by b.idboleto asc";
				//" where h.idruta= '".$_POST['idruta']."'";

		$rows = Yii::app()->db->createCommand($sql)->queryAll();
		$i=0;
		foreach($rows as $row) {
			//$row1 = array();
        	
        	//$row1["n_descripcion"] = $row["n_descripcion"];
        	//$row1["q_minutos_toler"] = $row["q_minutos_toler"];  
	  		$data[$i] = $row;
            $i++;
  		}
  		header("Content-type: application/json"); 
		echo "{\"data\":" .json_encode($data). "}";
	}
	public function actionBuscar_ruta_x_id(){
		 
  		$this->layout='none'; 	
		$data = array();
		$sql = "select * from ruta where idruta= ".$_POST['idruta']."";

		$rows = Yii::app()->db->createCommand($sql)->queryAll();
		$i=0;
		foreach($rows as $row) { 
			//$row["sel"] = 0;
	  		$data['idruta'] = $row["idruta"];
	  		$data['ruta_desc'] = $row["ruta_desc"];
	  		$data['idoficina'] = $row["idoficina"];
	  		$data['origen'] = $row["origen"];
	  		$data['destino'] = $row["destino"]; 
	  		break;
  		}   
		echo json_encode($data);
	}
	public function actionBuscar_x_nrodoc(){
		 
  		$this->layout='none'; 	
		$data = array();
		$sql = "select * from cliente where nrodoc= ".$_POST['nrodoc']."";

		$rows = Yii::app()->db->createCommand($sql)->queryAll();
		$i=0;
		foreach($rows as $row) { 
			//$row["sel"] = 0;
	  		$data['idcliente'] = $row["idcliente"];
	  		$data['nombres'] = $row["nombres"];
	  		$data['apellidos'] = $row["apellidos"];
	  		$data['edad'] = $row["edad"];
	  		$data['tipodoc'] = $row["tipodoc"]; 
	  		break;
  		}   
		echo json_encode($data);
	}
	public function actionGenerarNumBoleto(){

  		$this->layout='none'; 	
		$data = array();
		$sql = "SELECT CONCAT(REPEAT('0', 7-LENGTH(ifnull(max(numero),0)+1)), ifnull(max(numero),0)+1)".
			" as numero ".
			" FROM boleto";

		echo Yii::app()->db->createCommand($sql)->queryScalar();
	}
	public function actionListarHorariosXruta(){

		$date = new DateTime($_POST['fecha']);

		$data = array();
		$sql = "SELECT h.*,b.idchofer,concat(pilot.nombres,' ',pilot.apellidos) as piloto,b.idcopiloto,".
			"concat(copilot.nombres,' ',copilot.apellidos) as copiloto,b.placa,b.nros_asientos,b.tipo_bus".
			" FROM horario h".
			" inner join bus b".
			" on h.idbus=b.idbus".
			" inner join persona pilot".
			" on pilot.idpersona=b.idchofer".
			" inner join persona copilot".
			" on copilot.idpersona=b.idcopiloto ".
				" where h.idruta= '".$_POST['idruta']."' and fecha_sal='".date_format($date, 'Y-m-d')."'";

		$rows = Yii::app()->db->createCommand($sql)->queryAll();
		$i=0;
		foreach($rows as $row) {
			//$row1 = array();
        	
        	//$row1["n_descripcion"] = $row["n_descripcion"];
        	//$row1["q_minutos_toler"] = $row["q_minutos_toler"];  
	  		$data[$i] = $row;
            $i++;
  		}
  		header("Content-type: application/json"); 
		echo "{\"data\":" .json_encode($data). "}";
	}

	public function actionVerfoto($id)
	{
		
  		//listando las noticias
  		$this->layout='none'; 	
  		$notis = Persona::model()->findByPk($id);;
  				
  		header("Content-type: image/jpeg");
  		echo $notis->foto;
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Persona;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Persona']))
		{
			$model->attributes=$_POST['Persona'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idpersona));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Persona']))
		{
			$model->attributes=$_POST['Persona'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idpersona));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Persona');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Persona('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Persona']))
			$model->attributes=$_GET['Persona'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Persona the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Persona::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Persona $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='persona-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
