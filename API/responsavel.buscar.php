<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_responsavel"])) {

        $sql = "SELECT * FROM responsavel
                WHERE id_responsavel = :id_responsavel";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_responsavel" => $_GET["id_responsavel"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM responsavel";

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