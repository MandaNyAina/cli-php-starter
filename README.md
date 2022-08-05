
# CLI for PHP

Allows you to run a command line with PHP. Makes your life easier to 
add functionality with CLI command. This project is similar to [inquirer.js](https://www.npmjs.com/package/inquirer) 
for PHP.
## Requirement

To use cli-starter for PHP, you need to have :

- PHP 7+ : to install PHP, visit [ici](https://www.php.net/manual/fr/install.php)
## Installation

Clone project from git and copy the file cloned to your project root path

```shell
  git clone https://github.com/MandaNyAina/cli-php-starter your-project-bin
  cp -r your-project-bin/ <your-project-path>
```
## How to get argument in CLI (ex : bin/cli --key value)

1 - Create an Options instance

```php
  use bin\lib\Instance\Options;

  $options = new Options();
```

2 - Add new option for CLI, In the example below, we will add a "name" 
option for the command to retrieve the project name, and call the "get_name" 
function in "lib/Command/ArgumentFunctionList.php".

```php
  $options->addOption('name', 'Name of your project', 'get_name');
```

3 - To retrieve the list of existing options

```php
  $options->getOptionList();
```

4 - To execute options with argv from CLI

```php
  (new CommandArgument($argv, $options))->execute();
```

Once the --name project_name command is specified, the get_name function 
will be called.
## How to use prompt command

1 - Initiate the CommandPromp instance

```php
  use bin\lib\PrompCommande;

  $prompt = new PrompCommande();
```

2 - Create a Question instance to be able to ask the user to enter variable. For 
example, if we want to create a question to ask for the name of a project.

```php
  $question = new Question('string', 'Name of your project : ');
```

For the Question class parameter, we need :

- Params 1 : type of question, we have 2 types of question:
    - string : to request a text, number, ... from the user
    - list : to ask to choose from a list for the user

For the example above, the question is of type text

- Params 2 : the question for the user.
- Params 3 : List of choice, only available for list question type, the type of params is an array

Example of list type :

```php
  $question_list = new Question('list', 'Your stack : ', ['php', 'js']);
```

Result : 

```bash
  Your stack : 
  [1] php
  [2] js
  Choose number [] > 1 (for php)
```

3 - To execute the question and retrieve the answer

```php
  $name = $prompt->execute($question)->getReponse();
```
## Authors

- [@Manda Ny Aina](https://github.com/MandaNyAina)


## License

[MIT](https://choosealicense.com/licenses/mit/)

