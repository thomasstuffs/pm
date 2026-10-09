<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO responsavel
            (id_responsavel, nome, cpf, telefone, parentesco)
            VALUES
            (:id_responsavel, :nome, :cpf, :telefone, :parentesco)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_responsavel" => $dados["id_responsavel"],
        ":nome" => $dados["nome"],
        ":cpf" => $dados["cpf"],
        ":telefone" => $dados["telefone"],
        ":parentesco" => $dados["parentesco"]
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