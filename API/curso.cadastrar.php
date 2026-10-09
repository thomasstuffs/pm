<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO curso
            (id_curso, nome, carga_horaria, duracao, descricao, id_coordenador)
            VALUES
            (:id_curso, :nome, :carga_horaria, :duracao, :descricao, :id_coordenador)";

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
        "mensagem" => "Cadastro realizado com sucesso!"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>