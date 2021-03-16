Themosis framework
==================

[![Build Status](https://travis-ci.org/themosis/themosis.svg?branch=dev)](https://travis-ci.org/themosis/themosis)

The Themosis framework is a tool aimed to WordPress developers of any levels. But the better WordPress and PHP knowledge you have the easier it is to work with.

Themosis framework is a tool to help you develop websites and web applications faster using [WordPress](https://wordpress.org). Using an elegant and simple code syntax, Themosis framework helps you structure and organize your code and allows you to better manage and scale your WordPress websites and applications.

Installation - ECW Custom
------------
Please see the [installation section](https://framework.themosis.com/docs/master/installation/) of the Themosis documentation.


1. Add auth.json file to root
2. Edit the .env file
3. Run composer install in root folder
4. Check the that post-create-project-cmd Script in composer file has been run. If not run
    ```
   php console vendor:publish --tag=themosis --force
   php console key:generate --ansi
   ```
5. Run yarn in theme folder and root if needed

If Capistrano ius used for deployment
1. Make sure the requirements are set on the local machine (https://capistranorb.com/)
```
$ git clone https://github.com/capistrano/capistrano.git
$ cd capistrano
$ gem build *.gemspec
$ gem install *.gem
```
2. Run the Bundle to install the Gems in root folder
```
bundle
```

3. Edit the config files (deploy.rb, config/staging.rb, config/production.rb) with the correct server information
4. Edit the Rake file (libs/capistrano/) to launch necessary commands on deployment process

Development team
----------------
The framework was created by [Julien Lambé](https://www.themosis.com/), who continues to lead the development.

Contributing
------------
Any help is appreciated. The project is open-source and we encourage you to participate. You can contribute to the project in multiple ways by:

- Reporting a bug issue
- Suggesting features
- Sending a pull request with code fix or feature
- Following the project on [GitHub](https://github.com/themosis)
- Following us on Twitter: [@Themosis](https://twitter.com/Themosis)
- Sharing the project around your community

For details about contributing to the framework, please check the [contribution guide](https://framework.themosis.com/docs/master/contributing).

License
-------
The Themosis framework is open-source software licensed under [GPL-2+ license](http://www.gnu.org/licenses/gpl-2.0.html).
