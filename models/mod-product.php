<?php

class product
{
	private $conn;
	public $r = array();

	function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function listProduct($userid)
	{
		$data = "SELECT * FROM produk WHERE user_id='$userid'";
		$result = mysqli_query($this->conn, $data);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}
}
