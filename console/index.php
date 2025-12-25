<?php

while (true) {

    echo "\n========= METIS =========\n";
    echo "1. Gestion des membres\n";
    echo "2. Gestion des projets\n";
    echo "3. Gestion des activités\n";
    echo "0. Quitter\n";
    echo "Choix : ";

    $choix = trim(fgets(STDIN));

    switch ($choix) {
        case '1':
            require 'membre_menu.php';
            break;

        case '2':
            require 'projet_menu.php';
            break;

        case '3':
            require 'activite_menu.php';
            break;

        case '0':
            echo " Au revoir\n";
            exit;

        default:
            echo " Choix invalide\n";
    }
}
?>
