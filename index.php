<?php
require_once("vendor/autoload.php");

if(isset($_FILES["image"])){
  
  $file_name = $_FILES["image"]["name"];
  $file_extention = pathinfo($file_name, PATHINFO_EXTENSION);
  $temp_file_location = $_FILES["image"]["tmp_name"];

  $new_file_name = uniqid() . "." . $file_extention;


  $s3 = new AwsUploader();

  try {
    $s3->upload($new_file_name, $temp_file_location);
  }catch (Exception $e) {
    echo "There was an Error at Uploading the file";
    die();
  }
}

require_once("views/upload.view.php");