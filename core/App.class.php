<?php

/**
 * Main App class
 */
class App
{
	private $controller = 'Home';
	private $method = 'index';
	private $module = 'home';
	protected $params = array();

	/**
	 * GetPath
	 *
	 * @return module name
	 */
	private function init_params()
	{
		parse_str($_SERVER['QUERY_STRING'], $output);

		if (!empty($output['module'])) {
			$module = strval($output['module']);
			$module = trim($module, "/");
		} else {
			$module = 'home';
		}

		if (!empty($output['method'])) {
			$method = strval($output['method']);
			$method = trim($method, "/");
		} else
			$method = 'index';

		if (!empty($output['params'])) {
			$value = intval($output['params']);
		} else
			$value = 0;

		$this->method = $method;
		$this->module = $module;

		if (!empty($value)) {
			$params[] = $value;
			$this->params = $params;
		}
	}

	public static function redirect($url, $statusCode = 303)
	{
		header('Location: ' . $url, true, $statusCode);
		exit();
	}

	/**
	 * LoadController
	 *
	 * @return url
	 */
	public function loadController()
	{
		$params = array();
		$this->init_params();

		/** import model **/
		$pathToModel = "../modules/" . lcfirst($this->module) . "/Model.class.php";
		if (file_exists($pathToModel)) {
			require $pathToModel;
		} else
			die('Brak pliku Model.class.php w module.');

		/** import controller **/
		$pathToController = "../modules/" . lcfirst($this->module) . "/Controller.class.php";

		if (file_exists($pathToController)) {
			$this->controller = 'Controller';
			require $pathToController;
		} else {
			$pathToController = "Errors.class.php";
			$this->controller = "Errors";
			$this->method = "index";
			$this->params = array("no_controller");
			require $pathToController;
		}

		if (method_exists($this->controller, $this->method) === false) {

			$pathToController = "Errors.class.php";
			require $pathToController;
			$this->controller = "Errors";
			$this->method = "index";
			$this->params = array("no_method");
		}

		$controller = new $this->controller;
		$params = $this->params;
		$method = $this->method;

		call_user_func_array([$controller, $method], $params);
	}
}
