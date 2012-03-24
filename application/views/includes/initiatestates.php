<script>

</script>

<script type='text/javascript'>


var eventArray; 

var clickedDate; 

var mealTable;

var omit;

var selected;

var date;



$(document).ready(function() {

	initiateCalendar();

	

	

	//CLOSING POPUP  

    //Click the x event!  

    $("#popupContactClose").click(function(){  

    disablePopup();  

    });  

    //Click out event!  

    $("#backgroundPopup").click(function(){  

    disablePopup();  

    });

});





// BEN'S CODE
var portions = new Array();
// save calories per day
portions[0] = <?php echo $user_info['calories_per_day']; ?>;
// save protein percentage
portions[1] = <?php echo $user_info['protein_percentage']; ?>;
// save carb percentage
portions[2] = <?php echo $user_info['carb_percentage']; ?>;
// save fat percentage
portions[3] = <?php echo $user_info['fat_percentage']; ?>;

// objects for holding food info
function food(name,protein,fat,carbs,cal,weight,breakfast,lunch,dinner,snack, id)
{
	this.name = name;
	this.protein = protein;
	this.fat = fat;
	this.carbs = carbs;
	this.cal = cal;
	this.weight = weight;
	this.ogweight = weight;
	this.kind = new Array();
	this.kind[0] = breakfast;
	this.kind[1] = lunch;
	this.kind[2] = dinner;
	this.kind[3] = snack;
	this.id = id; 
}

// sorting functions for foods with greatest
// to smallest macronutrients
function pCompare(a,b) {
  if (a.protein < b.protein)
     return 1;
  if (a.protein > b.protein)
    return -1;
  return 0;
}
function cCompare(a,b) {
  if (a.carbs < b.carbs)
     return 1;
  if (a.carbs > b.carbs)
    return -1;
  return 0;
}
function fCompare(a,b) {
  if (a.fat < b.fat)
     return 1;
  if (a.fat > b.fat)
    return -1;
  return 0;
}

function checkIfInArray(list,elem)
{
	var index = 0;
	while( index < list.length )
	{
		if (list[index] == elem)
		{
			return index;
		}
		index++;
	}

	return -1;
}


function getProteins(macroCalsNeeded, calTotals, originalCalsNeeded, pFoods)
{
	var index;
	var pcalories;
	var ccalories; 
	var fcalories; 
	
	var curMeal = new Array();
	
	// pick protein foods
	while( calTotals[0] < macroCalsNeeded[0] && pFoods.length != 0 )
	{
		index = Math.floor(Math.random() * pFoods.length);
		pcalories = pFoods[index].protein/100;
		ccalories = pFoods[index].carbs/100;
		fcalories = pFoods[index].fat/100;
		
		if( (macroCalsNeeded[0]-calTotals[0])/3.5 >= pcalories*pFoods[index].weight )
		{
			// place food in meal
			curMeal.push(pFoods[index]);
			// update totals
			calTotals[0] += pFoods[index].weight * pcalories * 3.5;
			calTotals[1] += pFoods[index].weight * ccalories * 3.5;
			calTotals[2] += pFoods[index].weight * fcalories * 9;
			pFoods.splice(index,1);
		}
		else
		{ // what we need is less than what we have
			// how much we are going to eat
			pFoods[index].weight = (((macroCalsNeeded[0]-calTotals[0])/3.5)/pcalories);
			// place food in meal
			curMeal.push(pFoods[index]);
			// update totals
			calTotals[0] += pFoods[index].weight * pcalories * 3.5;
			calTotals[1] += pFoods[index].weight * ccalories * 3.5;
			calTotals[2] += pFoods[index].weight * fcalories * 9;
			pFoods.splice(index,1);
		}
	}
	
	return curMeal;
}

