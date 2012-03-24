<link rel="stylesheet" href="../../css/mykitchen.css" type="text/css" media="all">

<link rel="stylesheet" href="../../css/fooditem.css" type="text/css" media="all">

<div id= "view_catalog" style="visibility:hidden; position:absolute; clear:both; height:100%;">

	<h2 class="under">Catalog</h2>

	<div class='box'>

	<div class='boxtop'><div></div></div>

		<div style="height:90%; overflow:scroll"">

        <div class='boxcontent'>

            <div id = "nutrition">

                <table>

                    <tr>

                        <td>

                    		 <?php 

							 $initiated = 0; 

							 

							 /*

							  $index = 0; 

							  echo("<table border='1px' style='border=1px; height=0%;'><tr><td>Food Name</td><td>Food Id</td><td>Calories</td><td>Carbohydrates</td><td>Proteins</td><td>Fats</td><td>Sugars</td><td>Cholesterol</td></tr>");

							  while($index < ($large_inventory_count)) 

							  {

									echo("<tr class='catalogItem' onClick='catalogChoiceClick(this)'>"); 

									echo("<td>".$large_inventory[$index]['food_name']."</td>");

									echo("<td>".$large_inventory[$index]['food_id']."</td>");

									echo("<td>".$large_inventory[$index]['calories']."</td>");

									echo("<td>".$large_inventory[$index]['carbohydrates']."</td>");

									echo("<td>".$large_inventory[$index]['proteins']."</td>");

									echo("<td>".$large_inventory[$index]['fats']."</td>");

									echo("<td>".$large_inventory[$index]['sugars']."</td>");

									echo("<td>".$large_inventory[$index]['cholesterol']."</td>");

									echo("</tr>"); 

									$index++; 

							  }

							  echo("</table>"); 

							  */?>

                            <form>

                            <?php 

							  $index = 0; 

							  while($index < 3000) 
							  {
									echo("<input type='button' onClick='catalogChoiceClick(this)' value=\"".$large_inventory[$index]['food_name']."\" onmouseover='' class ='fooditem'/>"); 

									echo("<input type='hidden' value ='".$large_inventory[$index]['calories']."'/>"); 

			  						echo("<input type='hidden' value ='".$large_inventory[$index]['carbohydrates']."' />"); 

									echo("<input type='hidden' value ='".$large_inventory[$index]['proteins']."' />"); 

			  						echo("<input type='hidden' value ='".$large_inventory[$index]['fats']."' />"); 

			  						echo("<input type='hidden' value ='".$large_inventory[$index]['sugars']."' />");

			  						echo("<input type='hidden' value ='".$large_inventory[$index]['cholesterol']."' />");

									$index++; 
							  }

							?>

                            </form>

                        </td>     

                        <td>

                            <div id="sidebar2">

                                <span id="div2" style="visibility:hidden"  class="divStyle">

                                <p id="nutfacts"><br><u><b>Nutrition Facts per 100g </b></u></span>

                                <p class="blockfacts"><br><b>Protein:</b> 65 g</p>

                                <p class="blockfacts"><br><b>Carbs: </b> 32 g</span></p>

                                <p class="blockfacts"><br><b>Fat:</b> 11 </span></p>

                                <p class="blockfacts"><br><b>Cholesterol: </b> 22 g</span></p>

                                <p class="blockfacts"><br><b>Sugar: </b> 13 g</span></p>

                                <p class="blockfacts"><br><b>Calories:</b> 40 g</span></p>

                                <br>

                                <span id = "updatekitch"><a href="addtokitchen.php" class = "buttonAK">+ Add to Kitchen</a></span>

                                </span>

                            </div>

                        </td>

                    </tr>

                </table>

            </div><!--end of nutrition-->

            </div>

            </div>

      </div>

</div>