<?php
cequire_once('config.php');
$mysql = new mysqli(DB_HOST,DB_PASS,DB_NAME,DB_USER);
$data =  array_map(array($mysql, 'real_escape_string'), $_POST);

//Convert to variable
extract($data);

//Submit to database
$query = "INSERT INTO registration (name,email) VALUES('$name','$email')";
$insert = $mysql->query($query);
?>
<?php if (isset ( $insert ) ) : ?>
    <div class="message">
        <?php  if ( $insert == true ): ?>
            <p class="success">Data was successfully inserted</p>
        <?php  else: ?>
            <p class="error">There was an error in submission</p>
        <?php  endif;?>
    </div>
<?php  endif;?>