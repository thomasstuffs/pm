<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    if (isset($_GET["id_boletim"])) {

        $sql = "SELECT * FROM boletim
                WHERE id_boletim = :id_boletim";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_boletim" => $_GET["id_boletim"]
        ]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        $sql = "SELECT * FROM boletim";

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