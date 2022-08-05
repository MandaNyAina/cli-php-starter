<?php

namespace bin\lib\Instance;

use bin\Exception\Question\QuestionEmptyOptionException;
use bin\Exception\Question\QuestionNotInListException;
use bin\Exception\Question\QuestionUnkownResponseInOptions;
use bin\Interfaces\Instance\QuestionInterface;

class Question implements QuestionInterface {
    private string $_question_string;
    private string $_question_type;
    private array $_question_list_options;
    private string $_response;
    private array $_question_types_list = ['list', 'string'];

    public function __construct(string $question_type, string $question, ?array $question_options = []) {
        if (in_array($question_type, $this->_question_types_list)) {
            $this->_question_type = $question_type;
            $this->_question_list_options = $question_options;
        } else {
            throw new QuestionNotInListException("$question_type is not in list of questions types");
        }

        $this->_question_string = $question;

        if ($question_type == 'list') {
            if (empty($question_options)) {
                throw new QuestionEmptyOptionException();
            } else {
                $this->_question_string = $question." : \n".$this->createOptionsList($question_options)."Choose number [] > ";
            }
        }
        
    }

    private function createOptionsList(array $question_options): string {
        $question_options_string = "";
        foreach ($question_options as $index => $option) {
            $index += 1;
            $question_options_string .= "[$index] : $option \n";
        }
        return $question_options_string;
    }

    private function findResponseByOption(int $response_option): string {
        if (count($this->_question_list_options) >= $response_option) {
            return $this->_question_list_options[$response_option - 1];
        } else {
            throw new QuestionUnkownResponseInOptions($response_option);
        }
    }

    public function getQuestion(): string {
        return $this->_question_string;
    }

    public function setResponse(string $response): void {
        if ($this->_question_type == 'list') {
            $response_number = intval($response);
            if (is_int($response_number) && $response_number > 0) {
                $this->_response = $this->findResponseByOption($response_number);
            } else {
                throw new QuestionUnkownResponseInOptions($response);
            }
        } else {
            $this->_response = $response;
        }
    }

    public function getReponse(): string {
        return $this->_response;
    }
    
}