// JavaScript Document

//SETTING UP OUR POPUP  
//0 means disabled; 1 means enabled;  
var popupStatus = 0;  

function CheckMacroPercentagesSubmit()
{
	var carb = document.getElementById('carbProfileInput'); 
	var protein = document.getElementById('proteinProfileInput'); 
	var fat = document.getElementById('fatProfileInput');
	var carbVal =  parseInt(carb.value) >= 0 ? carb.value : carb.placeholder; 
	var proteinVal = parseInt(protein.value) >= 0 ? protein.value : protein.placeholder; 
	var fatVal = parseInt(fat.value) >= 0 ? fat.value : fat.placeholder;
	console.log(carbVal); 
	console.log(proteinVal); 
	console.log(fatVal); 
									
	if((parseInt(carbVal) + parseInt(proteinVal) + parseInt(fatVal)) != 100)
	{ 
		console.log("over"); 
		carb.setCustomValidity("Macronutrient percentages must add up to 100%"); 
		return false; 
	}
	else 
	{
		console.log("all good"); 
		carb.setCustomValidity(""); 
		return true; 
	}
}
			
function showFAQ()
{
	document.getElementById('my_kitchen').style.visibility = "hidden"; document.getElementById('my_kitchen').style.position = ""; document.getElementById('nav2').className = ""; 
		
	document.getElementById('user_info').style.visibility = "hidden"; document.getElementById('user_info').style.position = "absolute"; document.getElementById('nav3').className = ""; 
	
	document.getElementById('add_to_kitchen').style.visibility = "hidden"; document.getElementById('add_to_kitchen').style.position = "absolute"; 
	document.getElementById('view_catalog').style.visibility = "hidden"; document.getElementById('view_catalog').style.position = "absolute";
	document.getElementById('calendar').style.visibility = "hidden"; document.getElementById('calendar').style.position = "absolute"; document.getElementById('nav1').className = "";
	document.getElementById('faq').style.visibility = "visible";  document.getElementById('calendar').style.position = ""; document.getElementById('nav4').className = "active";
	//document.getElementById('viewProgress').style.visibility = "hidden"; document.getElementById('viewProgress').style.position = "absolute"
	
	document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
	document.getElementById('default_sort').style.visibility = "hidden"; document.getElementById('default_sort').style.position = "absolute";
	document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
	document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
	document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";	
	document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
}

