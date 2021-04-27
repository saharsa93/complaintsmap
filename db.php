<?php


 class connectToDB
 {
	private $conn;
	public function __construct()
	{
		$config = include 'config.php';
		$this->conn = new mysqli( $config['db']['server'], $config['db']['user'], 
		$config['db']['pass'], $config['db']['dbname']);
		// var_dump($config, $this->conn);
	}
	
	function __destruct()
	{
		$this->conn->close();
	}
	public function addCompany($phone, $latitude, $longitude)
	{
		  $statement = $this->conn->prepare("INSERT INTO users(phone, latitude, longitude) VALUES( ?, ?)");
		  $statement->bind_param($latitude, $longitude);
		  $statement->execute();
		  $statement->close();
		  $this->conn->close();
	}
	public function getCompaniesList()
	{
		  $arr = array();
		  $statement = $this->conn->prepare( "SELECT phone, latitude, longitude from users");
		  $statement->bind_result($phone, $latitude, $longitude);
		  $statement->execute();
		  while ($statement->fetch()) {
			$arr[] = ["phone" => $phone, "latitude" => $latitude, "longitude" => $longitude];
		  }
		  $statement->close();
		  
		  return $arr;
	}
	public function updateCompany( $id, $latitude, $longitude)
	{
		  $statement = $this->conn->prepare("UPDATE companies SET latitude = ?,longitude = ? where id = ?");
		  $statement->bind_param( 'sssssi', $latitude, $longitude, $id);
		  $statement->execute();
		  $statement->close();
		  
	}
	public function deleteCompany($id)
	{
		 $statement = $this->conn->prepare("Delete from companies where id = ?");
		 $statement->bind_param('i', $id);
		 $statement->execute();
		 $statement->close();
		 
	}
	
	

 }
 
 $conn = new connectToDB();