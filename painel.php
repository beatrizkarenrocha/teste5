<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}
include 'includes/db.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .dashboard-header {
            background-color: #2d3748;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .dashboard-title {
            margin: 0;
            font-size: 1.5rem;
        }

        .logout-link {
            color: #a0aec0;
            text-decoration: none;
            transition: color 0.3s;
            font-weight: 600;
        }

        .logout-link:hover {
            color: white;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .dashboard-welcome {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .module-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .module-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .module-link {
            display: block;
            padding: 25px;
            text-decoration: none;
            color: #2d3748;
        }

        .module-title {
            margin: 0 0 10px 0;
            font-size: 1.2rem;
        }

        .module-description {
            color: #718096;
            margin: 0;
        }
    </style>
</head>
<body>
    <header class="dashboard-header">
        <h1 class="dashboard-title">Painel de Controle</h1>
        <a href="logout.php" class="logout-link">Sair</a>
    </header>
    
    <div class="dashboard-container">
        <div class="dashboard-welcome">
            <h1>Bem-vindo, <?php echo $_SESSION['usuario']['nome']; ?>!</h1>
        </div>
        
        <div class="module-grid">
            <div class="module-card">
                <a href="pages/usuarios/index.php" class="module-link">
                    <h3 class="module-title">Usuários</h3>
                    <p class="module-description">Gerencie os usuários do sistema</p>
                </a>
            </div>
            
            <div class="module-card">
                <a href="pages/produtos/index.php" class="module-link">
                    <h3 class="module-title">Produtos</h3>
                    <p class="module-description">Gerencie os produtos</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>