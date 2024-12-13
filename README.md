 
#Brif_Gestion-des-Reservations-dans-une-Salle-de-Sport
├── assets                        
│   ├── img          
├── src                            
│   ├── css                        
│   │   └── style.css               
│   ├── js                        
│       └── script.js             
├── views                         
│   ├── controle.php              
│   ├── cretationCont.php         
│   ├── home.php                  
│   ├── listeResrvate.php         
│   ├── login.php                 
│   └── reservation.php           
├── .gitignore                    
├── index.html                    
├── README.md                
├── script.sql                     

# Gestion de Réservations

Ce projet est une application web de gestion des réservations, développée avec **PHP**, **MySQL**, et **Tailwind CSS**. Elle permet aux utilisateurs de gérer les clients, les activités, et les réservations.

---

## Fonctionnalités

- **Gestion des clients :**
  - Ajout, modification et suppression des clients.
  - Visualisation des informations clients.

- **Gestion des activités :**
  - Création et gestion d'activités (nom, description, capacité, dates, disponibilité).

- **Gestion des réservations :**
  - Réservation d'activités par les clients.
  - Consultation des réservations avec le statut et la date.
  - Suppression ou modification des réservations.

---

## Validation les forms 
En PHP, vous pouvez utiliser des regex avec la fonction preg_match() pour valider les champs soumis par l'utilisateur.

## Technologies Utilisées

- **Backend :** PHP (mysqli pour la base de données)
- **Base de données :** MySQL
- **Frontend :** Tailwind CSS
- **Serveur local :** WampServer (ou XAMPP)

---

## Installation

### Prérequis
- PHP >= 7.4
- MySQL >= 5.7
- WampServer ou tout autre serveur local (comme XAMPP ou Laragon)



### Étapes
1. Clonez ce projet ou téléchargez les fichiers :
   ```bash
   git clone https://github.com/lakrouehamza/Brif_Gestion-des-R-servations-dans-une-Salle-de-Sport
  2. Créer la base de données et les tables
Une créez la base de données et les tables 

## Créer la base de données
sql
Copier le code
CREATE DATABASE bibloiteque;
USE bibloiteque;
Créer la table client
sql
Copier le code
CREATE TABLE client (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telephone VARCHAR(10) NOT NULL
);
Créer la table activite
sql
Copier le code
CREATE TABLE activite (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    descriptionA TEXT NOT NULL,
    capacite VARCHAR(50) NOT NULL,
    date_debut DATE,
    date_fin DATE,
    disponibilite TINYINT NOT NULL
);
Créer la table reservation
sql
Copier le code
CREATE TABLE reservation (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_client INTEGER NOT NULL,
    id_activite INTEGER NOT NULL,
    date_resevation DATE NOT NULL,
    statut VARCHAR(30) NOT NULL,
    CONSTRAINT FK_client FOREIGN KEY (id_client) REFERENCES client(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_activite FOREIGN KEY (id_activite) REFERENCES activite(id) ON DELETE CASCADE ON UPDATE CASCADE
);
3. Modifier les paramètres de connexion à la base de données
Dans votre script PHP, assurez-vous que les paramètres de connexion à la base de données sont corrects. Remplacez la ligne suivante par les paramètres adaptés à votre environnement :

php
Copier le code
$connect = mysqli_connect("localhost", "root", "12345", "bibloiteque");