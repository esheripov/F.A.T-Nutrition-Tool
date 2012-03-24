<!DOCTYPE html>



<html lang="en">



<head>



<link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico">



<title>Home</title>











<meta charset="utf-8">



<link rel="stylesheet" href="../../css/reset.css" type="text/css" media="all">



<link rel="stylesheet" href="../../css/layout.css" type="text/css" media="all">



<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">



<link rel="stylesheet" href="../../css/buttons.css" type="text/css" media="all">



<link rel="stylesheet" href="../../css/buttons3.css" type="text/css" media="all">



<link href="../../css/shadowbox.css" rel="stylesheet" type="text/css">







<script type="text/javascript" src="../../js/jquery-1.6.js" ></script>



<script type="text/javascript" src="../../js/cufon-yui.js"></script>



<script type="text/javascript" src="../../js/cufon-replace.js"></script>



<script type="text/javascript" src="../../js/Swis721_Cn_BT_400.font.js"></script>



<script type="text/javascript" src="../../js/Swis721_Cn_BT_700.font.js"></script>



<script type="text/javascript" src="../../js/jquery.easing.1.3.js"></script>



<script type="text/javascript" src="../../js/tms-0.3.js"></script>



<script type="text/javascript" src="../../js/tms_presets.js"></script>



<script type="text/javascript" src="../../js/jcarousellite.js"></script>



<script type="text/javascript" src="../../js/script.js"></script>



<script type="text/javascript" src="../../js/index.js"></script>



<script>



	



	if(window.location.href.search("index.php/pages") == -1)



	{



		window.location = "index.php/pages/view";



	}



	



	function checkPassword(p1, p2)



    { 



		console.log(p1.value + " : " + p2.value); 



    	if (p1.value != p2.value && p1.value != null && p1.value != "") {



        	p2.setCustomValidity('passwords do not match'); 



    	}//else if (p1.value.length < 7){



         //p1.setCustomValidity('password must be 7 characters long');}



    	else



		{



			p1.setCustomValidity(''); 



			p2.setCustomValidity('');



		}



    }







</script>







<link href="../../css/shadowbox.css" rel="stylesheet" type="text/css">



<link rel="stylesheet" href="../../css/buttons.css" type="text/css" media="all">







<script type="text/javascript">







$(document).ready(function () {







	// if user clicked on button, the overlay layer or the dialogbox, close the dialog	



	$('a.btn-ok, #dialog-overlay-login').click(function () {		



		$('#dialog-overlay-login, #dialog-box-login').hide();		



		return false;



	});



	$('a.btn-ok, #dialog-overlay-reg').click(function () {		



		$('#dialog-overlay-reg, #dialog-box-reg').hide();		



		return false;



	});



	$('a.btn-ok, #dialog-overlay-pswd').click(function () {		



		$('#dialog-overlay-pswd, #dialog-box-pswd').hide();		



		return false;



	});



	$('a.btn-ok, #dialog-overlay-pswd2').click(function () {		



		$('#dialog-overlay-pswd2, #dialog-box-pswd2').hide();		



		return false;



	});



	// if user resize the window, call the same function again



	// to make sure the overlay fills the screen and dialogbox aligned to center	



	$(window).resize(function () {



		



		//only do it if the dialog box is not hidden



		if (!$('#dialog-box-login').is(':hidden')) popup();



		if (!$('#dialog-box-reg').is(':hidden')) popup();		



		if (!$('#dialog-box-pswd').is(':hidden')) popup();		



		if (!$('#dialog-box-pswd2').is(':hidden')) popup();		



	});	



	



	



});







//Popup dialog



