<?php

/**
 * This is the model class for table "Buckets".
 *
 * The followings are the available columns in table 'Buckets':
 * @property integer $id
 * @property integer $student
 * @property string $title
 * @property string $description
 * @property integer $public
 * @property integer $portfolio
 * @property string $html
 * @property string $css
 * @property string $js
 * @property string $php
 */
class Buckets extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Buckets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('student, public, portfolio', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>140),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, student, title, description, public, portfolio, html, css, js, php', 'safe', 'on'=>'search'),
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
			"Student"=>array(self::BELONGS_TO,'Students',"student")
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'student' => 'Student',
			'title' => 'Title',
			'description' => 'Description',
			'public' => 'Public',
			'portfolio' => 'Portfolio',
			'html' => 'Html',
			'css' => 'Css',
			'js' => 'Js',
			'php' => 'Php',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('student',$this->student);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('public',$this->public);
		$criteria->compare('portfolio',$this->portfolio);
		$criteria->compare('html',$this->html,true);
		$criteria->compare('css',$this->css,true);
		$criteria->compare('js',$this->js,true);
		$criteria->compare('php',$this->php,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Buckets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
