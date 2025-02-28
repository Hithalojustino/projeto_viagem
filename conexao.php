<?php
// Conexão com o banco de dados
$servername = "localhost"; // ou o servidor onde o banco de dados está hospedado
$username = "root"; // usuário do banco de dados
$password = ""; // senha do banco de dados
$dbname = "bd_viagem"; // nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebendo os dados do formulário
$destino = $_POST['destino'];
$data_partida = $_POST['data_partida'];
$data_chegada = $_POST['data_chegada'];
$descricao = $_POST['descricao'];
$custo = $_POST['custo'];

// Inserindo os dados no banco de dados
$sql = "INSERT INTO viagens (destino, data_partida, data_chegada, descricao, custo)
        VALUES ('$destino', '$data_partida', '$data_chegada', '$descricao', '$custo')";

// Verificando se a inserção foi bem-sucedida
if ($conn->query($sql) === TRUE) {
    echo "Viagem cadastrada com sucesso!";
    // Redirecionar para outra página (página de sucesso ou listagem)
    header("Location: sucesso_viagem.html");
    exit();
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechar a conexão
$conn->close();
?>
