<?php
    session_start();
    include('conection.php');

    $erro = ""; // Variável para armazenar mensagens de erro

    if(isset($_POST['nome']) && isset($_POST['senha'])){
        // Verifica se os campos estão preenchidos
        if(strlen($_POST['nome']) == 0){
            $erro = "Preencha seu nome de usuário.";
        } else if(strlen($_POST['senha']) == 0){
            $erro = "Preencha sua senha.";
        } else {
            $nome = $mysqli->real_escape_string($_POST['nome']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $query = "SELECT * FROM admins WHERE nome = '$nome' AND senha = '$senha'";
            $result = $mysqli->query($query);

            if ($result->num_rows == 1) {
                $admin = $result->fetch_assoc();
                
                // Armazena os dados do usuário na sessão
                $_SESSION['id'] = $admin['id'];
                $_SESSION['nome'] = $admin['nome'];

                // Redireciona para a página de administrador
                header("Location: pages/admin.php");
                exit(); // Garante que o script pare aqui
            } else {
                $erro = "Nome de usuário ou senha incorretos.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/estilos-globais.css">
    <link rel="stylesheet" href="styles/login.css">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <h1>Acesse sua conta de admin</h1>
        
        <!-- Exibir erro caso ocorra -->
        <?php if($erro != ""): ?>
            <p style="color: red;"><?php echo $erro; ?></p>
        <?php endif; ?>
        <form action="" method="POST" class="formulario-de-login">
            <label for="name">Nome do administrador</label>
            <input type="text" id="name" name="nome">
            <label for="password">Senha</label>
            <input type="password" id="password" name="senha">
            <input type="submit" value="Entrar" class="entrar">
        </form>
    </div>
</body>
</html>
