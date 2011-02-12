<?php

/**
 * This is the model class for table "{{experiments}}".
 *
 * The followings are the available columns in table '{{experiments}}':
 * @property integer $id
 * @property integer $course_id
 * @property string $name
 * @property integer $experiment_type_id
 * @property string $sequence
 * @property string $description
 * @property integer $user_id
 * @property integer $status
 * @property string $begin
 * @property string $end
 * @property string $created
 * @property integer $exercise_id
 */
class Experiment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Experiment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{experiments}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, sequence, description, user_id, begin, end, created, exercise_id', 'required'),
			array('course_id, experiment_type_id, user_id, status, exercise_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('sequence', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, course_id, name, experiment_type_id, sequence, description, user_id, status, begin, end, created, exercise_id', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'exercise' => array(self::BELONGS_TO, 'Exercise', 'exercise_id', 'with'=>'exercise_problems'),
		);
	}
	/**
	 * @param Course the post that this experiment belongs to. If null, the method
	 * will query for the course.
	 * @return string the permalink URL for this experiment
	 */
	public function getUrl($course=null)
	{
		if($course===null) return Yii::app()->createUrl('experiment/view', array(
			'id'=>$this->id,
			'title'=>$this->name,
		));
		//	$course=$this->course;
		return $course->url.'#c'.$this->id;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'course_id' => 'Course',
			'name' => 'Name',
			'experiment_type_id' => 'Experiment Type',
			'sequence' => 'Sequence',
			'description' => 'Description',
			'user_id' => 'User',
			'status' => 'Status',
			'begin' => 'Begin',
			'end' => 'End',
			'created' => 'Created',
			'exercise_id' => 'Exercise',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('experiment_type_id',$this->experiment_type_id);
		$criteria->compare('sequence',$this->sequence,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('begin',$this->begin,true);
		$criteria->compare('end',$this->end,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('exercise_id',$this->exercise_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}