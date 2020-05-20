<?php
  session_start();
  include 'conexao.php';
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<meta charset="UTF-8" />

<div class="container-sm">
    <div class="container-fluid">
        <h2>Cadastrar Disciplina</h2>
        <form action="cadastra_disciplina.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Disciplina</label>
                    <input type="text" class="form-control" id="inputEmail4" name="disciplina" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        <h2>Cadastrar Estudante</h2>
        <form action="cadastra_estudante.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" class="form-control" id="inputEmail4" name="nomeAluno" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">CEP</label>
                    <input type="number" class="form-control" id="inputPassword4" name="cepAluno" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Número</label>
                    <input type="number" class="form-control" id="inputPassword4" name="numeroAluno" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Email</label>
                    <input type="text" class="form-control" id="inputPassword4" name="emailAluno" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Telefone</label>
                    <input type="number" class="form-control" id="inputEmail4" name="telefoneAluno" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Disciplina</label>
                    <select id="inputState" class="form-control" name="selectCadastrarEstudante">
                        <option selected>Escolha uma disciplina</option>
                        <?php
                         $query = "SELECT * FROM disciplina ";
                         $result = mysqli_query($conn,$query);
                        ?>

                        <?php while($consulta = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $consulta['disciplina'];?>"><?php echo $consulta['disciplina'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        <h2>Lançar Nota</h2>
        <form action="cadastra_nota.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">Aluno</label>
                    <select id="inputState" class="form-control" name="selectLancarNotaNome">
                        <option selected>Escolha um aluno</option>
                        <?php
                       $query = "SELECT * FROM estudante ";
                       $result = mysqli_query($conn,$query);
                      ?>
                        <?php while($consulta = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $consulta['nome'];?>"><?php echo $consulta['nome'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Avaliação 1</label>
                    <input type="number" class="form-control" id="inputPassword4" name="avaliacao1" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Avaliacao 2</label>
                    <input type="number" class="form-control" id="inputPassword4" name="avaliacao2" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Avaliacao Final</label>
                    <input type="number" class="form-control" id="inputPassword4" name="avaliacao3" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">Disciplina</label>
                    <select id="inputState" class="form-control" name="selectLancarNotaDisciplina">
                        <option selected>Escolha uma disciplina</option>
                        <?php
                     $query = "SELECT * FROM disciplina ";
                     $result = mysqli_query($conn,$query);
                    ?>
                        <?php while($consulta = mysqli_fetch_array($result)){ ?>
                        <option><?php echo $consulta['disciplina'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        <h2>Alterar Nota</h2>
        <form action="altera_nota.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">Aluno</label>
                    <select id="inputState" class="form-control" name="selectAlteraNotaNome">
                        <option selected>Escolha um aluno</option>
                        <?php
                       $query = "SELECT * FROM estudante ";
                       $result = mysqli_query($conn,$query);
                      ?>
                        <?php while($consulta = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $consulta['nome'];?>"><?php echo $consulta['nome'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Avaliação</label>
                    <select id="inputState" class="form-control" name="selectAlteraNotaAvaliacao">
                        <option selected>Escolha uma avaliação</option>
                        <option value="Primeira Avaliação">Primeira Avaliação</option>
                        <option value="Segunda Avaliação">Segunda Avaliação</option>
                        <option value="Avaliação Final">Avaliação Final</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Nota</label>
                    <input type="number" class="form-control" id="inputPassword4" name="notaAlterar" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Disciplina</label>
                    <select id="inputState" class="form-control" name="selectAlteraNotaDisciplina">
                        <option selected>Escolha uma disciplina</option>
                        <?php
                       $query = "SELECT * FROM disciplina ";
                       $result = mysqli_query($conn,$query);
                      ?>
                        <?php while($consulta = mysqli_fetch_array($result)){ ?>
                        <option><?php echo $consulta['disciplina'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">ID</label>
                    <select id="inputState" class="form-control" name="selectAlteraNotaID">
                        <option selected>Escolha o ID respectivo do aluno</option>
                        <?php
                       $query = "SELECT * FROM nota ";
                       $result = mysqli_query($conn,$query);
                      ?>
                        <?php while($consulta = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $consulta['id'];?>"><?php echo $consulta['id'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <form method="get" action="relatorio.php">
            <button type="submit" class="btn btn-primary">Relatorio</button>
        </form>
    </div>
</div>
