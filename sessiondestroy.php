<?php
echo 'hola';
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
unset($_SESSION['user_email']);

}
?>