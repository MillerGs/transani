<?php

/**
 * This is the model class for table "bus".
 *
 * The followings are the available columns in table 'bus':
 * @property integer $idbus
 * @property integer $idchofer
 * @property string $placa
 * @property integer $idcopiloto
 * @property integer $nros_asientos
 *
 * The followings are the available model relations:
 * @property Persona $idcopiloto0
 * @property Persona $idchofer0
 * @property Horario[] $horarios
 */
class Bus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idchofer, placa, idcopiloto, nros_asientos', 'required'),
			array('idchofer, idcopiloto, nros_asientos', 'numerical', 'integerOnly'=>true),
			array('placa', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idbus, idchofer, placa, idcopiloto, nros_asientos', 'safe', 'on'=>'search'),
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
			'idcopiloto0' => array(self::BELONGS_TO, 'Persona', 'idcopiloto'),
			'idchofer0' => array(self::BELONGS_TO, 'Persona', 'idchofer'),
			'horarios' => array(self::HAS_MANY, 'Horario', 'idbus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbus' => 'Código',
			'idchofer' => 'Chofer',
			'placa' => 'Placa',
			'idcopiloto' => 'Copiloto',
			'nros_asientos' => 'Cantidad de Asientos',
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

		$criteria->compare('idbus',$this->idbus);
		$criteria->compare('idchofer',$this->idchofer);
		$criteria->compare('placa',$this->placa,true);
		$criteria->compare('idcopiloto',$this->idcopiloto);
		$criteria->compare('nros_asientos',$this->nros_asientos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
