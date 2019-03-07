# TeamCMP Importer by Jorge Escalante
This project was made with PHP v5.6.37 and tests with PHPUnit v5.7.27.
TeamCMP Importer process a file already in your local in order to store its title, url and tags in a database.
At this moment there are two filetypes implemented: `JSON` and `YAML`
### Installation
Requirements:
- PHP 5.6+
- PHPUnit 5+

Steps:
- Download/Clone project.
- Add your `config.json` to `config/` folder
 
### Usage
Just execute the index.php file in the root of the project with php and you will get something like follow:
```sh
$ php index.php
TeamCMP Importer
===============
Type the name of the site and press enter: your_site_here
```
#### Running tests
There is a `ManagerTest.php` in `tests/` folder that will execute all the tests:
```sh
$ phpunit ManagerTest.php
```

## More about this project
- This was my first time writing some unit tests, I've been reading about PHPUnit for a couple of days before starting this project. It was a great practice and I enjoyed writing them.
- What would you have done differently if I had had more time:
    * First of all, try to add more comments, including properties/methods description for classes and params, return values for functions.
    * I couldn't install yaml extension in my pc so I had to install an external library to process yaml files. I would have like to keep it light and simple.
    * I would have like to make more validations, specially while processing files.
    * Also, I would have like to create a BaseImporter with basic configuration and methods and extend both (YamlImporter and JsonImporter) from it.
    * Writing more tests, of course.
    * Maybe use a framework, but as I said, I prefer to keep things simple.

### A final thought
After "playing" in the minor leagues for many years, I believe its time for me to try in the major leagues and if you decide to give me that chance, make sure you won't regret it.

Jorge Escalante Salaya
essajole@gmail.com
https://jorgelie.github.io/
    