<?php 

/**
 * Modelo productos
 */
class Product
{
	private $pdo;

	public function __construct()
	{
		try {
			$this->pdo = new Conexion;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$strSql = "SELECT * FROM productos";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getTotalStock()
	{
		try {
			$strSql = "SELECT SUM(stock) as stock FROM productos";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getTotalInventario()
	{
		try {
			$strSql = "SELECT SUM(valor_total) as valor FROM productos";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAllCode($code)
	{
		try {
			$strSql = "SELECT * FROM productos WHERE codigo = $code";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function saveProduct($data)
	{
		try {
			$this->pdo->insert('productos' , $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$strSql = "SELECT * FROM productos WHERE id = :id";
			$array = ['id' => $id];
			$query = $this->pdo->select($strSql, $array);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function updateProduct($data)
	{
		try {
			$strWhere = 'id='.$data['id'];
			$this->pdo->update('productos', $data, $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function deleteProduct($id)
	{
		try {
			$strWhere = 'id='.$id;
			$this->pdo->delete('productos', $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}