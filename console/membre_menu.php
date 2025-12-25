<?php

require_once __DIR__ . '/../app/Entity/Membre.php';
require_once __DIR__ . '/../app/Service/MembreService.php';
require_once __DIR__ . '/../app/Repository/MembreRepository.php';

$service = new MembreService();
$repo = new MembreRepository();

while (true) {

    echo "\n--- Gestion des Membres ---\n";
    echo "1. Ajouter un membre\n";
    echo "2. Lister les membres\n";
    echo "3. Supprimer un membre\n";
    echo "0. Retour\n";
    echo "Choix : ";

    $choix = trim(fgets(STDIN));

    switch ($choix) {

        //  AJOUT MEMBRE
        case '1':
            echo "Nom : ";
            $nom = trim(fgets(STDIN));

            echo "Prénom : ";
            $prenom = trim(fgets(STDIN));

            echo "Email : ";
            $email = trim(fgets(STDIN));

            try {
                $membre = new Membre($nom, $prenom, $email);
                $service->createMembre($membre);
                echo " Membre ajouté\n";
            } catch (Exception $e) {
                echo " X " . $e->getMessage() . "\n";
            }
            break;

        //  LISTE MEMBRES
        case '2':
            $membres = $repo->findAll();
            foreach ($membres as $m) {
                echo $m['id'] . " | "
                   . $m['nom'] . " "
                   . $m['prenom'] . " | "
                   . $m['email'] . "\n";
            }
            break;

        //  SUPPRESSION
        case '3':
            echo "ID du membre : ";
            $id = (int) trim(fgets(STDIN));

            try {
                $service->deleteMembre($id);
                echo " Membre supprimé\n";
            } catch (Exception $e) {
                echo "X " . $e->getMessage() . "\n";
            }
            break;

        case '0':
            return;

        default:
            echo " Choix invalide\n";
    }
}
