<?php
header("Content-Type: application/json");
require 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare("SELECT * FROM chamados WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $chamado = $stmt->fetch();
            echo json_encode($chamado);
        } else {
            $stmt = $pdo->query("SELECT * FROM chamados");
            $chamados = $stmt->fetchAll();
            echo json_encode($chamados);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $pdo->prepare("INSERT INTO chamados (titulo, descricao) VALUES (?, ?)");
        $stmt->execute([$data['titulo'], $data['descricao']]);
        echo json_encode(['message' => 'Chamado criado com sucesso']);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $pdo->prepare("UPDATE chamados SET titulo = ?, descricao = ?, status = ? WHERE id = ?");
        $stmt->execute([$data['titulo'], $data['descricao'], $data['status'], $data['id']]);
        echo json_encode(['message' => 'Chamado atualizado com sucesso']);
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $pdo->prepare("DELETE FROM chamados WHERE id = ?");
        $stmt->execute([$data['id']]);
        echo json_encode(['message' => 'Chamado deletado com sucesso']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Método não permitido']);
        break;
}
?>