<?php

// exception
require_once 'Exception/Argument/ArgumentErrorException.php';
require_once 'Exception/Argument/ArgumentValueException.php';
require_once 'Exception/Option/OptionInvalideException.php';
require_once 'Exception/Question/QuestionEmptyOptionException.php';
require_once 'Exception/Question/QuestionNotInListException.php';
require_once 'Exception/Question/QuestionUnkownResponseInOptions.php';

// interface
require_once 'Interface/Instance/OptionsInterface.php';
require_once 'Interface/Instance/QuestionInterface.php';
require_once 'Interface/Command/ActionCommandInterface.php';
require_once 'Interface/Command/CommandArgumentInterface.php';
require_once 'Interface/Prompt/PrompCommandeInterface.php';

// librairie
require_once 'lib/Instance/Options.php';
require_once 'lib/Instance/Question.php';
require_once 'lib/Command/ActionCommand.php';
require_once 'lib/Command/ArgumentFunctionList.php';
require_once 'lib/Command/CommandArgument.php';
require_once 'lib/Prompt/PrompCommande.php';

// helpers
function execute_command(string $arg, bool $show_result = false) {
    $result = shell_exec($arg);
    if ($show_result) {
        echo "\n$result\n";
    }
}