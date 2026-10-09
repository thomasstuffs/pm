<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "DELETE FROM disciplina
            WHERE id_disciplina = :id_disciplina";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_disciplina" => $dados["id_disciplina"]
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