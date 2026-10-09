<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_matricula"])) {

        $sql = "SELECT * FROM matricula
                WHERE id_matricula = :id_matricula";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_matricula" => $_GET["id_matricula"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM matricula";

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