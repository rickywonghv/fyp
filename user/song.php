<?php
function getEncodedVideoString($type, $file) {
 return 'data:audio/' . $type . ';base64,' . base64_encode(file_get_contents($file));
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <audio controls>
      <source src="http://dlhk2.edmondpoon.com/_files/2015/dec11/edmond151211a.mp3?key=pJZCUtYAHPowVn36OqNBUw&e=1449923028&u=13016&aid=1355&fid=4073&ft=a&" type="audio/mpeg">
    </audio>

  </body>
</html>
