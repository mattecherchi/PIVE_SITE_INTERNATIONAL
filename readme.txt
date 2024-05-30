Pour utiliser ce site en local, vous devez avoir la version 7.4 de php installé. La version 8 ou supérieur cause des problèmes et rend le site inutilisable.
Nous vous conseillons d'utiliser laragon si vous êtes sous Windows. C'est un logiciel similaire à Uwamp qui permet de faire fonctionner le site en local.
Si vous êtes sous Linux ou Mac, vous pouvez utiliser un logiciel tel que WAMP, MAMP ou XAMP; vous pouvez également installer apache2, php7.4 et mysql-server.

Avant de pouvoir utiliser le site en local, vous devez créer et remplir la base de données.
Pour cela, executez la commande suivante depuis le répertoire du site :
php artisan migrate:fresh --seed
Il va créer et remplir la base de données avec des données de test.

Ce site utilise le framework Laravel. C'est un framework PHP open source qui permet de créer des sites web faciles à utiliser et à maintenir.
Pour plus d'informations sur le framework Laravel, la documentation officielle est très complète et assez simple à utiliser.
Pour les styles, nous utilisons Tailwind CSS qui est un framework CSS open source qui permet de créer des sites web avec des styles riches et personnalisés.
De même, la documentation officielle de Tailwind CSS est très complète et simple à utiliser.

Pour la connexion au CAS de l'université de Lorraine, nous utilisons le plugin phpCAS. C'est un plugin PHP qui permet de se connecter à un serveur CAS. 
Le code utilisé pour réaliser la connexion est dans app/Http/Controllers/AuthController.php.
Pour utiliser la connexion au CAS en local, vous devez modifier le fichier hosts de Windows. Laragon permet également de gérer le fichier hosts plus siumplement.

Pour utiliser la base de données, laravel intègre un système de modèles qui permet de manipuler les données sous forme d'objets. Celui-ci s'appelle Eloquent.
Il est documenté sur le site officiel de Laravel.

Pour exporter les données en excel, nous utilisons la fonction exports de intégré à Laravel. Elle est documentée sur le site officiel de Laravel et est disponible dans le fichier app/Exports/CandidatureExport.php.

Pour accéder au serveur qui héberge le site, vous devez utiliser le VPN de l'université de Lorraine.
Vous pourrez ensuite vous connecter en SSH (port 22) avec les identifiants correspondants à demander à Mme Bunting ou Mme Schmitt.