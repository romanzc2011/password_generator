<?php

function random_char($string){
    $i = random_int(0, strlen($string)-1);
    return $string[$i];
}

function random_string($length, $char_set){
    if($char_set == null){
        $char_set = '0';
    }
    $output = "";
    for($i=0; $i < $length; $i++){
        $output .= random_char($char_set);
    }
    return $output;
}

function generate_password($options){
    // DEFINE CHARACTER SETS
    $lower = implode(range('a', 'z'));
    $upper = strtoupper($lower);
    $numbers = implode(range(0,9));
    $symbols = '$*?@-!';
    $length = isset($options['length']) ? intval($options['length']) : 8;

    // WHICH SET OF CHARS ARE NEEDED
    $use_lower = isset($options['lower']) ? $options['lower'] : '0';
    $use_upper = isset($options['upper']) ? $options['upper'] : '0';
    $use_numbers = isset($options['numbers']) ? $options['numbers'] : '0';
    $use_symbols = isset($options['symbols']) ? $options['symbols'] : '0';


    // CREATE THE CHARS SET
    $chars = '';
    if($use_lower === '1') { $chars .= $lower; }
    if($use_upper === '1') { $chars .= $upper; }
    if($use_numbers === '1') { $chars .= $numbers; }
    if($use_symbols === '1') { $chars .= $symbols; }

    return random_string($length, $chars);
}

$options = array(
        'length' => isset($_GET['length']) ? $_GET['length'] : 0,
        'upper' => isset($_GET['upper']) ? $_GET['upper'] : '0',
        'lower' => isset($_GET['lower']) ? $_GET['lower'] : '0',
        'numbers' => isset($_GET['numbers']) ? $_GET['numbers'] : '0',
        'symbols' => isset($_GET['symbols']) ? $_GET['symbols'] : '0'
);


$password = generate_password($options);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4380f7e432.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script
</head>
<body>
<div class="container-fluid">
    <p>Generated Password: <?php echo $password; ?> </p>

    <p>Generate a new password using the form options.</p>

    <form>
        Length:<input type="text" name="length" id="length" value="<?php if(isset($_GET['length'])){
            echo $_GET['length'];
        } ?>"><br>
        <input type="checkbox" name="lower" id="lower" value="1" <?php if(isset($_GET['lower'])){ echo 'checked'; }?>> Lowercase<br>
        <input type="checkbox" name="upper" id="upper" value="1" <?php if(isset($_GET['upper'])){ echo 'checked'; }?>> Uppercase<br>
        <input type="checkbox" name="numbers" id="numbers" value="1" <?php if(isset($_GET['numbers'])){ echo 'checked';}?>> Numbers<br>
        <input type="checkbox" name="symbols" id="symbols" value="1" <?php if(isset($_GET['symbols'])){ echo 'checked';}?>> Symbols<br>
        <input type="submit" id="submit" value="Submit">
    </form>
</div>
<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            let lowercase = $('#lower').val();
            let uppercase = $('#upper').val();
            let numbers = $('#numbers').val();
            let symbols = $('#symbols').val();
            let length = $('#length').val();

            if(length == ''){ alert("Please fill in the length..."); return false; }

            $.ajax({
               type: "GET",
               url: "password_gen.php",
               data: {
                   lowercase: lowercase,
                   uppercase: uppercase,
                   numbers: numbers,
                   symbols: symbols,
                   length: length
               }
            });
        });
    });
</script>
</body>
</html>

