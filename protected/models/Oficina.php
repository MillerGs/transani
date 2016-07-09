<?php

/**
 * This is the model class for table "oficina".
 *
 * The followings are the available columns in table 'oficina':
 * @property integer $idoficina
 * @property string $desc_oficina
 * @property integer $idsede
 *
 * The followings are the available model relations:
 * @property Sede $idsede0
 * @property Ruta[] $rutas
 * @property Usuario[] $usuarios
 */
class Oficina extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'oficina';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desc_oficina, idsede', 'required'),
			array('idsede', 'numerical', 'integerOnly'=>true),
			array('desc_oficina', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idoficina, desc_oficina, idsede', 'safe', 'on'=>'search'),
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
			'idsede0' => array(self::BELONGS_TO, 'Sede', 'idsede'),
			'rutas' => array(self::HAS_MANY, 'Ruta', 'idoficina'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'idoficina'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idoficina' => 'Idoficina',
			'desc_oficina' => 'Desc Oficina',
			'idsede' => 'Idsede',
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

		$criteria->compare('idoficina',$this->idoficina);
		$criteria->compare('desc_oficina',$this->desc_oficina,true);
		$criteria->compare('idsede',$this->idsede);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Oficina the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
