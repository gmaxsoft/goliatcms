<?php

/**
 * Model class
 */
class Model
{
	use MainModel;
	
	protected $table 		= 'cms_users';
	protected $limit 		= '1';
	protected $offset 		= '0';
	protected $order_type 	= "desc";
	protected $order_column = "user_id";
	protected $modulename 	= "users";
	public $errors;
}
