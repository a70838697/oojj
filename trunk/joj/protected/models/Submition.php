<?php

/**
 * This is the model class for table "{{submitions}}".
 *
 * The followings are the available columns in table '{{submitions}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $problem_id
 * @property integer $exercise_id
 * @property string $source
 * @property string $result
 * @property integer $used_time
 * @property integer $used_memory
 * @property integer $status
 * @property integer $compiler_id
 * @property string $created
 * @property string $modified
 */
class Submition extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Submition the static model class
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
		return '{{submitions}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, problem_id, source, compiler_id', 'required'),
			array('user_id, problem_id, exercise_id, used_time, used_memory, status, compiler_id', 'numerical', 'integerOnly'=>true),
			array('result', 'length', 'max'=>500),

			array('modified','default',
	              'value'=>new CDbExpression('NOW()'),
	              'setOnEmpty'=>false,'on'=>'update'),
	        array('created,modified','default',
	              'value'=>new CDbExpression('NOW()'),
	              'setOnEmpty'=>false,'on'=>'insert'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, problem_id, exercise_id, source, result, used_time, used_memory, status, compiler_id, created, modified', 'safe', 'on'=>'search'),
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
			'problem' => array(self::BELONGS_TO, 'Problem', 'problem_id'),
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
			'problem_id' => 'Problem',
			'exercise_id' => 'Exercise',
			'source' => 'Source',
			'result' => 'Result',
			'used_time' => 'Used Time',
			'used_memory' => 'Used Memory',
			'status' => 'Status',
			'compiler_id' => 'Compiler',
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
		$criteria->compare('problem_id',$this->problem_id);
		$criteria->compare('exercise_id',$this->exercise_id);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('used_time',$this->used_time);
		$criteria->compare('used_memory',$this->used_memory);
		$criteria->compare('status',$this->status);
		$criteria->compare('compiler_id',$this->compiler_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}