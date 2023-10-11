<?php
	include "header.inc";
	include "menu.inc";
	include "function.php";

if(!isset($_SESSION['loggedin'])){
   header("Location:login.php");
}
?>
<div id="mainbody">
    <form method="post" action="manage.php" novalidate="novalidate">
    <fieldset>
        <legend>Search Field</legend>
            <label for="GivenName">First Name:</label>
            <input type="text" name="first_name" id="GivenName"  pattern="[a-zA-Z -]{1,30}" title="Must contain 30 or less characters and only use alpha characters, hyphens or spaces"/>
            <br>
            <label for="FamilyName">Last Name:</label>
            <input type="text" name="last_name" id="FamilyName"  pattern="[a-zA-Z -]{1,30}" title="Must contain 30 or less characters and only use alpha characters, hyphens or spaces" maxlength="30"/>
            <br>
            <label for="StudentID">Student Number:</label>
            <input type="text" name="student_number" id="StudentID"/>
            <br>
            <input type="submit" value="Browse"/>
    </fieldset>
</form>
    <form method="post" action="manage.php" novalidate="novalidate">
        <fieldset>
        <legend>Advanced search</legend>
        <input type="submit" name="advanced_query1" value="Students having 100% at their first attempts"/>
        <input type="submit" name ="advanced_query2" value ="Students having less than 50% at their second attempts"/>
        </fieldset>
    </form>
    <form method="post" action="manage.php" novalidate="novalidate">
        <fieldset>
            <legend>Edit tables</legend>
            <input type="submit" name="delete" value = "Delete records of a student"/>
            <input type="submit" name="modify" value= "Change the score for a quiz attempt"/>
        </fieldset>
    </form>

            <?php
            function search_record ($first_name, $last_name, $student_number, $connection, $table) {
                if (!$first_name == null) {
                    $query1 = " first_name LIKE '$first_name%'"; } else { $query1 = "";}
                if (!$last_name == null and !$first_name == null){
                    $query2 = " AND last_name LIKE '$last_name%'";
                } elseif (!$last_name == null){
                    $query2 = " last_name LIKE '$last_name%'";
                } elseif ($last_name == null) {
                    $query2 = "";
                }
                if (!$student_number == null and (!$first_name == null or !$last_name == null)) {
                    $query3 = " AND student_number LIKE '$student_number%'";
                } elseif (!$student_number == null) {
                    $query3 = " student_number LIKE '$student_number%'";
                } elseif ($student_number == null) {
                    $query3 ="";
                }
                $query = "SELECT * FROM $table WHERE $query1 $query2 $query3";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "<p>There is no matched records in the database</p>";
                } else {
                    print_result($result);
                }
                mysqli_free_result($result);
            }
            function special_display_1 ($connection, $table){
                $query = "SELECT * FROM $table WHERE attempt = 1 AND score = 100";
                $result = mysqli_query($connection, $query);
                print_result($result);
                mysqli_free_result($result);
            }

            function special_display_2 ($connection, $table) {
                $query = "SELECT * FROM $table WHERE attempt = 2 AND score < 50";
                $result = mysqli_query($connection, $query);
                print_result($result);
                mysqli_free_result($result);
            }

            require_once "settings.php";
            //establish a connection with the database
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if (!$conn) {
                echo "<p>Database connection failure</p>";
            } else {
                $sql_table="attempts";

                if (isset($_POST["first_name"])){
                    $f_name = $_POST["first_name"];
                }
                if (isset($_POST["last_name"])){
                   $l_name = $_POST["last_name"];
                }
                if (isset($_POST["student_number"])){
                    $stu_num = $_POST ["student_number"];
                }
                if (isset($_POST["advanced_query1"])) {
                    $advanced_search1 = $_POST["advanced_query1"];
                }
                if (isset($_POST["advanced_query2"])) {
                    $advanced_search2 = $_POST["advanced_query2"];;
                }
                if (isset($_POST["delete"])) {
                    $delete_form = $_POST["delete"];
                }
                if (isset($_POST["modify"])) {
                    $change_score_form = $_POST["modify"];
                }

                if (isset($delete_form)){
                    echo "<form method='post' action='pop_up.php' novalidate = 'novalidate'>
                            <fieldset>
                            <legend>Delete records</legend>
                            <label for ='id'>Student ID:</label>
                            <input type='text' name='deleted_id' id ='id' pattern='(^[0-9]{7}$)|(^[0-9]{10}$)' title='Must have either 7 or 10 characters' required='required'/>
                            <input type='submit' name='delete' value ='Delete records of this ID'/>
                            </fieldset>
                            </form>
                    ";
                }
                if (isset($change_score_form)){
                    echo "<form method='post' action='pop_up.php' novalidate = 'novalidate'>
                            <fieldset>
                            <legend>Score Change</legend>
                            <label for ='id'>Student ID:</label>
                            <input type='text' name='changed_id' id ='id' required='required'/>
                            <br>
                            <label for ='attempt'>Attempt:</label>
                            <input type='text' name='changed_attempt' id ='attempt' required='required' pattern='(^[1-2]{1}$)' title='Must be 1 or 2'/> 
                            <br>  
                            <label for='score' >Change the attempt's score to:</label>
                            <input type = 'text' name ='changed_score' id='score' required='required'/>
                            <br>
                            <input type ='submit' name='modify' value = 'Modify score'/>                              
                            </fieldset>
                            </form>";
                }
                if ((!isset($f_name)) and (!isset($l_name)) and (!isset($stu_num)) and (!isset($advanced_search1)) and (!isset($advanced_search2))) {
                    $query = "select * FROM attempts";
                    $result = mysqli_query($conn, $query);
                    if (!$result){
                        echo "<p>Something is wrong with ", $query, "</p>";
                    } else {
                        print_result($result);
                    }
                    mysqli_free_result($result);
                } elseif ((isset($f_name)) or (isset($l_name)) or (isset($stu_num))) {
                    search_record($f_name, $l_name, $stu_num, $conn, $sql_table);
                }

                if (isset($_POST["advanced_query1"])){
                    special_display_1($conn, $sql_table);
                }
                if (isset($_POST["advanced_query2"])){
                    special_display_2($conn, $sql_table);
                }


            }
            ?>
</div>
<?php
    include "footer.inc";
?>
