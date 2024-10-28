<?php
session_start();

function isLogin()
{
  if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
  }
}
