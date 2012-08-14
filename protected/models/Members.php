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
 * @property string $ip_address
 * @property integer $block
 *
 * The followings are the available model relations:
 * @property CourseUserRole[] $courseUserRoles
 */
class Members extends CActiveRecord
{
        public $password = null;
        public $memberProfile;
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
			array('name, username, password, pass_hash, pass_salt, created_at', 'required'),
			array('block', 'numerical', 'integerOnly'=>true),
			array('name, username', 'length', 'max'=>50),
			array('password, pass_hash', 'length', 'max'=>60),
			array('pass_salt, ip_address', 'length', 'max'=>20),
			array('updated_at, created_at, last_login_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, username, pass_hash, pass_salt, updated_at, created_at, last_login_time, ip_address, block', 'safe', 'on'=>'search'),
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
			'password' => 'Contraseña',
			'pass_salt' => 'Pass Salt',
			'updated_at' => 'Updated At',
			'created_at' => 'Created At',
			'last_login_time' => 'Last Login Time',
			'ip_address' => 'Ip Address',
			'block' => 'Block',
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
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('block',$this->block);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        public function encrypt( $password )
        {
            return md5( md5( $password ) . md5( $this->pass_salt ) );
        }
        
        public function beforeValidate() {
            
            if( $this->isNewRecord && $this->password !== null )
            {
                $this->created_at = time();
            }
            else
            {
                $this->updated_at = time();
            }
            
            if( $this->password !== null )
            {
                $this->generatePassword();
            }
            
            
            
            return parent::beforeValidate();
        }
        
        public function isLock()
        {
            if( $this->block >= 3 )
            {
                //Si esta bloqueada pero a pasado más de 10 minutos desde el último bloqueo, automáticamente se desbloquea
                if( time() > strtotime( '30 minutes', $this->last_login_time ) )
                {
                    $this->block = 0;
                    $this->save();
                    
                    return false;
                }
                
                return true;
            }
            
            return false;
        }
        
        public function generatePassword()
        {
                $this->pass_salt =  base_convert(mt_rand(), 10, 36);
                $this->pass_hash = md5( md5( $this->password ) . md5( $this->pass_salt ) );
        }
        
        public static function getAll( $type = 'instructors' )
        {
            if( $type == 'instructors' )
            {
                return Members::model()->findAll( array( 'select' => array( 'id', 'name' ) ) );
            }
        }
        
        public static function getUserRoleOptions()
        {
            return CHtml::listData( Yii::app()->authManager->getOperations(), 'name', 'name' );
        }
        
        public function save($runValidation = true, $attributes = null) {
            
            $return = false;
            $isValid = $this->validate();
            
            if( Yii::app()->authManager->checkAccess( 'instructors', Yii::app()->user->id ) )
                if( ! $this->memberProfile->validate() )
                {
                    return false;
                }
                elseif( $isValid )
                {
                    $return = parent::save($runValidation, $attributes); //Es valido procedemos a guardar a MemberProfile
                    
                    $this->memberProfile->member_id = $this->id;
                    
                    $this->memberProfile->save();
                }
                
            return $return;
        }
}