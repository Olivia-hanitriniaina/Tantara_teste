
create table Profil_utilisateur
(
    id_profil integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
    type_utilisateur VARCHAR(100) UNIQUE NOT NULL 
);

create table Utilisateur
(
    id_utilisateur integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(200),
    email VARCHAR(100),
    telephone VARCHAR(100),
    motdepasse VARCHAR(300),
    id_profil INTEGER,
    FOREIGN KEY  (`id_profil`) REFERENCES `Profil_utilisateur` (`id_profil`)
);

create table Genre
(
    id_genre integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
);

create table Tantara
(
    id_tantara integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_genre INTEGER,
    id_utilisateur INTEGER,
    date Date,
    titre VARCHAR(100),
    image VARCHAR(200),
    FOREIGN KEY  (`id_genre`) REFERENCES `Genre` (`id_genre`),
    FOREIGN KEY  (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`)
);

create table Detail_tantara
(
    id_tantara integer,
    description text,
    FOREIGN KEY  (`id_tantara`) REFERENCES `Tantara` (`id_tantara`)
);

create table Radio 
(
    radio_id integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
    radio_name VARCHAR(100)
);

INSERT INTO Radio (radio_name) VALUES ('RDB');
INSERT INTO Radio (radio_name) VALUES ('AZ radio');
INSERT INTO Radio (radio_name) VALUES ('ACEEM radio');
INSERT INTO Radio (radio_name) VALUES ('Record FM');

create table notification
(
    id_notification integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
    envoye_id integer,
    recipient_id integer,
    message_envoye text,
    id_tantara integer,
    etat boolean,
    date DATETIME,
    id_radio INTEGER,
    FOREIGN KEY  (`envoye_id`) REFERENCES `Utilisateur` (`id_utilisateur`),
    FOREIGN KEY  (`recipient_id`) REFERENCES `Utilisateur` (`id_utilisateur`),
    FOREIGN KEY  (`id_tantara`) REFERENCES `Tantara` (`id_tantara`),
    FOREIGN KEY  (`id_radio`) REFERENCES `radio` (`radio_id`)

);

create table Autoriter
(
   id_tantara integer,
   id_utilisateur integer,
   etat boolean,
   date DATETIME,
   FOREIGN KEY  (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`),
   FOREIGN KEY  (`id_tantara`) REFERENCES `Tantara` (`id_tantara`)
);