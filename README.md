```markdown
# Projet madasht

Bienvenue dans le projet madasht ! Ce fichier README vous guidera à travers les étapes pour configurer et exécuter l'application avec succès.

## Configuration Requise

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre système :

- PHP (version 7.4 ou supérieure)
- Composer
- SQLite (ou un autre SGBD de votre choix)
- Node.js (pour les dépendances JavaScript)
- NPM (gestionnaire de paquets Node.js)

## Installation

1. Clonez le référentiel depuis GitHub :

   ```bash
   git clone https://github.com/elhadjcire224/madahst.git
   ```

2. Accédez au répertoire du projet :

   ```bash
   cd votre-projet
   ```

3. Installez les dépendances PHP avec Composer :

   ```bash
   composer install
   ```

4. Copiez le fichier `.env.example` pour créer un fichier `.env` :

   ```bash
   cp .env.example .env
   ```

5. Générez une nouvelle clé d'application Laravel :

   ```bash
   php artisan key:generate
   ```

6. Configurez votre base de données dans le fichier `.env`. Par défaut, le projet est configuré pour utiliser SQLite. Assurez-vous que votre base de données est prête avant de continuer.

7. Exécutez les migrations de base de données pour créer les tables :

   ```bash
   php artisan migrate
   ```

8. Installez les dépendances JavaScript avec NPM :

   ```bash
   npm install
   ```

9. Compilez les assets JavaScript et CSS :

   ```bash
   npm run dev
   ```

10. Lancez le serveur de développement Laravel :

    ```bash
    php artisan serve
    ```

11. Accédez à l'application dans votre navigateur à l'adresse [http://localhost:8000](http://localhost:8000).

## Utilisation

Vous êtes maintenant prêt à utiliser l'application.

ce qui est fait c'est l'authentification et la registration ...
il y'a un dossier du nom de *** madahsFront *** c'est labas où il y'a les assets pour le l'affichage du client veuillez explorer le dossier ...