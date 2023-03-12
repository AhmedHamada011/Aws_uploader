<?php

use Aws\S3\S3Client;

class AwsUploader{

  private $key;
  private $secret;
  private $region;
  private $s3;

  public function __construct($key,$secret,$region)
  {
    $this->key = $key;
    $this->secret = $secret;
    $this->region = $region;

    $this->initialize_s3_client();
  }

  public function upload($bucket_name,$file_name,$source_file){
    
    $result = $this->s3->putObject([
			'Bucket' => $bucket_name,
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