function popup(message, dialogID) {



		



	if( dialogID == "pswd")



	{



		$('#dialog-box-login').hide();



		$('#dialog-overlay-login').hide();



	}



	



	if( dialogID == "pswd2")



	{



		$('#dialog-box-pswd').hide();



		$('#dialog-overlay-pswd').hide();



		



	}



	// get the screen height and width  



	var maskHeight = $(document).height();  



	var maskWidth = $(window).width();



	



	// calculate the values for center alignment=



	var dialogTop =  (maskHeight/3) - ($('#dialog-box-' + dialogID).height());  



	var dialogLeft = (maskWidth/2) - ($('#dialog-box-' + dialogID).width()/2); 



	



	// assign values to the overlay and dialog box



	$('#dialog-overlay-' + dialogID).css({height:maskHeight, width:maskWidth}).show();



	$('#dialog-box-' + dialogID).css({top:dialogTop, left:dialogLeft}).show();



	



	// display the message



	$('#dialog-message-'+ dialogID).html(message);



			



}



</script>







  <!--[if lt IE 9]>



  	<script type="text/javascript" src="../../js/html5.js"></script>



	<style type="text/css">



		.bg{ behavior: url(../../js/PIE.htc); }



	</style>



  <![endif]-->



	<!--[if lt IE 7]>



		<div style=' clear: both; text-align:center; position: relative;'>



			<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/../../images/upgrade.jpg" border="0"  alt="" /></a>



		</div>



	<![endif]-->



</head>











<body id="page1">



<div class="body1">



	<div class="body2">



		<div class="main">



<!-- header -->



			<header>



				<div class="wrapper">



				<h1><a href="index.html" id="logo">Food Administration Tool</a></h1>



				<nav>



                <table id = "login">



<tr id = "field"><td><a href="javascript:popup('','login')" class="button3" style="margin-left:-120px; margin-right:40px; margin-top:45px">Login</a></td>



<td><a href="javascript:popup('','reg')" class="button3" style="margin-top:45px">Register</a>











</td>







</tr>



				</table>



				</nav>



				</div>



				<div class="wrapper">



					<div class="slider">



					  <ul class="items">



						<li><img src="../../images/img1.jpg" alt=""></li>



						<li><img src="../../images/img2.jpg" alt=""></li>



						<li><img src="../../images/img3.jpg" alt=""></li>



						<li><img src="../../images/img4.jpg" alt=""></li>



					  </ul>



					</div>



				</div>



			</header>



<!-- header end-->



		</div>



	</div>



	</div>



	<div class="body3">



		<div class="main">



<!-- content -->



			<article id="content">



				<div class="wrapper">







				</div>



				<div class="wrapper">



					<section class="col1">



						<h2 class="under"><center>The D.I.E.T. Team</center></h2>



						<div class="wrapper">



	



 <table id = "people">                           



