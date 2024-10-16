<?php

/**
 * Main Controller trait
 */
trait MainController
{
	static $template;
	static $template_string = "";
	static $template_prefix    = "{";
	static $template_suffix    = "}";
	static $template_include;
	static $public_array = array();
	
	public static function load_file()
	{
		self::$template_string = file_get_contents(self::$template);
	}

	public static function set_public($name, $value)
	{
		self::$public_array[$name] = $value;
	}

	public static function replace_publics()
	{
		foreach (self::$public_array as $assoc => $value) {
			$public_name = self::$template_prefix . $assoc . self::$template_suffix;
			self::$template_string = str_replace($public_name, $value, self::$template_string);
		}
	}

	public static function parse()
	{
		self::load_file();
		self::replace_publics();
		return self::$template_string;
	}

	public static function set_template($filename)
	{
		self::$template = $filename;
	}

	/**
	 * view
	 *
	 * @param  mixed $name
	 * @param  mixed $data
	 * @return void
	 */
	public static function view($modulename, $name)
	{
		$page_layout_filename = $_SERVER["DOCUMENT_ROOT"] . "/page_layout.php";
		$filename = "../modules/$modulename/views/$name.tpl.php";
		if (file_exists($filename)) {

			/* Template system -> will be build in fucture */
			//self::set_template($file);
			//self::set_public('CONTENT', $var);
			//self::parse();
			
			if (basename($filename) != 'login.tpl.php')
				include $page_layout_filename;
			else
				include $filename;
		} else {
			$filename = "../errors/no_view.php";
			include $filename;
		}
	}
}
