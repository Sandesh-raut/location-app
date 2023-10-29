include 'db.php';

$searchTerm = $_POST['searchTerm'];

$query = "SELECT * FROM locations WHERE MATCH(name) AGAINST(? IN NATURAL LANGUAGE MODE)";
$params = [$searchTerm];

$stmt = $pdo->prepare($query);
$stmt->execute($params);

$results = [];
while ($row = $stmt->fetch()) {
    $results[] = $row;
}

echo json_encode($results);
