CREATE TABLE Especes (
    id_espece INT AUTO_INCREMENT PRIMARY KEY,
    nom_race VARCHAR(255) NOT NULL,
    type_nourriture ENUM('Carnivore', 'Herbivore', 'Omnivore') NOT NULL,
    duree_vie_moyenne INT,
    aquatique BOOLEAN
);

CREATE TABLE Animaux (
    id_animal INT AUTO_INCREMENT PRIMARY KEY,
    id_espece INT NOT NULL,
    date_naissance DATE,
    sexe ENUM('M', 'F'),
    pseudo VARCHAR(255) NOT NULL,
    commentaire VARCHAR(255),
    FOREIGN KEY (id_espece) REFERENCES Especes(id_espece)
);

CREATE TABLE Personnels (
    id_personnel INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    date_naissance DATE NOT NULL,
    sexe ENUM('H', 'F') NOT NULL,
    login VARCHAR(255),
    mdp VARCHAR(255),
    fonction ENUM('Directeur', 'Employé') NOT NULL,
    salaire DECIMAL(7,2) NOT NULL
);

CREATE TABLE Enclos (
    id_enclos INT AUTO_INCREMENT PRIMARY KEY,
    nom_enclos VARCHAR(255),
    capacite_max_animaux INT NOT NULL,
    taille FLOAT,
    presence_eau BOOLEAN,
    id_personnel_responsable INT,
    FOREIGN KEY (id_personnel_responsable) REFERENCES Personnels(id_personnel)
);

CREATE TABLE Loc_animaux (
    id_loc_animal INT AUTO_INCREMENT PRIMARY KEY,
    id_animal INT NOT NULL,
    id_enclos INT,
    date_arrivee DATE,
    date_sortie DATE,
    FOREIGN KEY (id_animal) REFERENCES Animaux(id_animal),
    FOREIGN KEY (id_enclos) REFERENCES Enclos(id_enclos)
);
