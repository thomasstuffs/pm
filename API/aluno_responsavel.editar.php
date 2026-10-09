<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE aluno_responsavel
            SET id_aluno = :id_aluno,
                id_responsavel = :id_responsavel
            WHERE id_aluno = :id_aluno_antigo
            AND id_responsavel = :id_responsavel_antigo";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_aluno" => $dados["id_aluno"],
        ":id_responsavel" => $dados["id_responsavel"],
        ":id_aluno_antigo" => $dados["id_aluno_antigo"],
        ":id_responsavel_antigo" => $dados["id_responsavel_antigo"]
    ]);

    echo json_encode([
        "mensagem" => "Relacionamento alterado com sucesso!"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>