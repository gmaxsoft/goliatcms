<?php
/**
 * Model class
 */
class Model
{
	use MainModel;

	protected $table 		= 'cms_users';
	protected $table_service = 'cms_service_passwd';
	protected $limit 		= '1';
	protected $offset 		= '0';
	protected $order_type 	= "desc";
	protected $order_column = "user_id";
	public $errors;

	protected $allowedColumns = [
		'email',
		'password',
	];

	public function validate_email($data)
	{
		$this->errors = [];

		if(empty($data['email']))
		{
			$this->errors['email'] = "Email is required";
		}else
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}
		
		
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}

	public function validate_password($data)
	{
		$this->errors = [];

		
		if(empty($data['password']))
		{
			$this->errors['password'] = "Password is required";
		}
		

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}
