<?php

namespace bin\Exception\Option;

use Exception;

class OptionInvalideException extends Exception {

    public function getError() {
        return "\nInvalid option '".$this->getMessage()."' \n\n";
    }

}