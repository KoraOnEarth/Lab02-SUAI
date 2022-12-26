<?php

$con = mysqli_connect("localhost", "root", "", "forum_db");

if (!$con) {
    die("Database not found!");
}