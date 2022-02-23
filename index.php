<?php
include 'functions.php';

$pdo = pdo_connect();
$stmt = $pdo->prepare('SELECT * FROM users');
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = null;
?>

<?= template_header('Home') ?>

<table>
    <thead>
        <td>#</td>
        <td>name</td>
        <td></td>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td>
                    <a href="update.php?id=<?= $user['id'] ?>">edit</a>
                    <a href="delete.php?id=<?= $user['id'] ?>">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



<?= template_footer() ?>