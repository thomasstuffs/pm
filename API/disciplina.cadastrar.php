<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO disciplina
            (id_disciplina, nome, carga_horaria, id_curso, id_professor)
            VALUES
            (:id_disciplina, :nome, :carga_horaria, :id_curso, :id_professor)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_disciplina" => $dados["id_disciplina"],
        ":nome" => $dados["nome"],
        ":carga_horaria" => $dados["carga_horaria"],
        ":id_curso" => $dados["id_curso"],
        ":id_professor" => $dados["id_professor"]
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