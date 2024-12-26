<body>
<?php
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $contato = $_POST['contato'];

$servername = "localhost";
$banco = "cadastro_de_usuario";
$user = "root";
$password = "";

$conn = mysqli_connect($servername,  $user, $password, $banco);

if(!$conn) {
    die("Conexão falhou. " . mysqli_connect_error());
}

$sql = "INSERT INTO cadastros(nome, idade, sexo, contato) VALUES ('$nome', '$idade', '$sexo', '$contato')";

if (mysqli_query($conn, $sql)) {
echo "Você foi cadastrado com sucesso.";
    } else {
        echo "Erro: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
 <div>
    <br/><a href="javascript:history.go(-1)" class="botao">Voltar</a>
</div>
</body>