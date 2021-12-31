<?php

class Products
{
	public $conn;

	function __construct()
	{
		$this->conn = new mysqli('localhost', 'root', '', 'myadmin');
		if ($this->conn->connect_error) {
			die("Connection failed: . $this->conn->connect_error");
		}
	}
	function category()
	{
		$sql_category = "SELECT category_id, category_name FROM categories";
		return $this->conn->query($sql_category);
	}

	function detail_products($get_id)
	{
		$sql = "SELECT * FROM products where product_id =" . $get_id;
		return $this->conn->query($sql);
	}

	function add_products($post)
	{
		$errors = [];
		$product_name = $post['product_name'];
		$quantily = $post['quantily'];
		$price = $post['price'];
		$category = $post['category'];
		$date_created = $post['date_created'];
		$description = $post['description'];
		if (strlen($product_name) < 5) {
			$errors['product_name'] = 1;
		}
		if ($quantily < 1) {
			$errors['quantily'] = 1;
		}
		if ($price < 1) {
			$errors['price'] = 1;
		}
		if ($category == '') {
			$errors['category'] = 1;
		}

		if (strlen($date_created) < 6) {
			$errors['date_created'] = 1;
		}
		if (strlen($description) < 20) {
			$errors['description'] = 1;
		}
		if ($errors === []) {
			$sql = "INSERT INTO products (product_name, quantily, price, date_created, categories, description) VALUES ('" . $product_name . "', '" . $quantily . "', '" . $price . "','" . $date_created . "','" . $category . "','" . $description . "')";
			if ($this->conn->query($sql) === TRUE) {
				return ['suceed' => 1, 'data' => $post];
			} else {
				return ['connect_err' => 1];
			}
		} else {
			return ['error' => $errors, 'data' => $post];
		}
	}

	function edit_products($post, $get_id)
	{
		$errors = [];
		$product_name = $post['product_name'];
		$quantily = $post['quantily'];
		$price = $post['price'];
		$category = $post['category'];
		$date_created = $post['date_created'];
		$description = $post['description'];
		if (strlen($product_name) < 5) {
			$errors['product_name'] = 1;
		}
		if ($quantily < 1) {
			$errors['quantily'] = 1;
		}
		if ($price < 1) {
			$errors['price'] = 1;
		}
		if ($category == '') {
			$errors['category'] = 1;
		}

		if (strlen($date_created) < 6) {
			$errors['date_created'] = 1;
		}
		if (strlen($description) < 20) {
			$errors['description'] = 1;
		}
		if ($errors == []) {
			$sql_update = "UPDATE products SET product_name = '" . $product_name . "', quantily = '" . $quantily . "', price = '" . $price . "', date_created = '" . $date_created . "', categories = '" . $category . "', description = '" . $description . "' where product_id =" . $get_id;
			if ($this->conn->query($sql_update) === TRUE) {
				return ['success' => 1,'data' => $post];
			} else {
				return ['connect_err'];
			}
		}else{
			return ['error' => $errors,'data' => $post];
		}
	}

	function del_products($get_id)
	{
		$sql_del = "DELETE FROM products WHERE product_id=" . $get_id;
		return $this->conn->query($sql_del);
	}

	function list_products()
	{
		$sql = "SELECT * FROM products";
		return $this->conn->query($sql);
	}
}
