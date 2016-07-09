<?php

/**
 * This is the model class for table "boleto".
 *
 * The followings are the available columns in table 'boleto':
 * @property integer $idboleto
 * @property string $serie
 * @property string $numero
 * @property integer $tipo_doc
 * @property string $ruc
 * @property string $razon_social
 * @property integer $idcliente
 * @property string $origen
 * @property string $destino
 * @property integer $nroasiento
 * @property string $fechaviaje
 * @property string $horaviaje
 * @property string $precio
 * @property integer $estado
 * @property integer $idbus
 * @property integer $idhorario
 *
 * The followings are the available model relations:
 * @property Cliente $idcliente0
 * @property Bus $idbus0
 */
class Boleto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'boleto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('serie, numero, tipo_doc, ruc, razon_social, idcliente, origen, destino, nroasiento, fechaviaje, horaviaje, precio, idbus, idhorario', 'required'),
			array('tipo_doc, idcliente, nroasiento, estado, idbus, idhorario', 'numerical', 'integerOnly'=>true),
			array('serie', 'length', 'max'=>3),
			array('numero', 'length', 'max'=>7),
			array('ruc, razon_social, origen, destino', 'length', 'max'=>50),
			array('precio', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idboleto, serie, numero, tipo_doc, ruc, razon_social, idcliente, origen, destino, nroasiento, fechaviaje, horaviaje, precio, estado, idbus, idhorario', 'safe', 'on'=>'search'),
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
			'idcliente0' => array(self::BELONGS_TO, 'Cliente', 'idcliente'),
			'idbus0' => array(self::BELONGS_TO, 'Bus', 'idbus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idboleto' => 'Idboleto',
			'serie' => 'Serie',
			'numero' => 'Numero',
			'tipo_doc' => 'Tipo Doc',
			'ruc' => 'Ruc',
			'razon_social' => 'Razon Social',
			'idcliente' => 'Idcliente',
			'origen' => 'Origen',
			'destino' => 'Destino',
			'nroasiento' => 'Nroasiento',
			'fechaviaje' => 'Fechaviaje',
			'horaviaje' => 'Horaviaje',
			'precio' => 'Precio',
			'estado' => 'Estado',
			'idbus' => 'Idbus',
			'idhorario' => 'Idhorario',
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

		$criteria->compare('idboleto',$this->idboleto);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('tipo_doc',$this->tipo_doc);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('razon_social',$this->razon_social,true);
		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('origen',$this->origen,true);
		$criteria->compare('destino',$this->destino,true);
		$criteria->compare('nroasiento',$this->nroasiento);
		$criteria->compare('fechaviaje',$this->fechaviaje,true);
		$criteria->compare('horaviaje',$this->horaviaje,true);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('idbus',$this->idbus);
		$criteria->compare('idhorario',$this->idhorario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Boleto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
