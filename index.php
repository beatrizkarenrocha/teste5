<?php
session_start();
include 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ? AND senha = ?');
    $stmt->execute([$email, $senha]);
    if ($stmt->rowCount()) {
        $_SESSION['usuario'] = $stmt->fetch();
        header('Location: painel.php');
        exit;
    } else {
        $erro = 'Login inválido!';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 25px;
            color: #2d3748;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .login-form input[type="text"]:focus,
        .login-form input[type="password"]:focus {
            border-color: #4299e1;
            outline: none;
        }

        .login-form input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4299e1;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .login-form input[type="submit"]:hover {
            background-color: #3182ce;
        }

        .error-message {
            color: #e53e3e;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Login</h2>
        </div>
        <form method="post" class="login-form">
            <input type="text" name="email" placeholder="Email" required><br>
            <input type="password" name="senha" placeholder="Senha" required><br>
            <input type="submit" value="Entrar">
        </form>
        <?php if(isset($erro)): ?>
            <div class="error-message"><?php echo $erro; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>