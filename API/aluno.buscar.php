<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_aluno"])) {

        $sql = "SELECT * FROM aluno
                WHERE id_aluno = :id_aluno";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_aluno" => $_GET["id_aluno"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM aluno";

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