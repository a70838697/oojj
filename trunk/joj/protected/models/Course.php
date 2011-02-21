<?php

/**
 * This is the model class for table "{{courses}}".
 *
 * The followings are the available columns in table '{{courses}}':
 * @property integer $id
 * @property string $name
 * @property string $sequence
 * @property string $description
 * @property string $location
 * @property string $environment
 * @property string $due_time
 * @property integer $user_id
 * @property integer $begin
 * @property integer $end
 * @property integer $status
 * @property integer $created
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Course the static model class
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
		return '{{courses}}';
	}
	/**
	 * @return string the URL that shows the detail of the course
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('course/view', array(
			'id'=>$this->id,
			'title'=>$this->name,
		));
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, user_id, begin, end', 'required'),
			array('user_id, status', 'numerical', 'integerOnly'=>true),
			array('begin', 'type', 'type'=>'date','dateFormat'=>'yyyy-MM-dd'),
			array('end', 'type', 'type'=>'date','dateFormat'=>'yyyy-MM-dd'),
			array('name', 'length', 'max'=>60),
            array('sequence', 'length', 'max'=>20),
            array('description', 'length', 'max'=>512),
            array('location', 'length', 'max'=>32),
            array('environment', 'length', 'max'=>256),
            array('due_time', 'length', 'max'=>30),
	        array('created','default',
	              'value'=>new CDbExpression('UNIX_TIMESTAMP()'),
	              'setOnEmpty'=>false,'on'=>'insert'),            
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, location, environment, due_time, user_id, begin, end, status, created', 'safe', 'on'=>'search'),
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
       		'user' => array(self::BELONGS_TO, 'UUser', 'user_id'),
			'experiments' => array(self::HAS_MANY, 'Experiment', 'course_id'),
			'experimentCount' => array(self::STAT, 'Experiment', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'sequence' => 'Course number',
			'description' => 'Description',
			'location' => 'Classroom',
			'environment' => 'Environment',
			'due_time' => 'Weekly Time',
			'user_id' => 'Teacher',
			'begin' => 'Begin',
			'end' => 'End',
			'status' => 'Status',
			'created' => 'Created',
		);
	}
	public function scopes()
    {
		$alias = $this->getTableAlias(false,false);
    	return array(
            'recentlist'=>array(
            	'order'=>"{$alias}.created DESC",
		        'select'=>array("{$alias}.id","{$alias}.user_id","{$alias}.name","{$alias}.status","{$alias}.created","{$alias}.description","{$alias}.sequence","{$alias}.location","{$alias}.environment"),
        		'with'=>array(
        			'user:username',
        		),
        	),
        	'mine'=>array(
                'condition'=>UUserIdentity::isTeacher()?
        			"{$alias}.status!=". UCourseLookup::COURSE_TYPE_DELETED ." AND {$alias}.user_id=".Yii::app()->user->id:"",
        	),
            'public'=>array(
            	'condition'=>"{$alias}.status==".UCourseLookup::COURSE_TYPE_PUBLIC,
            ),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('environment',$this->environment,true);
		$criteria->compare('due_time',$this->due_time,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('begin',$this->begin);
		$criteria->compare('end',$this->end);
		$criteria->compare('status',$this->status);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}