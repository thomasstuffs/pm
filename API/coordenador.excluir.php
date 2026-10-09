<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "DELETE FROM coordenador
            WHERE id_coordenador = :id_coordenador";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_coordenador" => $dados["id_coordenador"]
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