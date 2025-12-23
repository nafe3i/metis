CREATE DATABASE metis;

USE metis ;

CREATE TABLE membres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT uq_membre_email UNIQUE (email)
);

CREATE TABLE projets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description TEXT,
    type_proj ENUM('court', 'long') NOT NULL,
    membre_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_projet_membre
        FOREIGN KEY (membre_id)
        REFERENCES membres(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE activites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description TEXT,
    date_activite DATE NOT NULL,
    projet_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_activite_projet
        FOREIGN KEY (projet_id)
        REFERENCES projets(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

