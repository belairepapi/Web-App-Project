<?php

$description = $_POST['description'];

$location = $_POST['location'];

$image = $_POST['image'];



//Database Connection

$conn = new mysqli('localhost','root','','report');

if($conn->connect_error){

        die('Connection Failed  :  '.$conn->connect_error);

}else{

        $stmt = $conn->prepare("insert into report(description, location, image)

                values(?, ?, ?)");

        $stmt->blind_param("ssb",$description, $location, $image);

        $stmt->execute();

        echo "Report Succesful...";

        $stmt->close();

        $conn->close();

}
?>




 