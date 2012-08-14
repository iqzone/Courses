<?php

/**
 * This is the model class for table "member_profile".
 *
 * The followings are the available columns in table 'member_profile':
 * @property string $id
 * @property string $member_id
 * @property string $picture
 * @property string $picture_thumb
 * @property string $extra_info
 *
 * The followings are the available model relations:
 * @property Members $member
 */
class MemberProfile extends CActiveRecord
{
        public $twitter;
        public $linkedin;
        public $gtalk;
        public $msn;
        public $website;
        
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemberProfile the static model class
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
		return 'member_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id', 'length', 'max'=>11),
                        array( 'twitter', 'match', 'pattern' => '/^@([A-Za-z0-9_]+)/i' ),
                        array( 'linkedin, website', 'url'),
                        array( 'msn', 'email'),
                        array( 'gtalk', 'length', 'max' => 255 ),
			array('picture, picture_thumb', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, member_id, picture, picture_thumb, extra_info, gtalk', 'safe', 'on'=>'search'),
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
			'member' => array(self::BELONGS_TO, 'Members', 'member_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'member_id' => 'Member',
			'picture' => 'Picture',
			'picture_thumb' => 'Picture Thumb',
			'extra_info' => 'Extra Info',
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
		$criteria->compare('member_id',$this->member_id,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('picture_thumb',$this->picture_thumb,true);
		$criteria->compare('extra_info',$this->extra_info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function beforeValidate() {
            return parent::beforeValidate();
        }
        
        public function save($runValidation = true, $attributes = null) {
            $this->extra_info = serialize( array( 'gtalk' => $this->gtalk, 'msn' => $this->msn, 'twitter' => $this->twitter, 'linkedin' => $this->linkedin, 'website' => $this->website ) );
            return parent::save($runValidation, $attributes);
        }
        
        public function afterFind() {
            $this->setValuesExtra();
            parent::afterFind();
        }
        
        
        private function setValuesExtra()
        {
            $extra_info = unserialize( $this->extra_info );
            
            foreach( $extra_info as $key => $extra )
            {
                if(property_exists($this, $key) )
                    eval( "\$this->{$key} = \"{$extra}\";" );
            }
        }
}