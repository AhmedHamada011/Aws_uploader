<?php
require_once("vendor/autoload.php");

if(isset($_FILES["image"])){
  
  $file_name = $_FILES["image"]["name"];
  $file_extention = pathinfo($file_name, PATHINFO_EXTENSION);
  $temp_file_location = $_FILES["image"]["tmp_name"];

  $new_file_name = uniqid() . "." . $file_extention;


  $s3 = new AwsUploader(AWS_KEY,AWS_KEY_SECRET,AWS_REGION);

  $s3->upload(AWS_BUCKET_NAME,$new_file_name ,$temp_file_location);

}

require_once("views/uploader.php");



