<?php
    include 'conexao.php';

    $gravanome = $_POST['nome'];
    $gravaemail = $_POST['email'];
    $gravacidade = $_POST['cidade'];
    $gravamensagem = $_POST['mensagem'];

    if ($_GET['funcao'] == "gravar") {      
        $sqlgravar = "INSERT INTO tb_curso (nome, email, cidade, mensagem) VALUES ('$gravanome','$gravaemail','$gravacidade','$gravamensagem')";

        mysqli_query($conexao, $sqlgravar);
        header ('Location: form.php');
    }

    if ($_GET['funcao'] == "editar") {
        $id = $_GET['id'];
        $sqlalterar = mysqli_query($conexao, "UPDATE tb_curso SET nome='$gravanome', email='$gravaemail', cidade='$gravacidade', mensagem='$gravamensagem' WHERE id = '$id' ");
        header ('Location: form.php');
    }

    if ($_GET['funcao'] == "excluir") {
        $id = $_GET['id'];
        $sqldel = mysqli_query($conexao, "DELETE FROM tb_curso WHERE id = '$id' ");
        header ('Location: form.php');
    }

?>

