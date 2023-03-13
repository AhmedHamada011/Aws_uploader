<?php

use Aws\S3\S3Client;

class AwsUploader{

  private $s3;

  public function __construct()
  {
    $this->initialize_s3_client();
  }

  public function upload($file_name,$source_file){
    
    $result = $this->s3->putObject([
			'Bucket' => AWS_BUCKET_NAME,
			'Key'    => $file_name,
			'SourceFile' => $source_file,
		]);

    return $result;
  }


  private function initialize_s3_client(){
    $this->s3 = new S3Client(array(
      'credentials' => array(
          'key' => AWS_KEY,
          'secret' => AWS_KEY_SECRET,
      ), 'region' => AWS_REGION,
      'endpoint' => AWS_END_POINT,
      'version' => 'latest'
  ));

  }



}