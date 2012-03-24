<?php
session_start();
class Pages extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('users_model');
	}
	// Be default the view function goes to home.php
	public function view($page = 'home')
	{
		if ( ! file_exists('application/views/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			
			print($page); 
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->view($page, $data);
	}
	public function forgotPwd()
	{
		$this->users_model->sendUserCredentials($_POST['email']); 
		$this->load->view('home');
	}
	public function addCheaterMeal()
	{
		if($_SESSION['userID'] == null || $_SESSION['userName'] == null)
		{
			?><script>window.location = "view";</script><?php 	
		}
		$start = "name";
		$counter = 2; 
		while(1)
		{
			if($_POST["name".$counter] != null) $counter++;
			else break; 
		}
		$mealId = $this->users_model->addMeal($_SESSION['userID'], $_POST['mealname'], $_POST['date'], 1); 
	
		/* Valid Meal Name */
		if($mealId != -1)
		{	
			$i = 1;
			while($i < $counter)
			{
				if($i > 1)
				{
					$foodId = $this->users_model->addToKitchen($_SESSION['userID'], $_POST['name'.$i], 0, 0, $_POST['proteins'.$i], $_POST['carbs'.$i], $_POST['fats'.$i],
					$_POST['cholesterol'.$i],$_POST['sugars'.$i], $_POST['calories'.$i], 0, 0, 0, 0, 1);
					$this->users_model->addItemToMeal($mealId, $_POST['mealname'], $foodId, 0); 
				}
				else
				{
					$foodId = $this->users_model->addToKitchen($_SESSION['userID'], $_POST["name"], 0, 0, $_POST['proteins'], $_POST['carbs'], $_POST['fats'],
					$_POST['cholesterol'],$_POST['sugars'], $_POST['calories'], 0, 0, 0, 0, 1);
					$this->users_model->addItemToMeal($mealId, $_POST['mealname'], $foodId, 0); 
				}
				$i++;
			}
		}
		$data['user_info'] = $this->users_model->loadUserInfo($_SESSION['userName']);
		
		$this->GetUserMeals($data); 
		$this->GetUserInventory($data); $count = 0; 
		$data['large_inventory'] = $_SESSION['large_inventory'];
		$data['large_inventory_count'] = $_SESSION['large_inventory_count'];
		$data['user_inventory_bkf'] = $this->sortBreakfast($data['user_inventory'], $count); $data['user_inventory_bkf_count'] = $count; 
		$data['user_inventory_dinner'] = $this->sortDinner($data['user_inventory'], $count); $data['user_inventory_dinner_count'] = $count;  
		$data['user_inventory_snack'] = $this->sortSnack($data['user_inventory'], $count); $data['user_inventory_snack_count'] = $count; 
		$data['user_inventory_lunch'] = $this->sortLunch($data['user_inventory'], $count); $data['user_inventory_lunch_count'] = $count; 
		$data['user_inventory_exp_date'] = $this->selectionSortExpDate($data['user_inventory'], $count); $data['user_inventory_exp_date_count'] = $count; 
			
		/* Update SESSION object */
		$_SESSION['userID'] = $data['user_info']['user_id'];
		$_SESSION['userName'] = $data['user_info']['username'];
		$data['view_state'] = 0; 
		$this->load->view('calendar', $data);
	}
	public function addMeal()
	{
		?><?PHP
		if($_SESSION['userID'] == null || $_SESSION['userName'] == null)
		{
			?><script>window.location = "view";</script><?php 	
		}
		
		$mealId = $this->users_model->addMeal($_SESSION['userID'], $_POST['mealName'], $_POST['dateInput'], 0);	
	
		$counter = 1; 
		while(1)
		{
			if(isset($_POST["foodId".$counter])) $counter++;
			else break; 
		}
	
		/* Valid Meal Name */
		if($mealId != -1)
		{	
			$i = 1;
			while($i < $counter)
			{
				//decrease amount in kitchen 
				$this->users_model->updateKichenWeight($_POST['foodId'.$i], $_SESSION['userID'], $_POST['weight'.$i]); 
				
				$this->users_model->addItemToMeal($mealId, $_POST['mealName'], $_POST['foodId'.$i], 0); 
				$i++;
			}
		}
		
		$data['user_info'] = $this->users_model->loadUserInfo($_SESSION['userName']);
		
		$this->GetUserMeals($data); 
		$this->GetUserInventory($data); $count = 0; 
		$data['large_inventory'] = $_SESSION['large_inventory'];
		$data['large_inventory_count'] = $_SESSION['large_inventory_count'];
		$data['user_inventory_bkf'] = $this->sortBreakfast($data['user_inventory'], $count); $data['user_inventory_bkf_count'] = $count; 
		$data['user_inventory_dinner'] = $this->sortDinner($data['user_inventory'], $count); $data['user_inventory_dinner_count'] = $count;  
		$data['user_inventory_snack'] = $this->sortSnack($data['user_inventory'], $count); $data['user_inventory_snack_count'] = $count; 
		$data['user_inventory_lunch'] = $this->sortLunch($data['user_inventory'], $count); $data['user_inventory_lunch_count'] = $count; 
		$data['user_inventory_exp_date'] = $this->selectionSortExpDate($data['user_inventory'], $count); $data['user_inventory_exp_date_count'] = $count; 
			
		/* Update SESSION object */
		$_SESSION['userID'] = $data['user_info']['user_id'];
		$_SESSION['userName'] = $data['user_info']['username'];
		$data['view_state'] = 0; 
		$this->load->view('calendar', $data);
	}
	public function deleteKitchenItem()
	{
		if($_SESSION['userID'] == null || $_SESSION['userName'] == null)
		{
			?><script>window.location = "view";</script><?php 	
		}
		
		/* Delete All Checked Kitchen Items */
		$counter = 0; 
		while($counter < $_SESSION['inventory_count'])
		{
			if(isset($_POST['food_id'.$counter]))
			{
				$this->users_model->deletKitchenItem($_POST['food_id'.$counter], $_SESSION['userID']);
			}	
			$counter++;
		}
		
		$data['user_info'] = $this->users_model->loadUserInfo($_SESSION['userName']);
		
		$this->GetUserMeals($data); 
		$this->GetUserInventory($data); $count = 0; 
		$data['large_inventory'] = $_SESSION['large_inventory'];
		$data['large_inventory_count'] = $_SESSION['large_inventory_count'];
		$data['user_inventory_bkf'] = $this->sortBreakfast($data['user_inventory'], $count); $data['user_inventory_bkf_count'] = $count; 
		$data['user_inventory_dinner'] = $this->sortDinner($data['user_inventory'], $count); $data['user_inventory_dinner_count'] = $count;  
		$data['user_inventory_snack'] = $this->sortSnack($data['user_inventory'], $count); $data['user_inventory_snack_count'] = $count; 
		$data['user_inventory_lunch'] = $this->sortLunch($data['user_inventory'], $count); $data['user_inventory_lunch_count'] = $count; 
		$data['user_inventory_exp_date'] = $this->selectionSortExpDate($data['user_inventory'], $count); $data['user_inventory_exp_date_count'] = $count; 
			
		/* Update SESSION object */
		$_SESSION['userID'] = $data['user_info']['user_id'];
		$_SESSION['userName'] = $data['user_info']['username'];
		$data['view_state'] = 1; 
		$this->load->view('calendar', $data);
	}
	public function addToKitchen()
	{
		if($_SESSION['userID'] == null || $_SESSION['userName'] == null)
		{
			?><script>window.location = "view";</script><?php 	
		}
		$this->users_model->addToKitchen($_SESSION['userID'], $_POST['foodname'], $_POST['expiration'], $_POST['weight'], $_POST['protein'], $_POST['carbs'], $_POST['fat'],$_POST['cholesterol'],
		$_POST['sugar'], $_POST['calories'], isset($_POST['Breakfast']) ? 1 : 0, isset($_POST['Lunch']) ? 1 : 0, isset($_POST['Dinner']) ? 1 : 0, isset($_POST['Snack']) ? 1 : 0, 0);

		$data['user_info'] = $this->users_model->loadUserInfo($_SESSION['userName']);

		$this->Zone($data);
		$this->GetUserMeals($data); 
		$this->GetUserInventory($data); $count = 0;
		$data['large_inventory'] = $_SESSION['large_inventory'];
		$data['large_inventory_count'] = $_SESSION['large_inventory_count'];
		$data['user_inventory_bkf'] = $this->sortBreakfast($data['user_inventory'], $count); $data['user_inventory_bkf_count'] = $count; 
		$data['user_inventory_dinner'] = $this->sortDinner($data['user_inventory'], $count); $data['user_inventory_dinner_count'] = $count;  
		$data['user_inventory_snack'] = $this->sortSnack($data['user_inventory'], $count); $data['user_inventory_snack_count'] = $count; 
		$data['user_inventory_lunch'] = $this->sortLunch($data['user_inventory'], $count); $data['user_inventory_lunch_count'] = $count; 
		$data['user_inventory_exp_date'] = $this->selectionSortExpDate($data['user_inventory'], $count); $data['user_inventory_exp_date_count'] = $count; 
		
		$data['view_state'] = 1; 	
		$_SESSION['userID'] = $data['user_info']['user_id'];
		$_SESSION['userName'] = $data['user_info']['username'];
		$this->load->view('calendar', $data); 
	}
	public function register()
	{
		$insertArray = array(
		'username' => $_POST['username'],
		'email' => $_POST['email'],
		'password' => $_POST['password'],
		'height' => $_POST['height'],
		'weight' => $_POST['weight'],
		'age' => $_POST['age'],
		'sex' => $_POST['Gender'],
		'fitness_level' => $_POST['Fitnesslevel'],
		'calories_per_day' => $_POST['calories'],
		'carb_percentage' => $_POST['carbs'],
		'fat_percentage' => $_POST['fat'],
		'protein_percentage' => $_POST['protein']
		); 
		
		if($_POST['carbs'] == 40 && $_POST['protein'] == 30 && $_POST['fat'] == 30){ $insertArray['zone_diet'] = 1;}
		else{ $insertArray['zone_diet'] = 0;}		
				
		if(($this->users_model->addUser($insertArray)))
		{
			$this->users_model->sendUserRegConfirmation($_POST['username'],$_POST['email'],$_POST['password']); 
			$this->GetLargeInventory($data); 
			$_SESSION['large_inventory'] = $data['large_inventory'];
			$_SESSION['large_inventory_count'] = $data['large_inventory_count'];
			
			/* Store USERNAME & ID INTO SESSION */
			$data['user_meal_history'] = null; 
			$data['user_inventory_count'] = 0;
			$data['user_inventory_bkf_count'] = 0; 
			$data['user_inventory_dinner_count'] = 0;  
			$data['user_inventory_snack_count'] = 0; 
			$data['user_inventory_lunch_count'] = 0; 
			$data['user_info'] = $this->users_model->loadUserInfo($_POST['username']);
			$_SESSION['userID'] = $data['user_info']['user_id'];
			$_SESSION['userName'] = $data['user_info']['username'];

			/* Load Calendar State */			
			$data['view_state'] = 0; 
			$this->load->view('calendar', $data); 
		}
		else 
		{
			$_SESSION['userID'] = null;
			$this->load->view('home'); 
		}
	}
	public function updateUser()
	{
		if($_SESSION['userID'] == null || $_SESSION['userName'] == null)
		{
			?><script>window.location = "view";</script><?php 	
		}
		$updateArray = array(); 
		if($_POST['password'] != null){ $updateArray['password'] = $_POST['password'];  }
		if($_POST['height'] != null){ $updateArray['height'] = $_POST['height'];  }
		if($_POST['weight'] != null){ $updateArray['weight'] = $_POST['weight'];  }
		if($_POST['age'] != null){ $updateArray['age'] = $_POST['age'];  }
		if($_POST['Gender'] != null){ $updateArray['sex'] = $_POST['Gender'];  }
		if($_POST['Fitness'] != null){ $updateArray['fitness_level'] = $_POST['Fitness'];  }
	
			if(isset($_POST['zone']))
			{ 
				$updateArray['zone_diet'] = 1;
			}
			else
				$updateArray['zone_diet'] = 0;

		if($_POST['calories'] != null){ $updateArray['calories_per_day'] = $_POST['calories'];  }
		
		if($_POST['carbs'] != null)
		{ 
			$updateArray['carb_percentage'] = $_POST['carbs'];
			if($_POST['carbs'] > 40) 
			{
				$updateArray['zone_diet'] = 0;
			}
		}
		if($_POST['proteins'] != null)
		{ 
			$updateArray['protein_percentage'] = $_POST['proteins'];  
			if($_POST['proteins'] > 30) 
			{
				$updateArray['zone_diet'] = 0;
			}
		}
		if($_POST['fat'] != null)
		{ 
			$updateArray['fat_percentage'] = $_POST['fat'];  
			if($_POST['fat'] > 30) 
			{
				$updateArray['zone_diet'] = 0;
			}
		}
		
		$data['user_info'] = $this->users_model->loadUserInfo($_SESSION['userName']);
		$this->db->update('user_profiles', $updateArray, array('user_id' => $data['user_info']['user_id']));
		$data['user_info'] = $this->users_model->loadUserInfo($_SESSION['userName']);
		
		$this->Zone($data);
		$this->GetUserMeals($data);
		$this->GetUserInventory($data);
		$data['large_inventory'] = $_SESSION['large_inventory'];
		$data['large_inventory_count'] = $_SESSION['large_inventory_count']; 
		
		$_SESSION['userID'] = $data['user_info']['user_id'];
		$_SESSION['userName'] = $data['user_info']['username'];
		$data['view_state'] = 2; 
		$this->load->view('calendar', $data);			
	}
	public function logout()
	{
		$this->load->view('home');	
	}
	public function login()
	{
		if($_POST['username'] == null || $_POST['password'] == null)
		{
			?><script>window.location = "view";</script><?php 	
		}
		if(($this->users_model->checkLoginCredentials($_POST['username'], $_POST['password'])) == true)
		{
			$data['user_info'] = $this->users_model->loadUserInfo($_POST['username']);
			
			$this->Zone($data); 
			$this->GetUserMeals($data); 
			$this->GetLargeInventory($data); 
			$this->GetUserInventory($data); $count = 0;
			$_SESSION['large_inventory'] = $data['large_inventory'];
			$_SESSION['large_inventory_count'] = $data['large_inventory_count']; 
			if($data['user_inventory_count'] != 0)
			{
				$data['user_inventory_bkf'] = $this->sortBreakfast($data['user_inventory'], $count); $data['user_inventory_bkf_count'] = $count; 
				$data['user_inventory_dinner'] = $this->sortDinner($data['user_inventory'], $count); $data['user_inventory_dinner_count'] = $count;  
				$data['user_inventory_snack'] = $this->sortSnack($data['user_inventory'], $count); $data['user_inventory_snack_count'] = $count; 
				$data['user_inventory_lunch'] = $this->sortLunch($data['user_inventory'], $count); $data['user_inventory_lunch_count'] = $count; 
				$data['user_inventory_exp_date'] = $this->selectionSortExpDate($data['user_inventory'], $count); $data['user_inventory_exp_date_count'] = $count;
			}
			
			$data['username'] = $data['user_info']['username'];
			$_SESSION['userID'] = $data['user_info']['user_id'];
			$_SESSION['userName'] = $data['user_info']['username'];
			$data['view_state'] = 0; 
			$this->load->view('calendar', $data);	
		}
		else 
		{
			$this->load->view('home'); 
			$_SESSION['userID'] = -1;
		}
	}
	function Zone(&$data)
	{
		$updateArray = array();
		 			
		if($data['user_info']['carb_percentage'] == 40 && $data['user_info']['protein_percentage'] == 30 && $data['user_info']['fat_percentage'] == 30)
		{
			$updateArray['zone_diet'] = 1;
		}
		else
		{
			$updateArray['zone_diet'] = 0;
		}
		$this->db->update('user_profiles', $updateArray, array('user_id' => $data['user_info']['user_id']));
			
		$data['user_info'] = $this->users_model->loadUserInfo($data['user_info']['username']);
	}
	function GetLargeInventory(&$data)
	{
		$index = 0; 
		$query = $this->users_model->loadLargeInventory(); 
		foreach($query->result_array() as $row)
		{
			$data['large_inventory'][$index] = $row; 
			$index++; 
		}
		$data['large_inventory_count'] = $index; 
	}
	
	function GetUserInventory(&$data)
	{
		$index = 0; 
		$this->db->group_by("food_name"); 
		$query = $this->users_model->loadUserKitchen($data['user_info']['user_id']); 
		
			
		foreach($query->result_array() as $row)
		{
			$data['user_inventory'][$index] = $row; 
			$index++; 
		}
			
		$data['user_inventory_count'] = $index; 	
	}
	
	function GetUserMeals(&$data)
	{
		/* Get User Meals */
		$index = 0; 
		$data['meal_history'] = $this->users_model->loadMealHistory($data['user_info']['user_id']); 
		foreach($data['meal_history']->result_array() as $row)
		{
			$data['meals'][$index]['date'] = $row['date'];
			if($row['breakfast_meal_id'] != null){  $data['meals'][$index]['meal_id'] = $row['breakfast_meal_id']; $data['meals'][$index]['cheater'] = 0; }
			elseif($row['lunch_meal_id'] != null){  $data['meals'][$index]['meal_id'] = $row['lunch_meal_id']; $data['meals'][$index]['cheater'] = 0; }
			elseif($row['dinner_meal_id'] != null){  $data['meals'][$index]['meal_id'] = $row['dinner_meal_id']; $data['meals'][$index]['cheater'] = 0; }
			elseif($row['snack_meal_id'] != null){  $data['meals'][$index]['meal_id'] = $row['snack_meal_id']; $data['meals'][$index]['cheater'] = 0; }
			elseif($row['cheater_meal_id'] != null){  $data['meals'][$index]['meal_id'] = $row['cheater_meal_id'];  $data['meals'][$index]['cheater'] = 1; }
			$index++;
		}
		/* Get Meal Items */
		for ($i = 0; $i < $index; $i++)
		{
			$result = $this->users_model->loadMeal($data['meals'][$i]['meal_id']); 
			$j = 0; 
			foreach($result->result_array() as $row)
			{
				$data['user_meal_history'][$i][$j] = $row;  
				$data['user_meal_history'][$i]['meal_name'] = $row['meal_name'];
				$data['user_meal_history'][$i]['date'] = $data['meals'][$i]['date'];
				$data['user_meal_history'][$i]['count'] = $j + 1;
				$data['user_meal_history'][$i]['cheater'] = $data['meals'][$i]['cheater'];
				$data['user_meal_history'][$i]['meal_id'] = $data['meals'][$i]['meal_id'];
				$j++; 
			}
		}
		if($index == 0) $data['user_meal_history'] = null; 
	}
	
	// selection sort function module in PHP
	function sortBreakfast($a, &$count) 
	{
	   $returnA = array(); $counter = 0; $count = 0; 
	   //$n = count($a); It is not needed to create a varible with no real use.
	   for($i = 0; $i < count($a); $i++) {
		 if($a[$i]['breakfast'] != 0 && $a[$i]['weight'] > 0)
		 {
			 $returnA[$counter] =$a[$i];  
			 $counter++;
		 }
	   }
	   $count = $counter; 
	   return $returnA;
	}
	// selection sort function module in PHP
	function sortDinner($a, &$count) 
	{
	   $returnA = array(); $counter = 0; $count = 0;   
	   //$n = count($a); It is not needed to create a varible with no real use.
	   for($i = 0; $i < count($a); $i++) {
		 if($a[$i]['dinner'] != 0 && $a[$i]['weight'] > 0)
		 {
			 $returnA[$counter] =$a[$i];  
			 ?> <script>console.log("here"); </script> <?php
			 $counter++;
		 }
	   }
	   $count = $counter; 
	   return $returnA;
	}
	// selection sort function module in PHP
	function sortLunch($a, &$count) 
	{
	   $returnA = array(); $counter = 0; $count = 0;   
	   //$n = count($a); It is not needed to create a varible with no real use.
	   for($i = 0; $i < count($a); $i++) {
		 if($a[$i]['lunch'] != 0 && $a[$i]['weight'] > 0)
		 {
			 $returnA[$counter] =$a[$i];  
			 $counter++;
		 }
	   }
	   $count = $counter; 
	   return $returnA;
	}
	// selection sort function module in PHP
	function sortSnack($a, &$count) 
	{
	   $returnA = array(); $counter = 0; $count = 0; 
	   //$n = count($a); It is not needed to create a varible with no real use.
	   for($i = 0; $i < count($a); $i++) {
		 if($a[$i]['snack'] != 0 && $a[$i]['weight'] > 0)
		 {
			 $returnA[$counter] =$a[$i];  
			 $counter++;
		 }
	   }
	   $count = $counter; 
	   return $returnA;
	}
	// selection sort function module in PHP
	function selectionSortExpDate($a, &$count) {
	   $count = 0;
	   //$n = count($a); It is not needed to create a varible with no real use.
	   for($i = 0; $i < count($a); $i++) {
			  $count++;
			  $min = $i;
			  for($j = $i + 1; $j < count($a); $j++)
				 if($a[$j]['exp_date'] < $a[$min]['exp_date'])
					$min = $j;
			  $temp = $a[$min]; $a[$min] = $a[$i]; $a[$i] = $temp;
	   }
	   return $a;
	}
}