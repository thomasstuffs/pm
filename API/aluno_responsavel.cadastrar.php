<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO aluno_responsavel
            (id_aluno, id_responsavel)
            VALUES
            (:id_aluno, :id_responsavel)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_aluno" => $dados["id_aluno"],
        ":id_responsavel" => $dados["id_responsavel"]
    ]);

    echo json_encode([
        "mensagem" => "Cadastro realizado com sucesso!"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>