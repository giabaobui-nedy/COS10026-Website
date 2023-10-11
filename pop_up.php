
<?php
include "header.inc";
require_once "function.php";
?>
<div id="mainbody">
<?php
    function delete_records ($student_id, $conn, $table) {
        //print the deleted records for supervisor first
        $select_query = "SELECT * FROM $table WHERE student_number = '$student_id'";
        $select_result = mysqli_query($conn, $select_query);
        if (mysqli_num_rows($select_result) == 0){
            echo "<p>There is no matched records in the database. Please enter again <a href='manage.php'>here</a>.</p>";
        } else {
            print_result($select_result);
            mysqli_free_result($select_result);
            $delete_query = "DELETE FROM $table WHERE student_number = '$student_id'";
            $delete_result = mysqli_query($conn, $delete_query);
            if (!$delete_result) {
                echo "<p>Something is wrong with ", $delete_query, "</p>";
            } else {
                echo "<p>Successfully deleted records of $student_id";
            }
        }
    }

    function change_score ($student_id, $attempt, $new_score, $connection, $table){
        $select_query = "SELECT * FROM $table WHERE  student_number = $student_id and attempt = $attempt";
        $select_result = mysqli_query($connection, $select_query);
        if (!$select_result) {
            echo "<p>Encounter errors when querying the database</p>";
        } elseif (mysqli_num_rows($select_result) == 0) {
            echo "<p>There is no matched records in the database. Please enter again <a href='manage.php'>here</a>.</p>";
        } else {
            $update_query = "UPDATE $table SET score = $new_score WHERE student_number = $student_id AND attempt = $attempt";
            $update_result = mysqli_query($connection, $update_query);
            if (!$update_result) {
                echo "<p>Something is wrong with ", $update_query, "</p>";
            } else {
                if ($attempt == 1) {
                    $attempt_in_word = 'first';
                } else {
                    $attempt_in_word = 'second';
                }
                echo "<p>Successfully update the score of $student_id on their $attempt_in_word attempt.</p>";
                mysqli_free_result($select_result);
                $query = "SELECT * FROM $table WHERE  student_number = $student_id and attempt = $attempt";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    print_result($result);
                } else {
                    echo "Cannot show the modified result due to internal error";
                }
                mysqli_free_result($result);
            }
        }
    }

    require("settings.php");
    //establish a connection with the database
    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );

    $sql_table="attempts";

    if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {
        if (isset($_POST["delete"])) {
            $error_with_delete = "";
            if ($_POST["deleted_id"] == "") {
                $error_with_delete .= "You must enter a student ID. ";
            } else {
                $id_pattern = "/(^[0-9]{7}$)|(^[0-9]{10}$)/";
                if (preg_match($id_pattern, $_POST["deleted_id"])) {
                    $deleted_id = $_POST["deleted_id"];
                    $deleted_id = sanitize_data($deleted_id);

                } else {
                    $error_with_delete .= "The student ID number must have either 7 or 10 characters. ";
                }
            }

            if ($error_with_delete != "") {
                $error_with_delete .= "Cannot perform the deletion. Please enter again <a href='manage.php'>here</a>. ";
                echo $error_with_delete;
            } else {
                delete_records($deleted_id, $conn, $sql_table);
            }
        }
        if (isset($_POST["modify"])) {
            $modify_error = "";
            if ($_POST["changed_id"] == "") {
                $modify_error .= "You must enter a student ID. ";
            } else {
                $id_pattern = "/(^[0-9]{7}$)|(^[0-9]{10}$)/";
                if (preg_match($id_pattern, $_POST["changed_id"])) {
                    $changed_id = $_POST["changed_id"];
                    $changed_id = sanitize_data($changed_id);
                } else {
                    $modify_error .= "The student ID number must have either 7 or 10 characters. ";
                }
            }

            if ($_POST["changed_attempt"] == "") {
                $modify_error .= "You must enter an attempt. ";
            } else {
                $attempt_num_pattern = '/(^[1-2]{1}$)/';
                if (preg_match($attempt_num_pattern, $_POST["changed_attempt"])) {
                    $changed_attempt = $_POST["changed_attempt"];
                    $changed_attempt = sanitize_data($changed_attempt);
                } else {
                    $modify_error .= "The student attempt number must be 1 or 2. ";
                }
            }

            if ($_POST["changed_score"] == "") {
                $modify_error .= "You must enter a new score. ";
            } else {
                $score_pattern = '/^([0-9]|[1-9][0-9]|100)$/';
                if (preg_match($score_pattern, $_POST["changed_score"])) {
                    $new_score = $_POST["changed_score"];
                    $new_score = sanitize_data($new_score);
                } else {
                    $modify_error .= "The score must be between 0 and 100. ";
                }
            }

            if ($modify_error != "") {
                $modify_error .= "Cannot perform the modification. Please enter again <a href='manage.php'>here</a>. ";
                echo $modify_error;
            } else {
                change_score($changed_id, $changed_attempt, $new_score, $conn, $sql_table);
            }
        }
    }
?>
</div>
<?php
include "footer.inc";
?>


