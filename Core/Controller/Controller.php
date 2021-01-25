<?php


namespace Core\Controller;


use App;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;

class Controller
{
    protected $viewPath;
    protected $template = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . '/App/Views/';

        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlentities($value);
        }
    }

    protected function loadModel($model_name)
    {
        $this->$model_name = \App::getInstance()->getModel($model_name);
    }

    protected function render($view, $variables = [])
    {
        ob_start();
        extract($variables);
        include($this->viewPath . $view . '.php');
        $content = ob_get_clean();
        include($this->viewPath . 'Templates/' . $this->template . '.php');
    }

    protected function redirect($location)
    {
        header('location: ' . App::$path . $location);
    }
}