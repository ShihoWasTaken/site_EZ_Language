## Configration générale
set :update_vendors, true
set :copy_vendors, true
# le nom de l'application
set :application, "EZ Language"

# le domaine sur lequel capifony se connecte en ssh
set :domain,      "192.168.99.116"


# Le dossier vers lequel l'application est déployée sur le serveur
set :deploy_to,   "/var/www/html/ezlanguage_prod"
set :app_path,    "app"

# Le nom d’utilisateur du serveur distant
set :user, "ezs"

set :model_manager, "doctrine"
# Or: `propel`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server
set :use_sudo, false

# La configuration du dépôt, ici avec git
set :scm, :git
set :deploy_via, :copy
set :repository, "https://github.com/ezlanguage/website.git"
set :deploy_via, :copy

# Le nombre de releases à garder après un déploiement réussi
set  :keep_releases,  3

## Configration spécifique Symfony2
# Les fichiers à conserver entre chaque déploiement
set :shared_files, ["app/config/parameters.yml"]

# Idem, mais pour les dossiers
set :shared_children, [app_path + "/logs"]

set :use_composer, true

# Application des droits nécessaires en écriture sur les dossiers
set :writable_dirs, ["app/cache", "app/logs"]

set :use_set_permissions, true
# dumper les assets
set :dump_assetic_assets, true

# Augmenter le niveau de détail des logs rend le déploiement plus facile à déboguer en cas d'erreurs.
logger.level = Logger::MAX_LEVEL

# Default entity manager
after 'deploy', 'symfony:doctrine:schema:update'

task :upload_parameters do
  origin_file = "app/config/parameters_prod.yml"
  destination_file = shared_path + "/app/config/parameters.yml" # Notice the
  shared_path

  try_sudo "mkdir -p #{File.dirname(destination_file)}"
  top.upload(origin_file, destination_file)
end

after "deploy", "upload_parameters"
after "deploy", "symfony:cache:clear"
after "deploy", "symfony:cache:warmup"
after "deploy:setup", "upload_parameters"
