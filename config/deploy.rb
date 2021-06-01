set :repo_url, 'git@gitlab.com:flosteve/mbt-themosis.git'
set :keep_releases, 3
#set :wpcli_local_url, '/Users/Steve/Sites/mbt/app/mybibletour/web'

#
# namespace :deploy do
#   after :starting, 'composer:install_executable'
# end

#WP_CLI
set :wpcli_backup_db , true
# Branch options
# Prompts for the branch name (defaults to current branch)
#ask :branch, -> { `git rev-parse --abbrev-ref HEAD`.chomp }

# Hardcodes branch to always be master
# This could be overridden in a stage config file

# Use :debug for more verbose output when troubleshooting
set :log_level, :info

# Apache users with .htaccess files:
# it needs to be added to linked_files so it persists across deploys:
set :linked_files, fetch(:linked_files, []).push('.env', 'auth.json', 'composer.phar')
set :linked_dirs, fetch(:linked_dirs, []).push('htdocs/content/uploads', 'htdocs/content/languages')

before :deploy, 'git:push'

# The above restart task is not run by default
# Uncomment the following line to run it on deploys if needed
after 'deploy:publishing', 'deploy:commandwpcli'

# The above update_option_paths task is not run by default
# Note that you need to have WP-CLI installed on your server
# Uncomment the following line to run it on deploys if needed
after 'deploy:publishing', 'deploy:update_option_paths'
