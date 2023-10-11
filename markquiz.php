<?php
include "header.inc";
include "menu.inc";
require_once ("settings.php");
require_once ("function.php");
//establish a connection with the database
$conn = @mysqli_connect($host,
    $user,
    $pwd,
    $sql_db
);

function print_result_after_insert ($first_name, $last_name, $student_number, $attempt_number, $score) {
    echo "<table border=\"1\">\n";
    echo "<tr>\n"
        ."<th scope=\"col\">First Name</th>\n"
        ."<th scope=\"col\">Last Name</th>\n"
        ."<th scope=\"col\">Student ID</th>\n"
        ."<th scope=\"col\">Attempts</th>\n"
        ."<th scope=\"col\">Score</th>\n"
        ."</tr>\n ";
    echo "<tr>\n"
        ."<td scope=\"col\">$first_name</td>\n"
        ."<td scope=\"col\">$last_name</td>\n"
        ."<td scope=\"col\">$student_number</td>\n"
        ."<td scope=\"col\">$attempt_number</td>\n"
        ."<td scope=\"col\">$score</td>\n"
        ."</tr>\n ";
    echo "</table>\n ";
}

function insert_into_database($connection, $sql_table, $date_and_time, $first_name, $last_name, $student_number, $attempt_number, $score){
    $insert_query = "INSERT INTO $sql_table (date_and_time, first_name, last_name, student_number, attempt, score) VALUES ('$date_and_time','$first_name', '$last_name', '$student_number', '$attempt_number', '$score')";
    $insert_result = mysqli_query($connection, $insert_query);
    if (!$insert_result) {
        echo "<p class=\"wrong\">Something is wrong with ", $insert_query, "</p>";
        //would not show in a script
    } else {
        //display successful message
        echo "<p class=\"ok\">Successfully completed quiz</p>";
    }
}

function mark_quiz ($answer1, $answer2, $answer3, $answer4, $answer5, $score) {
    $correct_answer_1 = array(1, 1, 0, 0);
    for ($index = 0; $index < 4; $index ++) {
        if ($correct_answer_1[$index] == 1){
            if ($answer1[$index] == $correct_answer_1[$index]) {
                $score = $score + 10;
            }
        } else {
            if ($answer1[$index] != $correct_answer_1[$index]) {
                $score = $score - 5;
            }
        }
    }

    $correct_answer_2 = "false";
    if ($answer2 == $correct_answer_2){
        $score = $score + 20;
    }

    $correct_answer_3 = array("Internet Protocol", "internet protocol");
    foreach ($correct_answer_3 as $correct_answer) {
        if ($answer3 == $correct_answer) {
            $score = $score + 20;
        }
    }

    $correct_answer_4 = "Network and Host";
    if ($answer4 == $correct_answer_4){
        $score = $score + 20;
    }

    $correct_answer_5 = "255";
    if ($answer5 == $correct_answer_5) {
        $score = $score + 20;
    }

    if ($score < 0) {
        $score = 0;
    }
    return $score;
}

