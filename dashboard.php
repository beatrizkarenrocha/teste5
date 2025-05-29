<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}
include 'includes/db.php';

$pageTitle = "Dashboard";
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="main-content">
    <header class="header">
        <div class="header-left">
            <h1>Dashboard</h1>
        </div>
        <div class="header-right">
            <div class="user-info">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['usuario']['nome']) ?>&background=random" alt="User">
                <span><?= $_SESSION['usuario']['nome'] ?></span>
            </div>
            <a href="logout.php" class="logout-link">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
    </header>

    <div class="content">
        <div class="page-title">
            <h2>Visão Geral</h2>
            <div class="date-filter">
                <select>
                    <option>Hoje</option>
                    <option>Esta Semana</option>
                    <option selected>Este Mês</option>
                    <option>Este Ano</option>
                </select>
            </div>
        </div>
        
        <!-- Cards de Métricas -->
        <div class="dashboard">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Total de Vendas</div>
                    <div class="card-icon bg-primary">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="card-body">
                    <h3>R$ 42,560</h3>
                    <p>Este mês</p>
                </div>
                <div class="card-footer">
                    <i class="fas fa-arrow-up"></i> 15% desde o último mês
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
                    <h3>120</h3>
                    <p>Este mês</p>
                </div>
                <div class="card-footer">
                    <i class="fas fa-arrow-up"></i> 8% desde o último mês
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Pedidos Pendentes</div>
                    <div class="card-icon bg-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="card-body">
                    <h3>24</h3>
                    <p>Aguardando processamento</p>
                </div>
                <div class="card-footer danger">
                    <i class="fas fa-arrow-up"></i> 3 desde ontem
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Taxa de Conversão</div>
                    <div class="card-icon bg-danger">
                        <i class="fas fa-percentage"></i>
                    </div>
                </div>
                <div class="card-body">
                    <h3>4.8%</h3>
                    <p>Eficiência de vendas</p>
                </div>
                <div class="card-footer">
                    <i class="fas fa-arrow-up"></i> 0.5% desde o último mês
                </div>
            </div>
        </div>
        
        <!-- Gráficos -->
        <div class="charts">
            <div class="chart-container">
                <h3 class="chart-title">Vendas Mensais</h3>
                <div class="chart">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
            <div class="chart-container">
                <h3 class="chart-title">Distribuição de Categorias</h3>
                <div class="chart">
                    <canvas id="categoriesChart"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Últimos Usuários Registrados -->
        <div class="chart-container">
            <div class="crud-header">
                <h3 class="chart-title">Últimos Usuários Registrados</h3>
                <a href="pages/usuarios/index.php" class="btn btn-primary">
                    <i class="fas fa-eye"></i> Ver Todos
                </a>
            </div>
            <div class="chart">
                <canvas id="usersChart"></canvas>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>