function getCarbs(macroCalsNeeded, calTotals, originalCalsNeeded, cFoods)
{
	var index; 
	var pcalories; 
	var ccalories; 
	var fcalories; 
	
	var curMeal = new Array();
	var tempWeight;
	
	// pick carb foods
	while( calTotals[1] < macroCalsNeeded[1] && cFoods.length != 0 )
	{
		index = Math.floor(Math.random() * cFoods.length);
		pcalories = cFoods[index].protein/100;
		ccalories = cFoods[index].carbs/100;
		fcalories = cFoods[index].fat/100;
		
		if( (macroCalsNeeded[1]-calTotals[1])/3.5 >= ccalories*cFoods[index].weight )
		{
			if(calTotals[0] + cFoods[index].weight * pcalories * 3.5 > originalCalsNeeded[0] + originalCalsNeeded[0] * 0.1)
			{
				cFoods.splice(index,1);
			}
			else
			{
				// place food in meal
				curMeal.push(cFoods[index]);
				calTotals[0] += cFoods[index].weight * pcalories * 3.5;
				calTotals[1] += cFoods[index].weight * ccalories * 3.5;
				calTotals[2] += cFoods[index].weight * fcalories * 9;
				cFoods.splice(index,1);
			}
		}
		else
		{ // what we need is less than what we have
			tempWeight = (((macroCalsNeeded[1]-calTotals[1])/3.5)/ccalories);
			if(calTotals[0] + tempWeight * pcalories * 3.5 > originalCalsNeeded[0] + originalCalsNeeded[0] * 0.1)
			{
				cFoods.splice(index,1);
			}
			else
			{
				// how much we are going to eat
				cFoods[index].weight = (((macroCalsNeeded[1]-calTotals[1])/3.5)/ccalories);
				// place food in meal
				curMeal.push(cFoods[index]);
				// update totals
				calTotals[0] += cFoods[index].weight * pcalories * 3.5;
				calTotals[1] += cFoods[index].weight * ccalories * 3.5;
				calTotals[2] += cFoods[index].weight * fcalories * 9;
				cFoods.splice(index,1);
			}
		}
	}
	
	return curMeal;
}

function getFats(macroCalsNeeded, calTotals, originalCalsNeeded, fFoods)
{
	var index; 
	var pcalories; 
	var ccalories; 
	var fcalories; 
	
	var curMeal = new Array();
	var tempWeight;
	
	// pick fat foods
	while( calTotals[2] < macroCalsNeeded[2] && fFoods.length != 0 )
	{
		index = Math.floor(Math.random() * fFoods.length);
		pcalories = fFoods[index].protein/100;
		ccalories = fFoods[index].carbs/100;
		fcalories = fFoods[index].fat/100;
		
		if( (macroCalsNeeded[2]-calTotals[2])/9 >= fcalories*fFoods[index].weight )
		{
			if(calTotals[0] + fFoods[index].weight * pcalories * 3.5 > originalCalsNeeded[0] + originalCalsNeeded[0] * 0.1)
			{
				fFoods.splice(index,1);
			}
			else if(calTotals[1] + fFoods[index].weight * ccalories * 3.5 > originalCalsNeeded[1] + originalCalsNeeded[1] * 0.1)
			{
				fFoods.splice(index,1);
			}
			else
			{
				// place food in meal
				curMeal.push(fFoods[index]);
				calTotals[0] += fFoods[index].weight * pcalories * 3.5;
				calTotals[1] += fFoods[index].weight * ccalories * 3.5;
				calTotals[2] += fFoods[index].weight * fcalories * 9;
				fFoods.splice(index,1);
			}
		}
		else
		{ // what we need is less than what we have
			tempWeight = (((macroCalsNeeded[2]-calTotals[2])/9)/fcalories);
			if(calTotals[0] + tempWeight * pcalories * 3.5 > originalCalsNeeded[0] + originalCalsNeeded[0] * 0.1)
			{
				fFoods.splice(index,1);
			}
			else if(calTotals[1] + tempWeight * ccalories * 3.5 > originalCalsNeeded[1] + originalCalsNeeded[1] * 0.1)
			{
				fFoods.splice(index,1);
			}
			else
			{
				// how much we are going to eat
				fFoods[index].weight = (((macroCalsNeeded[2]-calTotals[2])/9)/fcalories);
				// place food in meal
				curMeal.push(fFoods[index]);
				// update totals
				calTotals[0] += fFoods[index].weight * pcalories * 3.5;
				calTotals[1] += fFoods[index].weight * ccalories * 3.5;
				calTotals[2] += fFoods[index].weight * fcalories * 9;
				fFoods.splice(index,1);
			}
		}
	}
	
	return curMeal;
}



