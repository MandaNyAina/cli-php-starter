<?php

namespace bin\lib;

use bin\Exception\Question\QuestionEmptyOptionException;
use bin\Exception\Question\QuestionNotInListException;
use bin\Exception\Question\QuestionUnkownResponseInOptions;
use bin\Interfaces\Instance\QuestionInterface;
use bin\Interfaces\Prompt\PrompCommandeInterface;

class PrompCommande implements PrompCommandeInterface {

    public function execute(QuestionInterface $question): QuestionInterface {
        while (true) {
            try {
                echo $question->getQuestion();
                $handle = fopen ("php://stdin","r");
                $line = fgets($handle);
                $question->setResponse($line);
                fclose($handle);
                return $question;
                break;
            } catch (QuestionNotInListException $e) {
                echo $e->getError();
                continue;
            } catch (QuestionEmptyOptionException $e) {
                echo $e->getError();
                continue;
            } catch (QuestionUnkownResponseInOptions $e) {
                echo $e->getError();
                continue;
            }
        }
    }
    
}