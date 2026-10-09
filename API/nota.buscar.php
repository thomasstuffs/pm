<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_nota"])) {

        $sql = "SELECT * FROM nota
                WHERE id_nota = :id_nota";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_nota" => $_GET["id_nota"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM nota";

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