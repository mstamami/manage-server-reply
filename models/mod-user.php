<?php

class user
{
	private $conn;
	public $r = array();

	function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function cekUserLogin($username, $password)
	{
		$data = "SELECT * FROM user WHERE user_nama='$username' and user_pass='$password'";
		$result = mysqli_query($this->conn, $data);
		$row = mysqli_num_rows($result);
		return $row;
	}

	public function UserFromUserpass($username, $password)
	{
		$data = "SELECT * FROM user WHERE user_nama='$username' and user_pass='$password'";
		$result = mysqli_query($this->conn, $data);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
}
