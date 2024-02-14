<?php
require_once 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim(stripslashes(htmlspecialchars($_POST['firstname'])));
    $lastname = trim(stripslashes(htmlspecialchars($_POST['lastname'])));
    $email = trim(stripslashes(htmlspecialchars($_POST['email'])));
    $gender = trim(stripslashes(htmlspecialchars($_POST['gender'])));

    $sql = "SELECT * FROM students WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
         $_SESSION["form_data"] = [
            'firstname' => $username,
            'lastname' => $lastname,
            'email' => $email,
            'gender' => $gender
        ];
        $_SESSION["error_message"] = ['uniqueEmailError' => 'Email is already in use. Please use other email to register.' ];
        header("Location: student-register.php");
        exit();
    }

    $sql = "INSERT INTO students (firstname, lastname, email, gender) VALUES ('$firstname', '$lastname', '$email', '$gender')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
