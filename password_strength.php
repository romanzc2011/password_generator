<?php
$pass = isset($_GET['rate']) ? $_GET['rate'] : '0';
$pass_length = strlen(trim($pass));
$rating = 0;
$upper_count = 0;
$lower_count = 0;
$num_count = 0;
$symbol_count = 0;
$length_pts = 0;

for($i=0; $i < $pass_length; $i++){
   if(ctype_lower($pass[$i]) === true){
       $lower_count++;
       if($lower_count === 1){ $rating += 1; }
   }
   if(ctype_upper($pass[$i]) === true){
       $upper_count++;
       if($upper_count === 1){ $rating += 1l}
   }
   echo 'upper '.$upper_count.'<br>';
   echo 'lower '.$lower_count.'<br>';
   echo 'num '.$num_count.'<br>';
   echo 'sym '.$symbol_count.'<br>';

   if($upper_count >= 1){ $rating ++; }
   if($lower_count >= 1){ $rating += 1; }
   if($num_count >= 2){ $rating += 2; }
   if($num_count > 1){ $rating += 1; }
   if($symbol_count >= 2){ $rating += 2; }
   if($symbol_count > 1){ $rating += 1;}
   if($pass_length === 8){ $rating += 2; }
   if($pass_length > 8){
       for($j = 0; $j <= 16; $j++){ $pass_length += 0.5; }
       $length_pts += 2;
   }
}

$rating += $length_pts;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4380f7e432.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
<form>
<div class="container-fluid">
<p>Your password rating is: <?php echo $rating; ?></p>

<p>Rate the strength of your password:</p>
Password: <input type="text" name="rate" id="rate" value="">
<input type="submit" id="submit" name="submit" value="Submit">
</div>
<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            let rate = $('#rating').val();

            $.ajax({
                type: "GET",
                url: "password_strength.php",
                data: {
                    rate: rate
                }
            });
        });
    });
</script>
</form>
</body>
</html>
