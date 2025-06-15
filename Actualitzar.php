<?php

/**
 * Classe que s'encarrega d'actualitzar un producte a la base de dades.
 * 
 * Aquesta classe utilitza la connexió proporcionada per la classe Connexio
 * per realitzar una actualització d'un producte identificat pel seu ID.
 *
 * @author Toni
 * @version 1.0
 */

require_once('Connexio.php');

class Actualitzar {

    /**
     * Actualitza un producte a la base de dades si tots els camps són proporcionats.
     *
     * @param int $id ID del producte a actualitzar.
     * @param string $nom Nom del producte.
     * @param string $descripcio Descripció del producte.
     * @param float $preu Preu del producte.
     * @param int $categoria ID de la categoria associada.
     *
     * @return void
     */
    public function actualizar($id, $nom, $descripcio, $preu, $categoria) {
        if (!isset($id) || !isset($nom) || !isset($descripcio) || !isset($preu) || !isset($categoria)) {
            echo '<p>Se requieren todos los campos para actualizar el producto.</p>';
            return;
        }

        $conexionObj = new Connexio();
        $conexion = $conexionObj->obtenirConnexio();

        $id = $conexion->real_escape_string($id);
        $nom = $conexion->real_escape_string($nom);
        $descripcio = $conexion->real_escape_string($descripcio);
        $preu = $conexion->real_escape_string($preu);
        $categoria = $conexion->real_escape_string($categoria);

        $consulta = "UPDATE productes
                     SET nom = '$nom', descripció = '$descripcio', preu = '$preu', categoria_id = '$categoria'
                     WHERE id = '$id'";

        if ($conexion->query($consulta) === TRUE) {
            header('Location: Principal.php');
            exit();
        } else {
            echo '<p>Error al actualizar el producto: ' . $conexion->error . '</p>';
        }

        $conexion->close();
    }
}

// Recollida de dades del formulari
$id = isset($_POST['id']) ? $_POST['id'] : null;
$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$descripcio = isset($_POST['descripcio']) ? $_POST['descripcio'] : null;
$preu = isset($_POST['preu']) ? $_POST['preu'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;

// Instància i execució de l'actualització
$actualizarProducto = new Actualitzar();
$actualizarProducto->actualizar($id, $nom, $descripcio, $preu, $categoria);

?>
