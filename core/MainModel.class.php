<?php

/**
 * Main Model class
 */
trait MainModel
{
	use DB;

	public function query($query, $object = false)
	{
		$row = null;

		$results = $this->db->query($query);
		if ($this->db->error) {
			$this->log_db_errors($this->db->error, $query);
			return false;
		} else {
			$row = array();
			while ($r = (!$object) ? $results->fetch_assoc() : $results->fetch_object()) {
				$row[] = $r;
			}
			return $row;
		}
	}

	public function simple_query($query)
	{
		$row = null;

		$results = $this->db->query($query);
		if ($this->db->error) {
			$this->log_db_errors($this->db->error, $query);
			return false;
		} else {
			return  $results;
		}
	}

	public function lastid()
	{
		return $this->db->insert_id;
	}

	public function findAll()
	{
		$query = "select * from $this->table order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
		return $this->query($query);
	}

	public function escape($data)
	{
		if (!is_array($data)) {
			$data = $this->db->real_escape_string($data);
		} else {
			//Self call function to sanitize array data
			$data = array_map(array($this, 'escape'), $data);
		}
		return $data;
	}

	/**
	 * where
	 *
	 * @param  mixed $data
	 * @param  mixed $data_not
	 * @return void
	 */
	public function where($data, $data_not = [])
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . " && ";
		}

		foreach ($keys_not as $key) {
			$query .= $key . " != :" . $key . " && ";
		}

		$query = trim($query, " && ");

		$query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
		$data = array_merge($data, $data_not);

		//var_dump($data);

		return $this->query($query);
	}


	/**
	 * insert
	 *
	 * @param  mixed $data
	 * @return void
	 */
	public function insert_data($data)
	{
		/** remove unwanted data **/
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {

				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);

		$query = "insert into $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";
		$this->query($query);

		return false;
	}

	/**
	 * update
	 *
	 * @param  mixed $id
	 * @param  mixed $data
	 * @param  mixed $id_column
	 * @return void
	 */
	public function update_data($id, $data, $id_column = 'id')
	{

		/** remove unwanted data **/
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {

				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
		$query = "update $this->table set ";

		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . ", ";
		}

		$query = trim($query, ", ");

		$query .= " where $id_column = :$id_column ";

		$data[$id_column] = $id;

		$this->query($query, $data);
		return false;
	}

	/**
	 * delete
	 *
	 * @param  mixed $id
	 * @param  mixed $id_column
	 * @return void
	 */
	public function delete_data($id, $id_column = 'id')
	{

		$data[$id_column] = $id;
		$query = "delete from $this->table where $id_column = :$id_column ";
		$this->query($query);

		return false;
	}

	/* Additional */

	/**
	 * one last row
	 *
	 * @param  mixed $data
	 * @param  mixed $data_not
	 * @return void
	 */
	public function one_last_row($data)
	{
		$keys = array_keys($data);
		$value = array_values($data);

		$query = "select * from `$this->table` where ";

		foreach ($keys as $key) {
			$query .= "`$key`" . " = '" . $this->escape($value[0]) . "' && ";
		}

		$query = trim($query, " && ");
		$query .= " limit 1 offset 0";

		$result = $this->query($query, $object = false);

		if ($result)
			return $result[0];

		return false;
	}

	public function get_service_passwd()
	{
		$query = "select * from `$this->table_service` where passwd_id = 1";
		$result = $this->query($query, $object = false);

		if ($result) {
			return $result[0];
		}

		return false;
	}
}
