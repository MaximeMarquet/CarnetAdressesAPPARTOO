CarnetAdressesAPPARTOO
======================


Conseils d'installation :

  ⇩⇩⇩⇩⇩ Initialisation ⇩⇩⇩⇩⇩
  
    Ouvrir un invité de commande et se placer dans le répertoire courant
    
    Executer la commande "composer install"

  ⇩⇩⇩⇩⇩ Base de données ⇩⇩⇩⇩⇩
    Pendant l'installation des informations seront demandées, renseignez juste "database_name (symfony)" par "carnet_adresses_appartoo"
    Exemple :
        database_host (127.0.0.1):
        database_port (null):
        database_name (symfony): carnet_adresses_appartoo
        database_user (root):
        database_password (null):
        mailer_transport (smtp):
        mailer_host (127.0.0.1):
        mailer_user (null):
        mailer_password (null):
        
    Executer ensuite la commande -> php app/console doctrine:database:create
    Puis la commande -> php app/console doctrine:schema:update --force

  ⇩⇩⇩⇩⇩ Utilisation ⇩⇩⇩⇩⇩
    Rendez-vous ensuite sur l'url http://localhost/CarnetAdressesAPPARTOO-master/web/app_dev.php/login
    Vous pourrez alors vous enregistrer, puis vous connecter sur l'application
