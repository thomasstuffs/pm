<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../conexao.php";

try {

    $dados = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO matricula
            (id_matricula, id_aluno, id_turma, data_matricula, situacao)
            VALUES
            (:id_matricula, :id_aluno, :id_turma, :data_matricula, :situacao)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_matricula" => $dados["id_matricula"],
        ":id_aluno" => $dados["id_aluno"],
        ":id_turma" => $dados["id_turma"],
        ":data_matricula" => $dados["data_matricula"],
        ":situacao" => $dados["situacao"]
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