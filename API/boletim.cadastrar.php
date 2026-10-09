<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO boletim
            (id_boletim, id_matricula, media_final, situacao_final, frequencia_final)
            VALUES
            (:id_boletim, :id_matricula, :media_final, :situacao_final, :frequencia_final)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_boletim" => $dados["id_boletim"],
        ":id_matricula" => $dados["id_matricula"],
        ":media_final" => $dados["media_final"],
        ":situacao_final" => $dados["situacao_final"],
        ":frequencia_final" => $dados["frequencia_final"]
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