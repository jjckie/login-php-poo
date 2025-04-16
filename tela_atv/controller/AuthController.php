<?php
require_once '../model/Usuario.php';

class AuthController {
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

        
            if (empty($usuario) || empty($senha)) {
                echo "Por favor, preencha todos os campos.";
                return;
            }

    
            $user = new Usuario($usuario, $senha);
            $resultado = $user->autenticar();

            if ($resultado === true) {
                session_start();
                $_SESSION['user'] = $usuario;
                $_SESSION['id'] = $user->getId();
                $_SESSION['tipo'] = $user->getTipo();

                
                if ($_SESSION['tipo'] == 'professor') {
                    echo "<script>alert('Login realizado com sucesso!'); window.location.href='../view/tela_professor.php';</script>";
                } else if ($_SESSION['tipo'] == 'aluno') {
                    echo "<script>alert('Login realizado com sucesso!'); window.location.href='../view/tela_aluno.php';</script>";
                }
            } else {
                echo $resultado; 
            }
        }
    }
}

$authController = new AuthController();
$authController->login();
?>
