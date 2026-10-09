<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO professor
            (id_professor, nome, cpf, formacao, email, telefone)
            VALUES
            (:id_professor, :nome, :cpf, :formacao, :email, :telefone)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_professor" => $dados["id_professor"],
        ":nome" => $dados["nome"],
        ":cpf" => $dados["cpf"],
        ":formacao" => $dados["formacao"],
        ":email" => $dados["email"],
        ":telefone" => $dados["telefone"]
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