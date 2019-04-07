<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>



    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/alpha.png" height="50px" width="80px"/>

                    </a>

                </div>

                <span class="logout-spn" >
                  <a href="#" style="color:#fff;">LOGOUT</a>

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">



                    <li class="active-link">
                        <a href="index.php" ><i class="fa fa-desktop "></i>Dashboard <span class="badge"></span></a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMIN DASHBOARD</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome Sir ! </strong> Have a nice day.
                        </div>

                    </div>
                    </div>
                  <!-- /. ROW  -->
                      <h1>Select Vehicle</h1>
                            <div class="row text-center pad-top">
                            <script>
                                var i=0;
                                for (var i = 0; i < 10; i++) {
                                  var str="<div class='col-lg-2 col-md-2 col-sm-2 col-xs-6'><div class='div-square'><a href='http://localhost/Project1/begining/speed spline.php'><img src=assets/img/truck.jpg height=70px width=100px><h4>"+"DL 1Y A355"+(i+1)+"</h4></a></div></div>";
                                  document.write(str);

                                }
                            </script>
<!--
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-circle-o-notch fa-5x"></i>
                      <h4>Check Data</h4>
                      </a>
                      </div>
                    </div>  -->
                      <!--
                                       <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                          <div class="div-square">
                                               <a href="setting.php" >
                     <i class="fa fa-gear fa-5x"></i>
                                          <h4>Settings</h4>
                                          </a>
                                          </div>


                                      </div>  -->
                                        <!--    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                          <div class="div-square">
                                               <a href="blank.html" >
                     <i class="fa fa-user fa-5x"></i>
                                          <h4>Register car</h4>
                                          </a>
                                          </div>


                                      </div>  -->

                  </div>
                  </div>
                 <!-- /. ROW  -->

                 <!-- /. ROW  -->

                  <!-- /. ROW  -->
                 <!-- /. ROW  -->
				  <div class="row">
                    <div class="col-lg-12 ">
					<br/>
                        <div class="alert alert-danger">
                             <strong>Want More Icons Free ? </strong> Checkout fontawesome website and use any icon <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">Click Here</a>.
                        </div>

                    </div>
                    </div>
                  <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">


            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
                </div>
            </div>
        </div>


     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
