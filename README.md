Projet SGRDS
==================
Ce projet a été réalisé dans le cadre de la troisième année de mon BUT Informatique. Réalisé en groupe, l’objectif était de développer une application web permettant à l’administration de l’IUT de suivre les retards des élèves et d’organiser des séances de rattrapage en cas de besoin. Le projet s’appuie sur le framework codelnighter et adopte une architecture MVC. Nous avons également reçu un cahier des charges à respecter.

---

## Présentation

Le but de l’application est de :
- **Gérer les retards** : Enregistrer et suivre les retards des élèves.
- **Organiser les rattrapages** : Planifier des séances de rattrapage pour compenser les retards ou absences.
- **Gérer les utilisateurs** : Offrir une interface d’authentification sécurisée, incluant la gestion des mots de passe (connexion, réinitialisation, oubli du mot de passe).
- **Administrer les enseignants et étudiants** : Permettre l’ajout, la modification ou la suppression des enseignants et des étudiants.

L’application utilise Tailwind CSS pour l'interface.

---

## Installation et Prérequis

Pour installer et exécuter l’application SGRDS, suivez les étapes ci-dessous :

### Prérequis
- **Environnement PHP** : PHP 7.x ou supérieur est recommandé.
- **Serveur Web** : Un serveur tel qu’Apache ou Nginx (vous pouvez également utiliser le serveur intégré de PHP) ou encore le serveur php de Webstorm.
- **Base de données** : MySQL ou autre SGBD compatible (Nous avons utilisé Postgre SQL pour notre part).

### Installation

1. **Cloner le dépôt Git :**

   ```bash
   git clone https://github.com/votre-utilisateur/SGRDS.git
   ```

2. **Installer les dépendances :**

   ```bash
   composer install
   ```

3. **Configurer la base de données :**

   - Créez une base de données.
   - Importez le fichier SQL pour créer les tables nécessaires.

4. **Configurer les fichiers de connexion :**

   Modifiez le fichier de configuration ( `config.php`) pour y indiquer vos identifiants de connexion à la base de données.

5. **Démarrer le serveur local :**

   Utilisez Apache, Nginx ou le serveur intégré de PHP :

   ```bash
   php -S localhost:8000
   ```

6. **Accéder à l’application :**

   Ouvrez votre navigateur et rendez-vous sur [http://localhost:8000](http://localhost:8000).

---

## Fonctionnalités Offertes

L’application SGRDS propose les fonctionnalités suivantes :

- **Authentification et gestion des sessions :**
  - Connexion sécurisée
  - Réinitialisation et oubli du mot de passe

- **Gestion des retards et rattrapages :**
  - Enregistrement des retards par les administrateurs
  - Planification et modification des séances de rattrapage. Une fois le retard enregistré, l’application permet de planifier une séance de rattrapage.

- **Gestion des enseignants et des étudiants :**
  - L’administration peut ajouter, modifier ou supprimer les enseignants à partir de l’interface dédiée.

- **Interface utilisateur moderne et interactive :**
  - Utilisation de Tailwind CSS et tw elements pour une interface réactive

- **Architecture MVC :**
  - Séparation claire entre la logique de traitement (contrôleurs), la gestion des données (modèles) et l’affichage (vues)
  - Base commune pour les contrôleurs assurée par `BaseController.php`

- **Sécurité :**
  - Mise en œuvre de mécanismes de protection des routes sensibles via un AuthGuard

---

## Objectifs Pédagogiques

Ce projet avait pour objectifs pédagogiques de :

- **Appliquer le modèle MVC :**  
  Comprendre et implémenter une architecture qui sépare la logique métier, la gestion des données et la présentation.

- **Travailler en équipe :**  
  Développer une application collaborative en respectant les normes de codage et les bonnes pratiques de gestion de projet.

- **Maîtriser un framework personnalisé :**  
  Se familiariser avec le framework codelnighter.

- **Développer une interface utilisateur moderne :**  
  Utiliser Tailwind CSS et tw elements pour créer une interface esthétique et responsive.

- **Assurer la sécurité de l’application :**  
  Mettre en place des mécanismes d’authentification et de gestion des sessions, ainsi que la protection des données sensibles.

- **Gérer la persistance des données :**  
  Apprendre à interagir avec une base de données pour stocker et récupérer les informations relatives aux retards, rattrapages, enseignants et étudiants.

---
