<?php
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $conn = new mysqli('localhost', 'root', '', 'contact');
    if($conn->connect_errno){
        die('Connection Failed : '.$conn->connect_errno);
    }
    else{
        $stmt = $conn->prepare("insert into contactinfo(fullname, email, message)
        values(?, ?, ?)");
        $stmt->bind_param("sss", $fullname, $email, $message);
        $stmt->execute();
        echo "Successfully sent!";
        $stmt->close();
        $conn->close();
    }
?>

