<?php
/**
 * Created by PhpStorm.
 * User: edu-books
 * Date: 26/1/18
 * Time: 4:52 PM
 */

include ('DBConnection.php');

?>

<?php
if(strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header("Location: http://". $_SERVER['HTTP_HOST']."/");
}

if ($_POST['id'] == 'main_list'){ ?>

    <div class='animate-div'>
        <div>
            <h4 class="left-align">Select the department: </h4>
        </div>

        <div class="collection">

            <?php
            $i = 0;
            $result = mysqli_query($conn,
                "SELECT table_name, table_rows FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '"
                . $dbname ."'");

            while($table = mysqli_fetch_array($result)) {
                $table_space = str_replace('_', ' ', $table[0]);
                $i++;

                echo("<a id='department_list_". $i ."' class='collection-item' 
                    onclick='departmentList(this.id,\"". $table[0] ."\")'>"
                    . $table_space . "<span class='new badge blue'>". $table[1]
                    ."</span> <i class='material-icons right'>&#xE5CC;</i></a>");
            }
            ?>

        </div>

        <script>
            if (department_list_active.localeCompare("") !== 0)
                $("#" + department_list_active).addClass("active");
        </script>

    </div>

<?php
}

elseif ($_POST['id'] == 'table_name'){ ?>

    <div class='animate-div'>
        <div class="row center-align">
            <div class="chip hoverable pointer">
                <a class="grey-text text-darken-2" onclick="mainList()"><?php echo ($_POST['table_name']); ?></a>
            </div>
        </div>

        <div class="header-div">
            <a id="back" class="btn-floating btn-large waves-effect white tooltipped back-btn"
               data-position="bottom" data-delay="50" data-tooltip="back" onclick="mainList()">
                <i class="material-icons black-text">&#xE5CB;</i>
            </a>

            <h4 class="left-align header-text">Select the option: </h4>
        </div>

        <div class="collection">

            <?php
            $i = 0;
            $result = mysqli_query($conn, "SELECT * FROM " . $_POST['table_name']);

            while($row = mysqli_fetch_array($result)) {
                $i++;

                echo("<a id='pattern_list_". $i ."' class='collection-item' 
                    onclick='patternList(this.id, \"". $row['filename'] ."\")'>"
                    . $row['pattern'] . "<span class='new badge blue'>". $row['count'] . "</span>
                     <i class='material-icons right'>&#xE5CC;</i></a>");
            }
            ?>

        </div>

         <script>
             if (pattern_list_active.localeCompare("") !== 0)
                 $("#" + pattern_list_active).addClass("active");
         </script>

    </div>

<?php }

elseif ($_POST['id'] == 'pattern_name'){ ?>

    <div class='animate-div'>
        <div class="row center-align">
            <div class="chip hoverable pointer">
                <a class="grey-text text-darken-2" onclick="mainList()"><?php echo ($_POST['table_name']); ?></a>
            </div>
            <div class="chip hoverable pointer">
                <a class="grey-text text-darken-2" onclick='ajaxCall("table_name",
                        "<?php echo ($_POST['table_name']) ?>", "", "");'><?php
                $result = mysqli_query($conn, "SELECT pattern FROM ". $_POST['table_name']
                ." WHERE filename='". $_POST['filename'] ."'");

                $row = mysqli_fetch_array($result);
                    echo($row['pattern']);
                ?></a>
            </div>
        </div>

        <div class="header-div">
            <a id="back" class="btn-floating btn-large waves-effect white tooltipped back-btn"
               data-position="bottom" data-delay="50" data-tooltip="back" onclick='ajaxCall("table_name",
                "<?php echo ($_POST['table_name']) ?>", "", "");'>
                <i class="material-icons black-text">&#xE5CB;</i>
            </a>

            <h5 class="left-align header-text">Read the below given Samples.</h5>
        </div>
        <p> Enter the rephrased statement from given below with same meaning convey in input box.
            Don't repeat the same statement.</p>

        <div id="input_div">

            <div class="row">
                <div class="input-field col s9 l11 m11">
                    <input id="input_text" type="text">
                    <label for="input_text">Input text here</label>
                </div>

                <div class="input-field col s3 l1 m1">
                    <a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped"
                       data-position="top" data-delay="50" data-tooltip="Submit" onclick="inputPattern()">
                        <i class="material-icons">&#xE163;</i>
                    </a>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    var check = "<?php echo ($_POST['input_text']) ?>";
                    $("#input_text").keypress(function(event) {
                        if (event.which === 13) {
                            event.preventDefault();
                            inputPattern();
                        }
                    });

                    if (check.localeCompare('delete') === 0)
                        $("#delete-btn").removeClass('display-none');
                });
            </script>

        </div>

        <ul class="collection">

            <?php
            $data = array_slice(file("../pattern_dir/". $_POST['table_name'] ."/". $_POST['filename']), -8);

            $i = 1;
            foreach (array_reverse($data) as $line) {
                if ($i == 1) {
                    echo("<li class='collection-item'>" . $line .
                         "<a id='delete-btn' class='right red-text waves-effect tooltipped display-none'".
                         " data-position='bottom' data-tooltip='Delete' onclick='deletePattern()'>".
                         "<i class='material-icons'>&#xE92B;</i></a></li>");
                    $i = 0;
                }
                else{
                    echo("<li class='collection-item'>" . $line . "</li>");
                }
            }

            ?>

        </ul>

    </div>

