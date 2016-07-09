<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $idpersona
 * @property string $dni
 * @property string $nombres
 * @property string $apellidos
 * @property string $celular
 * @property string $foto
 * @property integer $idempresa
 *
 * The followings are the available model relations:
 * @property Bus[] $buses
 * @property Bus[] $buses1
 * @property Empresa $idempresa0
 * @property Usuario[] $usuarios
 */
class Persona extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dni, nombres, idempresa', 'required'),
			array('idempresa', 'numerical', 'integerOnly'=>true),
			array('dni', 'length', 'max'=>8),
			array('nombres, apellidos', 'length', 'max'=>100),
			array('celular', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idpersona, dni, nombres, apellidos, celular, foto, idempresa', 'safe', 'on'=>'search'),
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
			'buses' => array(self::HAS_MANY, 'Bus', 'idchofer'),
			'buses1' => array(self::HAS_MANY, 'Bus', 'idcopiloto'),
			'idempresa0' => array(self::BELONGS_TO, 'Empresa', 'idempresa'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'idpersona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpersona' => 'Idpersona',
			'dni' => 'Dni',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'celular' => 'Celular',
			'foto' => 'Foto',
			'idempresa' => 'Idempresa',
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

		$criteria->compare('idpersona',$this->idpersona);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('idempresa',$this->idempresa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
