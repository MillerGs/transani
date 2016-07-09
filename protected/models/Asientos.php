<?php

/**
 * This is the model class for table "asientos".
 *
 * The followings are the available columns in table 'asientos':
 * @property integer $idasiento
 * @property integer $nro
 * @property integer $estado
 * @property string $tipo_ubic
 * @property integer $idbus
 *
 * The followings are the available model relations:
 * @property Bus $idbus0
 */
class Asientos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asientos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nro, idbus', 'required'),
			array('nro, estado, idbus', 'numerical', 'integerOnly'=>true),
			array('tipo_ubic', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idasiento, nro, estado, tipo_ubic, idbus', 'safe', 'on'=>'search'),
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
			'idbus0' => array(self::BELONGS_TO, 'Bus', 'idbus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idasiento' => 'Idasiento',
			'nro' => 'Nro',
			'estado' => 'Estado',
			'tipo_ubic' => 'Tipo Ubic',
			'idbus' => 'Idbus',
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

		$criteria->compare('idasiento',$this->idasiento);
		$criteria->compare('nro',$this->nro);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('tipo_ubic',$this->tipo_ubic,true);
		$criteria->compare('idbus',$this->idbus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Asientos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
