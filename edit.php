<?php
include __DIR__ . '/db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare("UPDATE students SET name=?, email=?, phone=? WHERE id=?");
    $stmt->execute([$name, $email, $phone, $id]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?php echo $student['name']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br><br>
        Phone: <input type="text" name="phone" value="<?php echo $student['phone']; ?>"><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
