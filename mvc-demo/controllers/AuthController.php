<?php
namespace app\controllers;

use app\core\Controller;
use app\models\User;
use app\core\Application;
require_once "./../core/Controller.php";
require_once './../core/Controller.php';
require_once './../models/User.php';

class AuthController extends Controller {

	public function login() {

		$this->setLayout('auth');
		return $this->render('login');
	}


	public function register($request) {

		$user = new User();
		if ($request->isPost()) {
			$user->loadData($request->getBody());

			if ($user->validate() && $user->save()) {
				Application::$APP->response->redirect('/');
			}

			return $this->render('register', [
				'model' => $user
			]);
		}
		$this->setLayout('auth');
		return $this->render('register', [
				'model' => $user
			]);
	}
}
?>