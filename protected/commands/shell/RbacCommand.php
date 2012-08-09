<?php

/**
 * <pre>
 * Codebit.org
 * IP.Board v3.3.0
 * @description
 * Last Updated: $Date: 07-ago-2012 -006  $
 * </pre>
 * @filename            RbacCommand.php
 * @author 		$Author: juliobarreraa@gmail.com $
 * @package		PRI
 * @subpackage	        
 * @link		http://www.codebit.org
 * @since		07-ago-2012
 * @timestamp           0:02:55
 * @version		$Rev:  $
 *
 */

/**
 * Description of RbacCommand
 *
 * @author juliobarreraa@gmail.com
 */
class RbacCommand extends CConsoleCommand {
    private $_authManager;
    
    public function getHelp() {
        return <<<EOD
USAGE
   rbac
       
DESCRIPTION
   This command generates an initial RBAC authorization hierarchy.
       
EOD;
    }
    
    public function run($args) {
        //Aseguramos que esta creado authManager
        if( ( $this->_authManager = Yii::app()->authManager ) === null )
        {
            echo "Error: an authorization manager, named 'authManager' must be configured to use this command.\n
                  If you already added 'authManager' component in application configuration,\n
                  please quit and re-enter the yiic shell.\n";
            return -1;
        }
        
        //Oportunidad para abortar la petición
        
        echo "This command will create three roles: ReadCourse, suscribeCourse, registerCourse, downloadCourse, createCourse:\n
              create, read, update and delete users\n
              create, read, update and delete course\n
              Would you like to continue? [Yes|No] ";
        
        if( ! strncasecmp( trim( fgets( STDIN ) ), 'y', 1) )
        {
            $this->_authManager->clearAll();
            //Users permissions
            $this->_authManager->createOperation( 'createUser', 'Create a new User' );
            $this->_authManager->createOperation( 'readUser', 'Read a User' );
            $this->_authManager->createOperation( 'editUser', 'Edit a User' );
            $this->_authManager->createOperation( 'deleteUser', 'Delete a User' );
            //Courses permissions
            $this->_authManager->createOperation( 'createCourse', 'Create a Course' );
            $this->_authManager->createOperation( 'readCourse', 'Read a course' );
            $this->_authManager->createOperation( 'editCourse', 'Edit a Course' );
            $this->_authManager->createOperation( 'deleteCourse', 'Delete a Course' );
            
            //Guest
            $role = $this->_authManager->createRole( 'reader' );
            $role->addChild( 'readUser' );
            $role->addChild( 'readCourse' );
            
            //Members
            $role = $this->_authManager->createRole( 'members' );
            $role->addChild( 'reader' );
            $role->addChild( 'createCourse' );
            $role->addChild( 'editCourse' );
            $role->addChild( 'deleteCourse' );
            
            //Administrators
            $role = $this->_authManager->createRole( 'administrator' );
            $role->addChild( 'members' );
            $role->addChild( 'createUser' );
            $role->addChild( 'editUser' );
            $role->addChild( 'deleteUser' );
            
            echo "Authorization hierarchy successfully generated";
        }
    }
}

?>
