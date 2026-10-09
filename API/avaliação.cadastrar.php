<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO avaliacao
            (id_avaliacao, id_disciplina, descricao, data_avaliacao, valor)
            VALUES
            (:id_avaliacao, :id_disciplina, :descricao, :data_avaliacao, :valor)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_avaliacao" => $dados["id_avaliacao"],
        ":id_disciplina" => $dados["id_disciplina"],
        ":descricao" => $dados["descricao"],
        ":data_avaliacao" => $dados["data_avaliacao"],
        ":valor" => $dados["valor"]
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