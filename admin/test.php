<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.1.0/octicons.min.css">

    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <script src="https://cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <div class="container">
      <form class='form-inline form-horizontal' role="form">
        <div class="form-group">
          <div class='radio-inline'>
            <label>
              <input type='radio' name='adtype' value='a' checked>
                a
            </label>
          </div>
          <div class='radio-inline'>
            <label>
              <input type='radio' name='adtype' value='b'>b

            </label>
          </div>
          <button type='submit' class='btn btn-lg btn-default' id="subbtn">Submit</button>


        </div>

      </form>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
         // Stuff to do as soon as the DOM is ready
         $("#subbtn").click(function(){
           var radioinp=$("input[name='adtype']:checked").val();
           alert(radioinp);
         })
      });

    </script>
  </body>
</html>
