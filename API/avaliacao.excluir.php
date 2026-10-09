<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "DELETE FROM avaliacao
            WHERE id_avaliacao = :id_avaliacao";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_avaliacao" => $dados["id_avaliacao"]
    ]);

    echo json_encode([
        "mensagem" => "Registro excluido com sucesso!"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>