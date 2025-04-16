<?php
session_start();
if ($_SESSION['tipo'] != 'aluno') {
    header("Location: login.php"); // Redireciona se não for aluno
    exit();
}
?>
<html>
<head>
    <title>Aluno</title>
    <style>
        body {
            background: #56ab2f;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #a8e063, #56ab2f);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #a8e063, #56ab2f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            color: white;
        }
    </style>
</head>
<body>
    <h1>Aluno!</h1>
</body>
</html>
