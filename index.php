<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Strength</title>
    <style>
        #meter div {
            height: 20px; width: 20px;
            margin: 0 1px 0 0; padding: 0;
            float: left;
            background-color: #dddddd;
        }
        #meter div.rating-1, #meter div.rating-2 {
            background-color: red;
        }
        #meter div.rating-3, #meter div.rating-4 {
            background-color: orange;
        }
        #meter div.rating-5, #meter div.rating-6 {
            background-color: yellow;
        }
        #meter div.rating-7, #meter div.rating-8 {
            background-color: blue;
        }
        #meter div.rating-9, #meter div.rating-10 {
            background-color: green;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4380f7e432.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
<form id="form" action="index.php" method="post">
<div class="container-fluid">
<p>Your password rating is: <span id="response"></p>

    <div id="meter">
        <?php
            for($i=0;$i < 10; $i++){
                print('<div></div>');
            }
        ?>
    </div>
    <br style="clear: both;">
<p>Rate the strength of your password:</p>
Password: <input type="text" name="rate" id="rate" value="">
    <br>
<input type="submit" id="submit" name="submit" value="Submit">

</div>
<script>
    $(document).ready(function(){
       $('#form').submit(function(e){

           $.ajax({
              type:"POST",
              url:"password_strength.php",
              data:$('form').serialize(),
               success:function(data){
                  $('#response').html(data);
               }
           });
           e.preventDefault();
       });
    });
</script>
</form>
</body>
</html>
