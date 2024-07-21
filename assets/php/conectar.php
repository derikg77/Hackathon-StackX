<?php
// Inserir dados na tabela palestras
$titulo = "Título da Palestra";
$descricao = "Descrição da palestra...";
$palestrante = "Nome do Palestrante";
$data = "2024-07-21";

$sql = "INSERT INTO palestras (titulo, descricao, palestrante, data)
        VALUES ('$titulo', '$descricao', '$palestrante', '$data')";

if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}
?>