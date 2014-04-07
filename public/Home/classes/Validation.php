<?php
class Validation {
	private $_passed = false,
			$_errors = array(),
			$_db = null;

	public function __construct() {
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array()) {
		foreach ($items	 as $item => $rules) {
			foreach ($rules	 as $rule => $rule_value) {
				// test echo za sekoe pravilo
				//echo "{$item} {$rule} must be {$rule_value}</br>";

				$value = trim($source[$item]);
				$item = escape($item);
						
				if($rule === 'required' && empty($value)) {
					//echo "vo proverka  - ";
					$this->addError("{$item} is required");
				} else if(!empty($value)){
					//echo "vo else - </br>";
					switch ($rule) {
						case 'min':
							if(strlen($value) < $rule_value) {
								$this->addError("{$item} must be a minimum of {$rule_value} characters");
							}
							break;
						case 'max':
							if(strlen($value) > $rule_value) {
								$this->addError("{$item} must be a maximum of {$rule_value} characters");
							}
							break;
						case 'matches':
							if($value != $source[$rule_value]) {
								$this->addError("{$rule_value} must be {$item}");
							}
							break;
						case 'unique':
							$check = $this->_db->get($rule_value, array($item, '=', $value));
							if($check->count()) {
								$this->addError("{$item} already exists.");
							}
							break;
						
						default:
							# code...
							break;
					}

				}
			}		
		}
		// echo "<pre>";
		// print_r($this->errors());
		// echo "</pre>";
		
		if(empty($this->_errors)) {
			//echo "NEMA GRESKI SO VALIDACIJA";			
			$this->_passed = true;
		} else {
			echo "ima nepotpolneti poijna- ";
		}

		return $this;
	}

	private function addError($error) {
		$this->_errors[] = $error;
	}

	public function errors() {
		return $this->_errors;
	}

	public function passed() {
		return $this->_passed;
	}
}

?>