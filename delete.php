<?php
include('functions.php');
$pdo = pdo_connect();

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute(array($_GET['id']));

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        exit('no user with that id.');
    }

    if (isset($_POST['id'])) {
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute(array($_POST['id']));
        header('Location: index.php');
    }
} else {
    exit('no id specified.');
}
?>

<?= template_header('Delete user ' . $user['id'] . '?') ?>

<table>
    <thead>
        <td>name</td>
        <td>confirm</td>
    </thead>
    <tbody>
        <tr>
            <td><?= $user['name'] ?></td>
            <td>
                <form action="delete.php?id=<?= $user['id'] ?>" method="POST">
                    <input type="text" value=<?= $user['id'] ?> name="id" style="display:none">
                    <input type="submit" value="✅">
                </form>
            </td>
        </tr>
    </tbody>
</table>