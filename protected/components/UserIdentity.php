<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
                $member = Members::model()->findByAttributes( array( 'username' => $this->username ) );
                
		if( $member === null )
                {
                    $this->errorCode = self::ERROR_USERNAME_INVALID;
                }
                else
                {
                    if( $member->pass_hash !== $member->encrypt( $this->password ) )
                    {
                        $this->errorCode = self::ERROR_PASSWORD_INVALID;
                    }
                    else
                    {
                        $this->_id = $member->id;
                        if( null === $member->last_login_time )
                        {
                            $lastLogin = time();
                        }
                        else
                        {
                            $lastLogin = $member->last_login_time;
                            
                            $this->setState( 'lastLoginTime',  $lastLogin );
                            $this->setState( 'name',  $member->name );
                            $this->errorCode = self::ERROR_NONE;
                        }
                    }
                    return !$this->errorCode;
                }
	}
        
        public function getId()
        {
                return $this->_id;
        }
}