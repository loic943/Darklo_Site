# Site de Darklo
  ![GitHub Workflow Status](https://img.shields.io/github/workflow/status/loic943/Darklo_Site/PHP%20CodeSniffer%20Validations?label=PHP%20Validations&style=plastic)

Test de site internet avec Symfony 5

## Environnement de développement

### Pré-requis

* PHP 8.0
* Composer
* Symfony CLI
* Docker
* Docker-compose
* Node.js et npm

Vérification des pré-requis pour Symfony

```bash
symfony check:requirements
```

### Lancement de l'environnement de dev

```bash
composer install
npm install
npm run buid
docker-compose up -d
symfony serve -d
```

### Lancement des test unitaires

```bash
php bin/phpunit --testdox
```