<?php
/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 27/1/18
 * Time: 6:36 PM
 */

include "php_files/DBConnection.php";

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
    <script type="text/javascript" src="js/adminJS.js"></script>

</head>

<body>

    <nav class="nav-extended blue darken-2">
        <div class="nav-wrapper">
            <a href="https://bbdc2.000webhostapp.com/admin" class="brand-logo">BBDC<span class="hide-on-med-and-down"> ADMIN PANEL</span></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">&#xE5D2;</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="/">Go to Dataset collection</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><h3 class="blue-text text-darken-4 center-align">BBDC Admin Panel</h3></li>
                <li><a href="/">Go to Dataset collection</a></li>
            </ul>
        </div>

        <div class="nav-content">
            <ul class="tabs tabs-transparent">
                <li class="tab"><a class="active" href="#add_ques">Add new Question</a></li>
                <li class="tab"><a href="#edit_ques">Edit question title</a></li>
                <li class="tab"><a href="#edit_file">Edit file data</a></li>
            </ul>
        </div>
    </nav>

    <div id="admin_modal" class="modal">

        <div class="modal-content">
            <h4>Login to admin panel</h4>

            <div id="check-login" class="row row-admin red-text"></div>

            <div class="row row-admin">
                <div class="input-field col l6 m6 s12">
                    <input id="username" type="text" class="validate" autofocus>
                    <label for="username">Enter admin username</label>
                </div>

                <div class="input-field col l6 m6 s12">
                    <input id="password" type="password" class="validate">
                    <label for="password">Enter password</label>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <a class="waves-effect waves-light btn blue darken-4 white-text" onclick="logIN()">
                Login
                <i class="material-icons right">&#xE5CC;</i>
            </a>
        </div>

    </div>


    <?php
    $result = mysqli_query($conn, "show tables FROM " . $dbname);
    $echo_option = "";

    while($table = mysqli_fetch_array($result)) {
        $table_space = str_replace('_', ' ', $table[0]);

        $echo_option .= "<option value='". $table[0] ."'>". $table_space ."</option>";
    }
    ?>


    <div id="add_ques" class="col s12">
        <br />

        <div id="main_container" class="container display-none">

            <div class="row">
                <br /> <h4>Add new question</h4>
                <h6 id="note" class="red-text">First select the department. <br /></h6>
            </div>

            <div class="row">
                <div class="input-field col l4 m6 s12">
                    <select id="select-table" name="table_name">
                        <option id="disabled" value="disabled" disabled selected>Choose your option</option>
                        <?php echo($echo_option); ?>
                    </select>
                    <label>Select department</label>
                </div>
            </div>

            <div id="list"></div>

            <div class="row">
                <div class="input-field col l6 m6 s12">
                    <input id="pattern" type="text" class="validate" disabled>
                    <label for="pattern">Enter Question Pattern</label>
                </div>

                <div class="input-field col l4 m3 s8">
                    <input id="filename" type="text" class="validate" disabled>
                    <label for="filename">File Name</label>
                </div>

                <div class="input-field col l2 m3 s4">
                    <input id="count" type="number" class="validate" disabled>
                    <label for="count">Count</label>
                </div>
            </div>

            <div class="row row-admin center-align">
                <br />
                <a id="submit-btn" class="btn btn-large blue darken-4 disabled" onclick="insertData()">Submit</a>

                <div id="preloader" class="preloader-wrapper active preloader-left display-none">
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

        </div>

    </div>

    <div id="edit_file" class="col s12">
        <br />

        <div id="edit_file_container" class="container display-none">

            <div class="row">
                <br /> <h4>Edit File</h4>
                <h6 id="note-2" class="red-text">First select the department. <br /></h6>
            </div>

            <div class="row">
                <div class="input-field col l4 m6 s12">
                    <select id="select-table-2" name="table_name_2">
                        <option id="disabled-2" value="disabled" disabled selected>Choose your option</option>
                        <?php echo($echo_option); ?>
                    </select>
                    <label>Select department</label>
                </div>

                <div id="list-file" class="input-field col l4 m6 s12">
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 m6 s12">
                    <textarea id="file_data" class="materialize-textarea" disabled></textarea>
                    <label for="file_data">File Contain:</label>
                </div>
            </div>

            <div class="row row-admin center-align">
                <br />
                <a id="submit-file-btn" class="btn btn-large blue darken-4 disabled" onclick="alertModal()">Update</a>

                <div id="preloader-2" class="preloader-wrapper active preloader-left display-none">
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

            <div id="alert_modal" class="modal">

                <div class="modal-content">
                    <h4>Are you sure to update?</h4>

                    <div id="file-alert-password" class="red-text"></div>

                    <div class="row row-admin">
                        <div class="input-field col s12">
                            <input id="password-2" type="password" class="validate" onchange="filePassword(this.value)">
                            <label for="password-2">Enter password</label>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <a id="yes" class="waves-effect waves-light btn red white-text disabled" onclick="updateFile('yes')">YES</a>
                    <a id="no" class="waves-effect waves-light btn green white-text" onclick="updateFile('no')">NO</a>
                </div>

            </div>

        </div>

    </div>

    <div id="edit_ques" class="col s12">
        <br />

        <div id="edit_que_container" class="container display-none">

            <div class="row">
                <br /> <h4>Edit question tile</h4>
                <h6 id="note-3" class="red-text">First select the department. <br /></h6>
            </div>

            <div class="row">
                <div class="input-field col l4 m6 s12">
                    <select id="select-table-3" name="table_name_2">
                        <option id="disabled-4" value="disabled" disabled selected>Choose your option</option>
                        <?php echo($echo_option); ?>
                    </select>
                    <label>Select department</label>
                </div>

                <div id="list-file-2" class="input-field col l4 m6 s12">
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 m6 s12">
                    <input id="pattern-2" type="text" class="validate" disabled>
                    <label for="pattern-2">Edit Question Pattern</label>
                </div>
            </div>

            <div class="row center-align">
                <br />
                <a id="submit-que-btn" class="btn btn-large blue darken-4 disabled" onclick="alertModal2()">Update</a>

                <div id="preloader-3" class="preloader-wrapper active preloader-left display-none">
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

            <div id="alert_modal_2" class="modal">

                <div class="modal-content">
                    <h4>Are you sure to update?</h4>

                    <div id="que-alert-password" class="red-text"></div>

                    <div class="row row-admin">
                        <div class="input-field col s12">
                            <input id="password-3" type="password" class="validate" onchange="quePassword(this.value)">
                            <label for="password-3">Enter password</label>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <a id="yes-2" class="waves-effect waves-light btn red white-text disabled" onclick="updateQue('yes')">YES</a>
                    <a id="no-2" class="waves-effect waves-light btn green white-text" onclick="updateQue('no')">NO</a>
                </div>

            </div>

        </div>

    </div>

    <div id="alert-box"></div>

<div class="footer-copyright">
    <div class="container grey-text">
        <br />
        © 2018 YARD
        <span class="right">Build 2018.2.4-2</span>
    </div>
</div>

</body>

</html>
