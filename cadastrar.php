<?php
include_once "conexao.php";

try {
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);

    $insert = $conectar->prepare("INSERT INTO login (nome, login) VALUES (:nome, :login)");
    $insert->bindParam(':nome', $nome);
    $insert->bindParam(':login', $login);
    $insert->execute();

    header("Location: index.php");
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
