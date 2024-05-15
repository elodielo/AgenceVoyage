## Agence de voyage

Le but est de créer un site de voyage. Celui-ci est composé en deux parties : une partie front réalisé à l'aide de react/next et visible pour les utilisateurs et une partie back realisé à l'aide de symfony ayant tout de même une interface pour les administrateurs et éditeurs afin de pouvoir créer et gérer des voyages. 

## Installation

Dans le fichier agencevoyagessymfo, créer un fichier .env.local en modifiant les données du .env pour la connexion avec la base de données.
Si problème de CORS, modifier le fichier nelmio.cors dans le fichier symfony.

En local ouvrir symfony server:start sur la console symfony et npm run dev sur le terminal react. En local, le site front sera accessible depuis le localhost:3000 et la partie back depuis le port http://127.0.0.1:8000. Si besoin installer bootstrap.


## Fonctionnalité: 
Dans la partie back, il est nécessaire d'être admin pour créer de nouveaux utilisateurs. Pour tester :
 email : eloelo@elo.com
 mot de passe: eloeloelo
 Seuls les administrateurs peuvent réaliser toutes les actions. 
 Les éditeurs peuvent cependant créer de nouveaux voyages et regarder ceux qu'ils ont créés. 

## Points d'amélioration

