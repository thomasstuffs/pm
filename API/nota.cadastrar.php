<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO nota
            (id_nota, id_matricula, id_avaliacao, nota)
            VALUES
            (:id_nota, :id_matricula, :id_avaliacao, :nota)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_nota" => $dados["id_nota"],
        ":id_matricula" => $dados["id_matricula"],
        ":id_avaliacao" => $dados["id_avaliacao"],
        ":nota" => $dados["nota"]
    ]);

    echo json_encode([
        "mensagem" => "Cadastro realizado com sucesso!"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>