<?php

}

elseif ($_POST['id'] == 'input_pattern'){
    $checker = false;
    $check_file = fopen("../pattern_dir/". $_POST['table_name'] ."/". $_POST['filename'],"r") or die("<script>Materialize.toast('Failed to submit. Retry!', 4000)</script>");

    while(! feof($check_file))
    {
        if(trim(fgets($check_file)) == $_POST['input_text']){
            $checker = true;
            break;
        }
    }
    fclose($check_file);

    if (!$checker) {
        $file = fopen("../pattern_dir/" . $_POST['table_name'] . "/" . $_POST['filename'], "a")
        or die("<script>Materialize.toast('Failed to submit. Retry!', 4000)</script>");
        fwrite($file, PHP_EOL . $_POST['input_text']);

        $sql = "UPDATE " . $_POST['table_name'] . " SET count=count+1 WHERE filename='" . $_POST['filename'] . "'";

        if ($conn->query($sql) === TRUE) {
            echo("<script>Materialize.toast('Successfully submitted!', 4000, 'light-green');
                          ajaxCall(\"pattern_name\", g_table_name, g_filename, \"delete\");
                          $('#delete-btn').removeClass('display-none')</script>");
        } else {
            echo("<script>Materialize.toast('Failed to submit. Retry!', 4000)</script>");
        }

        fclose($file);
    }
    else{
        echo("<script>Materialize.toast('Same statement Found. Retry with another!', 4000)</script>");
    }

}

elseif ($_POST['id'] == 'delete_pattern'){

    $filename = "../pattern_dir/" . $_POST['table_name'] . "/" . $_POST['filename'];

// Open file
    $file_handle = fopen($filename, 'r');

// Set up loop variables
    $linebreak  = false;
    $file_start = false;

// Number of bytes to look at
    $bite = 50;

// File size
    $filesize = filesize($filename);

// Put pointer to the end of the file.
    fseek($file_handle, 0, SEEK_END);

    while ($linebreak === false && $file_start === false) {
        // Get the current file position.
        $pos = ftell($file_handle);

        if ($pos < $bite) {
            // If the position is less than a bite then go to the start of the file
            rewind($file_handle);
        } else {
            // Move back $bite characters into the file
            fseek($file_handle, -$bite, SEEK_CUR);
        }

        // Read $bite characters of the file into a string.
        $string = fread($file_handle, $bite) or die ("Can't read from file " . $filename . ".");

        /* If we happen to have read to the end of the file then we need to ignore
         * the last line as this will be a new line character.
         */
        if ($pos + $bite >= $filesize) {
            $string = substr_replace($string, '', -1);
        }

        // Since we fred() forward into the file we need to back up $bite characters.
        if ($pos < $bite) {
            // If the position is less than a bite then go to the start of the file
            rewind($file_handle);
        } else {
            // Move back $bite characters into the file
            fseek($file_handle, -$bite, SEEK_CUR);
        }

        // Is there a line break in the string we read?
        if (is_integer($lb = strrpos($string, "\n"))) {
            // Set $linebreak to true so that we break out of the loop
            $linebreak = true;
            // The last line in the file is right after the linebreak
            $line_end = ftell($file_handle) + $lb + 1;
        }

        if  (ftell($file_handle) == 0) {
            // Break out of the loop if we are at the beginning of the file.
            $file_start = true;
        }
    }

    if ($linebreak === true) {
        // If we have found a line break then read the file into a string to writing without the last line.
        rewind($file_handle);
        $file_minus_lastline = fread($file_handle, $line_end);

        // Close the file
        fclose($file_handle);

        // Open the file in write mode and truncate it.
        $file_handle = fopen($filename, 'w+');
        fputs($file_handle, trim($file_minus_lastline));
        fclose($file_handle);
    } else {
        // Close the file, nothing else to do.
        fclose($file_handle);
    }

    $sql = "UPDATE " . $_POST['table_name'] . " SET count=count-1 WHERE filename='" . $_POST['filename'] . "'";

    if ($conn->query($sql) === TRUE) {
        echo("<script>Materialize.toast('Successfully deleted!', 4000, 'light-green');
                      ajaxCall(\"pattern_name\", g_table_name, g_filename, \"\");
                      $('#delete-btn').addClass('display-none')</script>");
    } else {
        echo("<script>Materialize.toast('Failed to delete. Retry!', 4000)</script>");
    }

}

elseif ($_POST['id'] == 'admin_table_detail') {

    $result = mysqli_query($conn, "SELECT filename FROM " . $_POST['table_name'] . " ORDER BY ID DESC LIMIT 1");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo($row['filename'] . " 0");
        }
    }
    else {
        $file_name['Administration'] = "ad0";
        $file_name['Civil_Engineering'] = "ce0";
        $file_name['Computer_Engineering'] = "cse0";
        $file_name['Electrical_Engineering'] = "ee0";
        $file_name['Electronic_Communication_Engineering'] = "ec0";
        $file_name['General'] = 'g01';
        $file_name['Mechanical_Engineering'] = "me0";
        $file_name['Pharmacy'] = "ph0";
        $file_name['Physiotherapy'] = "py0";
        echo ($file_name[$_POST['table_name']] ." 0");
    }

}

elseif ($_POST['id'] == 'insert_data'){

    $result = mysqli_query($conn, "SELECT * FROM " . $_POST['table_name'] ." WHERE pattern ='". $_POST['pattern_text'] ."'");

    if(mysqli_num_rows($result) >0) {
        echo "Materialize.toast('Same record found! Retry another.', 4000);";
    }
    else {

        $sql = "INSERT INTO " . $_POST['table_name'] . " (pattern, filename, count) VALUES ('" . $_POST['pattern_text']
            . "', '" . $_POST['filename'] . "', " . $_POST['count'] . ")";

        if ($conn->query($sql) === TRUE) {
            echo "Materialize.toast('Successfully Submitted!', 4000, 'light-green');";

            fopen("../pattern_dir/" . $_POST['table_name'] . "/" . $_POST['filename'], 'w')
            or die("Materialize.toast('Cannot open file.', 4000);");
        } else {
            echo "Materialize.toast('An error occurred! '" . $conn->error . ", 4000);";
        }
    }
}

elseif ($_POST['id'] == 'admin_table_list'){ ?>

    <table class="responsive-table centered striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Pattern</th>
            <th>File Name</th>
            <th>Count</th>
        </tr>
        </thead>

        <tbody>
            <?php
                $result = mysqli_query($conn, "SELECT * FROM " . $_POST['table_name']);

                while($row = mysqli_fetch_array($result)) {

                    echo("<tr>");
                        echo ("<td>". $row['id'] ."</td>");
                        echo ("<td>". $row['pattern'] ."</td>");
                        echo ("<td>". $row['filename'] ."</td>");
                        echo ("<td>". $row['count'] ."</td>");
                    echo("</tr>");
                }
            ?>

        </tbody>
    </table>
    <br /><br />

<?php
}

elseif ($_POST['id'] == 'admin_login'){
    if ($_POST['username'] == 'admin'){
        if ($_POST['password'] == 'yard@2014'){
            echo ("success");
        }
        else{
            echo ("invalid");
        }
    }
    else{
        echo ("invalid");
    }
}

elseif ($_POST['id'] == 'admin_file_list'){

    echo ("<script>$('#select-file').material_select();
            var eSelect3 = document.getElementById('select-file');
            eSelect3.onchange = function() {
            var preloader = $('#preloader-2');
            preloader.removeClass('display-none');
            
            adminAjaxCall('admin_file_data', '". $_POST['table_name'] ."', eSelect3.value, '', '');
            
            preloader.addClass('display-none');
            }</script>");

    echo ("<select id=\"select-file\" name=\"file_name\">");
    echo ("<option id=\"disabled-3\" value=\"disabled\" disabled selected>Choose your option</option>");

    $result = mysqli_query($conn, "SELECT pattern, filename FROM " . $_POST['table_name']);

    while($row = mysqli_fetch_array($result)) {

        echo ("<option value='". $row['filename'] ."'>". $row['filename'] ." - ". $row['pattern'] ."</option>");
    }
    echo ("</select><label>Select file</label>");
}

elseif ($_POST['id'] == 'admin_file_list_2'){

    echo ("<script>$('#select-que').material_select();
            var eSelect3 = document.getElementById('select-que');
            eSelect3.onchange = function() {
                var que_data = $(\"#pattern-2\");
                que_data.prop(\"disabled\", false);
                que_data.focus();
                que_data.val(eSelect3.value);
                $(\"#submit-que-btn\").removeClass(\"disabled\");
            }</script>");

    echo ("<select id=\"select-que\" name=\"file_name\">");
    echo ("<option id=\"disabled-5\" value=\"disabled\" disabled selected>Choose your option</option>");

    $result = mysqli_query($conn, "SELECT pattern FROM " . $_POST['table_name']);

    while($row = mysqli_fetch_array($result)) {

        echo ("<option value='". $row['pattern'] ."'>". $row['pattern'] ."</option>");
    }
    echo ("</select><label>Select question</label>");
}

elseif ($_POST['id'] == 'admin_file_data'){

    $file_path = "../pattern_dir/". $_POST['table_name'] ."/". $_POST['filename'];

    if (filesize($file_path) == 0){
        echo "";
    }
    else{
        $file =file($file_path) or die("<script>Materialize.toast('Failed to submit. Retry!', 4000)</script>");
        $data = array_slice($file, -20);

        foreach (array_reverse($data) as $line) {
            echo($line);
        }
    }

}

elseif ($_POST['id'] == 'update_file_data'){

    $checker = false;
    $file_path = "../pattern_dir/". $_POST['table_name'] ."/". $_POST['filename'];
    $count = count(explode("\n", $_POST['pattern_text']));

    if (trim($_POST['pattern_text']) == "")
        $count = 0;

    $old_file = fopen($file_path, "r") or die("<script>Materialize.toast('Failed to read!', 4000)</script>");
    if (filesize($file_path) == 0){
        echo "";
    }
    else{
        $previous_data = fread($old_file, filesize($file_path));
    }
    fclose($old_file);

    $myfile = fopen($file_path, "w") or die("<script>Materialize.toast('Failed to read!', 4000)</script>");
    fwrite($myfile, $_POST['pattern_text']);
    fclose($myfile);

    $sql = "UPDATE " . $_POST['table_name'] . " SET count=". $count ." WHERE filename='" . $_POST['filename'] . "'";
    if ($conn->query($sql) === TRUE) {
        $checker = true;
    } else {
        $checker = false;
    }

    if ($checker) {
        echo("success");
    }
    else{
        $old_file_data = fopen($file_path, "w") or die("<script>Materialize.toast('Failed to read!', 4000)</script>");
        fwrite($old_file_data, $previous_data);
        fclose($old_file_data);
        echo ("Failed");
    }
}

elseif ($_POST['id'] == 'update_que_data'){

    $sql = "UPDATE " . $_POST['table_name'] . " SET pattern='". $_POST['pattern_text'] ."' WHERE pattern='" . $_POST['filename'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo("success");
    }
    else{
        $old_file_data = fopen($file_path, "w") or die("<script>Materialize.toast('Failed to read!', 4000)</script>");
        fwrite($old_file_data, $previous_data);
        fclose($old_file_data);
        echo ("Failed");
    }
}
?>
