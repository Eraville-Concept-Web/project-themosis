namespace :customFixDev do
  desc 'Upload Files to fix wordpress errors'
  task :fixerrors do
    on roles(:app) do
      run_locally do
      end
    end
  end
end
