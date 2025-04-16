<?php
session_start();
if ($_SESSION['tipo'] != 'professor') {
    header("Location: login.php"); 
    exit();
}
?>
<html>
<head>
    <title>Professor</title>
    <style>
        body {
            background: #000046;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #1CB5E0, #000046);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #1CB5E0, #000046); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            color: white;
        }
    </style>
</head>
<body>
    <h1>Professor!</h1>
</body>
</html>