function generateMeal(omit)
{
	<?php
		if( $user_inventory_count != 0 )
		{
			?>
			// save foods in kitchen
			var kitchen = new Array();
			
			<?php
				foreach( $user_inventory as $food ) 
				{
					$name = $food['food_name'];
					settype($name,'string');
					$name = str_replace(",", " ",$name);
					$protein = $food['proteins'];
					$fat = $food['fats'];
					$carbs = $food['carbohydrates'];
					$cal = $food['calories'];
					$weight = $food['weight'];
					$breakfast = $food['breakfast'];
					$lunch = $food['lunch'];
					$dinner = $food['dinner'];
					$snack = $food['snack'];
					$id = $food['food_id'];
					
					if( $weight > 0 )
					{
						echo "kitchen.push( new food(\"$name\",$protein,$fat,$carbs,$cal,$weight,$breakfast,$lunch,$dinner,$snack, $id) )\n";
					}
				}
			?>
		
			var breakfast = 0;
			var lunch = 1;
			var dinner = 2;
			var snack = 3;
			
			// calculate how many calories needed for this meal
			var calneeded;
			if(selected == snack)
			{
				calneeded = portions[0] * 0.125;
			}
			else
			{
				calneeded = portions[0] * 0.25;
			}
			
			var originalCalsNeeded = new Array();
			originalCalsNeeded[0] = (portions[1]/100) * calneeded;
			originalCalsNeeded[1] = (portions[2]/100) * calneeded;
			originalCalsNeeded[2] = (portions[3]/100) * calneeded;
			
			// calories needed for this meal/snack - 10% buffer
			var macroCalsNeeded = new Array();
			
			// calculate how many calories per macronutrient
			macroCalsNeeded[0] = (portions[1]/100) * calneeded;
			macroCalsNeeded[0] -= (macroCalsNeeded[0] * 0.1);
			macroCalsNeeded[1] = (portions[2]/100) * calneeded;
			macroCalsNeeded[1] -= (macroCalsNeeded[1] * 0.1);
			macroCalsNeeded[2] = (portions[3]/100) * calneeded;
			macroCalsNeeded[2] -= (macroCalsNeeded[2] * 0.1);
			
			var pFoods = new Array();
			var cFoods = new Array();
			var fFoods = new Array();
			
			var i = 0;
			// separate foods into appropriate arrays
			while( i < kitchen.length )
			{
				if(checkIfInArray(omit,kitchen[i].name) == -1 && kitchen[i].kind[selected] == 1)
				{
					//TODO: CHECK TAG HERE if(item.tag)
					if(kitchen[i].protein > kitchen[i].fat && kitchen[i].protein > kitchen[i].carbs)
					{
						// protein food
						pFoods.push(kitchen[i]);
					}
					else if(kitchen[i].carbs > kitchen[i].fat)
					{
						// carb food
						cFoods.push(kitchen[i]);
					}
					else
					{
						// fat food
						fFoods.push(kitchen[i]);
					}
				}
				i++;
			}
			
			// sort list of foods 
			pFoods.sort(pCompare);
			cFoods.sort(cCompare);
			fFoods.sort(fCompare);
			
			// store generated meal here
			var curMeal = new Array();
			
			// keep track of total calories of protein, carbs, and fats
			var calTotals = new Array();
			calTotals[0] = 0;
			calTotals[1] = 0;
			calTotals[2] = 0;
			
			// call getProteins
			curMeal.push(getProteins(macroCalsNeeded, calTotals, originalCalsNeeded, pFoods));
			
			// error messages
			if( curMeal[0].length == 0 || calTotals[0] < macroCalsNeeded[0] - macroCalsNeeded[0] * 0.4)
			{
				tr = document.createElement('tr'); 
				td = document.createElement('td'); 
				td.innerHTML = "Please buy more food items containing proteins for your kitchen!";
				td.style.color = "black"; td.style.fontWeight = "bold"; td.style.textAlign = "center"; td.style.color = "black"; td.style.fontSize = "14px";
				tr.appendChild(td);
				mealTable.appendChild(tr);
			}
			
			curMeal.push(getCarbs(macroCalsNeeded, calTotals, originalCalsNeeded, cFoods));
			
			// error messages
			if( curMeal[1].length == 0 || calTotals[1] < macroCalsNeeded[1] - macroCalsNeeded[1] * 0.4)
			{
				tr = document.createElement('tr'); 
				td = document.createElement('td'); 
				td.innerHTML = "Please buy more food items containing carbohydrates for your kitchen!";
				td.style.color = "black"; td.style.fontWeight = "bold"; td.style.textAlign = "center"; td.style.color = "black"; td.style.fontSize = "14px";
				tr.appendChild(td);
				mealTable.appendChild(tr);
			}

			
			curMeal.push(getFats(macroCalsNeeded, calTotals, originalCalsNeeded, fFoods));
			
			// error messages
			if( curMeal[2].length == 0 || calTotals[2] < macroCalsNeeded[2] - macroCalsNeeded[2] * 0.4)
			{
				tr = document.createElement('tr'); 
				td = document.createElement('td'); 
				td.innerHTML = "Please buy more food items containing fats for your kitchen!";
				td.style.color = "black"; td.style.fontWeight = "bold"; td.style.textAlign = "center"; td.style.color = "black"; td.style.fontSize = "14px";
				tr.appendChild(td);
				mealTable.appendChild(tr);
			}
			
			//console.log(calTotals[0]);
			//console.log(calTotals[1]);
			//console.log(calTotals[2]);
			
			return curMeal;
	<?php	} ?>
	
	return;
}

