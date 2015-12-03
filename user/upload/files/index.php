<?php
$row = exec('ls -l',$output,$error);
while(list(,$row) = each($output)){
echo $row, "<BR>\n";
}
if($error){
echo "Error : $error<BR>\n";
exit;
}
?>
