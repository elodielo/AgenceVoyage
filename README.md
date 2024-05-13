## Agence de voyage

Le but est de créer un site de voyage. Celui-ci est composé en deux parties : une partie front réalisé à l'aide de react/next et visible pour les utilisateurse et une partie back realisé à l'aide de symfony ayant tout de même une interface pour les administrateurs et éditeurs afin de pouvoir créer et gérer des voyages. 

## Installation

Dans le fichier agencevoyagessymfo, créer un fichier .env.local en modifiant les données du .env pour la connexion avec la base de données.
Si problème de CORS, modifier le fichier nelmio.cors dans le fichier symfony.

En local ouvrir symfony server:start sur la console symfony et npm run dev sur le terminal react. Si besoin installer bootstrap sur react.

