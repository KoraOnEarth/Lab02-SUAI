<?php

function setComment() {
    require("connection.php");
    if(isset($_POST['commentSubmit'])) {
        $date = $_POST['note_date'];
        $title = $_POST['note_title'];
        $message = $_POST['note_text'];
        if (!empty($title) && !empty($message)) {
            $date = $_POST['note_date'];
            $title = $_POST['note_title'];
            $message = $_POST['note_text'];
            $query = "INSERT INTO `notes`(`note_date`, `note_title`, `note_text`) VALUES ('$date', '$title', '$message')";
            $result = mysqli_query($con, $query);
        }
        else {
            echo "<br><b><div class ='comment'>Для отправки заметки необходимо заполнить обе ячейки.</div></b>";
        }
    }
}

function getComments($page_count) {
    require("connection.php");
    $query = "SELECT * FROM `notes` ORDER BY `note_id` DESC LIMIT 100";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {   
        echo "<div class='comment'>
                <div> Написано в <i>".$row['note_date']."</i><br><br><b>".$row['note_title']."</b></div>";

        echo " <div>".$row["note_text"]."</div>";

        echo "<div><br><form method='POST' action='".likeSubmit($row)."'>  <button type='submit' name='".$row['note_id']."' class='like_button'></button>  <br>Оценили: ".$row["note_likes"]."</form></div>
        </div><br>";
    }
}

function likeSubmit($row) {
    require("connection.php");
    if(isset($_POST[$row['note_id']])) {
        $id = $row['note_id'];
        $likes = $row['note_likes']+1;
        $query = "UPDATE `notes` SET `note_likes` = '$likes' WHERE `note_id` = '$id'";
        $result = mysqli_query($con, $query);
        header('Location: index.php');
    }
}