<?php

/**
 * This is the model class for table "local".
 *
 * The followings are the available columns in table 'local':
 * @property integer $idLocal
 * @property integer $idempresa
 * @property string $local_desc
 * @property string $direccion
 *
 * The followings are the available model relations:
 * @property Directorio[] $directorios
 * @property Empresa $idempresa0
 */
class Local extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'local';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idempresa, direccion', 'required'),
			array('idempresa', 'numerical', 'integerOnly'=>true),
			array('local_desc', 'length', 'max'=>100),
			array('direccion', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idLocal, idempresa, local_desc, direccion', 'safe', 'on'=>'search'),
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
			'directorios' => array(self::HAS_MANY, 'Directorio', 'idLocal'),
			'idempresa0' => array(self::BELONGS_TO, 'Empresa', 'idempresa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idLocal' => 'Id Local',
			'idempresa' => 'Idempresa',
			'local_desc' => 'Local Desc',
			'direccion' => 'Direccion',
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

		$criteria->compare('idLocal',$this->idLocal);
		$criteria->compare('idempresa',$this->idempresa);
		$criteria->compare('local_desc',$this->local_desc,true);
		$criteria->compare('direccion',$this->direccion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Local the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
