# Application de Gestion de Projets Collaboratifs

Cette application Laravel permet aux utilisateurs d'organiser des projets en équipe, d'ajouter des tâches à un projet, de suivre l'avancement des tâches et de collaborer en temps réel.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les éléments suivants :

*   **PHP** (version 8.1 ou supérieure)
*   **Composer** (gestionnaire de dépendances PHP)
*   **Node.js** et **npm** (ou yarn) pour la gestion des assets front-end
*   **MySQL** (ou un autre serveur de base de données supporté par Laravel)
*   **Git**

## Installation

1.  **Cloner le dépôt :**

    ```
    git clone <URL_DE_VOTRE_DEPOT>
    cd <nom_du_repertoire_du_projet>
    ```

2.  **Installer les dépendances Composer :**

    ```
    composer install
    ```

3.  **Copier le fichier d'environnement :**

    ```
    cp .env.example .env
    ```

4.  **Générer la clé d'application :**

    ```
    php artisan key:generate
    ```

5.  **Configurer la base de données :**

    Modifiez le fichier `.env` avec les informations de votre base de données :

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nom_de_votre_base_de_donnees
    DB_USERNAME=votre_nom_utilisateur
    DB_PASSWORD=votre_mot_de_passe
    ```

6.  **Migrer la base de données :**

    ```
    php artisan migrate
    ```

7.  **Installer les dépendances front-end et compiler les assets :**

    ```
    npm install
    npm run build  # ou npm run dev pour le développement
    ```

    Si vous utilisez Yarn :

    ```
    yarn install
    yarn run build  # ou yarn run dev pour le développement
    ```

8.  **Lier le storage public:**

    ```
    php artisan storage:link
    ```

9.  **Seed de la base de données (optionnel) :**

    Si vous souhaitez initialiser la base de données avec des données de test :

    ```
    php artisan db:seed
    ```

## Configuration

*   **Variables d'environnement :** Configurez les variables d'environnement dans le fichier `.env` selon vos besoins (MAIL, QUEUE, etc.).  Consultez la documentation Laravel pour plus d'informations.

## Exécution

1.  **Démarrer le serveur de développement Laravel :**

    ```
    php artisan serve
    ```

    Cela lancera le serveur sur `http://localhost:8000` (ou une autre adresse disponible).

2.  **Accéder à l'application :** Ouvrez votre navigateur et accédez à l'adresse indiquée par `php artisan serve`.

## Fonctionnalités Principales

*   **Page d'accueil (Dashboard) :** Tableau de bord personnalisé affichant les projets et les tâches.
*   **Gestion des projets :** Création, modification, suppression et invitation d'utilisateurs aux projets.
*   **Gestion des tâches :** Création, assignation, suivi et gestion des tâches au sein des projets.  Possibilité de joindre des fichiers aux tâches.
*   **Gestion des utilisateurs et des rôles :** Système d'authentification (inscription, connexion, déconnexion) et gestion des rôles (admin, membre).
*   **Notifications par e-mail :** Envoi d'e-mails lors de l'assignation de tâches et à l'approche des échéances.
*   **Gestion des fichiers :** Téléchargement et affichage des fichiers attachés aux tâches.

## Routes

Voici un aperçu des principales routes de l'application (basé sur le fichier `web.php`) :

*   `/login` : Page de connexion.
*   `/logout` : Déconnexion.
*   `/register` : Page d'inscription.
*   `/home` : Page d'accueil après connexion.
*   `/dashboard` : Tableau de bord.
*   `/projects` : Liste des projets.
*   `/projects/create` : Formulaire de création de projet.
*   `/projects/{project}` : Affichage d'un projet spécifique.
*   `/projects/{project}/edit` : Formulaire de modification d'un projet.
*   `/projects/{project}/tasks` : (RESSOURCE) Gestion des tâches pour un projet spécifique (création, modification, suppression).

## Politiques d'Autorisation

L'application utilise des policies ( `ProjectPolicy.php` ) pour contrôler l'accès aux projets.  Seul le propriétaire d'un projet peut le modifier ou le supprimer.  Les policies sont enregistrées dans `AuthServiceProvider.php`.

## Modèles

*   `User.php` : Représente un utilisateur.
*   `Project.php` : Représente un projet.
*   `Task.php` : Représente une tâche.
*   `TaskAttachment.php` : Représente un fichier attaché à une tâche.

## Contribution

Les contributions sont les bienvenues !  Veuillez consulter le fichier `CONTRIBUTING.md` (si existant) pour les directives de contribution.

## Licence

[MIT](LICENSE) (ou la licence de votre choix)
