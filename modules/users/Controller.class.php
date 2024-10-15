<?php
class Controller extends Model
{
	public function index()
	{
		echo 'Lista userów <br/>';

		$results = $this->findAll();
		foreach ($results as $row) {
			
			$first_name = $row['user_first_name'];
			$last_name = $row['user_last_name'];

			echo $first_name.' '.$last_name.'<br />';
		};
	}

	public function grid()
	{
		echo 'Lista<br/>';

		$results = $this->findAll();
		foreach ($results as $row) {
			
			$symbol = $row['user_symbol'];
			
			echo $symbol.'<br />';
		};
	}

	public function edit($value)
	{
		echo 'Id:' . $value;
	}
}