<div id="people-list">



				<tr>	



                



                <td class="person">



				



									<img width="150" height="75" src="../../images/gary.jpg" class="attachment-full wp-post-image" alt="c5-jason" title="c5-jason" />								



				<div class="name">Gary Gillespie</div>



				<div class="position">CEO</div>



				<div class="bio"></div>



				



				</td>



                



                <td class="person">



				



									<img width="150" height="75" src="http://column5.columnfivemedia.netdna-cdn.com/wp-content/uploads/2011/05/c5-nick.png" class="attachment-full wp-post-image" alt="c5-jason" title="c5-jason" />								



				<div class="name">Kushal Bhatt</div>



				<div class="position">CTO</div>



				<div class="bio"></div>



				



				</td>							



				<td class="person">



				



									<img width="150" height="75" src="../../images/Nima.jpg" class="attachment-full wp-post-image" alt="c5-jason" title="c5-jason" />								



				<div class="name">Nima Hashemi</div>



				<div class="position">Program Manager</div>



				<div class="bio"></div>



				



				</td>



				



								



				<td class="person">



				



									<img width="150" height="75" src="../../images/Jason.jpg" class="attachment-full wp-post-image" alt="C5-JOSH" title="C5-JOSH" />								



				<div class="name">Jason Sandoval</div>



				<div class="position">Sr. Systems Analyst</div>



				<div class="bio"></div>



				



				</td>



                </tr>



                <tr>



				



								



				<td class="person">



				



									<img width="150" height="75" src="../../images/Eli.jpg" class="attachment-full wp-post-image" alt="C5-ROSS" title="C5-ROSS" />							



				<div class="name">Eliskhan Sheripov</div>



				<div class="position">Software Architect</div>



				<div class="bio"></div>



				



				</td>



				



								



				<td class="person">



				



									<img width="150" height="75" src="../../images/Ben.jpg" class="attachment-full wp-post-image" alt="C5-JAKE" title="C5-JAKE" />								



				<div class="name">Ben Shokati</div>



				<div class="position">Software Dev. Lead</div>



				<div class="bio"></div>



				



				</td>



				



								



				<td class="person">



				



									<img width="150" height="75" src="../../images/Liz.jpg" class="attachment-full wp-post-image" alt="c5-mad" title="c5-mad" />								



				<div class="name">Liz Chaddock</div>



				<div class="position">Algorithm Specialist</div>



				<div class="bio"></div>



				



				</td>



				



                



								



				<td class="person">



				



									<img width="150" height="75" src="../../images/Erica1.jpg" class="attachment-full wp-post-image" alt="Bio-Ian" title="Bio-Ian" />								



				<div class="name">Erica Hang</div>



				<div class="position">Database Specialist</div>



				<div class="bio"></div>



				



				</td>



                </tr>



                <tr>



				



								



				<td class="person">



				



									<img width="150" height="75" src="../../images/Mish.jpg" class="attachment-full wp-post-image" alt="c5-drea" title="c5-drea" />								



				<div class="name">Mishika Vora</div>



				<div class="position">Databse Specialist</div>



				<div class="bio"></div>



				



				</td>



				



								



				<td class="person">



				



									<img width="150" height="75" src="../../images/Chelsea.jpg" class="attachment-full wp-post-image" alt="chase-portrait" title="chase-portrait" />									



				<div class="name">Chelsea Baltierra</div>



				<div class="position">QA Lead</div>



				<div class="bio"></div>



				



				</td>



				



								



				<td class="person">



				



									<img width="150" height="75" src="../../images/Varun.jpg" class="attachment-full wp-post-image" alt="C5-PEOPLE-TAYLOR-2" title="C5-PEOPLE-TAYLOR-2" />								



				<div class="name">Varun Hariharan</div>



				<div class="position">UI Specialist</div>



				<div class="bio"></div>



				



				</td>



				



								



				<td class="person">



				



									<img width="150" height="75" src="../../images/Kevin.jpg" class="attachment-full wp-post-image" alt="c5-nick" title="c5-nick" />									



				<div class="name">Kevin Nevalsky</div>



				<div class="position">UI Specialist</div>



				<div class="bio"></div>



				



				</td>



				</div>



                </tr>



                </table>



						</div>



					</section>



					<section class="col2 pad_left1">



						<h2>Testimonials</h2>



						<div class="testimonials">



						<div id="testimonials">



						  <ul>



							<li>



								<div>



									<h2 class = "textfont" >"I love it. This is way better than Facebook."</h2>



								</div>



								<span><strong class="color1"><h2 class = "textfont" >Mark Zuckerberg</h2></strong> <br>



								<h2 class = "textfont" >Founder of Facebook.com</h2></span>



							</li>



							<li>



								<div>



									<h2 class = "textfont" >"OMG! I love staying in the zone! F.A.T., I love you."</h2>



								</div>



								<span><strong class="color1"><h2 class = "textfont" >Kim Kardashian</h2></strong> <br>



								<h2 class = "textfont" >TV Personality</h2></span>



							</li>



							<li>



								<div>



									<h2 class = "textfont" >"YES!"</h2>



								</div>



								<span><strong class="color1"><h2 class = "textfont" >Nima Hashemi</h2></strong> <br>



								<h2 class = "textfont" >F.A.T. Project Manager</h2></span>



                                



							</li>



						  </ul>



						</div>



						<a href="#" class="up"></a>



						<a href="#" class="down"></a>



						</div>



					</section>



				</div>



			</article>



		</div>



	</div>



	<div class="body4">



		<div class="main">



			<article id="content2">



				<div class="wrapper">



					<section class="col3">



						<h4>Why Us?</h4>



						<ul class="list1">



							<li><span>Innovative</li>



							<li><span>Creative</li>



							<li><span>Out-of-the-box</li>



						</ul>



					</section>



                    </span>



					<section class="col3 pad_left2">



						<h4>Address</h4>



						<ul class="address">



							<li><span>College:</span>UC San Diego</li>



							<li><span>City:</span>La Jolla</li>



							<li><span>Class:</span>CSE 110</li>



							<li><span> Email:</span><a href="mailto:">Fat_Diet@hotmail.com</a></li>



						</ul>



					</section>



					<section class="col3 pad_left2">



						<h4>Follow Us</h4>



						<ul id="icons">



							</br><li><a href="https://www.facebook.com/fatbydiet" target = "_blank"><img src = "../../images/fbicon.png" onMouseOver="src='../../images/fbpressed.png'" onMouseOut="src='../../images/fbicon.png'"></img>



                            <span></span></a></li>



                            </br><li><a href="https://www.twitter.com/fatbydiet" target = "_blank"><img src = "../../images/twitter.png" onMouseOver="src='../../images/twitpressed.jpg'" onMouseOut="src='../../images/twitter.png'"></img></a></li>







						</ul>



					</section>







				</div>



			</article>



