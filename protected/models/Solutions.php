<?php

/**
 * This is the model class for table "solutions".
 *
 * The followings are the available columns in table 'solutions':
 * @property integer $id
 * @property integer $task_id
 * @property integer $student_id
 * @property string $status
 * @property string $checked_id
 * @property string $html
 * @property string $css
 * @property string $js
 * @property string $php
 * @property integer $earned
 * @property integer $created
 */
class Solutions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Solutions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('task, student, status', 'required'),
			array('task, student', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, task_id, student_id, status, checked_id, html, css, js, php, earned, created', 'safe', 'on'=>'search'),
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
			"Task"=>array(self::BELONGS_TO,'Tasks',"task"),
			"Comments"=>array(self::HAS_MANY,'Comments',"entryid"),
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
			'task' => 'Задание',
			'course' => 'Курс',			
			'student' => 'Студент',
			'status' => 'Status',
			'checked' => 'Кем проверено',
			'html' => 'Html',
			'css' => 'Css',
			'js' => 'Js',
			'php' => 'Php',
			'earned' => 'Начислено поинтов',
			'created' => 'Решение создано',
			'time' => 'Время решения',			
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
		$criteria->compare('task',$this->task);
		$criteria->compare('course',$this->course);
		$criteria->compare('student',$this->student);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('checked',$this->checked,true);
		$criteria->compare('html',$this->html,true);
		$criteria->compare('css',$this->css,true);
		$criteria->compare('js',$this->js,true);
		$criteria->compare('php',$this->php,true);
		$criteria->compare('earned',$this->earned);
		$criteria->compare('created',$this->created);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solutions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
