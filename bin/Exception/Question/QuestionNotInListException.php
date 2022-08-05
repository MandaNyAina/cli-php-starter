<?php

namespace bin\Exception\Question;
use Exception;

class QuestionNotInListException extends Exception {

    public function getError() {
        return "\nError of question type : ".$this->getMessage().". Available options are : list, string\n\n";
    }

}