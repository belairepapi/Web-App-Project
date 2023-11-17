<?php

if (isset($_POST['report'])) {

$description = $_POST['description'];

$location = $_POST['location'];



// Database Connection

$conn = new mysqli('localhost','root','','waste_management');

if($conn->connect_error){

        die('Connection Failed  :  '.$conn->connect_error);

}else{
       if ($_FILES["image"]["error"] === 4) {
   echo "<script> alert('Image does not exist!'); </script>";
  }else{
  $uploads_dir = 'images';
  $fileName = $_FILES["image"]["name"];
  $fileSize = $_FILES["image"]["size"];
  $tmpName = $_FILES["image"]["tmp_name"];

  $validImageExtension = ['jpg', 'jpeg', 'png'];
  $imageExtension = explode('.', $fileName);
  $imageExtension = strtolower(end($imageExtension));

  if (!in_array($imageExtension, $validImageExtension)) {
    echo "<script> alert('Invalid Image Format!'); </script>";
  }else if($fileSize > 10000000){
    echo "<script> alert('Image is too large!'); </script>";
  }else{

    $newImgName1 = uniqid();
    $newImgName1 .= '.' . $imageExtension;

    move_uploaded_file($tmpName, "$uploads_dir/$newImgName1");

        $sqlQ = "INSERT INTO report(location,description, image) VALUES(?, ?, ?)"; 
        $stmt = $conn->prepare($sqlQ); 

        $stmt->bind_param("sss", $location,$description, $newImgName1);

        $stmt->execute();

        header("Location: waste5.html");

        $stmt->close();

        $conn->close();
}
}
}
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];   

          $conn = new mysqli('localhost','root','','waste_management');
         $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password` = '$password'";

        $query = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query) > 0){
          header("Location: waste6.php");
}else{
  echo "<script>alert('User Not Found');</script>";
}
}

?>