<?php

namespace bin\Exception\Argument;

use Exception;

class ArgumentValueException extends Exception {

    public function getError() {
        return "\nInvalid value for '".$this->getMessage()."' \n\n";
    }

}