<!-- content end -->



		</div>



	</div>



		<div class="main">



<!-- footer -->



			<footer>



				Website powered by Developers In Enterprise Technology®



			</footer>



<!-- footer end -->



		</div>



<script type="text/javascript"> Cufon.now(); </script>



<!----------------------------------------------------------->



<div id="dialog-overlay-login"></div>



<div id="dialog-box-login">



<div class="dialog-content-login">



    



			<style>



				form label{



				display: inline-block;



				width: 120px;



				}



			</style>



	



			<form action="login" method="POST">



				<h2 class="registration">Login</h2><br /><h2 class = "registrationform">



				<label for = "username"> Username: </label> <input name="username" required type="text" style="border: 1px solid #CCC;" /> <br />



				<label for = "password"> Password: </label> <input id="loginPwd" name="password" type="password"  style="border: 1px solid #CCC;" required /><br/>



                <a href="javascript:popup('','pswd')" style="color: #13cbcb; margin-left:133px;">Forgot your password?</a><br/>



                <br /></h2>



                	<div id="dialog-message-login"></div>



		<input type="Submit" value="Submit" class="button"/>



	</div>



			</form>



	



</div>



<!-------------------------------------------------------------->



<div id="dialog-overlay-reg"></div>



<div id="dialog-box-reg">



<div class="dialog-content-reg">



    



			<style>



				form label{



				display: inline-block;



				width: 120px;



				}



			</style>



	



			<form action="register" method="POST" onSubmit="return CheckMacroPercentagesSubmit();">



				<h2 class="registration">Registration</h2><br /><h2 class="registrationform">



				<label for = "name"> Username: </label> <input name="username" pattern="[a-zA-Z0-9]+" required type="text" style="border: 1px solid #CCC;"  /><br />



				<label for = "email"> Email: </label> <input name="email" required type="email" style="border: 1px solid #CCC;" /> (example@mail.com)<br />



				<label for = "password"> Password: </label> <input id="p1" onFocus="checkPassword(this, document.getElementById('p2'));" oninput="checkPassword(this, document.getElementById('p2'));" name="password" type="password"  style="border: 1px solid #CCC;" required /><br />



				<label for = "password"> Confirm Password: </label> <input id="p2" onFocus="checkPassword(document.getElementById('p1'), this);" oninput="checkPassword(document.getElementById('p1'), this);"  type="password" style="border: 1px solid #CCC;" required /><br />



				<label for = "weight"> Body Weight: </label> <input required min="0" name="weight" type="number" step=".1" style="border: 1px solid #CCC;" /> (lb)<br />



				<label for = "height"> Body Height: </label> <input required min="0" name="height" step=".1" type="number" style="border: 1px solid #CCC;" /> (ft.in)<br />



                <label for = "age"> Age: </label> <input required name="age" type="number" min="0" style="border: 1px solid #CCC;" /> <br />



				<label for = "Fitness level"> Choose a Fitness Level: </label> 



				<select name="Fitnesslevel">



					<option selected value="0">Sedentary</option>



					<option value="1">Moderate</option>



					<option value="2">Active</option>



				</select><br />



                <label for = "Gender"> Choose Gender: </label>



                <select name="Gender" value="">



                	<option selected value="0">Male </option>



                    <option value="1">Female </option> <br />



                </select><br />



                <label for = "calories"> Calories per Day: </label> 



                	<input name="calories" required type="number" min="0" style="border: 1px solid #CCC;" />



                    <br /><br />The result of this formula will be the number of calories you can eat every day



