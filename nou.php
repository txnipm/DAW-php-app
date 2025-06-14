<?php
/**
 * Script nou.php
 * Mostra tots els productes amb la seva categoria des de la base de dades la_meva_botiga
 */


require_once 'Connexio.php';

// Crear una instància de la classe Connexio i obtenir la connexió
$connexio = new Connexio();
$conexion = $connexio->obtenirConnexio();

// Consulta SQL
$sql = "SELECT productes.nom AS producte, preu, categories.nom AS categoria
        FROM productes
        INNER JOIN categories ON productes.categoria_id = categories.id";

$resultat = $conexion->query($sql);

// Comprovar i mostrar resultats
if ($resultat && $resultat->num_rows > 0) {
    echo "<h1>Llista de productes</h1><ul>";
    while ($fila = $resultat->fetch_assoc()) {
        echo "<li><strong>{$fila['producte']}</strong> ({$fila['categoria']}) - {$fila['preu']} €</li>";
    }
    echo "</ul>";
} else {
    echo "No s'han trobat productes.";
}

// Tancar connexió
$conexion->close();
?>
