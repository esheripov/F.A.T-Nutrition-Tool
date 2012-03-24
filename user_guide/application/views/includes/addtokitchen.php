

<style>





</style>



<div id="add_to_kitchen" style="visibility:hidden; position:absolute; height:100%; overflow:">





 <h2 class="under">Add Food to Kitchen:</h2>



               <table>

               <col />

               <tr>



               <td>

			

			<form action="addToKitchen" method="POST" style="display:block">

				<!--<input type="Submit" align="center" value="Find a Food" class="button2" />-->

                <button align="center" onClick="return showCatalog()" class="button2">Find a Food</button>

                <br />

                

               <h2 class = "center"> Or, if your food is not in our inventory... </h2></br>



                <label for = "foodname"> <h2 class = "textfont"> Food Name: </h2></label>

                <input type="text" name="foodname" id="foodNameInput" pattern=""  class="addToKitchenInput" style="margin-left:39px;" required="required" border-style:"dashed" border-color:"black" /><br/>

                

                <label for = "expiration"> <h2 class = "textfont"> Expiration: </h2></label>

                <input class="tcal" autocomplete="off" type="date" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" name="expiration" placeholder="<?php echo date("m/d/y") ?>" min=' <?php echo date("m/d/y") ?>' style="margin-left:54px; background-color:white" id="totalWeightInput" required="required"  /><br/>

                

				<label for = "weight"> <h2 class = "textfont"> Total Weight: </h2></label>

                <input type="number" min="0" step=".01" name="weight" style="margin-left:35px;" id="totalWeightInput" required="required" class="addToKitchenInput" />

                <h2 class = "textfont">(in grams)</h2><br/>

                

				<label for = "protein"> <h2 class = "textfont"> Total Protein: </h2></label>

                <input type="number" min="0" step=".01" name="protein" style="margin-left:35px;" id="totalProteinInput" class="addToKitchenInput" required="required" />

                

                <h2 class = "textfont">(in grams)</h2><br/>

				<label for = "carbs"> <h2 class = "textfont"> Total Carbs: </h2></label>

                <input type="number" min="0" step=".01" name="carbs" style="margin-left:43px;"  id="totalCarbsInput" class="addToKitchenInput" required="required" />

                

                <h2 class = "textfont">(in grams)</h2><br/>

				<label for = "fat"> <h2 class = "textfont"> Total Fat: </h2></label>

                <input type="number" min="0" step=".01" name="fat" style="margin-left:67px;" id="totalFatInput" class="addToKitchenInput" required />

                

                <h2 class = "textfont">(in grams)</h2><br/>

				<label for = "cholesterol"> <h2 class = "textfont"> Total Cholesterol: </h2></label>

                <input type="number" min="0" step=".00001" name="cholesterol" id="totalCholesterolInput" class="addToKitchenInput" required />

                

                <h2 class = "textfont">(in grams)</h2><br/>

				<label for = "sugar"> <h2 class = "textfont"> Total Sugar: </h2></label>

                <input type="number" min="0" step=".01" name="sugar" style="margin-left:44px;" id="totalSugarInput" class="addToKitchenInput" required />

                

                <h2 class = "textfont">(in grams)</h2><br/>

				<label for = "calories"> <h2 class = "textfont"> Total Calories: </h2></label>

                <input type="number" min="0" step=".01" style="margin-left:27px;" name="calories" id="totalCaloriesInput" class="addToKitchenInput" required /> <br/>

                

				<label for = "meal"> <h2 class = "textfont"> Type of Meal: </h2></label> 

                <h2 class = "kitchenform">

				<input type="checkbox" name="Breakfast" value="1" checked/> Breakfast<br />

				<input type="checkbox" name="Lunch" value="1" checked/> Lunch<br /> 

				<input type="checkbox" name="Dinner" value="1" checked/> Dinner<br /> 

				<input type="checkbox" name="Snack" value="1" checked/> Snack<br /> 

				</h2>

			<input type="Submit" value="Submit" class="button" align="left" />

			

		  </form>

          </td>

                <td>

                	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

               		<img src="../../images/shoppingcart.png" alt"" width="325" height="325" />

               </td>

          </table>

          

          

          <!--<button onClick="return showCatalog()">View Catalog</button>-->



</div>

<br/>

<br/>

<br/>

<br/>

<br/>

<br/>