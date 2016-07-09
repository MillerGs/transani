<?php

/**
 * This is the model class for table "horario".
 *
 * The followings are the available columns in table 'horario':
 * @property integer $idhorario
 * @property integer $idruta
 * @property string $tipo_bus
 * @property string $hora_sal
 * @property string $fecha_sal
 * @property integer $idbus
 * @property integer $asientos_libres
 * @property integer $asientos_vendidos
 * @property string $precio
 *
 * The followings are the available model relations:
 * @property Ruta $idruta0
 * @property Bus $idbus0
 */
class Horario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'horario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idruta, tipo_bus, hora_sal, fecha_sal, idbus', 'required'),
			array('idruta, idbus, asientos_libres, asientos_vendidos', 'numerical', 'integerOnly'=>true),
			array('tipo_bus', 'length', 'max'=>50),
			array('precio', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idhorario, idruta, tipo_bus, hora_sal, fecha_sal, idbus, asientos_libres, asientos_vendidos, precio', 'safe', 'on'=>'search'),
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
			'idruta0' => array(self::BELONGS_TO, 'Ruta', 'idruta'),
			'idbus0' => array(self::BELONGS_TO, 'Bus', 'idbus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhorario' => 'Idhorario',
			'idruta' => 'Idruta',
			'tipo_bus' => 'Tipo Bus',
			'hora_sal' => 'Hora Sal',
			'fecha_sal' => 'Fecha Sal',
			'idbus' => 'Idbus',
			'asientos_libres' => 'Asientos Libres',
			'asientos_vendidos' => 'Asientos Vendidos',
			'precio' => 'Precio',
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

		$criteria->compare('idhorario',$this->idhorario);
		$criteria->compare('idruta',$this->idruta);
		$criteria->compare('tipo_bus',$this->tipo_bus,true);
		$criteria->compare('hora_sal',$this->hora_sal,true);
		$criteria->compare('fecha_sal',$this->fecha_sal,true);
		$criteria->compare('idbus',$this->idbus);
		$criteria->compare('asientos_libres',$this->asientos_libres);
		$criteria->compare('asientos_vendidos',$this->asientos_vendidos);
		$criteria->compare('precio',$this->precio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Horario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
