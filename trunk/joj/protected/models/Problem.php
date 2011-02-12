<?php

/**
 * This is the model class for table "{{problems}}".
 *
 * The followings are the available columns in table '{{problems}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property integer $time_limit
 * @property integer $memory_limit
 * @property string $submission_no
 * @property string $accepted_no
 * @property string $description
 * @property string $source
 * @property string $input
 * @property string $output
 * @property string $input_sample
 * @property string $output_sample
 * @property string $hint
 * @property integer $flag
 * @property integer $visibility
 * @property string $created
 * @property string $modified
 */
class Problem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Problem the static model class
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
		return '{{problems}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('submission_no, accepted_no, description, input, output, input_sample, output_sample, hint', 'required'),
			array('user_id, time_limit, memory_limit, flag, visibility', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>512),
			array('submission_no, accepted_no', 'length', 'max'=>10),
			array('source', 'length', 'max'=>128),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, title, time_limit, memory_limit, submission_no, accepted_no, description, source, input, output, input_sample, output_sample, hint, flag, visibility, created, modified', 'safe', 'on'=>'search'),
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
	        'tests' => array(self::HAS_MANY, 'Test', 'problem_id'
//	            'condition'=>'comments.status='.Comment::STATUS_APPROVED,
//	            'order'=>'comments.create_time DESC'
			),
       		'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'submitions' => array(self::HAS_MANY, 'Submition', 'problem_id'),
	        'specialjudger' => array(self::HAS_ONE, 'ProblemJudger', 'problem_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'title' => 'Title',
			'time_limit' => 'Time Limit',
			'memory_limit' => 'Memory Limit',
			'submission_no' => 'Submission No',
			'accepted_no' => 'Accepted No',
			'description' => 'Description',
			'source' => 'Source',
			'input' => 'Input',
			'output' => 'Output',
			'input_sample' => 'Input Sample',
			'output_sample' => 'Output Sample',
			'hint' => 'Hint',
			'flag' => 'Flag',
			'visibility' => 'Visibility',
			'created' => 'Created',
			'modified' => 'Modified',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('time_limit',$this->time_limit);
		$criteria->compare('memory_limit',$this->memory_limit);
		$criteria->compare('submission_no',$this->submission_no,true);
		$criteria->compare('accepted_no',$this->accepted_no,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('input',$this->input,true);
		$criteria->compare('output',$this->output,true);
		$criteria->compare('input_sample',$this->input_sample,true);
		$criteria->compare('output_sample',$this->output_sample,true);
		$criteria->compare('hint',$this->hint,true);
		$criteria->compare('flag',$this->flag);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}