namespace :customFixDev do
  desc 'Upload Files to fix wordpress errors'
  task :fixerrors do
    on roles(:app) do
      run_locally do
        #execute "rsync -av /Users/Steve/Sites/mybibletour-themosis/htdocs/content/plugins/woocommerce-sendinblue-newsletter-subscription/woocommerce-sendinblue.php flosteve@bender.o2switch.net:/home3/flosteve/dev.mybibletour.com/current/htdocs/content/plugins/woocommerce-sendinblue-newsletter-subscription/woocommerce-sendinblue.php"
      end
    end
  end
end
