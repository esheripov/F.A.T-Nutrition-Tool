<link rel="stylesheet" href="../../css/mykitchen.css" type="text/css" media="all">

<link rel="stylesheet" href="../../css/fooditem.css" type="text/css" media="all">

<link rel="stylesheet" href="../../css/buttonsK.css" type="text/css" media="all">

<link rel="stylesheet" href="../../css/buttonsAK.css" type="text/css" media="all">



<script type="text/javascript">

       /* $(function() {

            var offset = $("#sidebar").offset();

            var topPadding = 15;

            $(window).scroll(function() {

                if ($(window).scrollTop() > offset.top) {

                    $("#sidebar").stop().animate({

                        marginTop: $(window).scrollTop() - offset.top + topPadding

                    });

                } else {

                    $("#sidebar").stop().animate({

                        marginTop: 0

                    });

                };

            });

        });*/

    </script>

<script type="text/javascript">





    function showDiv(input)

    {   

		protein = input.nextElementSibling; carbs = protein.nextElementSibling; 

		fat = carbs.nextElementSibling; cholesterol = fat.nextElementSibling; 

		sugar = cholesterol.nextElementSibling; calories = sugar.nextElementSibling; 

		weight = calories.nextElementSibling; expDate = weight.nextElementSibling;

		document.getElementById('proteinMyKitchen').placeholder = protein.value;

		document.getElementById('carbsMyKitchen').placeholder = carbs.value;

		document.getElementById('fatMyKitchen').placeholder = fat.value;

		document.getElementById('cholesterolMyKitchen').placeholder = cholesterol.value;

		document.getElementById('sugarMyKitchen').placeholder = sugar.value;

		document.getElementById('caloriesMyKitchen').placeholder = calories.value;

		document.getElementById('weightMyKitchen').placeholder = weight.value;

		document.getElementById('expMyKitchen').placeholder = expDate.value;

	

        document.getElementById("div1").style.visibility = "visible";

    }

	function hideDiv()

	{

    	document.getElementById("div1").style.visibility = "hidden";

	}

	

</script>   



