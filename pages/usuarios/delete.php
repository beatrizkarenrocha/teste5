<?php
include '../../includes/db.php';
$stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = ?');
$stmt->execute([$_GET['id']]);
header('Location: index.php');
?>