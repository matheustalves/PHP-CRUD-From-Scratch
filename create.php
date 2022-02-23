<?php
include 'functions.php';

$pdo = pdo_connect();

if (isset($_POST['name'])) {
    $stmt = $pdo->prepare('INSERT INTO users VALUES (NULL, ?)');
    $stmt->execute(array($_POST['name']));
    $stmt = null;
    header('Location: index.php');
}
?>

<?= template_header('Create User') ?>

<hr>
<form action="create.php" method="POST">
    <input type="text" name="name">
    <input type="submit" value="cadastrar">
</form>

<?= template_footer() ?>