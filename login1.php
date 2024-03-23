<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $teamName = $_POST['teamName'];
    $department = $_POST['department'];
    $teamLeaderName = $_POST['teamLeaderName'];
    $teamLeaderroll = $_POST['teamLeaderroll'];
    $teamLeaderEmail = $_POST['teamLeaderEmail'];
    $teamLeaderMobile = $_POST['teamLeaderMobile'];
    $member2Name = $_POST['member2Name'];
    $member2roll = $_POST['member2roll'];
    $member2email = $_POST['member2email'];
    $member2ph = $_POST['member2ph'];
    $member3Name = $_POST['member3Name'];
    $member3roll = $_POST['member3roll'];
    $member3email = $_POST['member3email'];
    $member3ph = $_POST['member3Mph'];

    // Database connection parameters
    $servername = "localhost"; // Change this to your MySQL server hostname
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "yuva"; // Change this to your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data
    $sql = "INSERT INTO form (teamname, department, teamleadername, teamleaderroll, teamleaderEmail, teamleadermobile, member2Name, member2roll, member2email, member2ph, member3Name, member3roll, member3email, member3ph)
            VALUES ('$teamName', '$department', '$teamLeaderName', '$teamLeaderroll', '$teamLeaderEmail', '$teamLeaderMobile', '$member2Name', '$member2roll', '$member2email', '$member2ph', '$member3Name', '$member3roll', '$member3email', '$member3ph')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a thank you page if insertion is successful
        header("Location: thanksforregistration.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
