<?php
namespace app\controllers;

use app\core\Controller;
use app\models\RegisterModel;
require_once "./../core/Controller.php";
require_once './../core/Controller.php';
require_once './../models/RegisterModel.php';

class AuthController extends Controller {

	public function login() {

		$this->setLayout('auth');
		return $this->render('login');
	}


	public function register($request) {

		if ($request->isPost()) {
			$registerModel = new RegisterModel();

			var_dump($request->getBody());
			exit;
			return 'Handle submitted data';
		}
		$this->setLayout('auth');
		return $this->render('register');
	}
}
?>