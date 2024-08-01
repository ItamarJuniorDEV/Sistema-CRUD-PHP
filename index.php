<?php
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Listagem de Usuários</h1>
        <a href="formCadastro.php" class="btn btn-primary mb-3">Novo Cadastro</a>
        <?php
        try {
            $consulta = $conectar->query('SELECT * FROM login');
            echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>Nome</th><th>Login</th><th>Ações</th></tr></thead><tbody>";

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$linha['nome']}</td><td>{$linha['login']}</td><td>
                      <a href='formEditar.php?id={$linha['id']}' class='btn btn-warning btn-sm'>Editar</a>
                      <a href='excluir.php?id={$linha['id']}' class='btn btn-danger btn-sm'>Excluir</a>
                      </td></tr>";
            }

            echo "</tbody></table>";
            echo "<p class='text-muted'>" . $consulta->rowCount() . " Registros Exibidos</p>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
