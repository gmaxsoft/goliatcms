<?php

/**
 * Model class
 */
class Model
{
	use MainModel;
	
	protected $table 		= 'cms_users';
	protected $limit 		= '100';
	protected $offset 		= '0';
	protected $order_type 	= "desc";
	protected $order_column = "user_id";

	protected $allowedColumns = [
		'email',
		'password',
	];
}
