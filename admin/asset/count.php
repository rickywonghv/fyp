<?php
//require 'permission.php';
include 'db.php';
function countadmin(){
	include 'db.php';
	$sql="select username from admin";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->store_result();
	printf($stmt->num_rows);

}
function countuser(){
	include 'db.php';
	$sql="select userid from user";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->store_result();
	printf($stmt->num_rows);
}
function countmusic(){
	include 'db.php';
	$sql="select * from music";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->store_result();
	printf($stmt->num_rows);
}
?>
