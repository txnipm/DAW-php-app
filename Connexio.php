<?php

/**
 * Classe Connexio
 * 
 * Gestiona la connexió amb la base de dades `la_meva_botiga` mitjançant mysqli.
 * Aquesta classe encapsula les dades de connexió i retorna un objecte mysqli funcional.
 * 
 * @author Toni
 * @version 1.0
 */
class Connexio {

    /**
     * @var string Nom del servidor de base de dades
     */
    private $host = "localhost";

    /**
     * @var string Nom d'usuari de la base de dades
     */
    private $usuario = "botiga";

    /**
     * @var string Contrasenya de l'usuari
     */
    private $contraseña = "botiga123";

    /**
     * @var string Nom de la base de dades
     */
    private $baseDatos = "la_meva_botiga";

    /**
     * Obté una connexió activa a la base de dades mitjançant mysqli.
     *
     * @return mysqli Connexió activa a la base de dades
     * @throws Exception Si hi ha un error de connexió
     */
    public function obtenirConnexio() {
        $conexion = new mysqli($this->host, $this->usuario, $this->contraseña, $this->baseDatos);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        return $conexion;
    }
}

?>
