<?php
session_start();

$Lang=$_POST['Lang'];

$_SESSION["lang"]= $Lang;
echo $_SESSION["lang"];