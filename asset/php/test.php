<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <input type="file" name="file" id="confirm">

<script type="text/javascript">
document.getElementById('confirm').addEventListener('change', checkFile, false);

function checkFile(e) {

  var file_list = e.target.files;

  for (var i = 0, file; file = file_list[i]; i++) {
      var sFileName = file.name;
      var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
      var iFileSize = file.size;
      var iConvert = (file.size / 10485760).toFixed(2);

      if (!(sFileExtension === "pdf" || sFileExtension === "doc" || sFileExtension === "docx") || iFileSize > 10485760) {
          txt = "File type : " + sFileExtension + "\n\n";
          txt += "Size: " + iConvert + " MB \n\n";
          txt += "Please make sure your file is in pdf or doc format and less than 10 MB.\n\n";
          alert(txt);
      }
  }
}
</script>
  </body>
</html>
