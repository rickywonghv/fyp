<html>
<head>
  <title> Server Information </title>
</head>
<body>
  <center>
  <table border="1" style="background-color:FFFFCC;border-collapse:collapse;border:1px solid FFCC00;color:000000;" cellpadding="3" cellspacing="3">
    <tr>
  		<th>Server Name</th>
  		<td><?=  $_SERVER['SERVER_NAME'] ?></td>
  	</tr>
    <tr>
  		<th>Server Address</th>
  		<td><?=  $_SERVER['SERVER_ADDR'] ?></td>
  	</tr>
    <tr>
      <tr>
        <th>Server Port</th>
        <td><?=  $_SERVER['SERVER_PORT'] ?></td>
      </tr>
      <tr>
  		<th>Server Software</th>
  		<td><?=  $_SERVER['SERVER_SOFTWARE'] ?></td>
  	</tr>
    <tr>
      <th>Server Protocol</th>
      <td><?=  $_SERVER['SERVER_PROTOCOL'] ?></td>
    </tr>
    <tr>
  		<th>Gateway Interface</th>
  		<td><?=  $_SERVER['GATEWAY_INTERFACE'] ?></td>
  	</tr>
    <tr>
  		<th>PhP Self</th>
  		<td><?=  $_SERVER['PHP_SELF'] ?></td>
  	</tr>
    <tr>
      <th>Request Method</th>
      <td><?=  $_SERVER['REQUEST_METHOD'] ?></td>
    </tr>
    <tr>
      <th>Request Time</th>
      <td><?=  $_SERVER['REQUEST_TIME'] ?></td>
    </tr>




</table>
</center>
</body>
</html>
