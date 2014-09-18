<?php

/**
 * This is the model class for table "tasks".
 *
 * The followings are the available columns in table 'tasks':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $icon
 * @property string $image
 * @property integer $track
 * @property integer $course
 * @property integer $author
 * @property string $initial_html
 * @property string $initial_css
 * @property string $initial_js
 * @property integer $check
 * @property integer $status
 */
class Tasks extends ActiveRecord{

	/**
	*
	*  @return int Иденификтор следующего задания
	*
	**/

	public function getNext(){

		static $next = null;

		if(isset($next)) {return $next;}

		//

		$course = $this->course;

		$tasks = Tasks::model()->findAllByAttributes(array("track"=>$course),array("order"=>"t.order ASC"));

		if(count($tasks)== 0){ return 0;}

		$last = count($tasks)-1; 

		if($tasks[$last]->id == $this->id){$next = 0; return 0;}

		foreach($tasks as $i => $task){

			if($task->id==$this->id){

				$next = $tasks[$i+1]->id;

				return $next;

			}

		}

		


	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'Tasks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,  track', 'required'),
			array('track, course, author,', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>170),
			array('description', 'length', 'max'=>340),
			array('icon, image', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, icon, image, track, course, author, check, status,theory', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations(){

		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.

		return array(
			"Tracks"=>array(self::BELONGS_TO,'Tracks',"track"),
			"Solutions"=>array(self::HAS_MANY,'Solutions',"task")

		);

	}

	/**
	*
	* Добавляем волшебное свойство, которое скажет нам, есть ли решения у задачки
	* return boolean решалось ли данное задание
	*
	**/

	public function getactive(){

       if($this->Solutions){ return 1; } return 0;

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'icon' => 'Icon',
			'image' => 'Image',
			'track' => 'Track',
			'course' => 'Course',
			'author' => 'Author',
			'html' => 'Initial Html',
			'css' => 'Initial Css',
			'js' => 'Initial Js',
			'check' => 'Check',
			'example' => 'Образец',
			'theory' => 'Теория',
			'status' => 'Статус',
			'order' => 'Порядок',
			'points' => 'Поинты за задание',

		);
	}

	// public function getMy(){

	// 	Solutions::model()->findByAttributes(array('task' => $this->id, "student"=>$_SESSION['user']));
		
	// 	return $this->id;

	// }

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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('track',$this->track);
		$criteria->compare('course',$this->course);
		$criteria->compare('author',$this->author);
		$criteria->compare('initial_html',$this->initial_html,true);
		$criteria->compare('initial_css',$this->initial_css,true);
		$criteria->compare('initial_js',$this->initial_js,true);
		$criteria->compare('check',$this->check);
		$criteria->compare('status',$this->status);
		$criteria->compare('theory',$this->theory);		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tasks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
