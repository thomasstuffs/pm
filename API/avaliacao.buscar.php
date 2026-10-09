<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_avaliacao"])) {

        $sql = "SELECT * FROM avaliacao
                WHERE id_avaliacao = :id_avaliacao";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_avaliacao" => $_GET["id_avaliacao"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM avaliacao";

        $stmt = $pdo->query($sql);

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode($dados);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>