<?php
class users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function addItemToMeal($mealId, $mealName, $foodId, $servingSize)
	{
		/* Add New Item To Specified Meal */
		$insertArray = array('meal_id' => $mealId, 'meal_name' => $mealName, 'food_id' => $foodId, 'serving_size' => $servingSize); 
		$this -> db -> insert('meals', $insertArray);
	}
	public function sendUserCredentials($email)
	{
		$query = $this->db->get_where('user_profiles', array('email' => $email));
		foreach ($query->result_array() as $row)
		{
				// notify user
		$to = $email;
		$subject = 'F.A.T User User Credentials';
		$headers = "From:  fat_diet@hotmail.com \r\n";
		$headers .= "Reply-To: fat_diet@hotmail.com \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$message = '<html><body>';
		$message .= '<h1></h1>';
		$message .= '</body></html>';
		$message .= '<html><body>';
		$message .= '<div>Hi '.$row['username'].', <br><br>
		
					 Here are your login credentials:
					 </div><br>
					 
					 username: '.$row['username'].'<br>
					 password: '.$row['password'].'<br><br>';
					 
		$message .= '<div><b>
					 F.A.T by D.I.E.T, LLC. <br>
		             "Food Administration Tool" <br>
		             W: fat_diet@hotmail.com <br><br>
		
		
		             CONFIDENTIALITY NOTICE: This E-Mail transmission (and/or the documents accompanying it) is for the sole use of the intended recipient(s) of D.I.E.T 
		             and may contain information protected by the attorney-client privilege, the attorney-work-product doctrine or other applicable privileges or confidentiality laws or 
		             regulations. If you are not an intended recipient, you may not review, use, copy, disclose or distribute this message or any of the information contained in this 
		             message to anyone. If you are not the intended recipient, please contact the sender by reply e-mail and destroy all copies of this message and any attachments. <br>
		             - Thank You.<b></div><br><br><br>
					 
					 
					 <center>F.A.T by D.I.E.T, LLC. All rights reserved</center>'; 
			$message .= "</body></html>";
		
			mail($to,$subject,$message,$headers);
		}
	}
	public function addMeal($userId, $mealName, $date, $cheater)
	{
		/* Get new meal id */
		$this->db->select_max('meal_id');
		$query = $this->db->get('meals');
		foreach ($query->result_array() as $row){ $mealId = $row['meal_id'] + 1; break; }
		
		/* Insert New Meal */
		if($cheater)
		{
			$insertArray = array('user_id' => $userId, 'date' => $date, 'breakfast_meal_id' => null, 'lunch_meal_id' => null, 'dinner_meal_id' => null, 'snack_meal_id' => null, 
			'cheater_meal_id' => $mealId);
		}
		else
		{
			$insertArray = array('user_id' => $userId, 'date' => $date, 'breakfast_meal_id' => $mealId, 'lunch_meal_id' => null, 'dinner_meal_id' => null, 'snack_meal_id' => null, 
			'cheater_meal_id' => null);
		}
		$this -> db -> insert('meal_histories', $insertArray);
		
		/* Return New Meal Id */
		return $mealId; 
	}
	public function addToKitchen($userId, $foodName, $exp, $weight, $protein, $carbs, $fat, $cholesterol, $sugar, $calories, $bkf, $lunch, $dinner, $snack, $cheatermeal)
	{
		if($exp < date('Y-m-d')) $weight = 0; 
		
		$data = array('user_id' => $userId, 'weight' => $weight, 'exp_date' => $exp, 'breakfast' => $bkf, 'lunch' => $lunch, 'dinner' => $dinner, 'snack' => $snack,
		'cheater_meal' => $cheatermeal, 'food_name' => $foodName, 'calories' => $calories, 'carbohydrates' => $carbs, 'proteins' => $protein, 'fats' => $fat, 'sugars' =>
		 $sugar, 'cholesterol' => $cholesterol);
		
		/* If food item exists updae the item */
		if($this->users_model->kitchenItemExists($userId, $foodName)){ $this -> db -> update('user_private_inventories', $data, array('user_id' => $userId, 'food_name' => $foodName)); } 
		/* Otherwise insert a new item */
		else
		{ 
			$this -> db -> insert('user_private_inventories', $data);
		}
		
		$query = $this->db->get_where('user_private_inventories', array('user_id' => $userId, 'food_name' => $foodName));
		foreach ($query->result_array() as $row){ $foodId = $row['food_id']; }
		if(!isset($foodId)){  $foodId = -1; } 
		return $foodId;
	
	}
	public function updateKichenWeight($foodId, $userId, $newWeight)
	{
		$updateArray['weight'] = $newWeight;  
		$this->db->update('user_private_inventories', $updateArray, array('user_id' => $userId, 'food_id' => $foodId));	
	}
	public function deletKitchenItem($foodId, $userId)
	{
		$updateArray = array();
		$updateArray['weight'] = 0;  
		$this->db->update('user_private_inventories', $updateArray, array('user_id' => $userId, 'food_id' => $foodId));
	}
	public function kitchenItemExists($userId, $foodName)
	{
		$query = $this->db->get_where('user_private_inventories', array('user_id' => $userId, 'food_name' => $foodName));
		foreach($query -> result() as $row)
		{
			return true; 	
		} 
		return false; 
	}
	public function loadUserKitchen($userId)
	{
		$query = $this->db->get_where('user_private_inventories', array('user_id' => $userId));
		return $query; 
	}
	public function addUser($insertArray)
	{
		$query = $this->db->get_where('user_profiles', array('username' => $insertArray['username']));
		
		/* user already exits return false */
		foreach ($query -> result() as $row)
		{
			return false; 	
		} 	
					
		$query = $this->db->get_where('user_profiles', array('email' => $insertArray['email']));
		
		/* user already exits return false */
		foreach ($query -> result() as $row)
		{
			return false; 	
		} 	
			
		if($this -> db -> insert('user_profiles', $insertArray)) return true; 
		else return false; 
	}
	public function loadMealHistory($userId)
	{
		return $this->db->get_where('meal_histories', array('user_id' => $userId));
	}
	public function loadMeal($mealId)
	{
		return $this->db->get_where('meals', array('meal_id' => $mealId));
	}	
	public function checkLoginCredentials($user, $pwd)
	{
		$query = $this->db->get_where('user_profiles', array('username' => $user, 'password' => $pwd));
		foreach ($query -> result() as $row)
		{
			return true; 	
		} 
		return false; 
	}
	public function sendUserRegConfirmation($user, $email, $pwd)
	{
		// notify team 
		$to = "fat_diet@hotmail.com";
		$subject = 'F.A.T User Registration Notification';
		$headers = "From:  fat_diet@hotmail.com \r\n";
		$headers .= "Reply-To: fat_diet@hotmail.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$message = '<html><body>';
		$message .= '<h1></h1>';
		$message .= '</body></html>';
		$message .= '<html><body>';
		$message .= '<div>'.$user.' has registered as a user with F.A.T .</div><br><br>';
		$message .= '<div><b>
					 F.A.T by D.I.E.T, LLC. <br>
		             "Food Administration Tool" <br>
		             W: fat_diet@hotmail.com <br><br>
		
		
		             CONFIDENTIALITY NOTICE: This E-Mail transmission (and/or the documents accompanying it) is for the sole use of the intended recipient(s) of D.I.E.T
		             and may contain information protected by the attorney-client privilege, the attorney-work-product doctrine or other applicable privileges or confidentiality laws or 
		             regulations. If you are not an intended recipient, you may not review, use, copy, disclose or distribute this message or any of the information contained in this 
		             message to anyone. If you are not the intended recipient, please contact the sender by reply e-mail and destroy all copies of this message and any attachments. <br>
		             - Thank You.<b></div><br><br><br>
					 
					 
					 <center>F.A.T by D.I.E.T, LLC. All rights reserved</center>'; 
		$message .= "</body></html>";
		
		mail($to,$subject,$message,$headers);
		
		// notify user
		$to = $email;
		$subject = 'F.A.T User Registration Confirmation';
		$headers = "From:  fat_diet@hotmail.com \r\n";
		$headers .= "Reply-To: fat_diet@hotmail.com \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$message = '<html><body>';
		$message .= '<h1></h1>';
		$message .= '</body></html>';
		$message .= '<html><body>';
		$message .= '<div>Hi '.$user.', <br><br>
		
					 Thank you for registering with the F.A.T tool.
					 </div><br>
					 
					 <bold>Login Credentials:</bold><br>
					 username: '.$user.'<br>
					 password: '.$pwd.'<br><br>';
					 
		$message .= '<div><b>
					 F.A.T by D.I.E.T, LLC. <br>
		             "Food Administration Tool" <br>
		             W: fat_diet@hotmail.com <br><br>
		
		
		             CONFIDENTIALITY NOTICE: This E-Mail transmission (and/or the documents accompanying it) is for the sole use of the intended recipient(s) of D.I.E.T 
		             and may contain information protected by the attorney-client privilege, the attorney-work-product doctrine or other applicable privileges or confidentiality laws or 
		             regulations. If you are not an intended recipient, you may not review, use, copy, disclose or distribute this message or any of the information contained in this 
		             message to anyone. If you are not the intended recipient, please contact the sender by reply e-mail and destroy all copies of this message and any attachments. <br>
		             - Thank You.<b></div><br><br><br>
					 
					 
					 <center>F.A.T by D.I.E.T, LLC. All rights reserved</center>'; 
		$message .= "</body></html>";
		
		mail($to,$subject,$message,$headers);
	}
	public function loadUserInventory()
	{
		
	}
	
	public function loadUserInfo($user)
	{
		$query = $this->db->get_where('user_profiles', array('username' => $user));
		return $query->row_array(); 
	}
	
	public function loadLargeInventory()
	{
		$this->db->group_by("food_name"); 
		$query = $this->db->get('public_inventory');
		return $query; 
	}
	
	public function addToUserInventory()
	{
		
		
	}
	
	public function deleteFromUserInventory()
	{
		
		
	}
	
	/*public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('news');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}
		public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
	{
		$data['news'] = $this->news_model->get_news();
	}

	public function view($slug)
	{
		$data['news'] = $this->news_model->get_news($slug);
	}*/

}