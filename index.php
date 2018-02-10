<?php
/**
 * Created by PhpStorm.
 * User: Abhishek Jain
 * Date: 25/1/18
 * Time: 3:05 PM
 */

?>

<html>
<head>
    <title>BBDC</title>

    <link rel="icon" href="image/favicon.ico" type="image/x-icon">
    <link href="css/material_icons.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/mycss.css" media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/myjs.js"></script>
</head>

<body>

<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper blue darken-2">
            <a href="/" class="brand-logo">BBDC <span class="hide-on-med-and-down">Dataset Collection</span></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">&#xE5D2;</i></a>

            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="mailto:yard.14bit@gmail.com?subject=BBDC%20Feedback">Give your feedback</a>
                </li>
                <li>
                    <a class="tooltipped" data-tooltip="This portal is under the second phrase of the Final year project by TEAM YARD. Team leader Abhishek Jain with team member - Dhruvi Rajput, Yash Shah and Ravi Patel."
                       data-position="bottom" data-delay="50">About</a>
                </li>
            </ul>

            <ul class="side-nav" id="mobile-demo">
                <li><h3 class="blue-text text-darken-4 center-align">BBDC Dataset Collection</h3></li>
                <li>
                    <a href="mailto:jabhi1210@gmail.com?subject=BBOS%20Feedback">Give your feedback</a>
                </li>
                <li><h6><br/></h6></li>
                 <div class="row">
                <div class="col s12">
                  <div class="card blue darken-3">
                    <div class="card-content white-text">
                      <p class='about'>This portal is under the second phrase of the Final year project by TEAM YARD.
                 Team leader Abhishek Jain with team member - Dhruvi Rajput, Yash Shah and Ravi Patel.</p>
                    </div>
                  </div>
                </div>
              </div>
            </ul>
        </div>
    </nav>
</div>

<!-- Modal Structure -->
<div id="intro_modal" class="modal">
    <div class="modal-content justify-text">
        <h4 class="blue-text text-darken-4">CONTRIBUTE with BB Dataset Collection</h4>
        
        <blockquote class='left-align red-text'>Note: You are redirected to official and secure site - 
            <a href='https://bbdc2.000webhostapp.com'>https://bbdc2.000webhostapp.com</a> 
            from shorten url - <a href='http://bbdc.22web.org'>http://bbdc.22web.org</a>
        </blockquote>

        <p> A BBDC is collecting the Dataset to make the machines smarter and better
            user-friendly.
        </p>
        <p> On this site, we are collecting the dataset for college admission process. Here,
            the list of department are mention. Select as per your choice. Then you are
            redirected to the statement selection, where you again have to make choice. The
            last page displays the sample statement for your understanding. Rephrase that
            with your best of knowledge and enter your response in input box below. Make sure
            you do not enter the existing statement.
        </p>
        <p> Come and join us to make this world better for all.</p>
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-light btn blue darken-4 white-text">
            Agree & Continue
            <i class="material-icons right">&#xE5CC;</i>
        </a>
    </div>
</div>


<?php include 'php_files/DBConnection.php'; ?>


<br />
<div id="list" class="container"></div>

<div id="preloader" class="container valign-wrapper preloader-container">
    <div class="preloader-wrapper big active preloader-center">
        <div class="spinner-layer spinner-blue-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>

<div id="alert-box"></div>

<div class="footer-copyright">
    <div class="container grey-text">
        <br />
        © 2018 YARD
        <span class="right">Build 2018.2.10</span>
    </div>
</div>

</body>
</html>
