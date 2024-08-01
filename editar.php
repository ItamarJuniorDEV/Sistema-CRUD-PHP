<?php
include_once "conexao.php";

try {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);

    $update = $conectar->prepare("UPDATE login SET nome = :nome, login = :login WHERE id = :id");
    $update->bindParam(':id', $id);
    $update->bindParam(':nome', $nome);
    $update->bindParam(':login', $login);
    $update->execute();

    header("Location: index.php");
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
