<?php

/**
 * This is the model class for table "reservaciones".
 *
 * The followings are the available columns in table 'reservaciones':
 * @property integer $idreservacion
 * @property integer $idhorario
 * @property string $fecha_reservacion
 * @property string $cliente
 *
 * The followings are the available model relations:
 * @property AsientoReservado[] $asientoReservados
 * @property Horario $idhorario0
 */
class Reservaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reservaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idhorario, cliente', 'required'),
			array('idhorario', 'numerical', 'integerOnly'=>true),
			array('cliente', 'length', 'max'=>300),
			array('fecha_reservacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idreservacion, idhorario, fecha_reservacion, cliente', 'safe', 'on'=>'search'),
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
			'asientoReservados' => array(self::HAS_MANY, 'AsientoReservado', 'idreservacion'),
			'idhorario0' => array(self::BELONGS_TO, 'Horario', 'idhorario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idreservacion' => 'Idreservacion',
			'idhorario' => 'Idhorario',
			'fecha_reservacion' => 'Fecha Reservacion',
			'cliente' => 'Cliente',
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

		$criteria->compare('idreservacion',$this->idreservacion);
		$criteria->compare('idhorario',$this->idhorario);
		$criteria->compare('fecha_reservacion',$this->fecha_reservacion,true);
		$criteria->compare('cliente',$this->cliente,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reservaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
