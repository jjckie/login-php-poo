<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="view/assets/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="http://localhost/tela_atv/controller/AuthController.php">
            <h1>Login</h1>
            
            
            <div class="input-box">
                <input type="text" name="usuario" placeholder="ID" required>
                <i class='bx bxs-user'></i>
            </div>

           
            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox"> Lembrar</label>
                <label><a href="#">Esqueceu a senha?</a></label>
            </div>

    
            <div class="register-link">
                <button type="submit" class="btn">Login</button>
                <p>Primeiro acesso? <a href="#">Registrar</a></p>
            </div>
        </form>
    </div>
</body>
</html>
