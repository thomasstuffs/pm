<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE curso
            SET nome = :nome,
                carga_horaria = :carga_horaria,
                duracao = :duracao,
                descricao = :descricao,
                id_coordenador = :id_coordenador
            WHERE id_curso = :id_curso";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_curso" => $dados["id_curso"],
        ":nome" => $dados["nome"],
        ":carga_horaria" => $dados["carga_horaria"],
        ":duracao" => $dados["duracao"],
        ":descricao" => $dados["descricao"],
        ":id_coordenador" => $dados["id_coordenador"]
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