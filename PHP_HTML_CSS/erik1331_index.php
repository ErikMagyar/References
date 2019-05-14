<!doctype html>
<?php
	session_start();
	require_once("erik1331_cookie.php");
	if(isset($_COOKIE["latogato"]))
	{
		vanCookie();
	} 
	else
	{
		print '<script type="text/javascript" language="javascript">';
		print "function myFunction() {";
			print 'alert("Ez a weboldal cookie-kat használ annak biztosítására, hogy Önnek a lehető legjobb élményt nyújtsa. A weboldal további használatával jóváhagyja, hogy cookie-kat használjunk. Erről többet megtudhat ezen a linken: \"http://193.6.62.96/~erik1331/hazi_feladat/erik1331_cookie_adatvedelmi.php\"");';
		print "}";
		
		print "window.myFunction();";
		print "</script>";
		nincsCookie();
	}
	osszesLatogatas();
?>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Én Kicsi Éttermem</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->

        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/animate/animate.css" />
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body>
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <header id="home" class="navbar-fixed-top">
            <div class="header_top_menu clearfix">	
                <div class="container">
				
                    <div class="row">	
					
                        <div class="col-md-5 col-md-offset-3 col-sm-12 text-right">
						<a href="http://193.6.62.96/~erik1331/hazi_feladat/erik1331_cookie_adatvedelmi.php">Tudjon meg többet a sütikről.</a>
                            <div class="call_us_text">
								<a href=""><i class="fa fa-clock-o"></i> Rendelj bármikor 24/7</a>
								<a href=""><i class="fa fa-phone"></i>0620-98-76-111</a>
							</div>
							
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="head_top_social text-right">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                                <a href=""><i class="fa fa-pinterest-p"></i></a>
                                <a href=""><i class="fa fa-youtube"></i></a>
                                <a href=""><i class="fa fa-phone"></i></a>
                                <a href=""><i class="fa fa-camera"></i></a>
                            </div>	
                        </div>

                    </div>			
                </div>
            </div>

            <!-- End navbar-collapse-->
            <div class="main_menu_bg">
                <div class="container"> 
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand our_logo" href="#"><img src="assets/images/logo.png" alt="" /></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
								
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								
									<ul class="nav navbar-nav navbar-right">
                                    
                                        <li><a href="#slider">Kezdőlap</a></li>
                                        <li><a href="#abouts">Rólunk</a></li>
                                        <li><a href="#features">Asztalfoglalás & Hírlevél</a></li>
                                        <li><a href="#portfolio">Heti menü</a></li>
                                        <li><a href="#ourPakeg">Állandó menü</a></li>
                                        <!--<li><a href="#mobaileapps">Pages</a></li>-->
                                        <!--<li><a href="#" class="booking">Table Booking</a></li>-->
										<li>    </li>
										<li><?php
											if(!isset($_COOKIE["latogato"])) {
												print "Jéé, egy új látogató";
											} else {
												if ($_SESSION["latogato_email"]=="")
												{
													print "Azonosító: ".$_SESSION["latogato_id"]."<br>";
												}
												else print "Email: ".$_SESSION["latogato_email"]."<br>";
												print "Utolsó látogatás: ".$_SESSION["latogato_utolso"]."<br>";
												print "Látogatás szám: ".$_SESSION["latogato_latogatasszam"]."<br>";
											}
										?></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>	
        </header> <!-- End Header Section -->
		
        <section id="slider" class="slider">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_slider text-center">
                            <div class="col-md-12">
                                <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                                    <h1>Én Kicsi Éttermem</h1>
									<hr><hr>
                                    <p>Hagyományos és modern ízek fenomenális szakácsok kezei alól, ott ahol nem csak önmagadra lelhetsz hanem megismerheted a közös munka sikerének és gyönyörének ízét
									 egyesülve a tányér és az étel harmóniájában, amit Mi garantálunk neked.</p>
                                    <!--<button href="" class="btn-lg">Click here</button>-->
									<hr><hr>
                                </div>
                            </div>	
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="abouts" class="abouts">
            <div class="container">
                <div class="row">
                    <div class="abouts_content">
                        <div class="col-md-6">
                            <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                                <img src="assets/images/ab.png" alt="" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                                <h4>Rólunk</h4>
                                <h3>BEMUTATKOZÁS</h3>
                                <p>"A legújabb és legmenőbb pécsi étterm" - Egy szakértő</p>

                                <p>Éhes vagy, esetleg nem? Nem számít, gyere Hozzánk! Nálunk nemrégiben nyílt, teljesen felújított(2006), korszerű étkező helyiség várja a kedves vendégeket.
								Barátságos személyzettel - kivéve a szakácsot, ő egy kicsit morcos - immár 10. napja várunk rátok az Étterem utcában. Folyamatosan bővülő
								ételekkel és italokkal, minden nap 06:00 és 23:00 között.</p>
								
								<p>Mi az árakkal mosunk fel. Olyan alacsonyak, hogy a padlót súrolják.</p>
								<p>Magyar Erik - Üzletvezető</p>

                                <a href="" class="btn btn-primary">kattints ide</a>
                            </div>
                        </div>
                    </div>
                </div>
		    </div>
        </section>

		<section id="features" class="features">
			<div class="container">
				<div class="col-md-4">
					<div class="single_widget wow fadeIn" data-wow-duration="5s">
						<h3>Asztalfoglalás</h3>

						<div class="single_widget_form text-left">
							<form action="erik1331_foglalas.php" method="post" id="formid">
								<div class="form-group">
									<input type="email" class="form-control" name="email" placeholder="Email" required="">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="name" placeholder="Név" required="">
								</div>
								<div class="form-group">
									<input type="number" class="form-control" name="people" placeholder="Fők száma">
								</div>
								<div class="form-group">
									<?php
										$dat = getdate();
										//var_dump($dat);
										$datt = $dat["year"]."-".$dat["mon"]."-".$dat["mday"];
										$timm = ($dat["hours"]+1).":".$dat["minutes"].":".$dat["seconds"];
										//print "$timm";
									?>
									<input type="date" name="rdate" value=<?php print "$datt"?> max="2100-12-31" min=<?php print "$datt"?> >
									<input type="time" name="rtime" value=<?php print "$timm"?> ><!--min=<?php //print "$timm"?>-->
								</div>
								<input type="submit" value="Foglalás" name="foglalOke" class="btn btn-primary">
							</form>	
							<?php
								if (isset($_SESSION["error_contact"]))
								{
									if (!in_array(true, $_SESSION["error_contact"]))
									{
										print '<br>';
										print '<font size=4 color="green"><b>Az asztalfoglalási kérelme rögzítve lett.</b></font>';
									}
									else {
										print '<br>';
										print '<font size=4 color="red"><b>HOPPÁ! Az asztalfoglalási kérelem nem került rögzítésre. Kérjük próbálja újra.</b></font>';
									}
									unset($_SESSION["error_contact"]);
								}
								//var_dump($_SESSION["error_contact"]);
							?>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="single_widget wow fadeIn" data-wow-duration="5s">
						<h3>Hírlevél</h3>

						<div class="single_widget_form text-left">
							<form action="erik1331_hirlevel.php" method="post" id="formid">
								<div class="form-group">
									<input type="email" class="form-control" name="hiremail" placeholder="Email" required="">
								</div>
								<input type="submit" value="Feliratkozás" name="hirlevelOke" class="btn btn-primary">
								<input type="submit" value="Leiratkozás" name="hirlevelleOke" class="btn btn-primary">
							</form>	
							<?php
								if (isset($_SESSION["error_hirlevel"]))
								{
									if (!in_array(true, $_SESSION["error_hirlevel"]))
									{
										print '<br>';
										print '<font size=3 color="green"><b>Sikeresen feliratkozott.</b></font>';
									}
									else {
										print '<br>';
										print '<font size=3 color="red"><b>HOPPÁ! Nem sikerült feliratkozni.</b></font>';
									}
									unset($_SESSION["error_hirlevel"]);
								}
								if (isset($_SESSION["error_hirlevel_le"]))
								{
									if (!in_array(true, $_SESSION["error_hirlevel_le"]))
									{
										print '<br>';
										print '<font size=3 color="green"><b>A leiratkozó linket elküldtük.</b></font>';
									}
									else {
										print '<br>';
										print '<font size=3 color="red"><b>HOPPÁ! Ez nem sikerült.</b></font>';
									}
									unset($_SESSION["error_hirlevel_le"]);
								}
								//var_dump($_SESSION["error_contact"]);
							?>
						</div>
					</div>
				</div>
			
				<div class="col-md-4">
					<div class="single_widget wow fadeIn" data-wow-duration="5s">
						<h3>Napi Menü</h3>
						<div class="single_widget_form text-left">
						
							<?php
								mb_internal_encoding("utf-8");
								require_once("erik1331_functions.php");
								$connect = dbconnect();
							
								if ($dat["weekday"] == "Monday") $napid=1;
								else if ($dat["weekday"] == "Tuesday") $napid=2;
								else if ($dat["weekday"] == "Wednesday") $napid=3;
								else if ($dat["weekday"] == "Thursday") $napid=4;
								else if ($dat["weekday"] == "Friday") $napid=5;
								else if ($dat["weekday"] == "Saturday") $napid=6;
								else $napid=7;
								print '<font color="green"><b>';
								$sql = 'SELECT * FROM hazi_menu WHERE id=\''. $napid .'\'';
								$query = pg_query($connect, $sql);
								$napok = pg_fetch_all($query);
								//var_dump($napok);
								print "<h4><u>A menü</u></h4>";
								print "<pre>".$napok[0]["amenu"]."</pre>";
								print "<br>";
								print "<h4><u>B menü</u></h4>";
								print "<pre>".$napok[0]["bmenu"]."</pre>";
								print "<br>";
								print "<h4>".$napok[0]["ar"]." Ft</h4>";
								print '</font></b>';
							?>
						
						</div>
					</div>
				</div>
			</div>
		</section>

        <!--<section id="features" class="features">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_features_content_area  wow fadeIn" data-wow-duration="3s">
                            <div class="col-md-12">
                                <div class="main_features_content text-left">
                                    <div class="col-md-6">
                                        <div class="single_features_text">
                                            <h4>Special Recipes</h4>
                                            <h3>Taste of Precious</h3>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stan</p>
                                            <p>dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettingdard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>

                                            <a href="" class="btn btn-primary">click here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                        <div class="col-md-12">
                            <div class="head_title text-center">
                                <h4>Heti menü</h4>
                                <h3>Hetente változó ízvilág, azoknak akik mindig valami újra vágynak.</h3>
                            </div>
							<?php

							?>
                            <div class="main_portfolio_content">
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
									<?php
										mb_internal_encoding("utf-8");
										require_once("erik1331_functions.php");
										$connect = dbconnect();
										$sql = 'SELECT * FROM hazi_menu WHERE id=1';
										$query = pg_query($connect, $sql);
										$napok = pg_fetch_all($query);
									
										if ($dat["weekday"] == "Monday") print '<table border=10 bordercolor="red"><tr><td>';
									?>
										<img src="assets/images/p1.png" alt="" />
										<div class="portfolio_images_overlay text-center">
											<h6>Hétfő</h6>
											<font color="white">
												"A" menü<br>
												<?php print $napok[0]["amenu"];?><br><br>
												"B" menü<br>
												<?php print $napok[0]["bmenu"];?><br>
											</font>
											<p class="product_price"><?php print $napok[0]["ar"];?> Ft</p>
											<!--<a href="" class="btn btn-primary">Click here</a>-->
										</div>
									<?php
										if ($dat["weekday"] == "Monday") print '</td></tr></table>';
									?>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
									<?php
										$sql = 'SELECT * FROM hazi_menu WHERE id=2';
										$query = pg_query($connect, $sql);
										$napok = pg_fetch_all($query);
										if ($dat["weekday"] == "Tuesday") print '<table border=10 bordercolor="red"><tr><td>';
									?>
										<img src="assets/images/p2.png" alt="" />
										<div class="portfolio_images_overlay text-center">
											<h6>Kedd</h6>
											<font color="white">
												"A" menü<br>
												<?php print $napok[0]["amenu"];?><br><br>
												"B" menü<br>
												<?php print $napok[0]["bmenu"];?><br>
											</font>
											<p class="product_price"><?php print $napok[0]["ar"];?> Ft</p>
										</div>
									<?php
										if ($dat["weekday"] == "Tuesday") print '</td></tr></table>';
									?>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
									<?php
										$sql = 'SELECT * FROM hazi_menu WHERE id=3';
										$query = pg_query($connect, $sql);
										$napok = pg_fetch_all($query);
									
										if ($dat["weekday"] == "Wednesday") print '<table border=10 bordercolor="red"><tr><td>';
									?>
										<img src="assets/images/p3.png" alt="" />
										<div class="portfolio_images_overlay text-center">
											<h6>Szerda</h6>
											<font color="white">
												"A" menü<br>
												<?php print $napok[0]["amenu"];?><br><br>
												"B" menü<br>
												<?php print $napok[0]["bmenu"];?><br>
											</font>
											<p class="product_price"><?php print $napok[0]["ar"];?> Ft</p>
										</div>	
									<?php
										if ($dat["weekday"] == "Wednesday") print '</td></tr></table>';
									?>									
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
									<?php
										$sql = 'SELECT * FROM hazi_menu WHERE id=4';
										$query = pg_query($connect, $sql);
										$napok = pg_fetch_all($query);
										
										if ($dat["weekday"] == "Thursday") print '<table border=10 bordercolor="red"><tr><td>';
									?>
										<img src="assets/images/p4.png" alt="" />
										<div class="portfolio_images_overlay text-center">
											<h6>Csütörtök</h6>
											<font color="white">
												"A" menü<br>
												<?php print $napok[0]["amenu"];?><br><br>
												"B" menü<br>
												<?php print $napok[0]["bmenu"];?><br>
											</font>
											<p class="product_price"><?php print $napok[0]["ar"];?> Ft</p>
										</div>	
									<?php
										if ($dat["weekday"] == "Thursday") print '</td></tr></table>';
									?>									
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
									<?php
										$sql = 'SELECT * FROM hazi_menu WHERE id=5';
										$query = pg_query($connect, $sql);
										$napok = pg_fetch_all($query);
									
										if ($dat["weekday"] == "Friday") print '<table border=10 bordercolor="red"><tr><td>';
									?>
										<img src="assets/images/p5.png" alt="" />
										<div class="portfolio_images_overlay text-center">
											<h6>Péntek</h6>
											<font color="white">
												"A" menü<br>
												<?php print $napok[0]["amenu"];?><br><br>
												"B" menü<br>
												<?php print $napok[0]["bmenu"];?><br>
											</font>
											<p class="product_price"><?php print $napok[0]["ar"];?> Ft</p>
										</div>
									<?php
										if ($dat["weekday"] == "Friday") print '</td></tr></table>';
									?>										
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
									<?php
										$sql = 'SELECT * FROM hazi_menu WHERE id=6';
										$query = pg_query($connect, $sql);
										$napok = pg_fetch_all($query);
									
										if ($dat["weekday"] == "Saturday") print '<table border=10 bordercolor="red"><tr><td>';
									?>
										<img src="assets/images/p6.png" alt="" />
										<div class="portfolio_images_overlay text-center">
											<h6>Szombat</h6>
											<font color="white">
												"A" menü<br>
												<?php print $napok[0]["amenu"];?><br><br>
												"B" menü<br>
												<?php print $napok[0]["bmenu"];?><br>
											</font>
											<p class="product_price"><?php print $napok[0]["ar"];?> Ft</p>
										</div>	
									<?php
										if ($dat["weekday"] == "Saturday") print '</td></tr></table>';
									?>									
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
									<?php
										$sql = 'SELECT * FROM hazi_menu WHERE id=7';
										$query = pg_query($connect, $sql);
										$napok = pg_fetch_all($query);
									
										if ($dat["weekday"] == "Sunday") print '<table border=10 bordercolor="red"><tr><td>';
									?>
										<img src="assets/images/p7.png" alt="" />
										<div class="portfolio_images_overlay text-center">
											<h6>Vasárnap</h6>
											<font color="white">
												"A" menü<br>
												<?php print $napok[0]["amenu"];?><br><br>
												"B" menü<br>
												<?php print $napok[0]["bmenu"];?><br>
											</font>
											<p class="product_price"><?php print $napok[0]["ar"];?> Ft</p>
										</div>
									<?php
										if ($dat["weekday"] == "Sunday") print '</td></tr></table>';
									?>										
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="ourPakeg" class="ourPakeg">
            <div class="container">
                <div class="main_pakeg_content">
                    <div class="row">
                        <div class="head_title text-center">
                            <h4>Állandó menü</h4>
                            <h3>Ebből sosem elég!</h3>
                        </div>

                        <div class="single_pakeg_one text-right wow rotateInDownRight">
                            <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>Italok</h4>
                                    </div>

                                    <ul>
                                        <li> Száraz Rose..............................................................500 Ft </li>
                                        <li> Édes Rose................................................................600 Ft </li>
                                        <li> Száraz Vörösbor..........................................................400 Ft </li>
                                        <li> Édes Vörösbor............................................................500 Ft </li>
                                        <li> Száraz Fehérbor..........................................................700 Ft </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single_pakeg_two text-left wow rotateInDownLeft">
                            <div class="col-md-6 col-sm-8">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>Főételek </h4>
                                    </div>
                                    <ul>
                                        <li> Sárgaborsó főzelék........................................................500 Ft </li>
                                        <li> Rakott káposzta...........................................................500 Ft </li>
                                        <li> Korhely halászlé..........................................................500 Ft </li>
                                        <li> Zsályás borjúborda........................................................500 Ft </li>
                                        <li> Gombás rizottó............................................................500 Ft </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single_pakeg_three text-left wow rotateInDownRight">
                            <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>Desszertek</h4>
                                    </div>

                                    <ul>
                                        <li> Mézes puszedli..............................................................500 Ft </li>
                                        <li> Almás pite..................................................................500 Ft </li>
                                        <li> Kókuszos sportszelet.....................................................500 Ft </li>
                                        <li> Krémes......................................................................500 Ft </li>
                                        <li> Citromszelet................................................................500 Ft </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--<section id="mobaileapps" class="mobailapps">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_mobail_apps_content wow zoomIn">
                            <div class="col-md-5 col-sm-12 text-center">
                                <img src="assets/images/iphone.png" alt="" />
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="single_monail_apps_text">
                                    <h4> Happy to Announce </h4>
                                    <h1>Mobile App <span>is Available in every OS platform.</span></h1>

                                    <a href=""><img src="assets/images/google.png" alt="" /></a>
                                    <a href=""><img src="assets/images/apps.png" alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

