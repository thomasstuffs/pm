<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE frequencia
            SET id_matricula = :id_matricula,
                percentual_frequencia = :percentual_frequencia
            WHERE id_frequencia = :id_frequencia";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_frequencia" => $dados["id_frequencia"],
        ":id_matricula" => $dados["id_matricula"],
        ":percentual_frequencia" => $dados["percentual_frequencia"]
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