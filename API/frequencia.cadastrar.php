<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO frequencia
            (id_frequencia, id_matricula, percentual_frequencia)
            VALUES
            (:id_frequencia, :id_matricula, :percentual_frequencia)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_frequencia" => $dados["id_frequencia"],
        ":id_matricula" => $dados["id_matricula"],
        ":percentual_frequencia" => $dados["percentual_frequencia"]
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