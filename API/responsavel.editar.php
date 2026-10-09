<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE responsavel
            SET nome = :nome,
                cpf = :cpf,
                telefone = :telefone,
                parentesco = :parentesco
            WHERE id_responsavel = :id_responsavel";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_responsavel" => $dados["id_responsavel"],
        ":nome" => $dados["nome"],
        ":cpf" => $dados["cpf"],
        ":telefone" => $dados["telefone"],
        ":parentesco" => $dados["parentesco"]
    ]);

    echo json_encode([
        "mensagem" => "Registro alterado com sucesso!"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>