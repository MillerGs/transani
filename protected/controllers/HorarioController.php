<?php

class HorarioController extends Controller
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
				'actions'=>array('create','update','CreateBoleto','VerDesignMircro','ListarHorarioSemana','VerificarAsiento','CreateReservacion','verDetalleAsiento'),
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
	public function actionVerDetalleAsiento()
	{
		$this->layout='none'; 	
		$data = array();
		$sql = "SELECT * from boleto where idhorario=".$_POST['idhorario']." and nroasiento=".$_POST['asientonro'] ;

		$rows = Yii::app()->db->createCommand($sql)->queryAll();
		$i=0;
		foreach($rows as $row) { 
			//$row["sel"] = 0;
	  		//$data['idasiento'] = $row["idasiento"]; 
	  		$cli=Cliente::model()->findByPk($row["idcliente"]);
	  		$row["cliente"]=$cli->nombres.' '.$cli->apellidos;
	  		$this->render('_detalle_asiento',array(
				'row'=>$row, 
			)); 
			$i=3;
  		} 
  		if($i==0){
  			$sql = "SELECT r.* from asiento_reservado ar inner join reservaciones r on r.idreservacion=ar.idreservacion where r.idhorario=".$_POST['idhorario']." and nro_asiento=".$_POST['asientonro'] ;

			$rows = Yii::app()->db->createCommand($sql)->queryAll();
			foreach($rows as $row) { 
				//$row["sel"] = 0;
		  		//$data['idasiento'] = $row["idasiento"];  
				$sql = "SELECT * FROM asiento_reservado where idreservacion=".$row["idreservacion"]; 

		  		$this->render('_detalle_asiento_resercado',array(
					'rowc'=>$row, 
					'rowd'=>Yii::app()->db->createCommand($sql)->queryAll(),
				));  
	  		}
  		}
	}
	public function actionCreateReservacion()
	{ 
		$this->layout='none';
 
		$model=new Reservaciones; 
		//$transaction=$model->dbConnection->beginTransaction();
		 
			//$command = Yii::app()->db->createCommand('SELECT max(c_horario_det) FROM PERS_Horario_detalle');
			//$c_horario_det = $command->queryScalar()+1;
			//$model->c_horario_det=$c_horario_det  ;
			

			$model->idhorario=$_POST['idhorario'] ; 
			$model->cliente=$_POST['cliente'] ;  
			  
			if($model->save())
			{  
				$data = json_decode(stripslashes($_POST['detalle']));
				foreach($data->items as $key)
			    {  
					$model1=new AsientoReservado; 
					$model1->nro_asiento=$key->{'asiento'};
					$model1->idreservacion=$model->idreservacion;
			        if($model1->save()){
			        	$modelasiento=Asientos::model()->findByAttributes(
						    array('idhorario'=>$_POST['idhorario'],'nro'=>$model1->nro_asiento) 
						);
						$modelasiento->estado=2;
						$modelasiento->save();
			        } 
			    } 
			    echo $model->idreservacion;
			}
		 
 		 
	}
	public function actionVerificarAsiento(){
 
		$this->layout='none'; 	
		$data = array();
		$sql = "SELECT * from asientos where idhorario=".$_POST['idhorario']." and nro=".$_POST['nro'];

		$rows = Yii::app()->db->createCommand($sql)->queryAll();
		$i=0;
		foreach($rows as $row) { 
			//$row["sel"] = 0;
	  		$data['idasiento'] = $row["idasiento"];
	  		$data['nro'] = $row["nro"];
	  		$data['estado'] = $row["estado"]; 
	  		break;
  		}   
		echo json_encode($data);

	}
	public function actionListarHorarioSemana(){
		 
  		$this->layout='none'; 	
		$data = array();
		$sql = "select h.*,hora_sal + INTERVAL 60 MINUTE as hora_fin,bu.color,bu.placa,bu.tipo_bus from horario h inner join bus bu on h.idbus=bu.idbus where h.idruta=".$_POST['idruta'];

		$rows = Yii::app()->db->createCommand($sql)->queryAll();
		$i=0;
		foreach($rows as $row) {
			//$row["sel"] = 0;
			$row1 = array();
	  		$row1['id'] = 'id'.$row["idhorario"];
	  		$row1['idhorario'] = $row["idhorario"];
	  		$row1['idruta'] = $row["idruta"];
	  		$row1['tipo_bus'] = $row["tipo_bus"];
	  		$row1['hora_sal'] =$row["hora_sal"];
	  		$row1['fecha_sal'] = $row["fecha_sal"]; 
	  		$row1['idbus'] = $row["idbus"];;
	  		$row1['asientos_libres'] = $row["asientos_libres"];
	  		$row1['asientos_vendidos'] = $row["asientos_vendidos"];
	  		$row1['start'] = $row["fecha_sal"].' '.substr($row["hora_sal"],0,5);
	  		$row1['end'] = $row["fecha_sal"].' '.substr($row["hora_fin"],0,5);
	  		$row1['precio'] = $row["precio"];
	  		$row1['color'] = $row["color"];
	  		$row1['desc_bus'] = $row["placa"].'-'.$row["tipo_bus"];

        	//$row1["q_minutos_toler"] = $row["q_minutos_toler"];  
	  		$data[$i] = $row1;
            $i++;
	  	}
		echo json_encode($data);
	}
	public function actionVerDesignMircro()
	{ 

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		 
		
		$this->layout='none';
		$this->render('_design_micro',array(
			'nroasientos'=>Bus::model()->findByPk($_POST['idbus'])->nros_asientos,
		));
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
		$this->layout='none';
 
		$model=new Horario; 

		if(isset($_POST['idhorario']))
		{
			//$command = Yii::app()->db->createCommand('SELECT max(c_horario_det) FROM PERS_Horario_detalle');
			//$c_horario_det = $command->queryScalar()+1;
			//$model->c_horario_det=$c_horario_det  ;
			$model->idruta=$_POST['idruta'] ;
			$model->idbus=$_POST['idbus'];
			$model->tipo_bus=Bus::model()->findByPk($_POST['idbus'])->tipo_bus;
			$model->asientos_libres=Bus::model()->findByPk($_POST['idbus'])->nros_asientos;
			$model->precio=$_POST['precio'];
			$model->hora_sal=$_POST['hora_sal'];
			$model->fecha_sal=$_POST['fecha_sal'];
			if($model->save())
			{
				$totalasientos = Bus::model()->findByPk($_POST['idbus'])->nros_asientos;
				for ( $i = 1 ; $i <= $totalasientos ; $i ++) {
					$modelas=new Asientos; 
					$modelas->nro=$i;
					$modelas->estado=0;
					$modelas->tipo_ubic='V';
					$modelas->idbus=$model->idbus;
					$modelas->idhorario=$model->idhorario;
					$modelas->save();
				}

				echo '1';//.$model->idhorario;
			}
			else
				echo '2';
		}else{
			$this->render('create',array(
						'model'=>$model, 
			));
		}

				 
	}
	public function actionCreateBoleto()
	{ 
		$this->layout='none';
 
		$model=new Boleto; 
		$model1=new Cliente; 
		//$transaction=$model->dbConnection->beginTransaction();
		if(isset($_POST['idboleto']))
		{
			//$command = Yii::app()->db->createCommand('SELECT max(c_horario_det) FROM PERS_Horario_detalle');
			//$c_horario_det = $command->queryScalar()+1;
			//$model->c_horario_det=$c_horario_det  ;
			if($_POST['idcliente']=='')
			{
				$model1->nrodoc=$_POST['nrodoc'] ;
				$model1->tipodoc=1;
				$model1->nombres=$_POST['nombres'] ;
				$model1->apellidos=$_POST['apellidos'] ;
				$model1->edad=$_POST['edad'] ;
				if($model1->save())
				{
					echo '3';
				}
			}else{
				$model1=Cliente::model()->findByPk($_POST['idcliente']);
			} 

				
			if( $model1->idcliente!="")
			{  
				$model->serie=$_POST['serie'];
				$model->numero=$_POST['numero'];
				$model->tipo_doc=1;
				$model->ruc=$_POST['ruc'];
				$model->razon_social=$_POST['razon_social'];
				$model->idcliente=$model1->idcliente;//Yii::app()->db->createCommand()->select('max(idcliente) as max')->from('cliente')->queryScalar();
				$model->origen=$_POST['origen'];
				$model->destino=$_POST['destino'];
				$model->nroasiento=$_POST['nroasiento'];
				$model->fechaviaje=$_POST['fechaviaje'];
				$model->horaviaje=$_POST['horaviaje'];
				$model->precio=$_POST['precio'];
				$model->estado=1;
				$model->idbus=$_POST['idbus'];
				$model->idhorario=$_POST['idhorario'];
				if($model->save())
				{
					$modelasiento=Asientos::model()->findByAttributes(
					    array('idhorario'=>$_POST['idhorario'],'nro'=>$model->nroasiento) 
					);
					$modelasiento->estado=1;
					$modelasiento->save();

					$modelhorario=Horario::model()->findByPk($_POST['idhorario']);
					$modelhorario->asientos_libres=$modelhorario->asientos_libres-1;
					$modelhorario->asientos_vendidos=$modelhorario->asientos_vendidos+1;
					if($modelhorario->save())
					{
						echo '1'; 
					}else{
						echo '2';
					}
				}else
					echo '2';

			}
			else
				echo '2';
		}else{
			$this->render('create',array(
						'model'=>$model, 
			));
		}

				 
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

		if(isset($_POST['Horario']))
		{
			$model->attributes=$_POST['Horario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idhorario));
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
  		$this->layout='column3'; 	
		$dataProvider=new CActiveDataProvider('Horario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Horario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Horario']))
			$model->attributes=$_GET['Horario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Horario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Horario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Horario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='horario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