and maintain your current weight. You should never allow your daily caloric intake to fall below 1,200 calories. Excessive calorie restriction



could slow your metabolism, malnourish your body, and ultimately hinder your weight goals.<br /><br/>



                <input type="checkbox" name="zone" value="1" checked/> Check if you are using the "Zone" diet<br /><br/>



				<u>Macronutrient Percentages</u><br /><br/>



                <label for = "carbs"> Carbohydrates: </label> 



                	<input name="carbs" type="number" id="carbProfileInput" onchange="CheckMacroPercentagesSubmit()"  onfocus="CheckMacroPercentagesSubmit()" min="0" value="40" style="border: 1px solid #CCC;"/>%<br />



				<label for = "protein"> Protein: </label> 



                	<input name="protein" type="number" min="0" id="proteinProfileInput" onchange="CheckMacroPercentagesSubmit()"  onfocus="CheckMacroPercentagesSubmit()" value="30" style="border: 1px solid #CCC;" />%<br />



				<label for = "fat"> Fat: </label> <input name="fat" min="0" id="fatProfileInput" onchange="CheckMacroPercentagesSubmit()" onfocus="CheckMacroPercentagesSubmit()" type="number" value="30" style="border: 1px solid #CCC;" />%<br /></h2>



                <br />



                



<div id="dialog-message-reg"></div>



		<input type="Submit" value="Submit" class="button"/>



	</div>



			</form>



		



		



</div>



<!---------------------------------------------------------------------------------------->



<div id="dialog-overlay-pswd"></div>



<div id="dialog-box-pswd">



<div class="dialog-content-pswd">



    



			<style>



				form label{



				display: inline-block;



				width: 120px;



				}



			</style>



	



			<form action="forgotPwd" method="POST">



				<h2 class="registration">Forgot Password</h2><br /><h2 class = "registrationform">



				<label for = "email" style="margin-left:28px;"> Email: 



                </label> 



                	<input name="email" id="forgottenEmail" required type="email" style="border: 1px solid #CCC; margin-left:-70px;" /> (example@mail.com)<br/><br /></h2>



                		<input type="Submit" value="Submit" class="button"/>



			</form>



		<div id="dialog-message-pswd"></div>



        <a href="javascript:popup('','pswd2')"><!--<input type="Submit" value="Submit" class="button"/>--></a>







	</div>



</div>



<!---------------------------------------------------------------------------------------->



<div id="dialog-overlay-pswd2"></div>



<div id="dialog-box-pswd2">



<div class="dialog-content-pswd2">



    



			<style>



				form label{



				}



			</style>



	



			<form action="../pswd2" method="POST">



				<h2 class="registration">Forgot Password</h2><br /><h2 class = "registrationform6">



				 Don't worry! Your password has been sent to your email.<br/><br/>



                <br /></h2>



			</form>



		<div id="dialog-message-pswd2"></div>



	</div>



</div>



<!---------------------------------------------------------------------------------------->











</body>



</html>