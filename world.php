<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


$country = isset($_GET['country']) ? $_GET['country'] : "";
$lookup = isset($_GET['lookup']) ? $_GET['lookup'] : "country";


if ($lookup !== "cities") {

    $stmt = $conn->prepare("
        SELECT name, continent, independence_year, head_of_state 
        FROM countries
        WHERE name LIKE :country
    ");
    $stmt->execute(['country' => "%$country%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

 
    echo "<table border='1'>";
    echo "<tr>
            <th>Name</th>
            <th>Continent</th>
            <th>Independence Year</th>
            <th>Head of State</th>
          </tr>";

    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['continent']}</td>";
        echo "<td>{$row['independence_year']}</td>";
        echo "<td>{$row['head_of_state']}</td>";
        echo "</tr>";
    }

    echo "</table>";
    exit();
}


else {


    $stmt = $conn->prepare("
        SELECT cities.name, cities.district, cities.population
        FROM cities
        JOIN countries ON countries.code = cities.country_code
        WHERE countries.name LIKE :country
    ");
    $stmt->execute(['country' => "%$country%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo "<table border='1'>";
    echo "<tr>
            <th>Name</th>
            <th>District</th>
            <th>Population</th>
          </tr>";

    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['district']}</td>";
        echo "<td>{$row['population']}</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>
