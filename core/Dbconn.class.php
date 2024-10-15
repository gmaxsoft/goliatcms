<?php

trait DB
{
	static $inst = null;
	protected $db = null;
	protected $connectionsSettings = array();
	public $prefix;

	public function __construct()
	{
		$host = DB_HOST;
		$username = DB_USERNAME;
		$password = DB_PASSWORD;
		$db = DB_NAME;
		$port = DB_PORT;
		$charset = DB_CHARSET;
		$socket = DB_SOCKET;
		$this->prefix = DB_PREFIX;

		// Settings connection params
		$this->addConnection(array(
			'host' => $host,
			'username' => $username,
			'password' => $password,
			'db' => $db,
			'port' => $port,
			'socket' => $socket,
			'charset' => $charset
		));

		$this->connect();
	}

	/**
	 * Create & store at $db new mysqli instance
	 */
	public function addConnection(array $params)
	{
		$this->connectionsSettings = array();
		foreach (array('host', 'username', 'password', 'db', 'port', 'socket', 'charset') as $k) {
			$prm = isset($params[$k]) ? $params[$k] : null;

			if (!is_string($prm))
				$prm = null;

			$this->connectionsSettings[$k] = $prm;
		}
		return $this;
	}

	/**
	 * A method to connect to the database
	 */
	public function connect()
	{
		mb_internal_encoding('UTF-8');
		mb_regex_encoding('UTF-8');
		mysqli_report(MYSQLI_REPORT_STRICT);

		if (!isset($this->connectionsSettings))
			throw new Exception('Connection profile not set');

		$pro = $this->connectionsSettings;
		$params = array_values($pro);
		$charset = array_pop($params);

		if (empty($pro['host']) && empty($pro['socket'])) {
			throw new Exception('MySQLI host or socket is not set');
		}

		try {
			//$this->db = new mysqli($params[0] . ':' . $params[4], $params[1], $params[2], $params[3]);
			$this->db = new mysqli($params[0], $params[1], $params[2], $params[3]);

			if (!empty($charset)) {
				$this->db->set_charset($charset);
			}
		} catch (Exception $e) {
			print_r($e);
		}
	}

	/**
	 * A method to disconnect from the database
	 * @params string $connection connection name to disconnect
	 */
	public function disconnect()
	{
		if (!isset($this->db))
			return;

		$this->db->close();
		unset($this->db);
	}

	public function log_db_errors($error, $query)
	{
		$message =  '<p>Error at ' . date('Y-m-d H:i:s') . ':</p>';
		$message .= '<p>Query: ' . htmlentities($query) . '<br />';
		$message .= 'Error: ' . $error;
		$message .= '</p>';

		trigger_error($message);

		if (defined('DISPLAY_DEBUG')) {
			echo $message;
		}
	}

	/**
	 * Singleton function
	 *
	 * Example usage:
	 * $db = DBConnection::getInstance();
	 *
	 * @access private
	 * @return self
	 */
	static function getInstance()
	{
		if (self::$inst == null) {
			self::$inst = new DB();
		}
		return self::$inst;
	}
}
