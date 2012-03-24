<div id="user_info" style="visibility:hidden; position:absolute">
	<h2 class="under">Personal Profile</h2>		
			<table>
            	<col />
            	<tr>
                    <td>
            
			<form action = "updateUser" method="post" onsubmit="return CheckMacroPercentagesSubmit();">
            
                <label for = "name"> <h2 class = "textfont"> Username: </h2></label> 
                <input type="text" name="userName" disabled placeholder="<?PHP echo $user_info['username'] ?>" style="margin-left:98px;" />
                
				<h2 class = "textfont"></h2><br/>
				<label for = "email"> <h2 class = "textfont"> Email: </h2></label>
                <input type="text" name="email" disabled placeholder="<?PHP echo $user_info['email'] ?>" style="margin-left:136px;"/>
                
                <h2 class = "textfont"></h2><br/>
				<label for = "password"> <h2 class = "textfont"> Password: </h2></label>
                <input type="text" name="password" style="margin-left:101px;"/>
                
                <h2 class = "textfont"></h2><br/>
				<label for = "password"> <h2 class = "textfont"> Confirm Password: </h2></label>
                <input type="text" name="rpassword" style="margin-left:32px;"/>
                
                <h2 class = "textfont"></h2><br/>
				<label for = "weight"> <h2 class = "textfont"> Body Weight: </h2></label>
                <input type="number" name="weight" min="0" step=".1" placeholder="<?php echo $user_info['weight'] ?>" style="margin-left:78px;"/>
                
                <h2 class = "textfont"></h2><br/>
				<label for = "height"> <h2 class = "textfont"> Body Height: </h2></label>
                <input type="number" name="height" min="0" step=".1" placeholder="<?php echo $user_info['height'] ?>" style="margin-left:83px;"/> <h2 class = "textfont">(#.##)</h2>
                <h2 class = "textfont"></h2><br/>
				<label for = "age"> <h2 class = "textfont"> Age: </h2></label>
                <input type="number" name="age" min="0" max="100" placeholder="<?php echo $user_info['age'] ?>" style="margin-left:149px;"/>
                
                <h2 class = "textfont"></h2><br/>
				<label for = "fitness"> <h2 class = "textfont"> Choose a Fitness level: </h2></label>
                <select name="Fitness" id="fitness">
					<option id="0"  value="0">Sedentary</option>
					<option id="1"  value="1">Moderate</option>
					<option id="2"  value="2">Active</option>
				</select>
                
                <h2 class = "textfont"></h2><br/>
				<label for = "gender"> <h2 class = "textfont"> Choose Gender: </h2></label>
                <select name="Gender" id="Gender" value="" style="margin-left:55px;">
                	<option id="Male" value="0">Male </option>
                    <option id="Female" value="1">Female </option> <br />
                </select>
                
                <h2 class = "textfont"></h2><br/>
				<label for = "calories"> <h2 class = "textfont"> Calories per day: </h2></label>
                <input type="number" placeholder="<?PHP echo $user_info['calories_per_day'] ?>" name="calories" style="margin-left:52px;"/>
                <br /><br/><h2 class = "textfont">The result of this formula will be the number of calories you can eat every day
and maintain your current weight. You should never allow your daily caloric intake to fall below 1,200 calories. Excessive calorie restriction
could slow your metabolism, malnourish your body, and ultimately hinder your weight goals.</h2>
                
                <h2 class = "kitchenform2"><br/>
				<input type="checkbox" id="zone" name="zone" value="1" checked/> Check if you are using the "Zone" diet <br />
				</h2>
                
                <h2 class = "textfont2"></h2><br/><br/>
				<label for = "macnu"> <h2 class = "textfont2">Macronutrient Percentages</h2></label>
                
                <h2 class = "textfont"></h2><br/><br/>
				<label for = "carbs"> <h2 class = "textfont"> Carbohydrates: </h2></label>
                <input type="number" min="0" id="carbProfileInput" name="carbs" onchange="CheckMacroPercentagesSubmit()"  onfocus="CheckMacroPercentagesSubmit()" placeholder="<?PHP echo $user_info['carb_percentage'] ?>" style="margin-left:64px;"/>
                <h2 class = "textfont">%</h2>
                
                <h2 class = "textfont"></h2><br/>
				<label for = "proteins"> <h2 class = "textfont"> Protein: </h2></label>
                <input type="number" min="0" id="proteinProfileInput"  name="proteins" onchange="CheckMacroPercentagesSubmit()"  onfocus="CheckMacroPercentagesSubmit()" placeholder="<?PHP echo $user_info['protein_percentage'] ?>" style="margin-left:125px;"/>
                <h2 class = "textfont">%</h2>
                
                <h2 class = "textfont"></h2><br/>
				<label for = "fats"> <h2 class = "textfont"> Fat: </h2></label>
                <input type="number" min="0" id="fatProfileInput" name="fat" onchange="CheckMacroPercentagesSubmit()" onfocus="CheckMacroPercentagesSubmit()" placeholder="<?PHP echo $user_info['fat_percentage'] ?>" style="margin-left:157px;"/>
                <h2 class = "textfont">%</h2><br/><br/><br/></h2>
                
			<input type="Submit" value="Update" class="button" align="left" style="margin-left:300px;" />
			
		  </form>
            </td>
                	<td> 
                    	<img src="../../images/profile_image.png" alt="" width="310" height="450" />
                    </td>
            </table>
    
    <?PHP if($user_info['sex'] == 1){?> <script> document.getElementById("Female").selected = true; </script><?PHP } 
	if($user_info['zone_diet'] == 0){?> <script> document.getElementById("zone").checked = false; </script><?PHP } 
	if($user_info['fitness_level'] == 1){?> <script> document.getElementById("1").selected = true; </script><?PHP } 
	if($user_info['fitness_level'] == 2){?> <script> document.getElementById("2").selected = true; </script> <?PHP } ?>
</div>