function showUserProfile()
{
	document.getElementById('calendar').style.visibility = "hidden"; document.getElementById('calendar').style.position = "absolute"; document.getElementById('nav1').className = ""; 
	document.getElementById('my_kitchen').style.visibility = "hidden"; document.getElementById('my_kitchen').style.position = "absolute"; document.getElementById('nav2').className = ""; 
	document.getElementById('add_to_kitchen').style.visibility = "hidden"; document.getElementById('add_to_kitchen').style.position = "absolute"; 
	document.getElementById('view_catalog').style.visibility = "hidden"; document.getElementById('view_catalog').style.position = "absolute"; 
	document.getElementById('faq').style.visibility = "hidden";  document.getElementById('faq').style.position = "absolute"; document.getElementById('nav4').className = "";
	document.getElementById('user_info').style.visibility = "visible"; document.getElementById('user_info').style.position = ""; document.getElementById('nav3').className = "active"; 
	//document.getElementById('viewProgress').style.visibility = "hidden"; document.getElementById('viewProgress').style.position = "absolute"
	
	document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
	document.getElementById('default_sort').style.visibility = "hidden"; document.getElementById('default_sort').style.position = "absolute";
	document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
	document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
	document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";	
	document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
}
function showCalendar()
{
	
	document.getElementById('calendar').style.visibility = "visible"; document.getElementById('calendar').style.position = ""; document.getElementById('nav1').className = "active"; 
	document.getElementById('user_info').style.visibility = "hidden"; document.getElementById('user_info').style.position = "absolute"; document.getElementById('nav3').className = ""; 
	document.getElementById('add_to_kitchen').style.visibility = "hidden"; document.getElementById('add_to_kitchen').style.position = "absolute"; 
	document.getElementById('nav2').className = ""; 
	document.getElementById('my_kitchen').style.visibility = "hidden"; document.getElementById('my_kitchen').style.position = "absolute"; 
	document.getElementById('faq').style.visibility = "hidden";  document.getElementById('faq').style.position = "absolute"; document.getElementById('nav4').className = "";
	
	document.getElementById('view_catalog').style.visibility = "hidden"; document.getElementById('view_catalog').style.position = "absolute"; 
	//document.getElementById('viewProgress').style.visibility = "hidden"; document.getElementById('viewProgress').style.position = ""
	
	document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
	document.getElementById('default_sort').style.visibility = "hidden"; document.getElementById('default_sort').style.position = "absolute";
	document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
	document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
	document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";
	document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
}
function showMyKitchen()
{
	document.getElementById('my_kitchen').style.visibility = "visible"; document.getElementById('my_kitchen').style.position = ""; document.getElementById('nav2').className = "active"; 
	document.getElementById('user_info').style.visibility = "hidden"; document.getElementById('user_info').style.position = "absolute"; document.getElementById('nav3').className = ""; 
	document.getElementById('add_to_kitchen').style.visibility = "hidden"; document.getElementById('add_to_kitchen').style.position = "absolute"; 
	document.getElementById('view_catalog').style.visibility = "hidden"; document.getElementById('view_catalog').style.position = "absolute"; 
	document.getElementById('faq').style.visibility = "hidden";  document.getElementById('faq').style.position = "absolute"; document.getElementById('nav4').className = "";
	document.getElementById('calendar').style.visibility = "hidden"; document.getElementById('calendar').style.position = "absolute"; document.getElementById('nav1').className = "";
	//document.getElementById('viewProgress').style.visibility = "hidden"; document.getElementById('viewProgress').style.position = "absolute"	
	
	document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
	document.getElementById('default_sort').style.visibility = "visible"; document.getElementById('default_sort').style.position = "";
	document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
	document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
	document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";
	document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
}
function showAddToKitchen(catalogInput)
{
	if(!catalogInput)
	{
		addToKitchenArry = document.getElementsByClassName('addToKitchenInput'); 
		for(i = 0; i < addToKitchenArry.length; i++)
		{
			addToKitchenArry[i].value = ""; 
		}
	}
	document.getElementById('user_info').style.visibility = "hidden"; document.getElementById('user_info').style.position = "absolute"; document.getElementById('nav3').className = ""; 
	document.getElementById('calendar').style.visibility = "hidden"; document.getElementById('calendar').style.position = "absolute"; document.getElementById('nav1').className = ""; 
	document.getElementById('my_kitchen').style.visibility = "hidden"; document.getElementById('my_kitchen').style.position = "absolute";  
	document.getElementById('view_catalog').style.visibility = "hidden"; document.getElementById('view_catalog').style.position = "absolute";
	document.getElementById('faq').style.visibility = "hidden";  document.getElementById('faq').style.position = "absolute"; document.getElementById('nav4').className = "";
	document.getElementById('add_to_kitchen').style.visibility = "visible"; document.getElementById('add_to_kitchen').style.position = ""; 
	//document.getElementById('viewProgress').style.visibility = "hidden"; document.getElementById('viewProgress').style.position = "absolute"
	
	document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
	document.getElementById('default_sort').style.visibility = "hidden"; document.getElementById('default_sort').style.position = "absolute";
	document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
	document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
	document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";	
	document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
}
function showCatalog()
{
	document.getElementById('calendar').style.visibility = "hidden"; document.getElementById('calendar').style.position = "absolute"; document.getElementById('nav1').className = ""; 
	document.getElementById('my_kitchen').style.visibility = "hidden"; document.getElementById('my_kitchen').style.position = "absolute"; 
	document.getElementById('user_info').style.visibility = "hidden"; document.getElementById('user_info').style.position = "absolute"; document.getElementById('nav3').className = ""; 
	document.getElementById('add_to_kitchen').style.visibility = "hidden"; document.getElementById('add_to_kitchen').style.position = "absolute";
	document.getElementById('faq').style.visibility = "hidden";  document.getElementById('faq').style.position = "absolute"; document.getElementById('nav4').className = "";
	document.getElementById('view_catalog').style.visibility = "visible"; document.getElementById('view_catalog').style.position = ""; document.getElementById('nav2').className = "active";
	//document.getElementById('viewProgress').style.visibility = "hidden"; document.getElementById('viewProgress').style.position = "absolute"	
	
	document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
	document.getElementById('default_sort').style.visibility = "hidden"; document.getElementById('default_sort').style.position = "absolute";
	document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
	document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
	document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";
	document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
		
	return false; 
}
function catalogChoiceClick(catalogItem)
{
	calories = catalogItem.nextElementSibling; carbs = calories.nextElementSibling; 
	proteins = carbs.nextElementSibling; fats = proteins.nextElementSibling; 
	sugar = fats.nextElementSibling; cholesterol = sugar.nextElementSibling; 
	document.getElementById('foodNameInput').value = catalogItem.value; 
	document.getElementById('totalProteinInput').value = proteins.value; 
	document.getElementById('totalCarbsInput').value = carbs.value; 
	document.getElementById('totalFatInput').value = fats.value; 
	document.getElementById('totalCholesterolInput').value = cholesterol.value; 
	document.getElementById('totalSugarInput').value = sugar.value; 
	document.getElementById('totalCaloriesInput').value = calories.value; 
	showAddToKitchen(true); 
}
function sortBreakfast()
	{
			document.getElementById('breakfast_sort').style.visibility = "visible"; document.getElementById('breakfast_sort').style.position = "";
			document.getElementById('sortBreakfastButton').style.backgroundColor = "13cbcb"; 
			document.getElementById('sortBreakfastButton').style.color = "white";
			
			document.getElementById('default_sort').style.visibility = "hidden"; document.getElementById('default_sort').style.position = "absolute";
			document.getElementById('sortDefaultButton').style.backgroundColor = "white"; 
			document.getElementById('sortDefaultButton').style.color = "13cbcb";
			
			document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
			document.getElementById('sortLunchButton').style.backgroundColor = "white"; 
			document.getElementById('sortLunchButton').style.color = "13cbcb";
			
			document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
			document.getElementById('sortDinnerButton').style.backgroundColor = "white"; 
			document.getElementById('sortDinnerButton').style.color = "13cbcb";
			
			document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";
			document.getElementById('sortSnackButton').style.backgroundColor = "white"; 
			document.getElementById('sortSnackButton').style.color = "13cbcb";
			
			document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
			document.getElementById('sortExpButton').style.backgroundColor = "white"; 
			document.getElementById('sortExpButton').style.color = "13cbcb";
	}
	function sortLunch()
	{
			document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
			document.getElementById('sortBreakfastButton').style.backgroundColor = "white"; 
			document.getElementById('sortBreakfastButton').style.color = "13cbcb";
			
			document.getElementById('default_sort').style.visibility = "hidden"; document.getElementById('default_sort').style.position = "absolute";
			document.getElementById('sortDefaultButton').style.backgroundColor = "white"; 
			document.getElementById('sortDefaultButton').style.color = "13cbcb";
			
			document.getElementById('lunch_sort').style.visibility = "visible"; document.getElementById('lunch_sort').style.position = "";
			document.getElementById('sortLunchButton').style.backgroundColor = "13cbcb"; 
			document.getElementById('sortLunchButton').style.color = "white";
			
			document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
			document.getElementById('sortDinnerButton').style.backgroundColor = "white"; 
			document.getElementById('sortDinnerButton').style.color = "13cbcb";
			
			document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";
			document.getElementById('sortSnackButton').style.backgroundColor = "white"; 
			document.getElementById('sortSnackButton').style.color = "13cbcb";
			
			document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
			document.getElementById('sortExpButton').style.backgroundColor = "white"; 
			document.getElementById('sortExpButton').style.color = "13cbcb";
	}
	function sortDinner()
	{
			document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
			document.getElementById('sortBreakfastButton').style.backgroundColor = "white"; 
			document.getElementById('sortBreakfastButton').style.color = "13cbcb";
			
			document.getElementById('default_sort').style.visibility = "hidden"; document.getElementById('default_sort').style.position = "absolute";
			document.getElementById('sortDefaultButton').style.backgroundColor = "white"; 
			document.getElementById('sortDefaultButton').style.color = "13cbcb";
			
			document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
			document.getElementById('sortLunchButton').style.backgroundColor = "white"; 
			document.getElementById('sortLunchButton').style.color = "13cbcb";
			
			document.getElementById('dinner_sort').style.visibility = "visible"; document.getElementById('dinner_sort').style.position = "";
			document.getElementById('sortDinnerButton').style.backgroundColor = "13cbcb"; 
			document.getElementById('sortDinnerButton').style.color = "white";
			
			document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";
			document.getElementById('sortSnackButton').style.backgroundColor = "white"; 
			document.getElementById('sortSnackButton').style.color = "13cbcb";
			
			document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
			document.getElementById('sortExpButton').style.backgroundColor = "white"; 
			document.getElementById('sortExpButton').style.color = "13cbcb";
	}
	function sortSnack()
	{
			document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
			document.getElementById('sortBreakfastButton').style.backgroundColor = "white"; 
			document.getElementById('sortBreakfastButton').style.color = "13cbcb";
			
			document.getElementById('default_sort').style.visibility = "hidden"; document.getElementById('default_sort').style.position = "absolute";
			document.getElementById('sortDefaultButton').style.backgroundColor = "white"; 
			document.getElementById('sortDefaultButton').style.color = "13cbcb";
			
			document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
			document.getElementById('sortLunchButton').style.backgroundColor = "white"; 
			document.getElementById('sortLunchButton').style.color = "13cbcb";
			
			document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
			document.getElementById('sortDinnerButton').style.backgroundColor = "white"; 
			document.getElementById('sortDinnerButton').style.color = "13cbcb";
			
			document.getElementById('snack_sort').style.visibility = "visible"; document.getElementById('snack_sort').style.position = "";
			document.getElementById('sortSnackButton').style.backgroundColor = "13cbcb"; 
			document.getElementById('sortSnackButton').style.color = "white";
			
			document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
			document.getElementById('sortExpButton').style.backgroundColor = "white"; 
			document.getElementById('sortExpButton').style.color = "13cbcb";
	}
	function sortDefault()
	{
			document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
			document.getElementById('sortBreakfastButton').style.backgroundColor = "white"; 
			document.getElementById('sortBreakfastButton').style.color = "13cbcb";
			
			document.getElementById('default_sort').style.visibility = "visible"; document.getElementById('default_sort').style.position = "";
			document.getElementById('sortDefaultButton').style.backgroundColor = "13cbcb"; 
			document.getElementById('sortDefaultButton').style.color = "white";
			
			document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
			document.getElementById('sortLunchButton').style.backgroundColor = "white"; 
			document.getElementById('sortLunchButton').style.color = "13cbcb";
			
			document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
			document.getElementById('sortDinnerButton').style.backgroundColor = "white"; 
			document.getElementById('sortDinnerButton').style.color = "13cbcb";
			
			document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";
			document.getElementById('sortSnackButton').style.backgroundColor = "white"; 
			document.getElementById('sortSnackButton').style.color = "13cbcb";
			
			document.getElementById('exp_sort').style.visibility = "hidden"; document.getElementById('exp_sort').style.position = "absolute";
			document.getElementById('sortExpButton').style.backgroundColor = "white"; 
			document.getElementById('sortExpButton').style.color = "13cbcb";
	}
	function sortExp()
	{
			document.getElementById('breakfast_sort').style.visibility = "hidden"; document.getElementById('breakfast_sort').style.position = "absolute";
			document.getElementById('sortBreakfastButton').style.backgroundColor = "white"; 
			document.getElementById('sortBreakfastButton').style.color = "13cbcb";
			
			document.getElementById('default_sort').style.visibility = "hidden"; document.getElementById('default_sort').style.position = "absolute";
			document.getElementById('sortDefaultButton').style.backgroundColor = "white"; 
			document.getElementById('sortDefaultButton').style.color = "13cbcb";
			
			document.getElementById('lunch_sort').style.visibility = "hidden"; document.getElementById('lunch_sort').style.position = "absolute";
			document.getElementById('sortLunchButton').style.backgroundColor = "white"; 
			document.getElementById('sortLunchButton').style.color = "13cbcb";
			
			document.getElementById('dinner_sort').style.visibility = "hidden"; document.getElementById('dinner_sort').style.position = "absolute";
			document.getElementById('sortDinnerButton').style.backgroundColor = "white"; 
			document.getElementById('sortDinnerButton').style.color = "13cbcb";
			
			document.getElementById('snack_sort').style.visibility = "hidden"; document.getElementById('snack_sort').style.position = "absolute";
			document.getElementById('sortSnackButton').style.backgroundColor = "white"; 
			document.getElementById('sortSnackButton').style.color = "13cbcb";
			
			document.getElementById('exp_sort').style.visibility = "visible"; document.getElementById('exp_sort').style.position = "";
			document.getElementById('sortExpButton').style.backgroundColor = "13cbcb"; 
			document.getElementById('sortExpButton').style.color = "white";
	}


    //loading popup with jQuery magic!  
    function loadPopup(){
	//loads popup only if it is disabled  
    if(popupStatus==0){ 
    $("#backgroundPopup").css({  
    "opacity": "0.7"  
    });  
    $("#backgroundPopup").fadeIn("slow");  
    $("#popupContact").fadeIn("slow");  
    popupStatus = 1;  
    }  
    }  
	
	//disabling popup with jQuery magic!  
    function disablePopup(){  
    //disables popup only if it is enabled  
    if(popupStatus==1){  
    $("#backgroundPopup").fadeOut("slow");  
    $("#popupContact").fadeOut("slow");  
    popupStatus = 0;  
    }  
    }  
	
	    //centering popup  
    function centerPopup(){  
    //request data for centering  
    var windowWidth = document.documentElement.clientWidth;  
    var windowHeight = document.documentElement.clientHeight;  
    var popupHeight = $("#popupContact").height();  
    var popupWidth = $("#popupContact").width();  
    //centering  
    $("#popupContact").css({  
    "position": "absolute",  
    "top": windowHeight/2-popupHeight/2,  
    "left": windowWidth/2-popupWidth/2  
    });  
    //only need force for IE6  
      
    $("#backgroundPopup").css({  
    "height": windowHeight  
    });  
      
    }  
	