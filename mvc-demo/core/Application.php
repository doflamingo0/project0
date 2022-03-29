<?php
namespace app\core;
use app\core\Controller;
require_once './../core/Request.php';
require_once './../core/Router.php';
require_once './../core/Response.php';
require_once './../core/Controller.php';
require_once './../core/Database.php';

class Application {

	public $router;
	public $request;
	public $response;
	public $db;
	public static $ROOT_DIR;
	public static $APP;
	public $controller;

	public function __construct ($rootPath) {

		self::$ROOT_DIR = $rootPath;
		self::$APP = $this;
		$this->db = new Database();
		$this->request = new Request();
		$this->response = new Response();
		$this->router = new Router($this->request, $this->response);
		$this->controller = new Controller();
	}


	public function run() {

		echo $this->router->resolve();
	}

	public function getController() {

		return $this->controller;
	}


	public function setController($controller) {

		$this->controller = $controller;
	}
}
?>