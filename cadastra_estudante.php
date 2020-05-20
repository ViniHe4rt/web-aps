<?php
    include 'conexao.php';
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<meta charset="UTF-8">

<?php
    $key = $_POST['selectCadastrarEstudante'];
    $nome = $_POST['nomeAluno'];
    $numero =$_POST['numeroAluno'];
    $cepAluno = $_POST['cepAluno'];
    $telefone = $_POST['telefoneAluno'];
    $email = $_POST['emailAluno'];

  	$arq = file_get_contents('http://viacep.com.br/ws/'.$cepAluno.'/json/');
  	$json = json_decode($arq);

    $sql = "INSERT INTO estudante (disciplina, nome, cep, rua, numero, bairro, cidade, estado, email, telefone) VALUES ('$key', '$nome', '$json->cep', '$json->logradouro', '$numero', '$json->bairro', '$json->localidade', '$json->uf', '$email', '$telefone')";

    echo "<p><a href='index.php'>Cadastrar novo estudante</a></p>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>ID</th>";
    echo "<th scope='col'>Nome</th>";
    echo "<th scope='col'>CEP</th>";
    echo "<th scope='col'>Rua</th>";
    echo "<th scope='col'>Número</th>";
    echo "<th scope='col'>Bairro</th>";
    echo "<th scope='col'>Cidade</th>";
    echo "<th scope='col'>Estado</th>";
    echo "<th scope='col'>E-mail</th>";
    echo "<th scope='col'>Telefone</th>";
    echo "<th scope='col'>Matéria</th>";
    echo "</tr>";

    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT id, disciplina, nome, cep, rua, numero, bairro, cidade, estado, email, telefone FROM estudante";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>#</th>";
            echo "<td>". $row["id"]."</td>";
            echo "<td>". $row["nome"]."</td>";
            echo "<td>". $row["cep"]."</td>";
            echo "<td>". $row["rua"]."</td>";
            echo "<td>". $row["numero"]."</td>";
            echo "<td>". $row["bairro"]."</td>";
            echo "<td>". $row["cidade"]."</td>";
            echo "<td>". $row["estado"]."</td>";
            echo "<td>". $row["email"]."</td>";
            echo "<td>". $row["telefone"]."</td>";
            echo "<td>". $row["disciplina"]."</td>";
            echo "</tr>";
          }
        } else {
          echo "0 results";
        }
        mysqli_close($conn);
        exit();
    } else {
        echo "<h1>Deu ruim em algum lugar, irmão</h1>";
        exit();
    }
    echo "</tbody>";
    echo "</thead>";
    echo "</table>";

    mysqli_close($conn);
?>
