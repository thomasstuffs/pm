<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE coordenador
            SET nome = :nome,
                cpf = :cpf,
                formacao = :formacao,
                email = :email,
                telefone = :telefone
            WHERE id_coordenador = :id_coordenador";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_coordenador" => $dados["id_coordenador"],
        ":nome" => $dados["nome"],
        ":cpf" => $dados["cpf"],
        ":formacao" => $dados["formacao"],
        ":email" => $dados["email"],
        ":telefone" => $dados["telefone"]
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