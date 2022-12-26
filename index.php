<?php
    // error_reporting(0);
    date_default_timezone_set('Europe/Moscow');
    include "connection.php";
    include "functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Notes</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
    </head>

    <body>
        <div class="header">
            <h1 class="notes">My Notes</h1>
        </div>
    <div class='center'>
    <?php
        global $page_count;
        echo "<br><form method='POST' action='".setComment()."'>
        <input type ='hidden' name='note_date' value='".date('Y-m-d H:i:s')."'>
        <a>Заголовок:</a><br><textarea name='note_title' style = 'height: 20px; width: 200px'></textarea><br><br>
        <a>Текст сообщения:</a><br><textarea name='note_text'></textarea><br><br>
        <button type='submit' name='commentSubmit'></button><br><br>";
    ?>
        </form>
    </div>
    <br>
    <div class = 'center' > 
        <br><div class = 'centertext' >
            <p class="last100">Последние 100 сообщений</p>
        </div><br>
        <?php 
            echo "<form method='POST' action='".getComments($con)."'>
            </form>";
        ?>
    </div>
    <br>


    </body>
</html>