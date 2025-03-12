<?php

include("./dao/UserDAO.php");

$host = 'localhost';
$dbname = 'dao';
$usr = 'root';
$pass = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $usr,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$dao = new UserDAO($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    
    if (!empty($name) && !empty($email)) {
        $user = new User($name, $email);
        $dao->create($user);
    }

    header("location: ?page=users");
}

$users = $dao->readAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>
    <?php include "./views/nav.php"; ?>

    <div class="content">
        <?= $view ?>

        <h2>Usuarios registrados</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user->getId()) ?></td>
                    <td><?= htmlspecialchars($user->getName()) ?></td>
                    <td><?= htmlspecialchars($user->getEmail()) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php include "./views/footer.php"; ?>
</body>

</html>