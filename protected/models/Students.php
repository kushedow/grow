<?php

/**
 * This is the model class for table "students".
 * 
 * The followings are the available columns in table 'students':
 * @property integer $id
 * @property string $mail
 * @property string $pass
 * @property string $shortname
 * @property string $fullname
 * @property string $vkid
 * @property string $status
 * @property string $role
 * @property string $phone
 * @property string $avatar
 * @property integer $groups
 */

class Students extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName(){

		return 'Students';

	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mail, pass, shortname, fullname', 'required'),
			 
			array('pass, fullname', 'length', 'max'=>100),
			array('vkid', 'length', 'max'=>15),
			array('phone', 'length', 'max'=>20),
			array('avatar', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mail, pass, shortname, fullname, vkid, status, role, phone, avatar, settings', 'safe', 'on'=>'search'),
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

			"Groups"=>array(self::MANY_MANY,'Groups',"group_student_assignment(student_id,group_id)"),

			'Docs'=>array(self::MANY_MANY,'Docs','students_docs(student_id, doc_id)'),
		 	
		 	"Achievements"=>array(self::MANY_MANY,'Achievements',"student_achievement_assignment(achievement_id,student_id)"),

		 	"Solutions"=>array(self::HAS_MANY,'Solutions',"student"),

		 	"Buckets"=>array(self::HAS_MANY,'Buckets',"student"),

			"Points"=>array(self::HAS_MANY,'Points',"student"),

		);
	
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mail' => 'Mail',
			'pass' => 'Pass',
			'shortname' => 'Shortname',
			'fullname' => 'Fullname',
			'vkid' => 'Vkid',
			'status' => 'Status',
			'role' => 'Role',
			'phone' => 'Phone',
			'avatar' => 'Avatar',
			'settings' => 'Настройки',

			'yes_office' => 'Хочу в офис',
			'yes_freelance' => 'Хочу на фриланс',
			'yes_internship' => 'Хочу на стажировку',
			'yes_project' => 'Хочу на проект',		 
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
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('shortname',$this->shortname,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('vkid',$this->vkid,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('avatar',$this->avatar,true);
		 

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getStat(){

		return "20 заданий, 6 поинтов, 12 стикеров";

	}

	public function getHasPortfolio(){

		$solutions_count = Solutions::model()->countByAttributes(array("student"=>($this->id),"publish"=>true)); 

		$buckets_count = Buckets::model()->countByAttributes(array("student"=>($this->id),"portfolio"=>true)); 

		return $solutions_count+$buckets_count;

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Students the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
