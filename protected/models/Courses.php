<?php

/**
 * This is the model class for table "courses".
 *
 * The followings are the available columns in table 'courses':
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $target
 * @property string $description
 * @property string $payforms
 * @property string $given_date
 * @property integer $enabled
 * @property string $updated_at
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property CourseMemberRole[] $courseMemberRoles
 * @property Categories $category
 */
class Courses extends CActiveRecord
{
        public $courseMemberRoles;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Courses the static model class
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
		return 'courses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, name, created_at', 'required'),
			array('enabled', 'numerical', 'integerOnly'=>true),
			array('category_id', 'length', 'max'=>11),
			array('name', 'length', 'max'=>140),
			array('target', 'length', 'max'=>255),
			array('payforms', 'length', 'max'=>50),
                        array('given_date', 'date'),
			array('updated_at, created_at', 'length', 'max'=>10),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, name, target, description, payforms, enabled, updated_at, created_at', 'safe', 'on'=>'search'),
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
			'courseMemberRoles' => array(self::HAS_MANY, 'CourseMemberRole', 'course_id'),
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'name' => 'Name',
			'target' => 'Target',
			'description' => 'Description',
			'payforms' => 'Payforms',
			'given_date' => 'Given Date',
			'enabled' => 'Enabled',
			'updated_at' => 'Updated At',
			'created_at' => 'Created At',
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
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('payforms',$this->payforms,true);
		$criteria->compare('given_date',$this->given_date,true);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        public function beforeValidate() {
            //Si es un nuevo registro, entonces vamos a llenarlo con los datos de la fecha de creación
            if( $this->isNewRecord )
            {
                $this->created_at = time();
            }
            else
            {
                $this->updated_at = time();
            }
            
            $this->payforms = serialize($this->payforms); //Serializamos los datos obtenidos
            
            return parent::beforeValidate();
        }
        
        public function init() {
            if( Yii::app()->user->checkAccess( 'administrator' ) )
            {
                $this->enabled = true;
            }
            
            parent::init();
        }
        
        public function afterFind() {
            if( intval( $this->given_date ) == 0 )
            {
                $this->given_date = null;
            }
            else
            {
                $this->given_date = date( 'm/d/Y', $this->given_date );
            }
            
            //$this->payforms = unserialize( $this->payforms );
            
            parent::afterFind();
        }


        public function getPayForms( $operation = 'get' )
        {
            $this->payforms = unserialize( $this->payforms ); //Se añade por que sabemos que esta actualizando
            if( $operation == 'get')
            {

                $model = Payforms::model()->findAll( array( 
                                                'select' => array( 'id', 'name' ),
                                                'condition'  => 'enabled = true', //Filtro para mostrar solo tipos de pagos habilitados
                                        )
                );
                
            }
            elseif($operation == 'infoByCriteria')
            {
                $model = Payforms::model()->findAll( array( 
                                                'select' => array( 'id', 'name' ),
                                                'condition'  => 'enabled = true AND id IN ( ' . join( ',', $this->payforms ) . ')', //Filtro para mostrar solo tipos de pagos habilitados
                                        )
                );
            }
            
            return $model;
        }
        
        
        public function getCategories()
        {
            return Categories::model()->findAll( array( 
                                                    'select' => array( 'id', 'name' ),
                                                    'condition'  => 'enabled = true', //Filtro para mostrar solo tipos de pagos habilitados
                                               )
                    );
        }
        
        public function afterValidate() {
            $this->given_date = strtotime($this->given_date);
            parent::afterValidate();
        }
        
        public function save($runValidation = true, $attributes = null) {
            $save = parent::save($runValidation, $attributes);
            if( $this->courseMemberRoles )
            {
                CourseMemberRole::model()->deleteAll('course_id = ' . $this->id );//Borramos instructores asignados a este curso
                
                $courseMembersRoles = new CourseMemberRole;
                $courseMembersRoles->setAttributes( array( 'course_id' => $this->id, 'member_id' => $this->courseMemberRoles['member_id'], 'role' => 'instructors' ) );
                $courseMembersRoles->save();
            }
            return $save;
        }
}