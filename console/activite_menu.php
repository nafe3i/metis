<?php

require_once __DIR__ . '/../app/Entity/Activite.php';
require_once __DIR__ . '/../app/Service/ActiviteService.php';

$service = new ActiviteService();

while (true) {

    echo "\n--- Gestion des Activités ---\n";
    echo "1. Ajouter une activité\n";
    echo "2. Modifier une activité\n";
    echo "3. Supprimer une activité\n";
    echo "4. Historique d'un projet\n";
    echo "0. Retour\n";
    echo "Choix : ";

    $choix = trim(fgets(STDIN));

    switch ($choix) {

        //  AJOUT ACTIVITE
        case '1':
            echo "Titre : ";
            $titre = trim(fgets(STDIN));

            echo "Description : ";
            $description = trim(fgets(STDIN));

            echo "Date (YYYY-MM-DD) : ";
            $date = trim(fgets(STDIN));

            echo "ID du projet : ";
            $projetId = (int) trim(fgets(STDIN));

            try {
                $activite = new Activite($titre, $description, $date, $projetId);
                $service->ajouterActivite($activite);
                echo " Activité ajoutée\n";
            } catch (Exception $e) {
                echo "X " . $e->getMessage() . "\n";
            }
            break;

        //  MODIFIER ACTIVITE
        case '2':
            echo "ID activité : ";
            $id = (int) trim(fgets(STDIN));

            echo "Nouveau titre : ";
            $titre = trim(fgets(STDIN));

            echo "Nouvelle description : ";
            $description = trim(fgets(STDIN));

            echo "Nouvelle date (YYYY-MM-DD) : ";
            $date = trim(fgets(STDIN));

            try {
                $service->modifierActivite($id, $titre, $description, $date);
                echo " Activité modifiée\n";
            } catch (Exception $e) {
                echo "X " . $e->getMessage() . "\n";
            }
            break;

        //  SUPPRIMER ACTIVITE
        case '3':
            echo "ID activité : ";
            $id = (int) trim(fgets(STDIN));

            try {
                $service->supprimerActivite($id);
                echo " Activité supprimée\n";
            } catch (Exception $e) {
                echo "X " . $e->getMessage() . "\n";
            }
            break;

        //  HISTORIQUE
        case '4':
            echo "ID du projet : ";
            $projetId = (int) trim(fgets(STDIN));

            $activites = $service->historiqueProjet($projetId);

            if (empty($activites)) {
                echo "! Aucune activité\n";
            } else {
                foreach ($activites as $a) {
                    echo $a['date_activite'] . " | "
                       . $a['titre'] . " | "
                       . $a['description'] . "\n";
                }
            }
            break;

        case '0':
            return;

        default:
            echo "X Choix invalide\n";
    }
}
