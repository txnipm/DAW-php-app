<?php
/**
 * Script nou.php
 * Mostra tots els productes amb la seva categoria des de la BBDD la_meva_botiga
 */

$host = 'localhost';
$db = 'la_meva_botiga';
$user = 'root';
$pass = '12345';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT productes.nom AS producte, preu, categories.nom AS categoria
            FROM productes
            INNER JOIN categories ON productes.categoria_id = categories.id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo "<h1>Llista de productes</h1><ul>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<li><strong>{$row['producte']}</strong> ({$row['categoria']}) - {$row['preu']} €</li>";
    }
    echo "</ul>";

} catch(PDOException $e) {
    echo "Error de connexió: " . $e->getMessage();
}
?>
