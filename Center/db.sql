CREATE DATABASE IF NOT EXISTS gestion_de_centre;

USE gestion_de_centre;

CREATE TABLE Formateurs  (
    id_formateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150),    
    prenom VARCHAR(150),
    email VARCHAR(150),
    mot_de_passe VARCHAR(30)
);



-- Inserting data into the formateurs table
INSERT INTO Formateurs (id_formateur, nom, prenom, email, mot_de_passe) VALUES
(1, 'Dupont', 'Pierre', 'pierre.dupont@gmail.com', 'pass123'),
(2, 'Martin', 'Sophie', 'sophie.martin@gmail.com', 'password'),
(3, 'Leblanc', 'Jean', 'jean.leblanc@gmail.com', 'secret123');
(4, 'Nihad', 'Boker', 'Nihad.Boker@gmail.com', 'secret123');





CREATE TABLE Apprenants  (
    id_apprenant INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150),
    prenom VARCHAR(150),
    email VARCHAR(150),
    mot_de_passe VARCHAR(102)
);

-- Inserting data into the apprenants table
INSERT INTO Apprenants (id_apprenant, nom, prenom, email, mot_de_passe) VALUES
(1, 'Doe', 'John', 'john.doe@example.com', 'password123'),
(2, 'Smith', 'Jane', 'jane.smith@example.com', 'secret123'),
(3, 'Garcia', 'Maria', 'maria.garcia@example.com', 'mypassword');


CREATE TABLE Formations (
    id_formation INT AUTO_INCREMENT PRIMARY KEY,
    sujet VARCHAR(100),
    categorie VARCHAR(50),
    description VARCHAR(100),
    masse_horaire INT,
    image varchar(2000)
);

