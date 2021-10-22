set :stage, :staging
set :application, 'site'
set :home, '/home2/flosteve/dev.mybibletour.com'
set :tmp_dir, "#{fetch :home}/tmp"
set :branch, :staging
set :wpcli_remote_url, "/home2/flosteve/#{fetch :application}/current/htdocs}"
set :composer_install_flags, '--no-dev --prefer-dist --no-interaction --optimize-autoloader'
# Simple Role Syntax
# ==================
#role :app, %w{deploy@example.com}
#role :web, %w{deploy@example.com}
#role :db,  %w{deploy@example.com}

# Extended Server Syntax
# ======================
server 'bender.o2switch.net', user: 'flosteve', roles: %w{web app db}
set :deploy_to, -> { "/home2/flosteve/#{fetch(:application)}" }
SSHKit.config.command_map[:composer] = "php /home2/flosteve/#{fetch(:application)}/shared/composer.phar"

#after 'deploy:publishing', 'customFixDev:fixerrors'


# you can set custom ssh options
# it's possible to pass any option but you need to keep in mind that net/ssh understand limited list of options
# you can see them in [net/ssh documentation](http://net-ssh.github.io/net-ssh/classes/Net/SSH.html#method-c-start)
# set it globally
  set :ssh_options, {
    keys: %w(~/.ssh/gitlab_rsa),
    forward_agent: true,
    user: 'flosteve',
#    auth_methods: %w(password)
  }

fetch(:default_env).merge!(wp_env: :staging)
