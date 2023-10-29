include 'db.php';

$type = $_POST['type'];
$parentId = isset($_POST['parentId']) ? $_POST['parentId'] : null;

$query = "SELECT * FROM locations WHERE type=?";
$params = [$type];

if ($parentId !== null) {
    $query .= " AND parent_id=?";
    $params[] = $parentId;
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);

$results = [];
while ($row = $stmt->fetch()) {
    $results[] = $row;
}

echo json_encode($results);
