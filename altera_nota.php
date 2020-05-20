<?php
    include 'conexao.php';
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<meta charset="UTF-8">

<?php

    $id = $_POST['selectAlteraNotaID'];
    $nome = $_POST['selectAlteraNotaNome'];
    $avaliacao = $_POST['selectAlteraNotaAvaliacao'];
    $nota = $_POST['notaAlterar'];
    $disciplina = $_POST['selectAlteraNotaDisciplina'];

    if($avaliacao == "Primeira Avaliação") $sql = "UPDATE nota SET avaliacao1=$nota WHERE id=$id";
    if($avaliacao == "Segunda Avaliação") $sql = "UPDATE nota SET avaliacao2=$nota WHERE id=$id";
    if($avaliacao == "Avaliação Final") $sql = "UPDATE nota SET avaliacao3=$nota WHERE id=$id";

    echo "<p><a href='index.php'>Alterar outra avaliação</a></p>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Nome</th>";
    echo "<th scope='col'>Avaliacao</th>";
    echo "<th scope='col'>Avaliacao 2</th>";
    echo "<th scope='col'>Avaliacao Final</th>";
    echo "<th scope='col'>Disciplina</th>";
    echo "</tr>";

    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT * FROM nota";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>#</th>";
            echo "<td>". $row["aluno"]."</td>";
            echo "<td>". $row["avaliacao1"]."</td>";
            echo "<td>". $row["avaliacao2"]."</td>";
            echo "<td>". $row["avaliacao3"]."</td>";
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
