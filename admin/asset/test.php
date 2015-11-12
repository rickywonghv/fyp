<?php
require 'db.php';
$sql="delete from musixcloud.adminlog where logdate<curdate()-4";
$stmt=$conn->prepare($sql);
$stmt->execute();
?>