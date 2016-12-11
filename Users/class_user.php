<?php

require_once("../database/dbconfig.php");

class USER
{
    private $conn;

    public function __construct()
    {
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
 	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	public function register($first_name,$last_name,$user_email,$user_pass,$user_type,$bday,$gender,$contno)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO users(fname,lname,umail,upass, utype, bday, gender, contno)
		                                               VALUES(:FN, :LN, :UE, :UP, :UT, :BD, :GD, :CN)");
			$stmt->bindparam(":FN", $first_name);
			$stmt->bindparam(":LN", $last_name);
			$stmt->bindparam(":UE", $user_email);
			$stmt->bindparam(":UP", $user_pass);
			$stmt->bindparam(":UT", $user_type);
			$stmt->bindparam(":BD", $bday);
			$stmt->bindparam(":GD", $gender);
			$stmt->bindparam(":CN", $contno);

			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

   public function redirect($url)
   {
       header("Location: $url");
   }

   public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>
