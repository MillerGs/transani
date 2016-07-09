<?php

/**
 * This is the model class for table "ruta".
 *
 * The followings are the available columns in table 'ruta':
 * @property integer $idruta
 * @property string $ruta_desc
 * @property integer $idoficina
 * @property integer $origen
 * @property integer $destino
 *
 * The followings are the available model relations:
 * @property Horario[] $horarios
 * @property Ciudad $destino0
 * @property Oficina $idoficina0
 * @property Ciudad $origen0
 */
class Ruta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ruta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ruta_desc, idoficina, origen, destino', 'required'),
			array('idoficina, origen, destino', 'numerical', 'integerOnly'=>true),
			array('ruta_desc', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idruta, ruta_desc, idoficina, origen, destino', 'safe', 'on'=>'search'),
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
			'horarios' => array(self::HAS_MANY, 'Horario', 'idruta'),
			'destino0' => array(self::BELONGS_TO, 'Ciudad', 'destino'),
			'idoficina0' => array(self::BELONGS_TO, 'Oficina', 'idoficina'),
			'origen0' => array(self::BELONGS_TO, 'Ciudad', 'origen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idruta' => 'Idruta',
			'ruta_desc' => 'Ruta Desc',
			'idoficina' => 'Idoficina',
			'origen' => 'Origen',
			'destino' => 'Destino',
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

		$criteria->compare('idruta',$this->idruta);
		$criteria->compare('ruta_desc',$this->ruta_desc,true);
		$criteria->compare('idoficina',$this->idoficina);
		$criteria->compare('origen',$this->origen);
		$criteria->compare('destino',$this->destino);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ruta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
