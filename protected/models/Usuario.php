<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $idusuario
 * @property string $email
 * @property string $password
 * @property integer $estado
 * @property integer $idpersona
 * @property string $usu_sexo
 * @property integer $idoficina
 *
 * The followings are the available model relations:
 * @property Oficina $idoficina0
 * @property Persona $idpersona0
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, idpersona, idoficina', 'required'),
			array('estado, idpersona, idoficina', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>200),
			array('password', 'length', 'max'=>100),
			array('usu_sexo', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idusuario, email, password, estado, idpersona, usu_sexo, idoficina', 'safe', 'on'=>'search'),
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
			'idoficina0' => array(self::BELONGS_TO, 'Oficina', 'idoficina'),
			'idpersona0' => array(self::BELONGS_TO, 'Persona', 'idpersona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idusuario' => 'Idusuario',
			'email' => 'Email',
			'password' => 'Password',
			'estado' => 'Estado',
			'idpersona' => 'Idpersona',
			'usu_sexo' => 'Usu Sexo',
			'idoficina' => 'Idoficina',
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

		$criteria->compare('idusuario',$this->idusuario);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('idpersona',$this->idpersona);
		$criteria->compare('usu_sexo',$this->usu_sexo,true);
		$criteria->compare('idoficina',$this->idoficina);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
