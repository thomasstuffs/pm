<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_turma"])) {

        $sql = "SELECT * FROM turma
                WHERE id_turma = :id_turma";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_turma" => $_GET["id_turma"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM turma";

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