<?php

/**
 * This is the model class for table "menu_accion".
 *
 * The followings are the available columns in table 'menu_accion':
 * @property integer $idaccion
 * @property integer $idmenu
 * @property string $accion_desc
 *
 * The followings are the available model relations:
 * @property MenuAccion $idmenu0
 * @property MenuAccion[] $menuAccions
 * @property RolAccion[] $rolAccions
 */
class MenuAccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'menu_accion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('accion_desc', 'required'),
			array('idmenu', 'numerical', 'integerOnly'=>true),
			array('accion_desc', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idaccion, idmenu, accion_desc', 'safe', 'on'=>'search'),
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
			'idmenu0' => array(self::BELONGS_TO, 'MenuAccion', 'idmenu'),
			'menuAccions' => array(self::HAS_MANY, 'MenuAccion', 'idmenu'),
			'rolAccions' => array(self::HAS_MANY, 'RolAccion', 'idaccion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idaccion' => 'Idaccion',
			'idmenu' => 'Idmenu',
			'accion_desc' => 'Accion Desc',
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

		$criteria->compare('idaccion',$this->idaccion);
		$criteria->compare('idmenu',$this->idmenu);
		$criteria->compare('accion_desc',$this->accion_desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MenuAccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
