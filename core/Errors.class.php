<?php
class Errors
{
    public function index($theme)
    {
        $this->view($theme);
    }

    /**
     * view
     *
     * @param  mixed $name
     * @param  mixed $data
     * @return void
     */
    public function view($name)
    {
        $filename = "../errors/$name.php";
        if (file_exists($filename)) {
            require $filename;
        } else
            die("Unable to find file: $name in errors directory!");
    }
}
