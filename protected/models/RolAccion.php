<?php

/**
 * This is the model class for table "rol_accion".
 *
 * The followings are the available columns in table 'rol_accion':
 * @property integer $id
 * @property integer $idrol
 * @property integer $idaccion
 *
 * The followings are the available model relations:
 * @property Rol $idrol0
 * @property MenuAccion $idaccion0
 */
class RolAccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rol_accion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrol, idaccion', 'required'),
			array('idrol, idaccion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idrol, idaccion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idrol0' => array(self::BELONGS_TO, 'Rol', 'idrol'),
			'idaccion0' => array(self::BELONGS_TO, 'MenuAccion', 'idaccion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idrol' => 'Idrol',
			'idaccion' => 'Idaccion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('idrol',$this->idrol);
		$criteria->compare('idaccion',$this->idaccion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function verificarAcceso($accion_desc)
	{
		if(!Yii::app()->user->isGuest){

			
			$sql = "SELECT COUNT(*)FROM rol_accion ra inner join menu_accion ma on ma.idaccion=ra.idaccion inner join usuario_rol ur on ur.idrol=ra.idrol where ur.idusuario=".Yii::app()->user->getId()." and ma.accion_desc='".$accion_desc."'";
			if(Yii::app()->db->createCommand($sql)->queryScalar()>0)
				return true;
			else
				return false;
		}else{
			return false;
		}
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RolAccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
