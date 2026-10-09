<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE disciplina
            SET nome = :nome,
                carga_horaria = :carga_horaria,
                id_curso = :id_curso,
                id_professor = :id_professor
            WHERE id_disciplina = :id_disciplina";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_disciplina" => $dados["id_disciplina"],
        ":nome" => $dados["nome"],
        ":carga_horaria" => $dados["carga_horaria"],
        ":id_curso" => $dados["id_curso"],
        ":id_professor" => $dados["id_professor"]
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