function deleteFoods()
{
	var rowCount = mealTable.rows.length;
 
        for(var i=1; i<rowCount; i++)
	{
		mealTable.deleteRow(i);
		rowCount--;
		i--;
	}
	try
	{
		mealTable.removeChild(document.getElementById('addMealForm'));
	}
	catch(err)
	{
		
	}
}

function omitted(food)
{
	if( food != null)
	{
		omit.push(food.id);
		deleteFoods();
	}
	var meal = generateMeal(omit);
	displayFoods(meal);
}



function displayFoods(meal)
{
	var i;
	var j;
	var count = 0;
	
	form = document.createElement('form'); form.action = "addMeal"; form.method = "POST"; form.id = "addMealForm";
	
	if( meal != null )
	{
		for(i = 0; i < meal.length; i++)
		{
			for(j = 0; j < meal[i].length; j++)
			{
				count++;
				tr = document.createElement('tr'); 
				td = document.createElement('td');
				td.innerHTML = "Item " + count;
				td.innerHTML += ": ";
				td.innerHTML += meal[i][j].name;
				td.style.color = "666666"; td.style.textAlign = "center"; td.style.fontSize = "14px";
				tr.appendChild(td);
				td = document.createElement('td');
				td.style.color = "666666"; td.style.fontSize = "14px";
				td.innerHTML = Math.floor(meal[i][j].weight) + "g";
				tr.appendChild(td);
				td = document.createElement('td');
				td.style.color = "666666"; td.style.fontSize = "14px";
				td.innerHTML = "X";
				td.style.cursor = "Pointer";
				td.id = meal[i][j].name;
				td.setAttribute("onclick", 'omitted(this)');
				tr.appendChild(td);
				mealTable.appendChild(tr);
				
				input = document.createElement('input'); input.name = "foodId" + count; input.value = meal[i][j].id; input.type = "hidden"; 
				input2 = document.createElement('input'); input2.name = "weight" + count; input2.value = meal[i][j].ogweight - Math.floor(meal[i][j].weight); input2.type = "hidden";
				form.appendChild(input); form.appendChild(input2); 
				
			}
		}
		
		mealNameInput = document.createElement('input'); mealNameInput.type = "text"; mealNameInput.required = "required"; mealNameInput.placeholder = "Meal Name: ";
		mealNameInput.name = 'mealName'; mealTable.appendChild(mealNameInput); mealNameInput.pattern = "[A-Za-z0-9 ]*"; 
		mealNameInput.style.border = '1px solid ccc'; mealNameInput.style.fontSize = "14px";
		form.appendChild(mealNameInput); 
		
		if(count == 0) 
		{
			document.getElementById('userMealButton').disabled = "disabled";
			document.getElementById('userMealButton').style.cursor = "not-allowed";
		}
		else
		{
			document.getElementById('userMealButton').disabled = "";
			document.getElementById('userMealButton').style.cursor = "pointer";
		}
		
		dateInput = document.createElement('input'); dateInput.type = "hidden";
		dateInput.name = 'dateInput'; dateInput.value = date; mealTable.appendChild(dateInput); 
		form.appendChild(dateInput); 
		
		submitInput = document.createElement('input'); submitInput.className = "button"; submitInput.type = "Submit"; submitInput.value = "Use Meal"; 
		submitInput.id = "submitMealGeneration";
		submitInput.style.visibility = "hidden"; submitInput.style.position = "absolute";
		form.appendChild(submitInput); 
		
		mealTable.appendChild(form);	
	}
	else
	{
		tr = document.createElement('tr'); 
		td = document.createElement('td');
		td.innerHTML = "Please add more food to your kitchen!";
		td.style.color = "black"; td.style.fontWeight = "bold"; td.style.textAlign = "center"; td.style.color = "black"; td.style.fontSize = "14px";
		tr.appendChild(td);
		mealTable.appendChild(tr);
	}
}





