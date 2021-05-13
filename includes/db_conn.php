<?php  

class rms
{
	public $base_url = '';
	public $connect;
	public $query;
	public $statement;
	public $cur;

	function rms()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=rms", "root", "");
		if($this->Set_timezone() != '')
		{
			date_default_timezone_set($this->Set_timezone());
		}

		$temp_cur = $this->Get_currency_symbol();
		if($temp_cur != '')
		{
			$this->cur = $temp_cur;
		}
		session_start();
	}

	function execute($data = null)
	{
		$this->statement = $this->connect->prepare($this->query);
		if($data)
		{
			$this->statement->execute($data);
		}
		else
		{
			$this->statement->execute();
		}		
	}

	function row_count()
	{
		return $this->statement->rowCount();
	}

	function statement_result()
	{
		return $this->statement->fetchAll();
	}

	function get_result()
	{
		return $this->connect->query($this->query, PDO::FETCH_ASSOC);
	}

	function is_login()
	{
		if(isset($_SESSION['user_id']))
		{
			return true;
		}
		return false;
	}

	function is_master_user()
	{
		if(isset($_SESSION['user_type']))
		{
			if($_SESSION["user_type"] == 'Master')
			{
				return true;
			}
			return false;
		}
		return false;
	}

	function is_waiter_user()
	{
		if(isset($_SESSION['user_type']))
		{
			if($_SESSION["user_type"] == 'Waiter')
			{
				return true;
			}
			return false;
		}
		return false;
	}

	function is_cashier_user()
	{
		if(isset($_SESSION['user_type']))
		{
			if($_SESSION["user_type"] == 'Cashier')
			{
				return true;
			}
			return false;
		}
		return false;
	}

	function clean_input($string)
	{
	  	$string = trim($string);
	  	$string = stripslashes($string);
	  	$string = htmlspecialchars($string);
	  	return $string;
	}

	function get_datetime()
	{
		return date("Y-m-d H:i:s",  STRTOTIME(date('h:i:sa')));
	}

	function load_department()
	{
		$this->query = "
		SELECT * FROM department_table 
		ORDER BY department_name ASC
		";
		$result = $this->get_result();
		$output = '';
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["department_name"].'" data-person="'.$row["department_contact_person"].'">'.$row["department_name"].'</option>';
		}
		return $output;
	}

	function Get_profile_image()
	{
		$this->query = "
		SELECT admin_profile FROM admin_table 
		WHERE admin_id = '".$_SESSION["admin_id"]."'
		";

		$result = $this->get_result();

		foreach($result as $row)
		{
			return $row['admin_profile'];
		}
	}

	function Get_total_today_visitor()
	{
		$this->query = "
		SELECT * FROM visitor_table 
		WHERE DATE(visitor_enter_time) = DATE(NOW())
		";

		if(!$this->is_master_user())
		{
			$this->query .= " AND visitor_enter_by ='".$_SESSION["admin_id"]."'";
		}

		$this->execute();
		return $this->row_count();
	}

	function Get_total_yesterday_visitor()
	{
		$this->query = "
		SELECT * FROM visitor_table 
		WHERE DATE(visitor_enter_time) = DATE(NOW()) - INTERVAL 1 DAY
		";
		if(!$this->is_master_user())
		{
			$this->query .= " AND visitor_enter_by ='".$_SESSION["admin_id"]."'";
		}
		$this->execute();
		return $this->row_count();
	}

	function Get_last_seven_day_total_visitor()
	{
		$this->query = "
		SELECT * FROM visitor_table 
		WHERE DATE(visitor_enter_time) >= DATE(NOW()) - INTERVAL 7 DAY
		";
		if(!$this->is_master_user())
		{
			$this->query .= " AND visitor_enter_by ='".$_SESSION["admin_id"]."'";
		}
		$this->execute();
		return $this->row_count();
	}

	function Get_total_visitor()
	{
		$this->query = "
		SELECT * FROM visitor_table 
		";
		if(!$this->is_master_user())
		{
			$this->query .= " WHERE visitor_enter_by ='".$_SESSION["admin_id"]."'";
		}
		$this->execute();
		return $this->row_count();
	}

	function make_avatar($character)
	{
	    $path = "images/". time() . ".png";
		$image = imagecreate(200, 200);
		$red = rand(0, 255);
		$green = rand(0, 255);
		$blue = rand(0, 255);
	    imagecolorallocate($image, 230, 230, 230);  
	    $textcolor = imagecolorallocate($image, $red, $green, $blue);
	    imagettftext($image, 100, 0, 55, 150, $textcolor, 'font/arial.ttf', $character);
	    imagepng($image, $path);
	    imagedestroy($image);
	    return $path;
	}

	function Generate_order_no()
	{
		$this->query = "
		SELECT MAX(order_number) AS order_number FROM order_table
		";

		$result = $this->get_result();

		foreach($result as $row)
		{
			if(is_null($row["order_number"]))
			{
				return '100000';
			}
			else
			{
				return $row["order_number"] + 1;
			}
		}
	}

	function Get_user_name($user_id)
	{
		$this->query = "
		SELECT * FROM user_table 
		WHERE user_id = '".$user_id."'
		";
		$result = $this->get_result();
		foreach($result as $row)
		{
			if($row['user_type'] != 'Master')
			{
				return $row["user_name"];
			}
			else
			{
				return 'Master';
			}
		}
	}

	function Set_timezone()
	{
		$this->query = "
		SELECT restaurant_timezone FROM restaurant_table 
		LIMIT 1
		";
		$result = $this->get_result();
		foreach($result as $row)
		{
			return $row['restaurant_timezone'];
		}
	}

	function Get_restaurant_logo()
	{
		$this->query = "
		SELECT restaurant_logo FROM restaurant_table 
		LIMIT 1
		";
		$result = $this->get_result();
		foreach($result as $row)
		{
			return $row['restaurant_logo'];
		}
	}

	function Get_currency_symbol(){
		$this->query = "
		SELECT restaurant_currency FROM restaurant_table 
		LIMIT 1
		";
		$result = $this->get_result();

		foreach($result as $row)
		{
			$currency = $row['restaurant_currency'];

			$currency_data = $this->currency_array();

			foreach($currency_data as $row)
			{
				if($row['code'] == $currency)
				{
					return $row["symbol"];
				}
			}
		}
	}

	function Get_total_today_sales()
	{
		$date = date('Y-m-d');
		$this->query = "
		SELECT SUM(order_net_amount) AS total FROM order_table 
		WHERE order_date = '".$date."'
		";

		$result = $this->get_result();

		foreach($result as $row)
		{
			if(!is_null($row["total"]))
			{
				return $this->cur . $row["total"];
			}
			else
			{
				return '0';
			}
		}
	}

	function Get_total_yesterday_sales()
	{
		$date = date('Y-m-d');

		$this->query = "
		SELECT SUM(order_net_amount) AS total FROM order_table 
		WHERE order_date = '".$date."' - INTERVAL 1 DAY
		";

		$result = $this->get_result();

		foreach($result as $row)
		{
			if(!is_null($row["total"]))
			{
				return $this->cur . $row["total"];
			}
			else
			{
				return '0';
			}
		}
	}

	function Get_last_seven_day_total_sales()
	{
		$date = date('Y-m-d');

		$this->query = "
		SELECT SUM(order_net_amount) AS total FROM order_table 
		WHERE order_date >= '".$date."' - INTERVAL 7 DAY
		";
		$result = $this->get_result();

		foreach($result as $row)
		{
			if(!is_null($row["total"]))
			{
				return $this->cur . $row["total"];
			}
			else
			{
				return '0';
			}
		}
	}

	function Get_total_sales()
	{
		$this->query = "
		SELECT SUM(order_net_amount) AS total FROM order_table 
		";
		
		$result = $this->get_result();

		foreach($result as $row)
		{
			if(!is_null($row["total"]))
			{
				return $this->cur . $row["total"];
			}
			else
			{
				return '0';
			}
		}
	}
}
