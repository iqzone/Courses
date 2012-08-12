<?php

/**
 * <pre>
 * Codebit.org
 * IP.Board v3.3.0
 * @description
 * Last Updated: $Date: 12-ago-2012 -006  $
 * </pre>
 * @filename            Roles.php
 * @author 		$Author: juliobarreraa@gmail.com $
 * @package		
 * @subpackage	        
 * @link		http://www.codebit.org
 * @since		12-ago-2012
 * @timestamp           14:00:32
 * @version		$Rev:  $
 *
 */

/**
 * Description of Roles
 *
 * @author juliobarreraa@gmail.com
 */
class RolesForm extends CFormModel
{
	public $name;
	public $operations;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('name, operations', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'Nombre del Rol',
		);
	}
        
        public function beforeValidate() {
            parent::beforeValidate();
        }
        
        public function save()
        {
            $this->name = strtolower( $this->name );
            
            Yii::app()->authManager->removeAuthItem( $this->name );
            $role = Yii::app()->authManager->createRole( $this->name );
            foreach( $this->operations as $operation )
            {
                $role->addChild( $operation );
            }
            return true;
        }
}

?>