function initiateCalendar()

{

		date = new Date();

		var d = date.getDate();

		var m = date.getMonth();

		var y = date.getFullYear();

		

		$('#calendar').fullCalendar({

			height: 530,

			header: {

				left: 'prev,next today',

				center: 'title',

				right: 'month,basicWeek,basicDay'

			},

			editable: true,

			disableDragging: true,

			events: [

				

				{

					title: 'Generate Breakfast',

					start: new Date(y, m, d, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

					

				},

				{

					title: 'Generate Lunch',

					start: new Date(y, m, d, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Dinner',

					start: new Date(y, m, d, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Snack',

					start: new Date(y, m, d, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Cheater Meal',

					start: new Date(y, m, d, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				

				{

					title: 'Generate Breakfast',

					start: new Date(y, m, d + 1, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Lunch',

					start: new Date(y, m, d + 1, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Dinner',

					start: new Date(y, m, d + 1, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Snack',

					start: new Date(y, m, d + 1, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Cheater Meal',

					start: new Date(y, m, d + 1, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				

				{

					title: 'Generate Breakfast',

					start: new Date(y, m, d + 2, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Lunch',

					start: new Date(y, m, d + 2, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Dinner',

					start: new Date(y, m, d + 2, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Snack',

					start: new Date(y, m, d + 2, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Cheater Meal',

					start: new Date(y, m, d + 2, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				

				{

					title: 'Generate Breakfast',

					start: new Date(y, m, d + 3, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Lunch',

					start: new Date(y, m, d + 3, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Dinner',

					start: new Date(y, m, d + 3, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Snack',

					start: new Date(y, m, d + 3, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Cheater Meal',

					start: new Date(y, m, d + 3, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				

				{

					title: 'Generate Breakfast',

					start: new Date(y, m, d + 4, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Lunch',

					start: new Date(y, m, d + 4, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Dinner',

					start: new Date(y, m, d + 4, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Snack',

					start: new Date(y, m, d + 4, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Cheater Meal',

					start: new Date(y, m, d + 4, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				

				{

					title: 'Generate Breakfast',

					start: new Date(y, m, d + 5, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Lunch',

					start: new Date(y, m, d + 5, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Dinner',

					start: new Date(y, m, d + 5, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Snack',

					start: new Date(y, m, d + 5, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Cheater Meal',

					start: new Date(y, m, d + 5, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				

				{

					title: 'Generate Breakfast',

					start: new Date(y, m, d + 6, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Lunch',

					start: new Date(y, m, d + 6, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Dinner',

					start: new Date(y, m, d + 6, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Snack',

					start: new Date(y, m, d + 6, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				},

				{

					title: 'Generate Cheater Meal',

					start: new Date(y, m, d + 6, 10, 30),

					backgroundColor : "13cbcb",

					borderColor: "13cbcb",

					textColor: "white"

				}

	

			],

			dayClick: function(date, allDay, jsEvent, view) {

 					$("#this").css('background-color', '13cbcb');

					console.log("day click");

 			},

		    eventClick: function(calEvent, jsEvent, view) 

			{			


				try

				{

					document.getElementById('mealDiv').removeChild(mealTable); 		

				}				

				catch(err)

				{}

				mealTable = document.createElement("table"); mealTable.style.color = "black"; mealTable.style.width = "100%";
				mealTable.appendChild(document.createElement('br')); 
				mealTable.appendChild(document.createElement('br')); 
				document.getElementById('typeOfMealGenerated').style.marginLeft = "";
				
				tr = document.createElement('tr'); tr.style.background = "13cbcb"; tr.style.color = "white"; tr.style.marginTop = "8px";
				
				td = document.createElement('td'); td.innerHTML = "Meal Items: "; td.style.textAlign = "center"; td.style.marginTop = "8px";
				td.colSpan = "3";
				tr.appendChild(td); mealTable.appendChild(tr); tr.style.fontSize = "18px";
				
				date = calEvent.start.getFullYear() + "-" + (calEvent.start.getUTCMonth()+1) + "-" + calEvent.start.getDate(); 
				
				if(calEvent.title.search("Generate") == -1)

				{
					<?php

					if($user_meal_history)

					{
						for($i = 0; $i < count($user_meal_history); $i++)

						{?>

							// find the meal

							//debugger; 

							//console.log(calEvent.start.getDate()); 

							if(calEvent.id ==  "<?php echo $user_meal_history[$i][0]['meal_id']; ?>")

							{
								// go through meal contents 

								<?php 

								for($j = 0; $j < $user_meal_history[$i]['count']; $j++)

								{ ?>
									console.log("meal contents"); 
									tr = document.createElement('tr'); 
									tr.style.fontSize = "18px";
									tr.style.fontFamily = "Arial, Helvetica, sans-serif";
									tr.style.color = "666666";

									td = document.createElement('td'); 
									

									td.innerHTML = "Item " + <?php echo ($j + 1); ?>;
									td.style.textAlign = "center"; 


									td.innerHTML += ": "; 

									// find food item from food id 
									<?php for($k = 0; $k < count($user_inventory); $k++)

									{ ?>

									<?php

										if($user_inventory[$k]['food_id'] == $user_meal_history[$i][$j]['food_id'])

										{

										?>

											td.innerHTML += "<?php echo $user_inventory[$k]['food_name']; ?>";

										<?php

									 	}							

								 	} 

								 	?>

									tr.appendChild(td); 

									mealTable.appendChild(tr); 

									<?php

								}

							  ?>

							}

					<?php } 

					}

					?>

					document.getElementById('cheaterForm').style.visibility = "hidden"; document.getElementById('cheaterForm').style.position = "absolute";

					document.getElementById('typeOfMealGenerated').innerHTML = calEvent.title;	
					document.getElementById('typeOfMealGenerated').style.textAlign = "center";

					document.getElementById('userMealButton').style.visibility = "hidden"; 
					document.getElementById('userMealButton').style.position = "";
					document.getElementById('userMealButton').disabled = "";
					document.getElementById('userMealButton').style.cursor = "pointer";
					
					document.getElementById('mealDiv').appendChild(mealTable);   

				}

				else if(calEvent.title.search("Generate Cheater") != -1)

				{
					document.getElementById('cheaterDate').value = date; 

					document.getElementById('cheaterForm').style.visibility = "visible"; document.getElementById('cheaterForm').style.position = "";

					//mealTable = document.getElementById('cheaterMealTable'); mealTable.style.visibility = "visible"; mealTable.style.position = "relative";

					document.getElementById('typeOfMealGenerated').innerHTML = calEvent.title;	
					document.getElementById('userMealButton').style.visibility = "visible"; 
					document.getElementById('userMealButton').disabled = "";
					document.getElementById('userMealButton').style.cursor = "pointer";
				}

				else

				{

					if(calEvent.title.search("Breakfast") != -1)

					{

						selected = 0;

					}

					else if(calEvent.title.search("Lunch") != -1)

					{

						selected = 1;

					}

					else if(calEvent.title.search("Dinner") != -1)

					{

						selected = 2;

					}

					else

					{

						selected = 3;

					}

					

					

					omit = new Array();

					omitted(null);

					document.getElementById('cheaterForm').style.visibility = "hidden"; document.getElementById('cheaterForm').style.position = "absolute";

					document.getElementById('typeOfMealGenerated').innerHTML = calEvent.title;	

					document.getElementById('userMealButton').style.visibility = "visible";
					document.getElementById('userMealButton').setAttribute('onClick', "$('#submitMealGeneration').click()"); 

					document.getElementById('mealDiv').appendChild(mealTable);  

				}

				document.getElementById('loader').style.visibility = "hidden";

				centerPopup();

				loadPopup();

    	}

			

		});

		//document.getElementById('viewProgress').style.visibility = "visible";	

}









</script>

<script type="text/javascript"> Cufon.now(); </script>

<script>

	$(document).ready(function() {

		$("#calendar").fullCalendar( 'changeView', 'basicWeek' );

		tabs.init();

	})

</script>



<?php 



if($view_state == 1)

{ ?> 

	<script>

	$(document).ready(function() {

		$("#showKitchen").click();

	})

	</script>

<?php }

else if($view_state == 2)

{ ?> 



<script>

$(document).ready(function() {

		$("#showProfile").click()

	})



</script>



<?php 

}



if($user_meal_history)

{

	for($i = 0; $i < count($user_meal_history); $i++)

	{
		if($user_meal_history[$i]['cheater'] == 1)
		{

		try

		{

		?>

		<script>

		$(document).ready(function() 

		{

			events = [

				{

					title  : "<?php echo $user_meal_history[$i]['meal_name']; ?>",

					id: '<?php echo $user_meal_history[$i]['meal_id']; ?>',

					start  : '<?php echo $user_meal_history[$i]['date']; ?>',

					backgroundColor : "666666",

					borderColor: "666666",

					textColor: "white"

				}

			];

		//$('#calendar').fullCalendar('next');

		$('#calendar').fullCalendar( 'addEventSource', events);

		});

		</script>

		<?php

		}

		catch(Exception $e)

		{

			break; 	

		}

		}

		else

		{

		try

		{

		?>

		<script>

		$(document).ready(function() 

		{

			events = [

				{

					title  : "<?php echo $user_meal_history[$i]['meal_name']; ?>",
					
					id: <?php echo $user_meal_history[$i]['meal_id']; ?>,

					start  : '<?php echo $user_meal_history[$i]['date']; ?>',

					backgroundColor : "white",

					borderColor: "white",

					textColor: "13cbcb"

				}

			];

		//$('#calendar').fullCalendar('next');

		$('#calendar').fullCalendar( 'addEventSource', events);

		});

		</script>

		<?php

		}

		catch(Exception $e)

		{

			break; 	

		}	

		}

	}

}



?>