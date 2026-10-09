<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_coordenador"])) {

        $sql = "SELECT * FROM coordenador
                WHERE id_coordenador = :id_coordenador";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_coordenador" => $_GET["id_coordenador"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM coordenador";

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