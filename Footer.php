<?php

/**
 * Classe Footer
 * 
 * Aquesta classe s'encarrega de mostrar el peu de pàgina HTML per a l'aplicació web.
 * Inclou els scripts de Bootstrap i el codi per inicialitzar un carrusel.
 * 
 * @author Toni
 * @version 1.0
 */
class Footer {

    /**
     * Mostra el contingut HTML del peu de pàgina i scripts finals.
     *
     * Aquest mètode imprimeix el codi HTML per al footer, incloent estils i scripts
     * de Bootstrap per activar funcions com el carrusel automàtic.
     *
     * @return void
     */
    public function mostrarFooter() {
        echo '<div class="footer text-center bg-dark text-white py-2">
                <p>&copy; 2023 CIFP Pau Casesnoves · Centro de Formación Profesional</p>
              </div>';

        echo '<!-- Scripts de Bootstrap des del CDN i script personalitzat -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener(\'DOMContentLoaded\', function () {
        var myCarousel = new bootstrap.Carousel(document.getElementById(\'carrusel\'), {
            interval: 2000,
            wrap: true
        });
    });
</script>';

        echo '</body></html>';
    }
}

// Crea una instància i mostra el footer
$footer = new Footer();
$footer->mostrarFooter();

?>
