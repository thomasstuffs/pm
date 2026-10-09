<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_disciplina"])) {

        $sql = "SELECT * FROM disciplina
                WHERE id_disciplina = :id_disciplina";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_disciplina" => $_GET["id_disciplina"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM disciplina";

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