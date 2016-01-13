<?php
session_start();
if(empty($_SESSION['username'])||empty($_SESSION['type'])||$_SESSION['type']=='musicadmin'){
  header("Location:login.php");
}
if (!class_exists('S3')) require_once 'S3.php';

// AWS access info
include 'config.php';

$bucketName = 'musixcloud'; // Temporary bucket

if (!extension_loaded('curl') && !@dl(PHP_SHLIB_SUFFIX == 'so' ? 'curl.so' : 'php_curl.dll'))
	exit("\nERROR: CURL extension not loaded\n\n");

if (awsAccessKey == 'change-this' || awsSecretKey == 'change-this')
	exit("\nERROR: AWS access information required\n\nPlease edit the following lines in this file:\n\n".
	"define('awsAccessKey', 'change-me');\ndefine('awsSecretKey', 'change-me');\n\n");

// Instantiate the class
$s3 = new S3(awsAccessKey, awsSecretKey);
$contents = $s3->getBucket($bucketName,'share');
$result = array();
foreach ($contents as $key) {
  $result[] = $key;

}
print_r(json_encode($result));

//echo $contents[]["name"];
//$result=json_encode($contents);
//echo $result;

 ?>
