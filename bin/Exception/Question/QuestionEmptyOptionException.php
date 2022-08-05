<?php

namespace bin\Exception\Question;

use Exception;

class QuestionEmptyOptionException extends Exception {

    public function getError() {
        return "\nEmpty option, your question type is a list, you need to specify the list of possibility reponses for the question \n\n";
    }

}