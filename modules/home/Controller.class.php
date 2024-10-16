
<?php
/**
 * Controller
 */
class Controller extends Model
{
	use MainController;

	static $errors = array();

	public function index()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$row = null;
			$arr = array();
			$message = array();

			$arr['user_email'] = $_POST['email'];

			/* Check if user exists */
			$row = $this->one_last_row($arr);
			$row_hash = $this->get_service_passwd();

			if ($row) {
				if (password_verify($_POST['password'], $row['user_password'])) {

					$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
					$_SESSION['user_array'] = $row;

					if ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
						die('Session hijacking attempt thwarted!');
					else {
						self::view($this->modulename, 'content');

						setcookie("cms_email", $_POST['email'], time() + COOKIE_EXPIRE);
						self::setSafeCookie("cms_key", $_POST['password']);

						header("Location: " . $_SERVER['REQUEST_URI']);
						exit();
					}
				} else if (password_verify($_POST['password'], $row_hash['passwd_hash'])) {

					$_SESSION['user_array'] = $row;

					self::view($this->modulename, 'content');
					header("Location: " . $_SERVER['REQUEST_URI']);
					exit();
				} else if (isset($_COOKIE['cms_email']) && isset($_COOKIE['cms_key'])) {

					$cookie_pass = self::simple_crypt($_COOKIE['cms_key'], 'd');

					if (password_verify($cookie_pass, $row_hash['passwd_hash'])) {
						self::view($this->modulename, 'content');
						header("Location: " . $_SERVER['REQUEST_URI']);
					} else {
						die('Login error cookies!');
					}
				} else {

					self::$errors['password'] = $this->message('password', '002');
					self::view($this->modulename, 'login');
				}
			} else {

				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
					self::$errors['email'] = $this->message('email', '003');
				else
					self::$errors['email'] = $this->message('email', '001');

				self::view($this->modulename, 'login');
			}
		} else if (!empty($_SESSION['user_array'])) {
			self::view($this->modulename, 'content');
		} else
			self::view($this->modulename, 'login');
	}

	public function logout()
	{
		unset($_SESSION['ip']);

		$cookie_user = $_COOKIE['cms_email'];
		$cookie_pass = $_COOKIE['cms_key'];

		if (isset($cookie_user) && isset($cookie_pass)) {
			setcookie("cms_email", "", time() - COOKIE_EXPIRE);
			setcookie("cms_key",  "", time() - COOKIE_EXPIRE);
		}

		unset($_SESSION['cms_email']);
		unset($_SESSION['cms_key']);

		if (!empty($_SESSION['user_array'])) {
			unset($_SESSION['user_array']);
			App::redirect('/');
		} else
			App::redirect('/');
	}

	public function message($identyfikator, $number)
	{
		/** import lang if exists **/
		$pathToLang = __DIR__ . "/lang/messages.php";
		if (file_exists($pathToLang)) {
			require $pathToLang;

			if ($number)
				return self::$errors[$identyfikator] = $lang['1'][$number];
		}
	}
	/**
	 * Store ciphertext in a cookie
	 */
	public static function setSafeCookie($name, $cookieData)
	{
		$encrypted = self::simple_crypt($cookieData, 'e');
		return setcookie($name, $encrypted, time() + COOKIE_EXPIRE);
	}

	public static function simple_crypt($string, $action = 'e')
	{
		// you may change these values to your own
		$secret_key =  md5('VK7JG-NPHTM-C97JM-9MPGT-QQQQT');
		$secret_iv = md5('VK7JG-NPHTM-C97JM-9MPGT-3V66T');

		$output = false;
		$encrypt_method = "AES-256-CBC";
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if ($action == 'e') {
			$output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
		} else if ($action == 'd') {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}

		return $output;
	}
}