<div id="my_kitchen" style="visibility:hidden; position:absolute">

	<h2 class="under" style="margin-top:-118px;">My Kitchen</h2>

	<div class='box'>

	<div class='boxtop'><div></div></div>

    <div class='boxcontent'>

	<span id = "button"> 

        <font color = "black" ><b>Sort by: </b>

        <a id="sortDefaultButton" onclick="sortDefault()" style="background-color:#13cbcb; color:white" class = "buttonK">A-Z</a> 

        <a class = "buttonK" id="sortExpButton" onclick="sortExp()">Exp. Date</a> 

        <b>Filter By:</b> 

        <a id="sortBreakfastButton" onclick="sortBreakfast()" class = "buttonK">Breakfast</a> 

        <a id="sortLunchButton" onclick="sortLunch()" class = "buttonK">Lunch</a> 

        <a id="sortDinnerButton" onclick="sortDinner()" class = "buttonK">Dinner</a> 

        <a id="sortSnackButton" onclick="sortSnack()" class = "buttonK">Snack</a> 

	</font> 



	<span id = "deletekitch">

    	<a href="#" id="deleteItem" onclick="$('#deleteKitchenItem').submit()" class = "buttonAK">- Delete</a>

	</span>



	</span>  

	<span id = "addtokitch" align = "right"><a href="#" onclick="showAddToKitchen(false)" class = "buttonAK">+ Add to Kitchen</a></span>



	</br></br></br>

    

    <table>

        <tr>

            <td>

                <form action="deleteKitchenItem" id="deleteKitchenItem" method="post">

                	<input type="submit" style="position:absolute; visibility:hidden" id="deleteKitchenItemButton" />

                    <div id ="default_sort"><?php 

                          $index = 0; 

                          $_SESSION['inventory_count'] = $user_inventory_count; 

                          while($index < ($user_inventory_count)) 

                          {

                              if($user_inventory[$index]['weight'] > 0 && $user_inventory[$index]['exp_date'] >= date('Y-m-d'))

                              {

                  echo("<br><input id='".$index."' type='checkbox' name='food_id".$index."' value='".$user_inventory[$index]['food_id']."' /><input type='button' value=\"".$user_inventory[$index]['food_name']."\" onmouseover='showDiv(this)' onmouseout = 'hideDiv()' class = 'fooditem'/> 

                        <input type='hidden' value ='".$user_inventory[$index]['proteins']."' /> 

                        <input type='hidden' value ='".$user_inventory[$index]['carbohydrates']."' />

                        <input type='hidden' value ='".$user_inventory[$index]['fats']."' />

                        <input type='hidden' value ='".$user_inventory[$index]['cholesterol']."' />

                        <input type='hidden' value ='".$user_inventory[$index]['sugars']."' />

                        <input type='hidden' value ='".$user_inventory[$index]['calories']."' />

                        <input type='hidden' value ='".$user_inventory[$index]['weight']."' />

                        <input type='hidden' value ='".$user_inventory[$index]['exp_date']."' />

                            "); 

                              }

                              $index++; 

                          }

                    ?>

                    </div>

                     <div id ="breakfast_sort" style="visibility:hidden; position:absolute"><?php 

                          $index = 0;

                          $_SESSION['inventory_count'] = $user_inventory_bkf_count; echo $user_inventory_bkf_count;

                          while($index < ($user_inventory_bkf_count)) 

                          {

                              if($user_inventory_bkf[$index]['weight'] > 0 && $user_inventory_bkf[$index]['exp_date'] >= date('Y-m-d'))

                              {

                  echo("<br><input type='checkbox' name='food_id".$index."' value='".$user_inventory_bkf[$index]['food_id']."' /><input type='button' value=\"".$user_inventory_bkf[$index]['food_name']."\" onmouseover='showDiv(this)' onmouseout = 'hideDiv()'  class = 'fooditem'/>

                  <input type='hidden' value ='".$user_inventory_bkf[$index]['proteins']."' /> 

                        <input type='hidden' value ='".$user_inventory_bkf[$index]['carbohydrates']."' />

                        <input type='hidden' value ='".$user_inventory_bkf[$index]['fats']."' />

                        <input type='hidden' value ='".$user_inventory_bkf[$index]['cholesterol']."' />

                        <input type='hidden' value ='".$user_inventory_bkf[$index]['sugars']."' />

                        <input type='hidden' value ='".$user_inventory_bkf[$index]['calories']."' />

                        <input type='hidden' value ='".$user_inventory_bkf[$index]['weight']."' />

                        <input type='hidden' value ='".$user_inventory_bkf[$index]['exp_date']."' />

                  

                   "); 

                              }

                              $index++; 

                          }

                    ?>

                    </div>

                     <div id ="lunch_sort" style="visibility:hidden; position:absolute"><?php 

                          $index = 0;

                          $_SESSION['inventory_count'] = $user_inventory_lunch_count; echo $user_inventory_lunch_count; 

                          while($index < ($user_inventory_lunch_count)) 

                          {

                              if($user_inventory_lunch[$index]['weight'] > 0 && $user_inventory_lunch[$index]['exp_date'] >= date('Y-m-d'))

                              {

                  echo("<br><input type='checkbox' name='food_id".$index."' value='".$user_inventory_lunch[$index]['food_id']."' /><input type='button' value=\"".$user_inventory_lunch[$index]['food_name']."\" onmouseover='showDiv(this)' onmouseout = 'hideDiv()' class = 'fooditem'/> 

                  <input type='hidden' value ='".$user_inventory_lunch[$index]['proteins']."' /> 

                        <input type='hidden' value ='".$user_inventory_lunch[$index]['carbohydrates']."' />

                        <input type='hidden' value ='".$user_inventory_lunch[$index]['fats']."' />

                        <input type='hidden' value ='".$user_inventory_lunch[$index]['cholesterol']."' />

                        <input type='hidden' value ='".$user_inventory_lunch[$index]['sugars']."' />

                        <input type='hidden' value ='".$user_inventory_lunch[$index]['calories']."' />

                        <input type='hidden' value ='".$user_inventory_lunch[$index]['weight']."' />

                        <input type='hidden' value ='".$user_inventory_lunch[$index]['exp_date']."' />

                  

                  "); 

                              }

                              $index++; 

                          }

                    ?>

                    </div>

                     <div id ="dinner_sort" style="visibility:hidden; position:absolute"><?php 

                          $index = 0;

                          $_SESSION['inventory_count'] = $user_inventory_dinner_count; echo $user_inventory_dinner_count;

                          while($index < ($user_inventory_dinner_count)) 

                          {

                              if($user_inventory_dinner[$index]['weight'] > 0 && $user_inventory_dinner[$index]['exp_date'] >= date('Y-m-d'))

                              {

                  echo("<br><input type='checkbox' name='food_id".$index."' value='".$user_inventory_dinner[$index]['food_id']."' /><input type='button' value=\"".$user_inventory_dinner[$index]['food_name']."\" onmouseover='showDiv(this)' onmouseout = 'hideDiv()'  class = 'fooditem'/>

                  <input type='hidden' value ='".$user_inventory_dinner[$index]['proteins']."' /> 

                        <input type='hidden' value ='".$user_inventory_dinner[$index]['carbohydrates']."' />

                        <input type='hidden' value ='".$user_inventory_dinner[$index]['fats']."' />

                        <input type='hidden' value ='".$user_inventory_dinner[$index]['cholesterol']."' />

                        <input type='hidden' value ='".$user_inventory_dinner[$index]['sugars']."' />

                        <input type='hidden' value ='".$user_inventory_dinner[$index]['calories']."' />

                        <input type='hidden' value ='".$user_inventory_dinner[$index]['weight']."' />

                        <input type='hidden' value ='".$user_inventory_dinner[$index]['exp_date']."' />

                   "); 

                              }

                              $index++; 

                          }

                    ?>

                    </div>

                     <div id ="snack_sort" style="visibility:hidden; position:absolute"><?php 

                          $index = 0;

                          $_SESSION['inventory_count'] = $user_inventory_snack_count; echo $user_inventory_snack_count;

                          while($index < ($user_inventory_snack_count)) 
                          {

                              if($user_inventory_snack[$index]['weight'] > 0 && $user_inventory_snack[$index]['exp_date'] >= date('Y-m-d'))
                              {

                  echo("<br><input type='checkbox' name='food_id".$index."' value='".$user_inventory_snack[$index]['food_id']."' /><input type='button' value=\"".$user_inventory_snack[$index]['food_name']."\" onmouseover='showDiv(this)' onmouseout = 'hideDiv()'  class = 'fooditem'/>

                  <input type='hidden' value ='".$user_inventory_snack[$index]['proteins']."' /> 

                        <input type='hidden' value ='".$user_inventory_snack[$index]['carbohydrates']."' />

                        <input type='hidden' value ='".$user_inventory_snack[$index]['fats']."' />

                        <input type='hidden' value ='".$user_inventory_snack[$index]['cholesterol']."' />

                        <input type='hidden' value ='".$user_inventory_snack[$index]['sugars']."' />

                        <input type='hidden' value ='".$user_inventory_snack[$index]['calories']."' />

                        <input type='hidden' value ='".$user_inventory_snack[$index]['weight']."' />

                        <input type='hidden' value ='".$user_inventory_snack[$index]['exp_date']."' />

                   "); 

                              }

                              $index++; 

                          }

                    ?>

                    </div>

                     <div id ="exp_sort" style="visibility:hidden; position:absolute"><?php 

                          $index = 0;

                          $_SESSION['inventory_count'] = $user_inventory_exp_date_count; 

                          while($index < ($user_inventory_exp_date_count)) 

                          {

                              if($user_inventory_exp_date[$index]['weight'] > 0 && ($user_inventory_exp_date[$index]['exp_date']) >= date('Y-m-d'))

                              {

                  echo("<br><input type='checkbox' name='food_id".$index."' value='".$user_inventory_exp_date[$index]['food_id']."' /><input type='button' value=\"".$user_inventory_exp_date[$index]['food_name']."\" onmouseover='showDiv(this)' onmouseout = 'hideDiv()'  class = 'fooditem'/>

                  <input type='hidden' value ='".$user_inventory_exp_date[$index]['proteins']."' /> 

                        <input type='hidden' value ='".$user_inventory_exp_date[$index]['carbohydrates']."' />

                        <input type='hidden' value ='".$user_inventory_exp_date[$index]['fats']."' />

                        <input type='hidden' value ='".$user_inventory_exp_date[$index]['cholesterol']."' />

                        <input type='hidden' value ='".$user_inventory_exp_date[$index]['sugars']."' />

                        <input type='hidden' value ='".$user_inventory_exp_date[$index]['calories']."' />

                        <input type='hidden' value ='".$user_inventory_exp_date[$index]['weight']."' />

                        <input type='hidden' value ='".$user_inventory_exp_date[$index]['exp_date']."' />

                   "); 

                              }

                              $index++; 

                          }

                    ?>

                    </div>

                    

                </form>

            </td> 

			<td>

                	 <div id="sidebar">

                        <span id="div1" style="visibility:hidden"  class="divStyle">

                            <font face="Arial" color = "#666666">

                                <br> Expiration Date: 

                                    <input id="expMyKitchen" type="date" class="tcal" style="color: #666666; font-family:arial; font-style:bold;" name="expdate" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required="required" placeholder="<?php echo date("m/d/y") ?>" min=' <?php echo date("m/d/y") ?>' size="10"/> </i>

                                <br> <i>Your Quantity:</i> 

                  <input required="required" id="weightMyKitchen" min="0" type="number" style="color: #666666; font-family:arial; width: 30px;" name="weight" maxlength="12"  size="12"/> g 

                            </font><br> 

                            

                            <br><p style="padding:0" id="nutfacts"><u><b>Nutrition Facts</b></u></p>

                            

                               <p style="padding:0" class="blockfacts"><br><b>Protein:</b> 

                   <input id="proteinMyKitchen" type="number" min="0" required="required" style="color: #666666; font-family:arial; width: 30px; " name="protein" placeholder = "" size="12" maxlength="12" /> g</p>

                              

                               <p style="padding:0" class="blockfacts"><br><b>Carbs: </b> 

                   <input type="number" id="carbsMyKitchen"  min="0" style="color: #666666; font-family:arial; width: 30px" required="required" name="carbs" placeholder = "" size="12" maxlength="12" /> g</p>

                              

                               <p style="padding:0" class="blockfacts"><br><b>Fat:</b> 

                              <input id="fatMyKitchen" name="fat" type="number" min="0" required="required" style="color: #666666; font-family:arial; width: 30px " placeholder = "" size="12" maxlength="12"/> g</p>

                              

                               <p style="padding:0" class="blockfacts"><br><b>Cholesterol: </b> 

           <input id="cholesterolMyKitchen" required="required"  type="number" min="0" style=" color: #666666; font-family:arial;  width: 30px" name="cholesterol" placeholder = "" size="12" maxlength="12"/> g</p>

                              

                               <p style="padding:0" class="blockfacts"><br><b>Sugar: </b> 

                  <input id="sugarMyKitchen" type="number" min="0" required="required" style="color: #666666;  font-family:arial; width: 30px" name="sugar" placeholder = "" size="12" maxlength="12"/> g</p>

                              

                               <p style="padding:0" class="blockfacts"><br><b>Calories:</b> 

             <input id="caloriesMyKitchen" type="number" min="0" required="required" style="color: #666666; font-family:arial; width: 30px" name="calories" placeholder = "" size="12" maxlength="12" /> g</p><br/>

                               <span style="visibility:hidden" id = "updatekitch"><a class = "buttonAK">Update</a></span>

                        </span>

                	</div>

            <td>               

        </tr>

    </table>

</div><!--end of nutrition-->

</div>

<br/>

<br/>






