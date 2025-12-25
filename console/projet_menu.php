<?php

require_once __DIR__ . '/../app/Entity/ProjetCourt.php';
require_once __DIR__ . '/../app/Entity/ProjetLong.php';
require_once __DIR__ . '/../app/Service/ProjetService.php';
require_once __DIR__ . '/../app/Repository/ProjetRepository.php';

$service = new ProjetService();
$repo = new ProjetRepository();

while (true) {

    echo "\n--- Gestion des Projets ---\n";
    echo "1. Créer un projet\n";
    echo "2. Lister tous les projets\n";
    echo "3. Supprimer un projet\n";
    echo "0. Retour\n";
    echo "Choix : ";

    $choix = trim(fgets(STDIN));

    switch ($choix) {

        //  CREER PROJET
        case '1':
            echo "Titre : ";
            $titre = trim(fgets(STDIN));

            echo "Description : ";
            $description = trim(fgets(STDIN));

            echo "Type (1 = court, 2 = long) : ";
            $type = trim(fgets(STDIN));

            echo "ID du membre : ";
            $membreId = (int) trim(fgets(STDIN));

            try {
                if ($type == '1') {
                    $projet = new ProjetCourt($titre, $description, $membreId);
                } elseif ($type == '2') {
                    $projet = new ProjetLong($titre, $description, $membreId);
                } else {
                    echo "X : Type invalide\n";
                    break;
                }

                $service->createProjet($projet);
                echo " Projet créé\n";

            } catch (Exception $e) {
                echo "X " . $e->getMessage() . "\n";
            }
            break;

        //  LISTE PROJETS
        case '2':
            $projets = $repo->findAll();
            foreach ($projets as $p) {
                echo $p['id'] . " | "
                   . $p['titre'] . " | "
                   . $p['type_proj'] . " | "
                   . "Membre #" . $p['membre_id'] . "\n";
            }
            break;

        //  SUPPRESSION
        case '3':
            echo "ID du projet : ";
            $id = (int) trim(fgets(STDIN));

            try {
                $service->deleteProjet($id);
                echo " Projet supprimé\n";
            } catch (Exception $e) {
                echo "X " . $e->getMessage() . "\n";
            }
            break;

        case '0':
            return;

        default:
            echo "X : Choix invalide\n";
    }
}
