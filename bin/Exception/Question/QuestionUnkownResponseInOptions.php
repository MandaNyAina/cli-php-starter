<?php

namespace bin\Exception\Question;

use Exception;

class QuestionUnkownResponseInOptions extends Exception {

    public function getError() {
        return "\nUnkown response for ".$this->getMessage()."\n\n";
    }

}