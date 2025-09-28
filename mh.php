
<?php
// index.php
require 'db.php';

// handle new student form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $year = (int)($_POST['year'] ?? 1);

    if ($name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $pdo->prepare("INSERT INTO students (full_name, email, year) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $year]);
        // redirect to avoid form re-submit
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = "Please enter valid name and email.";
    }
}

// fetch all students
$students = $pdo->query("SELECT * FROM students ORDER BY id DESC")->fetchAll();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Students Table</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; }
    table { border-collapse: collapse; width: 100%; max-width: 900px; }
    th, td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }
    th { background: #f4f4f4; }
    form { margin-bottom: 20px; }
    input[type="text"], input[type="email"], select { padding:6px; }
    .error { color: red; }
  </style>
</head>
<body>
  <h1>Students</h1>

  <?php if (!empty($error)): ?>
    <p class="error"><?=htmlspecialchars($error)?></p>
  <?php endif; ?>

  <form method="post" style="max-width:600px;">
    <input type="text" name="full_name" placeholder="Full name" required>
    <input type="email" name="email" placeholder="Email" required>
    <select name="year">
      <option value="1">Year 1</option>
      <option value="2">Year 2</option>
      <option value="3">Year 3</option>
    </select>
    <button type="submit">Add Student</button>
  </form>

  <table>
    <thead>
      <tr><th>ID</th><th>Full Name</th><th>Email</th><th>Year</th><th>Created At</th></tr>
    </thead>
    <tbody>
      <?php if (count($students) === 0): ?>
        <tr><td colspan="5">No students yet.</td></tr>
      <?php else: ?>
        <?php foreach ($students as $s): ?>
          <tr>
            <td><?=htmlspecialchars($s['id'])?></td>
            <td><?=htmlspecialchars($s['full_name'])?></td>
            <td><?=htmlspecialchars($s['email'])?></td>
            <td><?=htmlspecialchars($s['year'])?></td>
            <td><?=htmlspecialchars($s['created_at'])?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>


