<?php
namespace app\core;
use app\core\Application;

class Controller {

	public $layout = 'main';


	public function render($view, $params = []) {

		return Application::$APP->router->renderView($view, $params);
	}


	public function setLayout($layout) {

		$this->layout = $layout;
	}
}
?>