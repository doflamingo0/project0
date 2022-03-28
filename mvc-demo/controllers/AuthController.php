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

		$registerModel = new RegisterModel();
		if ($request->isPost()) {
			$registerModel->loadData($request->getBody());

			var_dump($registerModel);
			exit;
			if ($registerModel->validate() && $registerModel->register()) {
				return 'Success';
			}
			return $this->render('register', [
				'model' => $registerModel
			]);
		}
		$this->setLayout('auth');
		return $this->render('register', [
				'model' => $registerModel
			]);
	}
}
?>