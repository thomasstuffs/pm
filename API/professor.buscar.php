<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_professor"])) {

        $sql = "SELECT * FROM professor
                WHERE id_professor = :id_professor";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_professor" => $_GET["id_professor"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM professor";

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