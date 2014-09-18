<?php

/**
 * This is the model class for table "tracks".
 *
 * The followings are the available columns in table 'tracks':
 * @property integer $id
 * @property string $code
 * @property string $title
 * @property string $description
 * @property string $icon
 * @property string $image
 * @property integer $course
 * @property integer $author
 * @property integer $status
 */

class Tracks extends ActiveRecord
{

	public $stat;

	//public $progress;  // прогресс в процентах

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Tracks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, title', 'required'),
			array('course, author, status', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>10),
			array('title', 'length', 'max'=>170),
			array('description', 'length', 'max'=>340),
			array('icon, image', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, title, description, icon, image, course, author, status, time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations(){
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(

			"Course"=>array(self::BELONGS_TO,'Courses',"course"),
			"Tasks"=>array(self::HAS_MANY,'Tasks',"track"),
			'Docs'=>array(self::MANY_MANY,'Docs','tracks_docs(track_id, doc_id)'),
			'Algorithms'=>array(self::MANY_MANY,'Algorithms','tracks_algorithms(track_id,algorithm_id)'),
			'Videos'=>array(self::HAS_MANY,'Videos','track'),
			'Faqs'=>array(self::HAS_MANY,'Faqs','track'),
		
		);

	}
	/**
	*
	*
	* @return int Процент выполнения от 0 до 100
	*
	**/

	public function getProgress(){

		if(!isset($this->stat)){   $stat = $this->stat = stathelper::trackstat($this->Tasks);  }else{ $stat = $this->stat;}

		if($stat['count']==0){$progress=0;}else{ $progress = round($stat['complete']/$stat['count']*100); };  

		return $progress;

	}

	public function getCheck(){

		if(!isset($this->stat)){   $stat = $this->stat = stathelper::trackstat($this->Tasks);  }else{ $stat = $this->stat;}

		if($stat['count']==0){$progress=0;}else{ $progress = round($stat['check']/$stat['count']*100); };  

		return $progress;

	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */

	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'code' => 'Code',
			'title' => 'Title',
			'description' => 'Description',
			'icon' => 'Icon',
			'image' => 'Image',
			'course' => 'Course',
			'author' => 'Author',
			'status' => 'Status',
			'time' => 'Время выполнения'	,	
			'order' => 'Порядок выполнения'		
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('course',$this->course);
		$criteria->compare('author',$this->author);
		$criteria->compare('status',$this->status);
		$criteria->compare('time',$this->time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tracks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
