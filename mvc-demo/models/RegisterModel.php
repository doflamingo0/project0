<?php
namespace app\models;
use app\core\Model;
include_once './../core/Model.php';

class RegisterModel extends Model {

	public $fname;
	public $lname;
	public $email;
	public $password;
	public $confirm;


	public function register() {

		echo "creating new user";
	}

	public function rules() {

		return [
			'fname' => [self::RULE_REQUIRED],
			'lname' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>8],[self::RULE_MAX, 'max'=> 24]],
			'confirm' => [self::RULE_REQUIRED,[ self::RULE_MATCH, 'match' => 'password']]
		];
	}
}
?>