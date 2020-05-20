<?php
    include 'conexao.php';
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<meta charset="UTF-8">

<?php

    $sql = "SET SQL_SAFE_UPDATES = 0";

    echo "<p><a href='index.php'>Voltar</a></p>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Código</th>";
    echo "<th scope='col'>Nome</th>";
    echo "<th scope='col'>Disciplina</th>";
    echo "<th scope='col'>Aval. 1</th>";
    echo "<th scope='col'>Aval. 2</th>";
    echo "<th scope='col'>Aval. 3</th>";
    echo "<th scope='col'>Média</th>";
    echo "<th scope='col'>Conceito</th>";
    echo "</tr>";

    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT estudante.id, estudante.nome, estudante.disciplina, nota.avaliacao1, nota.avaliacao2, nota.avaliacao3 FROM nota, estudante";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>#</th>";
            echo "<td>". $row["id"]."</td>";
            echo "<td>". $row["nome"]."</td>";
            echo "<td>". $row["disciplina"]."</td>";
            echo "<td>". $nota = $row["avaliacao1"]."</td>";
            echo "<td>". $nota2 = $row["avaliacao2"]."</td>";
            echo "<td>". $nota3 = $row["avaliacao3"]."</td>";
            $float_nota = floatval($nota);
            $float_nota2 = floatval($nota2);
            $float_nota3 = floatval($nota3);
            $media = ($float_nota + $float_nota2 + $float_nota3)/3;
            echo "<td>". $media."</td>";
            if($media <= 10 && $media >= 8.5) echo "<td>A</td>";
            if($media <= 8.4 && $media >= 7) echo "<td>B</td>";
            if($media <= 6.9 && $media >= 6) echo "<td>C</td>";
            if($media <= 5.9 && $media >= 4) echo "<td style='color:red'>D</td>";
            if($media <= 3.9) echo "<td style='color:red'>F</td>";
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
