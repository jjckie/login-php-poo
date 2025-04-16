<?php
require_once '../db.php'; 

class Usuario {
    private $id;
    private $usuario;
    private $senha;
    private $tipo;
    private $bloqueado;
    private $tentativas;

    public function __construct($usuario, $senha) {
        $this->setUsuario($usuario);
        $this->setSenha($senha);
    }

    public function autenticar() {
        global $conn;

        $sql = "SELECT id, senha, tipo, bloqueado, tentativas FROM usuarios WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $this->usuario); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($id, $senhaBanco, $tipo, $bloqueado, $tentativas);

            while ($stmt->fetch()) {  
                if ($bloqueado == 1) {
                    return "Seu acesso está bloqueado.";
                }

                if ($this->senha === $senhaBanco) {  
                    $this->id = $id;
                    $this->tipo = $tipo;
                    return true;
                } else {
                    $this->incrementarTentativas($id, $tentativas, $bloqueado);
                    return "Usuário ou senha incorretos!";
                }
            }
            return "Usuário não encontrado!";
        }
    }

    private function incrementarTentativas($id, $tentativas, $bloqueado) {
        global $conn;

        $tentativas++;
        if ($tentativas >= 3) {
            $bloqueado = 1; 
        }

        $sqlUpdate = "UPDATE usuarios SET tentativas = ?, bloqueado = ? WHERE id = ?";
        if ($stmtUpdate = $conn->prepare($sqlUpdate)) {
            $stmtUpdate->bind_param("iii", $tentativas, $bloqueado, $id);
            $stmtUpdate->execute();
        }
    }


    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getId() {
        return $this->id;
    }
}
?>