<!--<div id="map"></div>--><section id="footer_widget" class="footer_widget">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1553.352484859385!2d18.208144101480777!3d46.07585480286233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1shu!2shu!4v1543748408471" width="100%"height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
		
        
            <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                        <div class="col-md-4">
                            <div class="single_widget wow fadeIn" data-wow-duration="2s">
                                <h3>Elérhetőségek</h3>

                                <div class="single_widget_info">
                                    <p>7624, Pécs, Étterem utca 7.

                                        <span></span>
                                        <span class="phone_email">Telefon: 0620 98 76 111</span>
                                        <span>Email: eke@eke.hu</span></p>
                                </div>

                                <div class="footer_socail_icon">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                    <a href=""><i class="fa fa-pinterest-p"></i></a>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                    <a href=""><i class="fa fa-phone"></i></a>
                                    <a href=""><i class="fa fa-camera"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="single_widget wow fadeIn" data-wow-duration="4s">
                                <h3>Nyitvatartás</h3>

                                <div class="single_widget_info">
                                    <p><span class="date_day">Hétfőtől Péntekig</span>
                                        <span>6:00-tól 23:00-ig</span>

                                        <span class="date_day">Szombat & Vasárnap</span>
                                        <span>6:00-tól 23:00-ig</span>
                                </div>
                            </div>
                        </div>

                       <!-- <div class="col-md-4">
                            <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                <h3>Take it easy with location</h3>

                                <div class="single_widget_form text-left">
                                    <form action="#" id="formid">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="first name" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Subject">
                                        </div> <!-- end of form-group 

                                        <div class="form-group">
                                            <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
                                        </div>

                                        <input type="submit" value="click here" class="btn btn-primary">
                                    </form>	
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </section>

        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copyright wow zoomIn" data-wow-duration="3s">
							<p>Made with <i class="fa fa-heart"></i> by <a href="http://bootstrapthemes.co">Bootstrap Themes</a>2016. All Rights Reserved</p>
						</div>
                    </div>
                </div>
            </div>
        </footer>
		
		<div class="scrollup">
			<a href="#"><i class="fa fa-chevron-up"></i></a>
		</div>		


        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="assets/js/wow/wow.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
		
		<script src='https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js'></script>
		<script src="assets/script.js"></script>
		
		<!-- Cookie Consent by https://TermsFeed.com 
		<script type="text/javascript" src="//termsfeed.com/cookie-consent/releases/2.0.0/cookie-consent.js"></script>
		<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function () {
		cookieconsent.run({"notice_banner_type":"headline","consent_type":"express","palette":"dark"});
		});
		</script>
		<noscript>By <a href="https://termsfeed.com/">TermsFeed</a></noscript>
		<!-- End Cookie Consent --> 
    </body>
</html>
