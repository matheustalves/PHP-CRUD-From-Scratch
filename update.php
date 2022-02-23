<?php
include 'functions.php';

$pdo = pdo_connect();

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $name = isset($_POST['name']) ? $_POST['name'] : '';

        $stmt = $pdo->prepare('UPDATE users SET id = ?, name = ? WHERE id = ?');
        $stmt->execute(array($id, $name, $_GET['id']));
        header('Location: index.php');
    }

    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute(array($_GET['id']));

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        exit('This user does not exist.');
    }
} else {
    exit('No ID specified.');
}
?>

<?= template_header('Update User ' . $user['id']) ?>

<form action="update.php?id=<?= $user['id'] ?>" method="post">
    <input type="text" name="id" value=<?= $user['id'] ?> style="display:none">
    <input type="text" name="name" value=<?= $user['name'] ?>>
    <input type="submit" value="Update">
</form>



<?= template_footer() ?>