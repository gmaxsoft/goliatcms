<?php
class Controller extends Model
{
	use MainController;

	public function index()
	{
		/*
		$results = $this->findAll();
		foreach ($results as $row) {
			
			$first_name = $row['user_first_name'];
			$last_name = $row['user_last_name'];

			echo $first_name.' '.$last_name.'<br />';
		};
		*/
		self::view($this->modulename, 'content');
	}
	
	public function edit($value)
	{
		echo 'Id:' . $value;
	}
}
