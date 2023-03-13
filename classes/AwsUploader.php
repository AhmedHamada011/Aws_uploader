<?php

use Aws\S3\S3Client;

class AwsUploader{

  private $key;
  private $secret;
  private $region;
  private $bucket_name;
  private $s3;

  public function __construct()
  {
    $this->key = AWS_KEY;
    $this->secret = AWS_KEY_SECRET;
    $this->region = AWS_REGION;
    $this->bucket_name = AWS_BUCKET_NAME;

    $this->initialize_s3_client();
  }

  public function upload($file_name,$source_file){
    
    $result = $this->s3->putObject([
			'Bucket' => $this->bucket_name,
			'Key'    => $file_name,
			'SourceFile' => $source_file			
		]);

    return $result;
  }


  private function initialize_s3_client(){
    $this->s3 = S3Client::factory(array(
      'credentials' => array(
          'key' => $this->key,
          'secret' => $this->secret,
      ), 'region' => $this->region,
      'version' => 'latest'
  ));

  }



}