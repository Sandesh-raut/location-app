$host = 'localhost';
$db   = 'locationDB';
$user = 'root'; 
$pass = ''; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Uncomment the below lines for the initial setup.
    /*
    // DDL
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS locations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            type VARCHAR(255) NOT NULL,
            parent_id INT DEFAULT NULL,
            FOREIGN KEY (parent_id) REFERENCES locations(id),
            FULLTEXT(name)
        );
    ");

    // DML
    $pdo->exec("
        INSERT INTO locations(name, type) VALUES ('CountryA', 'country');
        INSERT INTO locations(name, type) VALUES ('CountryB', 'country');
        INSERT INTO locations(name, type, parent_id) VALUES ('RegionA1', 'region', 1);
        INSERT INTO locations(name, type, parent_id) VALUES ('RegionA2', 'region', 1);
    ");
    */
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
