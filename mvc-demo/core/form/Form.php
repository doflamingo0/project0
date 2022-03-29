<?php
namespace app\core\form;
use app\core\form\Field;
require_once "./../core/form/Field.php";
class Form {

	public static function begin($action, $method) {

		echo "<form action=\"$action\" method=\"$method\">";
		return new Form();
	}


	public static function end() {

		echo '</form>';
	}


	public function field($model, $attribute) {

		return new Field($model, $attribute);
	}
}

?>