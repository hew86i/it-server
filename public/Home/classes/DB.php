<?php

class DB {
	private static $_instance = null;
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_count = 0;

	private function __construct() {
		try {
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
			//$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
			//echo " Connected";
			//array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function query($sql, $params = array()) {
		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)) {
			$x=1;
			if(count($params)) {
				foreach ($params as $param ) {					
					$this->_query->bindValue($x, $param);
					$x++;													
				}
			}			
			if($this->_query->execute()) {
				//echo "executed corectry </hr>";
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);				
				$this->_count = $this->_query->rowCount();
			} else {
				$this->_error = true;
				//echo "error with execute()";
			}
		}
		return $this;
	}

	// ZA DOBIVANJE NA ASOCIJATIVNI REZULTATI KAKO NIZA
	public function AssQuery($sql, $params = array()) {
		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)) {
			$x=1;
			if(count($params)) {
				foreach ($params as $param ) {					
					$this->_query->bindValue($x, $param);
					$x++;													
				}
			}			
			if($this->_query->execute()) {
				//echo "executed corectry </hr>";
				$this->_results = $this->_query->fetchAll(PDO::FETCH_ASSOC);				
				$this->_count = $this->_query->rowCount();
			} else {
				$this->_error = true;
				//echo "error with execute()";
			}
		}
		return $this;
	}		

	public function action($action, $table, $where = array()) {
		if(count($where) === 3) {
			$operators = array('=','>','<','>=','<=');

			$field = $where[0];
			$operator = $where[1];
			$value = $where[2];

			if(in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				
				if(!$this->query($sql, array($value))->error()) {

					return $this;
				}
			}
		}
		return false;
	}

	public function get($table, $where) {

		return $this->action('SELECT *', $table, $where);
	}

	public function delete($table, $where) {
		return $this->action('DELETE', $table, $where);
	}

	// ne raboti bindValue koga se koristi query za insert()
	public function insert($table, $fields = array()) {
			if(count($fields)) {
				$keys = array_keys($fields);
				$values = '';
				$x = 1;

				foreach ($fields as $field) {
					$values .= '?';
					if($x < count($fields)) {
						$values .= ', ';
					}
					$x++;
				}
				//die($values);
				$sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

				//echo "</hr><p> $sql</p>";
				//die($sql);

				if(!$this->query($sql, $fields)->error()) {
					//echo "  INSERTED!  ";
					return true;
					
				}

			}
			return false;			

	}
	// ne raboti bindValue koga se koristi query za update()
	public function update($table, $id,  $fields = array()) {
		$set = '';
		$x = 1;

		foreach ($fields as $name => $value) {
			$set .="{$name} = ?";
			if($x < count($fields)) {
				$set .=', ';
			}
			$x++;
		}

		//die($set);

		
		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
		//die($sql);
		if(!$this->query($sql, $fields)->error()) {
				return true;
			}
		return false;
	}

	public function results() {
		return $this->_results;
	}

	public function first() {
		return $this->results()[0];
	}

	public function error() {
		return $this->_error;
	}

	public function count() {
		return $this->_count;
	}

}


?>