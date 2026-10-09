<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE avaliacao
            SET id_disciplina = :id_disciplina,
                descricao = :descricao,
                data_avaliacao = :data_avaliacao,
                valor = :valor
            WHERE id_avaliacao = :id_avaliacao";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_avaliacao" => $dados["id_avaliacao"],
        ":id_disciplina" => $dados["id_disciplina"],
        ":descricao" => $dados["descricao"],
        ":data_avaliacao" => $dados["data_avaliacao"],
        ":valor" => $dados["valor"]
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