<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $sql = "SELECT * FROM aluno_responsavel";

    $stmt = $pdo->query($sql);

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dados);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>