INSERT INTO Formations (id_formation, sujet, categorie,  description,  masse_horaire,  image) VALUES
(1, 'Word',        'Informatique',  'Some quick example text to build on the card title and make up the bulk of the cards content',  40,  'https://f.hellowork.com/blogdumoderateur/2017/05/word.jpg'),
(2, 'chess',       'gaming',   'Some quick example text to build on the card title and make up the bulk of the cards content',       30, 'https://www.creachess.com/cours/imgs/pieces-echiquier.png'),
(3, 'power point', 'Informatique',  'Some quick example text to build on the card title and make up the bulk of the cards content',  30, 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Microsoft_Office_PowerPoint_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_PowerPoint_%282019%E2%80%93present%29.svg.png'),
(4, 'Excel',       'Informatique',  'Some quick example text to build on the card title and make up the bulk of the cards content',  40, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNiS-Z8bLdxgeZAZ7LHQU8jT3Y8KWm4BhGTEoK-vTNb96c1eLTtDZKOT0vpAwso55sdHw&usqp=CAU'),
(5, 'SQL',         'Developement', 'Some quick example text to build on the card title and make up the bulk of the cards content' ,  40, 'https://www.datocms-assets.com/14946/1627286560-sql-databases.png?auto=format&corner-radius=16&fit=crop&h=312&mask=corners&q=45&w=568'),
(6, 'PHP',         'Developement',  'Some quick example text to build on the card title and make up the bulk of the cards content',   50, 'https://www.training-dev.fr/Img/Category/Php.png');


CREATE TABLE Sessions (
    id_session INT AUTO_INCREMENT PRIMARY KEY,
    date_debut DATE,
    date_fin DATE,
    etat varchar(50) DEFAULT NULL,
    places INT,
    id_formation INT,
    id_formateur INT,
    FOREIGN KEY (id_formation) REFERENCES Formations(id_formation),
    FOREIGN KEY (id_formateur) REFERENCES Formateurs(id_formateur)
);

-- Inserting data into the sessions table
INSERT INTO sessions (id_session, date_debut, date_fin, etat, places, id_formation, id_formateur) VALUES
(1, '2023-05-22', '2023-07-01', 'En cours', 6, 1, 1),
(2, '2023-06-01', '2023-06-30', "en cours d'inscription ", 10, 2, 2),
(3, '2023-07-01', '2023-07-31', 'en cours', 5, 3, 3);
(4, '2023-08-01', '2023-09-01', 'en cours', 4, 4, 4);
(5, '2023-10-01', '2023-11-01', 'en cours', 4, 5, 5);

CREATE TABLE inscriptions (
    id_inscription INT PRIMARY KEY AUTO_INCREMENT,
    id_apprenant INT,
    id_session INT,
    validate boolean,
    FOREIGN KEY (id_apprenant) REFERENCES Apprenants  (id_apprenant),
    FOREIGN KEY (id_session) REFERENCES Sessions (id_session)
); 













-- les requetes sql --

-- 1 fficher les sessions de formation à venir qui se chevauchent pas avec une session donnée 
        --$datedebut = "2023-05-01";  
        --$datefin = "2023-05-15";

        --  sql= "SELECT * FROM session WHERE date_fin < $datedebut OR date_debut > $datefin";

--2 Afficher les sessions de formation à venir avec des places encore disponibles

        --  sql= "SELECT * FROM session WHERE etat = 'en cours d'inscription'";



--3 Afficher le nombre des inscrits par session de formation
        --      $id_session = 3;
        --      sql = "SELECT id_session, count(*) From inscriptions group by  id_session ";

--4  Afficher l'historique des sessions de formation d'un apprenant donné

    --$id_appr3 = 3;
       --       $sql = "SELECT formations.titre, sessions.date_debut, sessions.date_fin
        --      FROM inscriptions
        --      JOIN sessions ON inscriptions.id_session = sessions.id_session
        --      JOIN formations ON sessions.id_formation = formations.id_formation
        --      WHERE inscriptions.id_appr = $id_appr
        --      AND sessions.date_fin < CURDATE()";


       --       $sql2 = "SELECT date_debut, date_fin, subject
        --      FROM session s
        --      inner JOIN formations f ON s.id_session = f.id_session
        --      inner JOIN inscriptions ON i.id_session = s.id_formation
        --      WHERE id_appr = $id_appr
        --      AND etat = 'cloturée'";





--5   Afficher la liste des sessions qui sont affectées à un formateur donné, triées par date de début

    --          $id_formateur = 44;

    --         $sql =  " SELECT id_session, date_debut, date_fin, etat, places, id_formation
    --         FROM sessions
    --         WHERE id_formateur = $id_formateur
    --         ORDER BY date_debut ASC";

    --         $sql2 =  " SELECT  session.* from session s             ""select tout just sure session table"""
    --         inner join formateurs f on s.id_formateur = f.id_formateur
    --         WHERE nom_formateur = 'chebab'
    --         ORDER BY date_debut ASC";





--6   Afficher la liste des apprenants d'une session donnée d'un formateur donné

        --$id_formateur = 44;

        --       $sql =" SELECT a.id_appr, a.nom_appr, a.prenom_appr
        --          FROM apprenants a
        --           JOIN inscriptions i ON a.id_appr = i.id_appr
        --           WHERE i.id_session IN (
        --           SELECT s.id_session
        --           FROM sessions s
        --           WHERE s.id_formateur = $id_formateur
        --          )";


        --       $sql =" SELECT A.* from apprenants  a
        --        
        --          inner JOIN inscriptions i ON a.id_appr = i.id_appr
        --          inner JOIN sessions s ON i.id_session = s.id_session
        --           where  s.id_session = 4 and s.id_formateur = 2
        --          )";





--7   Afficher l'historique des sessions de formation d'un formateur donné

        --      $id_formateur = 44;
        --       $sql =  "SELECT * 
        --         FROM session_formation
        --         WHERE id_formateur = $id_formateur AND date_fin < CURDATE()
        --         ORDER BY date_debut DESC";

        --      $id_formateur = 44;
        --       $sql =  "SELECT nom_formateur, prenom_formateur, date_debut, date_fin 
        --         FROM formateur f, sessions s
        --         WHERE f.id_formateur = s.id_formateur AND id_formateur = 3 and date_fin < NOW()
        --         ";



--8   Afficher les formateurs qui sont disponibles entre 2 dates


    --   $date1 = 2022-07-12 
    --   $date2 = 2022-09-01

    --      $sql  = " select id_formateur from session
    --             where date_fin<$date1 or date_debut> $date2
    --             )";
    --      or another method 
    --             select * from formateur where id_formateur 
    --           not in (select id_formateur from session
    --             where date_fin>$date1 and date_debut< $date2
    --      
    --             )
    --             




--9   Afficher toutes les sessions d'une formation donnée
    --   $id_formation = 3
    --   $sql = " SELECT * from session WHERE id_formation = $id_formation ";


-- 10   Afficher le nombre total des sessions par cétegorie de formation
   
--     $category = "english"
   
--      $sql =  "SELECT COUNT(*) AS total_sessions
--             FROM sessions
--             INNER JOIN formations ON sessions.id_formation = formations.id_formation
--             WHERE formations.categorie = $category"



-- 11  Afficher le nombre total des inscrits par catégorie formation


--      $category = "english"
--      $sql =  "SELECT SUM(i.nb_inscrits) as total_inscrits
--             FROM sessions s
--             JOIN formations f ON s.id_formation = f.id_formation
--             JOIN inscriptions i ON s.id_session = i.id_session
--             WHERE f.categorie = $category"


-- 12  Afficher les session de formation qui ont realiser plus de 10 inscrits
--      
--      $sql =  "SELECT * id_session, coun(*) from session s as 'nbreinscrits'
--             
--             inner JOIN inscriptions i  ON s.id_session = i.id_session
--             group by s.id_session 
--             HAVING count(*)> = 10 "



-- 13  Afficher chaque formateur avec le nombre de ses session à venir


--     SELECT nom_formateur, prenom_formateur, date_debut, subject_formation
--      FROM formateurs f
--      inner JOIN sessions s ON f.id_formation = s.id_formation
--      inner JOIN formations  fr ON fr.id_formation = s.id_formation
--      WHERE date_debut > NOW() 
--      ;










