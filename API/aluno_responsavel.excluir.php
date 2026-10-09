<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "DELETE FROM aluno_responsavel
            WHERE id_aluno = :id_aluno
            AND id_responsavel = :id_responsavel";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_aluno" => $dados["id_aluno"],
        ":id_responsavel" => $dados["id_responsavel"]
    ]);

    echo json_encode([
        "mensagem" => "Relacionamento excluido com sucesso!"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>