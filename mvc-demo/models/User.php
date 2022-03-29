<?php
namespace app\models;
use app\core\DbModel;
include_once './../core/DbModel.php';

class User extends DbModel {

	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;
	const STATUS_DELETED = 2;

	public $fname;
	public $lname;
	public $email;
	public $status;
	public $password;
	public $confirmPassword;

	public function tableName() {

		return 'users';
	}

	public function save() {

		$this->status = self::STATUS_INACTIVE;
		$this->password = password_hash($this->password, PASSWORD_DEFAULT);
		return parent::save();
	}

	public function rules() {

		return [
			'fname' => [self::RULE_REQUIRED],
			'lname' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
				self::RULE_UNIQUE, 'class' => self::class
				]],
			'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>8], [self::RULE_MAX, 'max'=> 24]],
			'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
		];
	}


	public function attributes() {

		return ['fname', 'lname', 'email', 'password', 'status'];
	}
}
?>