<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE aluno
            SET nome = :nome,
                data_nascimento = :data_nascimento,
                cpf = :cpf,
                telefone = :telefone,
                email = :email,
                endereco = :endereco
            WHERE id_aluno = :id_aluno";

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
        "mensagem" => "Registro alterado com sucesso!"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "erro" => $e->getMessage()
    ]);

}

?>