<?php
// Configuração do banco de dados
$servername = "localhost";
$banco = "cadastro_de_usuario";
$user = "root";
$password = "";

// Criando a conexão
$conn = new mysqli($servername, $user, $password, $banco);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o nome foi enviado pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);

    // Consulta segura com Prepared Statement para evitar SQL Injection
    $stmt = $conn->prepare("SELECT * FROM cadastros WHERE nome = ?");
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>Dados Encontrados:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "Nome: " . htmlspecialchars($row["nome"]) . "<br>";
            echo "Idade: " . htmlspecialchars($row["idade"]) . "<br>";
            echo "Sexo: " . htmlspecialchars($row["sexo"]) . "<br>";
            echo "Contato: " . htmlspecialchars($row["contato"]) . "<br>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum registro encontrado para o nome informado.";
    }

    $stmt->close();
}

$conn->close();
?>

<div>
    <br/><a href="javascript:history.go(-1)" class="botao">Voltar</a>
</div>
