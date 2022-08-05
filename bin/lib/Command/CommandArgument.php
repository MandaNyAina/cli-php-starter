<?php

namespace bin\lib\Command;

use bin\Exception\Argument\ArgumentErrorException;
use bin\Exception\Argument\ArgumentValueException;
use bin\Exception\Option\OptionInvalideException;
use bin\Interfaces\Command\CommandArgumentInterface;
use bin\lib\Instance\Options;

class CommandArgument implements CommandArgumentInterface {

    private array $_arguments = [];
    private array $_arguments_from_cli = [];
    private Options $_options;

    public function __construct($argv, Options $options) {
        array_shift($argv);
        $this->_arguments_from_cli = $argv;
        $this->_options = $options;
        $this->_arguments = $this->findArguments();
    }

    private function startsWith(string $string, string $startString) {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }
    

    private function findArguments(): array {
        $index = 0;
        $argument_values = [];
        foreach ($this->_arguments_from_cli as $argument) {
            if ($index % 2 == 0 || $index == 0) {
                if (isset($this->_arguments_from_cli[$index + 1])) {
                    if ($this->startsWith($argument, '--')) {
                        $argument_values[str_replace("--", "", $argument)] = $this->_arguments_from_cli[$index + 1];
                    } else {
                        throw new ArgumentErrorException($argument);
                    }
                } else {
                    throw new ArgumentValueException($argument);
                }
            }
            $index++;
        }
        return $argument_values;
    }

    public function execute(): void {
        try {
            foreach ($this->_arguments as $argument_key => $argument_value) {
                $this->_options->exectute($argument_key, $argument_value);
            }
        } catch (OptionInvalideException $e) {
            echo $e->getError();
        } catch (ArgumentErrorException $e) {
            echo $e->getError();
        } catch (ArgumentValueException $e) {
            echo $e->getError();
        }
    }


}