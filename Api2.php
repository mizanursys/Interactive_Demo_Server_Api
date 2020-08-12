<?php
    
//Api.php

class API
{

	//$con = mysqli_connect('localhost','root','','tmss') or die('Unable to Connect');
	
   	private  $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=interactive", "root", "");
		
		//$db= mysql_connect("mysql:host=localhost;dbname=tmss", "root", "");
	}

	function fetch_horoscope_list()
	{
		$query = "SELECT * FROM horoscope_list ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data['horoscope'][] = $row;
			}
			return $data;
		}
	}

	function fetch_horoscope()
	{
		$query = "SELECT * FROM horoscope ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}



	function fetch_password()
	{
	
		    $data['data']['password']="123456";
			return $data;
		
	}
	





function fetch_alla()
	{
		$query = "SELECT * FROM g_post ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data['data']['posts'][] = $row;
			
			    
			}
			return $data;
		
		}
	}

function fetch_compony()
	{
		$query = "SELECT * FROM company ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data['data']['company'][] = $row;
			
			    
			}
			return $data;
		
		}
	}
	function user_profile()
	{
		$query = "SELECT * FROM user ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data['data']['company'][] = $row;
			
			    
			}
			return $data;
		
		}
	}
	function insert()
	{
		if(isset($_POST["user_name"]))
		{
		
			$form_data  = array(
				':user_name'			=>	$_POST["user_name"],
				':user_phone'			=>	$_POST["user_phone"],
				':user_email'			=>	$_POST["user_email"],
				':user_password'		=>	$_POST["user_password"]
			);
			$query = "
			INSERT INTO user 
			(user_name,user_phone,user_email,user_password) VALUES 
			(:user_name, :user_phone, :user_email, :user_password)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		return $data;
	}


	function reg()
	{
		if(isset($_POST["user_name"]))
		{
			$form_data  = array(
				':user_name'	 =>	$_POST["user_name"],
				':phone'		 =>	$_POST["phone"],
				':email'		 =>	$_POST["email"],
				':gender'	     =>	$_POST["gender"],
				':age'		 	 =>	$_POST["age"],
				':api_token'	 =>	$_POST["api_token"],
				':u_password'      => $_POST["u_password"]
			);
			$query = "
			INSERT INTO g_user 
			(user_name,email,phone,gender,age,api_token,u_password) VALUES 
			(:user_name, :email, :phone, :gender, :age, :api_token, :u_password)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0' , ":user_name"
				);
			}
		}
		return $data;
	}
	function post()
	{

		$DefaultId = 0;
		$key = md5(microtime().rand());

		//$ImagePath = "192.168.0.108/Gottallent/book/images/$key.jpg";

		$ImagePath = "images/$key.jpg";
		
		//$ServerURL = "data/$ImagePath";
		
		$ServerURL = "$ImagePath";

		if(isset($_POST["u_api_token"]))
		{
			$form_data  = array(
				':u_api_token'	 =>	$_POST["u_api_token"],
				':post'	 		 =>	$_POST["post"],
				':likes'	     =>	$_POST["likes"],
				':image'		 => $ServerURL
				//':password'      => $_POST["password"]
				
			);
			$query = "
			INSERT INTO post 
			(u_api_token,post,likes,image) VALUES 
			(:u_api_token, :post, :likes, :image)
			";
			$statement = $this->connect->prepare($query);


			if($statement->execute($form_data))
			{
				
				file_put_contents($ImagePath,base64_decode(':image'));
				
				$data[] = array(
					'success'	=>	'1'
					
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		return $data;
	}
	
	
	
	function update()
	{
		if(isset($_POST["u_id"]))
		{
			$form_data = array(
				':u_name'		=>	$_POST["u_name"],
				':u_mobile'		=>	$_POST["u_mobile"],
				':u_email'		=>	$_POST["u_email"],
				':u_password'	=>	$_POST["u_password"],
				':c_name'		=>	$_POST["c_name"],
				':u_id'		    =>	$_POST["u_id"],
				':lat'			=>	$_POST["lat"],
				':lon'			=>	$_POST["lon"]
			);
			$query = "
			UPDATE user 
			SET u_name = :u_name, u_mobile = :u_mobile, u_email = :u_email,
                u_password = :u_password, c_name = :c_name, u_id = :u_id, lat = :lat, lon = :lon	
			WHERE u_id = :u_id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
	
		return $data;
	}

	function insert_company()
	{
		if(isset($_POST["c_name"]))
		{
			$form_data  = array(
				':c_name'	=>	$_POST["c_name"]
			);
			$query = "
			INSERT INTO company 
			(c_name) VALUES 
			(:c_name)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		return $data;
	}


	function fetch_single($api_token)
	{
		$query = "SELECT * FROM user WHERE api_token='".$api_token."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
 		

        while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data['data']['posts'][] = $row;
			
			}
			return $data;


	}

	
	function single_user($id)
	{
		$query = "SELECT * FROM user WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
 		

        while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data['data']['posts'][] = $row;
			
			}
			return $data;


	}
	
	function fetch_single_user($id)
	{
		//$query = "SELECT * FROM user WHERE u_id='".$u_id."' ORDER BY id DESC LIMIT 1";
		$query = "SELECT * FROM user WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
 		

        while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data['data']['user'][] = $row;
	
			}
			return $data;


	}
	function fetch_single_post($u_api_token)
	{
		//$query = "SELECT * FROM user WHERE u_id='".$u_id."' ORDER BY id DESC LIMIT 1";
		$query = "SELECT * FROM post WHERE u_api_token='".$u_api_token."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
 		

        while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data['data']['post'][] = $row;
	
			}
			return $data;


	}
	
    function fetch_by_cat($c_name)
	    {
		    //$query = "SELECT * FROM user WHERE c_name='".$c_name."'";
		    $query = "SELECT * FROM user WHERE c_name='".$c_name."' GROUP BY u_id" ;
			
		    $statement = $this->connect->prepare($query);
	    	if($statement->execute())
 		
        while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data['data']['posts'][] = $row;
			
			    
			}
			return $data;
	}

	
	function delete($u_id)
	{
		$query = "DELETE FROM user WHERE u_id = '".$u_id."'";
		$statement = $this->connect->prepare($query);
		
		
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	
	
}
?>