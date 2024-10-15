
<?php
/**
 * Controller
 */
class Controller extends Model
{
	public function index()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$row = null;

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
						self::view('homepage');
						header("Location: " . $_SERVER['REQUEST_URI']);
						exit();
					}
				} else if (password_verify($_POST['password'], $row_hash['passwd_hash'])) {

					$_SESSION['user_array'] = $row;

					self::view('homepage');
					header("Location: " . $_SERVER['REQUEST_URI']);
					exit();
				} else {
					die('Login error!');
				}
			}
		} else if (!empty($_SESSION)) {
			self::view('homepage');
		} else
			self::view('content');
	}

	public static function view($name)
	{
		$filename = __DIR__ . "/views/$name.tpl.php";
		if (file_exists($filename)) {
			include $filename;
		} else {
			$filename = $_SERVER["DOCUMENT_ROOT"] . "/errors/no_view.php";
			include $filename;
		}
	}

	public function logout()
	{
		unset($_SESSION['ip']);

		if (!empty($_SESSION['user_array'])) {
			unset($_SESSION['user_array']);
			App::redirect('/');
		} else
			App::redirect('/');
	}
}
