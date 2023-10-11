<?php
include 'header.inc';
include "menu.inc";
?>
<h1 class="quiz">Quiz</h1>
<p class="quiz">Test your knowledge of IPV4 and IPV6 using these questions!</p>
<form method="post" action="markquiz.php" novalidate="novalidate">
    <fieldset>
    <legend>Personal details</legend>
    <p>
        <label for="GivenName">First Name</label>
        <input type="text" name="first_name" id="GivenName"  pattern="[a-zA-Z -]{1,30}" title="Must contain 30 or less characters and only use alpha characters, hyphens or spaces" required="required"/>

        <label for="FamilyName">Last Name</label>
        <input type="text" name="last_name" id="FamilyName"  pattern="[a-zA-Z -]{1,30}" title="Must contain 30 or less characters and only use alpha characters, hyphens or spaces" maxlength="30" required="required"/>

        <label for="StudentID">Student ID</label>
        <input type="text" name="student_number" id="StudentID"  pattern="(^[0-9]{7}$)|(^[0-9]{10}$)" title="Must have either 7 or 10 characters" required="required"/>
    </p>
    </fieldset>
    <fieldset>
    <legend>Question 1</legend>
    <p>Which of these are features of IPV4?</p>
    <p>
        <label for="SupportsVLSM">Supports VLSM</label>
        <input type="checkbox" name="SupportsVLSM" id="SupportsVLSM" />
    </p>
    <p>
        <label for="32Bit">32-Bit IP Address</label>
        <input type="checkbox" name="32Bit" id="32Bit" />
    </p>
    <p>
        <label for="128bit">128-Bit Address Length</label>
        <input type="checkbox" name="128Bit" id="128bit" />
    </p>
    <p>
        <label for="HTML">HTML</label>
        <input type="checkbox" name="HTML" id="HTML" />
    </p>
    </fieldset>
    <fieldset>
    <legend> Question 2</legend>
    <p>IPV6 uses 32 bit address length?</p>
    <p><label for="True">True</label>
        <input type="radio" name="Q2" value ="true" id="True" required="required"/>
        <label for="False">False</label>
        <input type="radio" name="Q2" value ="false" id="False" required="required"/>

    </p>

    </fieldset>

    <fieldset>
        <legend> Question 3</legend>
        <p><label for="IP">What does IP stand for?</label>
        <input type="text" name="Q3" id="IP" required="required"/>
        </p>
    </fieldset>

    <fieldset>
        <legend> Question 4</legend>
        What are the 2 parts of an IP address?
        <p>
            <label for="Question4"></label>
            <select name="Q4" id="Question4">
            <option value="Please_select" selected="selected" >Please Select</option>
            <option value="IP and IPV4">IP and IPV4</option>
            <option value="32 and 64 bits">32 bits and 64 bits</option>
            <option value="Network and Host">Network bits and Host bits</option>
            <option value="IPV4 and IPV6">IPV4 and IPV6</option>
            </select>
        </p>

    </fieldset>

    <fieldset>
        <legend> Question 5</legend>
        <p><label for="Q5">What is the highest number that could be in an octet of an IP Address?</label> <!-- I might reword this -->
            <input type="number" name="Q5" id="Q5" required="required"/>
        </p>
    </fieldset>
    <br><br>
    <input type="submit" value="Finish Quiz"/>
</form>

<?php
include 'footer.inc';
?>


