<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO aluno
            (id_aluno, nome, data_nascimento, cpf, telefone, email, endereco)
            VALUES
            (:id_aluno, :nome, :data_nascimento, :cpf, :telefone, :email, :endereco)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_aluno" => $dados["id_aluno"],
        ":nome" => $dados["nome"],
        ":data_nascimento" => $dados["data_nascimento"],
        ":cpf" => $dados["cpf"],
        ":telefone" => $dados["telefone"],
        ":email" => $dados["email"],
        ":endereco" => $dados["endereco"]
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