//Check connection
if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {
    $sql_table= "attempts";
    //initialize new variables from input from data
    date_default_timezone_set("Australia/Melbourne");
    $error = "";

    if ($_POST["first_name"] == "") {
        $error .= "You have to enter your first name. ";
    } else {
        $name_pattern = "/[a-zA-Z -]{1,30}/";
        if (preg_match($name_pattern, $_POST["first_name"])) {
            $first_name = $_POST["first_name"];
            $first_name = sanitize_data($first_name);
        } else {
            $error .= "Your first name must contain 30 or less characters and only use alpha characters, hyphens or spaces. ";
        }
    }

    if ($_POST["last_name"] == ""){
        $error .= "You have to enter your last name. ";
    } else {
        $name_pattern = "/[a-zA-Z -]{1,30}/";
        if (preg_match($name_pattern, $_POST["last_name"])) {
            $last_name = $_POST["last_name"];
            $last_name = sanitize_data($last_name);
        } else {
            $error .= "Your last name must contain 30 or less characters and only use alpha characters, hyphens or spaces. ";
        }
    }

    if ($_POST["student_number"] == ""){
        $error .= "You have to enter your student number. ";
    } else {
        $id_pattern = "/(^[0-9]{7}$)|(^[0-9]{10}$)/";
        if (preg_match($id_pattern, $_POST["student_number"])) {
            $student_number = $_POST["student_number"];
            $student_number = sanitize_data($student_number);
        } else {
            $error .= "Your student ID must have either 7 or 10 characters. ";
        }
    }

    $date_and_time = date("Y-m-d H:i:s");


    $attempt_number = null;
    $score = 0;
    $answer1 = array();

    if (!isset($_POST["SupportsVLSM"]) and !isset($_POST["32Bit"]) and !isset($_POST["128Bit"]) and !isset($_POST["HTML"])) {
        $error .= "You have to select at least one answer in Question 1. ";
    } else {
        if (isset($_POST["SupportsVLSM"])) {
            if ($_POST["SupportsVLSM"] == "on"){
                $answer1[0] = 1;
            }
        } else {
            $answer1[0] = 0;
        }

        if (isset($_POST["32Bit"])) {
            if ($_POST["32Bit"] == "on"){
                $answer1[1] = 1;
            }
        } else {
            $answer1[1] = 0;
        }

        if (isset($_POST["128Bit"])){
            if ($_POST["128Bit"] == "on"){
                $answer1[2] = 1;
            }
        } else {
            $answer1[2] = 0;
        }

        if (isset($_POST["HTML"])){
            if ($_POST["HTML"] == "on"){
                $answer1[3] = 1;
            }
        } else {
            $answer1[3] = 0;
        }
    }

    if (isset($_POST["Q2"])) {
        $answer2 = $_POST["Q2"];
    } else {
        $error .= "You have to answer Question 2. ";
    }

    if ($_POST["Q3"] != ""){
        $answer3 = $_POST["Q3"];
        $answer3 = sanitize_data($answer3);
    } else {
        $error .= "You have to answer Question 3. ";
    }

    if ($_POST["Q4"] != "Please_select"){
        $answer4 = $_POST["Q4"];
    } else {
        $error .= "You have to answer Question 4. ";
    }

    if ($_POST["Q5"] != ""){
        $answer5 = $_POST["Q5"];
        $answer5 = sanitize_data($answer5);
    } else {
        $error .= "You have to answer Question 5. ";
    }


    if (!$error == "") {
        $error .= "Your submission is not valid. Please attempt at the quiz again by clicking <a href='quiz.php'>here</a>.";
        echo $error;
    } else {
        $score = mark_quiz($answer1, $answer2, $answer3, $answer4, $answer5, $score);
        if ($score != 0) {
            //check whether there is any record of user's input student_id in the database
            $attempt_times_query = "select count(*) FROM $sql_table WHERE student_number = $student_number";
            $times_result = mysqli_query($conn, $attempt_times_query);
            $times = mysqli_fetch_row($times_result);
            if (!$times) {
                echo "<p class=\"wrong\">Something is wrong with ", $attempt_times_query, "</p>";
            } elseif ($times[0] <= 1) {
                $attempt_number = $times[0] + 1;
                insert_into_database($conn, $sql_table, $date_and_time, $first_name, $last_name, $student_number, $attempt_number, $score);
                echo "<p>Your answer has been submitted!</p>";
            } else {
                echo "<p>You have reached the maximum attempt. For more attempts or queries, please contact your supervisor.</p>";
            }
            //print the results to students
            //if the student has attempted the quiz once, he or she can click on the link to take the quiz again.
            if ($attempt_number == 1) {
                print_result_after_insert($first_name, $last_name, $student_number, $attempt_number, $score);
                echo "<p> You can make another attempt to the quiz by clicking <a href='quiz.php'>here</a>.</p>";
            } elseif ($attempt_number == 2) {
                print_result_after_insert($first_name, $last_name, $student_number, $attempt_number, $score);
                echo "<p>You have reached the maximum attempt.</p>";
            }
            //close database connection
            mysqli_close($conn);
        } else {
            echo "<p> Your submission is invalid as your score must not be 0. You can attempt the quiz again by clicking <a href='quiz.php'>here</a>.</p>";
        }
    }
}
?>
<?php
include "footer.inc";
?>
