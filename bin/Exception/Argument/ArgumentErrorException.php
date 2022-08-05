<?php

namespace bin\Exception\Argument;

use Exception;

class ArgumentErrorException extends Exception {

    public function getError() {
        return "\nInvalid argument '".$this->getMessage()."' \n\n";
    }

}