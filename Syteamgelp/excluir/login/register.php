
<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (username, email, senha) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([$username, $email, $senha]);
        echo "Usuário registrado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao registrar: " . $e->getMessage();
    }
}
?>
