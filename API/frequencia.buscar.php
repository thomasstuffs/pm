<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_frequencia"])) {

        $sql = "SELECT * FROM frequencia
                WHERE id_frequencia = :id_frequencia";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_frequencia" => $_GET["id_frequencia"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM frequencia";

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