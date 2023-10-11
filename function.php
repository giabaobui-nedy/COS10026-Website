<?php
function print_result ($result) {
    echo "<div class=\"supervisor_table\">";
    echo "<table>";
    echo"<tr>
            <th>Attempt Id</th>
            <th>Date and Time</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Student ID</th>
            <th>Attempts</th>
            <th>Score</th>
        </tr>";
    if (mysqli_num_rows($result) >= 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>\n ";
            echo "<td>", $row["attempt_id"], "</td>\n ";
            echo "<td>", $row["date_and_time"], "</td>\n ";
            echo "<td>", $row["first_name"], "</td>\n ";
            echo "<td>", $row["last_name"], "</td>\n ";
            echo "<td>", $row["student_number"], "</td>\n ";
            echo "<td>", $row["attempt"], "</td>\n ";
            echo "<td>", $row["score"], "</td>\n ";
            echo "</tr>\n ";
        }
    }
    echo "</table>";
    echo"</div>";
}

function sanitize_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
