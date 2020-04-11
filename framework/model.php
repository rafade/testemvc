<?php

class Table {

	function __construct($pdo, $table) {
		$this->pdo=$pdo;
		$this->table=$table;
	}

	function getAll () {
		if(!preg_match('/^[a-z][-a-z0-9]*$/', $this->table)){
			die('Ops..');
		}
		try {
			$data = $this->pdo->query("Select * from {$this->table}");
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $data->fetchAll(PDO::FETCH_ASSOC);

	}

	function getOne ($id) {
		if (!preg_match('/^[a-z][-a-z0-9]*$/', $this->table)) {
			die('Ops..');
		}
		if (isset($id) && !empty($id)) {
			try {
				$data = $this->pdo->prepare("Select * from {$this->table} where id = ?");
				$data->execute(array($id));
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			$data = $data->fetchAll(PDO::FETCH_ASSOC);
			if (!empty($data)) {
				return array_pop($data);
			}
		}
		return array();
	}

	function save ($data) {
		if(!preg_match('/^[a-z][-a-z0-9]*$/', $this->table)){
			die('Ops..');
		}
		$query = "";
		if (isset($data["id"]) && !empty($data["id"])) {
			$query = "UPDATE {$this->table} SET ";
			foreach ($data as $key => $value) {
				if ($key != 'id') {
					$query .= "{$key} = '{$value}',";
				}
			}
			$query = substr($query, 0, -1);
			$query .= " WHERE id = ". $data["id"];
		} else {
			unset($data["id"]);
			$query = "INSERT INTO {$this->table} ";
			$insert_campos = "";
			$insert_valores = "";
			foreach ($data as $key => $value) {
				$insert_campos .= "{$key},";
				$insert_valores .= "'{$value}',";
			}
			$insert_campos = substr($insert_campos, 0, -1);
			$insert_valores = substr($insert_valores, 0, -1);
			$query .= " ({$insert_campos}) VALUES ({$insert_valores})";
		}

		$resultado_save = '';
		try {
			$this->pdo->query($query);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $query;
	}

	function delete ($id) {
		if(!preg_match('/^[a-z][-a-z0-9]*$/', $this->table)){
			die('Ops..');
		}
		if (isset($id)) {
			$this->pdo->query("DELETE FROM {$this->table} WHERE id={$id}");
		}
	}
}
?>
