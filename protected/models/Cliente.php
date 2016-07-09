<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $idcliente
 * @property string $nombres
 * @property string $nrodoc
 * @property integer $edad
 * @property integer $tipodoc
 * @property string $correo
 * @property string $contrasenia
 *
 * The followings are the available model relations:
 * @property Boleto[] $boletos
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, correo, contrasenia', 'required'),
			array('edad, tipodoc', 'numerical', 'integerOnly'=>true),
			array('nombres, correo', 'length', 'max'=>200),
			array('nrodoc', 'length', 'max'=>8, 'min'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcliente, nombres, nrodoc, edad, tipodoc, correo', 'safe', 'on'=>'search'),
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
			'boletos' => array(self::HAS_MANY, 'Boleto', 'idcliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcliente' => 'Código',
			'nombres' => 'Nombres',
			'nrodoc' => 'N° Doc.',
			'edad' => 'Edad',
			'tipodoc' => 'Tipo doc.',
			'correo' => 'Correo',
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

		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('nrodoc',$this->nrodoc,true);
		$criteria->compare('edad',$this->edad);
		$criteria->compare('tipodoc',$this->tipodoc);
		$criteria->compare('correo',$this->correo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
