<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Formulario de Cadastro</title>
</head>
<body>
    <!-- Formulario de Cadastrar Clientes -->

    <?php
        include 'conexao.php';
        if (isset($_GET['funcao']) != "editar") {  
    ?>

    <h2>Cadastrar Clientes</h2>

    <form method="POST" action="funcoes.php?funcao=gravar">
        <table>
            <tr>
                <th>Nome</th>
                <td>
                    <label for=""><input name="nome" type="text" id="nome"></label>
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <label for=""><input name="email" type="text" id="email"></label>
                </td>
            </tr>
            <tr>
                <th>Cidade</th>
                <td>
                    <label for=""><input name="cidade" type="text" id="cidade"></label>
                </td>
            </tr>
            <tr>
                <th>Mensagem</th>
                <td>
                    <label>
                        <textarea name="mensagem" id="mensagem" cols="50" rows="5"></textarea>
                    </label>
                </td>
            </tr>
        </table>
        <label>
            <button type="submit" name="buttoncadast" id="button" value="Cadastrar"><a class="button">Cadastrar</a></button>
        </label>
    </form>

    <?php
        }
    ?>

    <!-- Formulario de Alterar Dados de Clientes -->

    <?php
        include 'conexao.php';
        if (isset($_GET['funcao']) == "editar") {
        $id = $_GET['id'];
        $sqlupdate = mysqli_query($conexao, "SELECT * FROM tb_curso WHERE ID = '$id' ");
        while ($linha = mysqli_fetch_array($sqlupdate)) {
            $nome = $linha['nome'];
            $email = $linha['email'];
            $cidade = $linha['cidade'];
            $mensagem = $linha['mensagem'];
        }
    ?>
    
    <h2>Alterar Dados de Cliente</h2>

    <form method="POST" action="funcoes.php?funcao=editar&id=<?php echo $id ?>">
        <table>
            <tr>
                <th>Nome</th>
                <td>
                    <label><input name="nome" type="text" id="nome" value="<?php echo $nome ?>"></label>
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <label for=""><input name="email" type="text" id="email" value="<?php echo $email ?>"></label>
                </td>
            </tr>
            <tr>
                <th>Cidade</th>
                <td>
                    <label for=""><input name="cidade" type="text" id="cidade" value="<?php echo $cidade ?>"></label>
                </td>
            </tr>
            <tr>
                <th>Mensagem</th>
                <td>
                    <label>
                        <textarea name="mensagem" id="mensagem" cols="50" rows="5"><?php echo $mensagem ?></textarea>
                    </label>
                </td>
            </tr>
        </table>
        <label>
            <button type="submit" name="buttonedit" id="button" value="Alterar"><a class="button">Alterar</a></button>
        </label>
    </form>
    <?php
        }
    ?>

<table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Mensagem</th>

            <th>Editar</th>
            <th>Remover</th>
        </tr>

        <?php
            $sqlvisualizar = mysqli_query($conexao, "SELECT * FROM tb_curso");
            while ($linha = mysqli_fetch_array($sqlvisualizar)) {
            $peganome = $linha['nome'];
            $pegaemail = $linha['email'];
            $pegacidade = $linha['cidade'];
            $pegamensagem = $linha['mensagem'];
            $id = $linha['id'];
        ?>

        <tr>
            <td><?php echo $peganome ?></td>
            <td><?php echo $pegaemail ?></td>
            <td><?php echo $pegacidade ?></td>
            <td><?php echo $pegamensagem ?></td>

            <td><a class="linkeditar" href="form.php?funcao=editar&id=<?php echo $id ?>">Editar</a></td>
            <td><a class="linkeexcluir" href="funcoes.php?funcao=excluir&id=<?php echo $id ?>">Excluir</a></td>
        </tr>
    <?php
            }
    ?>
    </table>

</body>
</html>