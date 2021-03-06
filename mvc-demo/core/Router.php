<?php
namespace app\core;

class Router {

	public $request;
	public $response;
	protected $routes = [];

	public function __construct($request, $response) {

		$this->request = $request;
		$this->response = $response;
	}


	public function get($path, $callback) {

		$this->route['get'][$path] = $callback;
	}

	public function post($path, $callback) {

		$this->route['post'][$path] = $callback;
	}

	
	public function resolve() {

		$path = $this->request->getPath();
		$method = $this->request->method();
		$callback = $this->route[$method][$path] ?? false;

		if (!$callback) {
			$this->response->setStatusCode(404);
			return $this->renderView('_404');
		}
		if (is_string($callback)) {
			return $this->renderView($callback);
		}

		if (is_array($callback)) {
			Application::$APP->controller = new $callback[0]();
			$callback[0] = Application::$APP->controller;
		}

		return call_user_func($callback, $this->request);
	}


	public function renderView($view, $params = []) {

		$layoutContent = $this->layoutContent();
		$viewContent = $this->renderOnlyView($view, $params);
		return str_replace('{{content}}', $viewContent, $layoutContent);
	}


	public function renderContent($viewContent) {

		$layoutContent = $this->layoutContent();
		return str_replace('{{content}}', $viewContent, $layoutContent);
	}


	protected function layoutContent() {

		$layout = Application::$APP->controller->layout;
		ob_start();
		include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
		return ob_get_clean();
	}


	protected function renderOnlyView($view, $params) {

		foreach ($params as $key => $value){
			$$key = $value;
		}
		ob_start();
		include_once Application::$ROOT_DIR."/views/$view.php";
		return ob_get_clean();
	}
}
?>