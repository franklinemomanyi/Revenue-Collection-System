<?php
session_start();
if (session_destroy()) {
header("Location: /Revenue/pages/examples/login.html");
}
?>