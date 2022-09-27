<?php
session_start();
$_SESSION["one"] = "green";
$_SESSION["two"] = "cat";
echo "Session variables are set.";
?>