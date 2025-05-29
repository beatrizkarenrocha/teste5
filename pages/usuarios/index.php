<?php
include '../../includes/db.php';

// Obter estatísticas
$total_usuarios = $pdo->query('SELECT COUNT(*) FROM usuarios')->fetchColumn();
$novos_usuarios = $pdo->query('SELECT COUNT(*) FROM usuarios WHERE created_at > DATE_SUB(NOW(), INTERVAL 7 DAY)')->fetchColumn();

$pageTitle = "Gerenciar Usuários";
include '../../includes/header.php';
include '../../includes/sidebar.php';
?>

<div class="main-content">
    <header class="header">
        <div class="header-left">
            <h1>Usuários</h1>
        </div>
        <div class="header-right">
            <div class="user-info">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['usuario']['nome']) ?>&background=random" alt="User">
                <span><?= $_SESSION['usuario']['nome'] ?></span>
            </div>
            <a href="../../logout.php" class="logout-link">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
    </header>

    <div class="content">
        <div class="page-title">
            <h2>Gerenciar Usuários</h2>
            <a href="add.php" class="btn btn-primary">
                <i class="fas fa-plus"></i> Novo Usuário
            </a>
        </div>
        
        <!-- Cards de Relatório -->
        <div class="dashboard">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Total de Usuários</div>
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="card-body">
                    <h3><?= $total_usuarios ?></h3>
                    <p>Registrados</p>
                </div>
                <div class="card-footer">
                    <i class="fas fa-arrow-up"></i> 5% desde o último mês
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Novos Usuários</div>
                    <div class="card-icon bg-success">
                        <i class="fas fa-user-plus"></i>
                    </div>
                </div>
                <div class="card-body">
                    <h3><?= $novos_usuarios ?></h3>
                    <p>Últimos 7 dias</p>
                </div>
                <div class="card-footer">
                    <i class="fas fa-arrow-up"></i> 12% desde a semana passada
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Usuários Ativos</div>
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-check"></i>
                    </div>
                </div>
                <div class="card-body">
                    <h3>92%</h3>
                    <p>Taxa de atividade</p>
                </div>
                <div class="card-footer">
                    <i class="fas fa-arrow-up"></i> 3% desde o último mês
                </div>
            </div>
        </div>
        
        <!-- Tabela de Usuários -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Registro</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query('SELECT * FROM usuarios ORDER BY id DESC LIMIT 10');
                    while ($row = $stmt->fetch()):
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nome'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= date('d/m/Y', strtotime($row['created_at'] ?? 'now')) ?></td>
                        <td>
                            <span class="badge badge-success">Ativo</span>
                        </td>
                        <td class="action-cell">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>