<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
		include 'db_connect.php';
		$this->db = $conn;
	}

	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}
	
	function save_category(){
		extract($_POST);
		$data = "name = '$name' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO category_table set ".$data);
		}else{
			$save = $this->db->query("UPDATE category_table set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}

	function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM category_table where id = ".$id);
		if($delete)
			return 1;
	}

	    //----ACTIONS FOR PRODUCT-----
		function save_product(){
			extract($_POST);
			$data = " name = '$name' ";
			$data .= ", sku = '$sku' ";
			$data .= ", category_id = '$category_id' ";
			$data .= ", description = '$description' ";
			$data .= ", price = '$price' ";
	
			if(empty($id)){
				$save = $this->db->query("INSERT INTO product_list set ".$data);
			}else{
				$save = $this->db->query("UPDATE product_list set ".$data." where id=".$id);
			}
			if($save)
				return 1;
		}
	
		function delete_product(){
			extract($_POST);
			$delete = $this->db->query("DELETE FROM product_list where id = ".$id);
			if($delete)
				return 1;
		}
}