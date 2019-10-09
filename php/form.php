<?php
require_once('config.php');

if (!empty ( $_POST ) ) {

    //Connect and escape
    $mysql = new mysqli(DB_HOST,DB_PASS,DB_NAME,DB_USER);
    $data =  array_map(array($mysql, 'real_escape_string'), $_POST);

    //Convert to variable
    extract($data);

    //Submit to database
    $query = "INSERT INTO registration (name,email) VALUES('$name','$email')";
    $insert = $mysql->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
    <?php if (isset ( $insert ) ) : ?>
        <div class="message">
            <?php  if ( $insert == true ): ?>
                <p class="success">Data was successfully inserted</p>
            <?php  else: ?>
                <p class="error">There was an error in submission</p>
            <?php  endif;?>
        </div>
    <?php  endif;?>
    <div class="formwrapper">
        <form action="main.php" method="post">
            <legend class="legend">Registration:</legend>
            <span class="input-title">Username:</span>
            <input type="text" class="input" name="name" placeholder="Eg.: Jonh Smith">
            <br>
            <span class="input-title">Email:</span> 
            <input type="email" class="input" name="email" placeholder="Eg.: john.smith@gmail.com">
            <button type="submit" class="submit" value="Register">Register</button>
        </form>
    </div>
    
</body>
</html>