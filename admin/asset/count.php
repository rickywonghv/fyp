<?php
require 'permission.php';
function countadmin(){
	require 'db.php';
	$sql="select username from admin";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->store_result();
	printf($stmt->num_rows);

}
function countuser(){
	require 'db.php';
	$sql="select username from user";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->store_result();
	printf($stmt->num_rows);
}
function countmusic(){
	require 'db.php';
	$sql="select * from music";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->store_result();
	printf($stmt->num_rows);
}
?>