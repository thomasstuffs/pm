<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE matricula
            SET id_aluno = :id_aluno,
                id_turma = :id_turma,
                data_matricula = :data_matricula,
                situacao = :situacao
            WHERE id_matricula = :id_matricula";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_matricula" => $dados["id_matricula"],
        ":id_aluno" => $dados["id_aluno"],
        ":id_turma" => $dados["id_turma"],
        ":data_matricula" => $dados["data_matricula"],
        ":situacao" => $dados["situacao"]
    ]);

    echo json_encode([
        "mensagem" => "Registro alterado com sucesso!"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>