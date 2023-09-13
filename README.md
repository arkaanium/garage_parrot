# garage_parrot

## Installation

- Télécharger au format .zip
- Si vous utilisez wampp extraire le tout dans le dossier 'www'
- Si vous utilisez xampp extraire dans le dossier 'htdocs'
- Executer le script .sql migration (qui permet de créer la base de donnée ainsi que les tables) 
- Executer le script .sql seed (contenant les données mysql nécessaire au bon fonctionnement du site)
- Executer le script .sql fixtures (Contient 3 exemples d'annonces (photos incluses) et le compte administrateur par défaut)
- Modifier si besoin les identifiants de la base de donnée dans le fichier config.php situé dans includes/config.php
  ![alt text](https://i.imgur.com/NqgEayW.png)
- Pour accéder à l'interface administrateur en local : http://localhost/login

## Compte administrateur par défaut

- Email : vincent.parrot@gmail.com
- Mot de passe : admin

Si vous souhaitez tester le site sur mon hébergement vous pouvez utiliser l'URL incluse dans copie à rendre.
Vous pouvez librement créer d'autres comptes administrateurs dans l'interface admin > Gestion des utilisateurs. Une fois un autre compte admin créé, vous pourrez supprimer le compte par défaut en vous connectant sur le nouveau.

## Livrables

Vous trouverez également dans le .zip 3 fichiers .pdf qui sont les suivants :
- charte_graphique.pdf
- documentation_technique.pdf (contenant le diagramme de cas d'utilisation, de séquence et de classe ainsi que les technologies choisies)
- wireframe_desktop_mobile.pdf (contenant tous les wireframes pour chaque page en version mobile et desktop)
