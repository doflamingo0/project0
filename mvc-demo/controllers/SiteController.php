<?php
namespace app\controllers;
use app\core\Controller;
require_once './../core/Controller.php';

class SiteController extends Controller {

	public function home() {

		$params = [
			'name' => 'Kien Do'
		];
		return $this->render('home', $params);
	}


	public function contact() {

		return $this->render('contact');
	}


	public function handleContact($request) {

		$body = $request->getBody();

		return 'Handling submitted data';
	}


}
?>