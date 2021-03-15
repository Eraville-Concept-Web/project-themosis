namespace :deploy do
  desc 'WP_CLI Commands'
  task :commandwpcli do
    on roles(:app) do
      within release_path do
        execute :wp, "rewrite flush --hard"
        execute :wp, "rocket clean --confirm"
        execute :wp, "rocket preload"
      end
    end
  end
end

namespace :deploy do
  desc 'Update WordPress template root paths to point to the new release'
  task :update_option_paths do
    on roles(:app) do
      within release_path do
        if test :wp, :core, 'is-installed'
          [:stylesheet_root, :template_root].each do |option|
            # Only change the value if it's an absolute path
            # i.e. The relative path "/themes" must remain unchanged
            # Also, the option might not be set, in which case we leave it like that
            value = capture :wp, :option, :get, option, raise_on_non_zero_exit: false
            if value != '' && value != '/themes'
              execute :wp, :option, :set, option, fetch(:release_path).join('htdocs/content/themes')
            end
          end
        end
      end
    end
  end
end