<?php

/**
 * This is the model class for table "members".
 *
 * The followings are the available columns in table 'members':
 * @property string $id
 * @property string $name
 * @property string $username
 * @property string $pass_hash
 * @property string $pass_salt
 * @property string $updated_at
 * @property string $created_at
 * @property string $last_login_time
 *
 * The followings are the available model relations:
 * @property CourseUserRole[] $courseUserRoles
 */
class Members extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Members the static model class
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
		return 'members';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, username, pass_hash, pass_salt, created_at', 'required'),
			array('name, username', 'length', 'max'=>50),
			array('pass_hash', 'length', 'max'=>60),
			array('pass_salt', 'length', 'max'=>20),
			array('updated_at, created_at, last_login_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, username, pass_hash, pass_salt, updated_at, created_at, last_login_time', 'safe', 'on'=>'search'),
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
			'courseUserRoles' => array(self::HAS_MANY, 'CourseUserRole', 'user_id'),
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
			'username' => 'Username',
			'pass_hash' => 'Pass Hash',
			'pass_salt' => 'Pass Salt',
			'updated_at' => 'Updated At',
			'created_at' => 'Created At',
			'last_login_time' => 'Last Login Time',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('pass_hash',$this->pass_hash,true);
		$criteria->compare('pass_salt',$this->pass_salt,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function encrypt( $password )
        {
            return md5( md5( $password ) . md5( $this->pass_salt ) );
        }
        
        public function beforeValidate() {
            $this->pass_salt =  base_convert(mt_rand(), 10, 36);
            $this->pass_hash = md5( md5( $this->pass_hash ) . md5( $this->pass_salt ) );
            
            $this->created_at = time();
            
            return parent::beforeValidate();
        }
}