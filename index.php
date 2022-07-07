<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Strength</title>
    <style>
        .box {
            height: 20px; width: 20px;
            margin: 0 1px 0 0; padding: 0;
            float: left;
            background-color: #dddddd;
        }
        .rating-1,.rating-2 {
            height: 20px; width: 20px;
            margin: 0 1px 0 0; padding: 0;
            float: left;
            background-color: red;
        }
        .rating-3,.rating-4 {
            height: 20px; width: 20px;
            margin: 0 1px 0 0; padding: 0;
            float: left;
            background-color: orange;
        }
        .rating-5,.rating-6 {
            height: 20px; width: 20px;
            margin: 0 1px 0 0; padding: 0;
            float: left;
            background-color: yellow;
        }
        .rating-7,.rating-8 {
            height: 20px; width: 20px;
            margin: 0 1px 0 0; padding: 0;
            float: left;
            background-color: blue;
        }
        .rating-9,.rating-10 {
            height: 20px; width: 20px;
            margin: 0 1px 0 0; padding: 0;
            float: left;
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
        <?php
            for($i = 1; $i <= 10; $i++){
                echo '<div class="box" id="'.$i.'"></div>';
            }
        ?>
    <br>
<p>Strength of your password:</p>
<span id="container"></span>
    <br>
Password: <input type="text" name="rate" id="rate" value="">
    <br><br>
    <button class="btn btn-success" id="submit" name="submit">Submit</button>
</div>

<script>
    $(document).ready(function(){

       $('#submit').click(function(e){

           $.ajax({
              type:"POST",
              url:"password_strength.php",
              data:$('form').serialize(),
               success:function(data){
                  $('#response').html(data);
                  for(let i = 1; i <= data; i++){
                     $('#'+i).removeClass('box')
                         .addClass('rating-'+i);
                  }

               }

           });
           e.preventDefault();
       });
    });
</script>
</form>
</body>
</html>
