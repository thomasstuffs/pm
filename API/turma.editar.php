<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE turma
            SET id_curso = :id_curso,
                ano_letivo = :ano_letivo,
                turno = :turno,
                sala = :sala
            WHERE id_turma = :id_turma";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_turma" => $dados["id_turma"],
        ":id_curso" => $dados["id_curso"],
        ":ano_letivo" => $dados["ano_letivo"],
        ":turno" => $dados["turno"],
        ":sala" => $dados["sala"]
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