<?php

namespace bin\Interfaces\Prompt;

use bin\Interfaces\Instance\QuestionInterface;

interface PrompCommandeInterface {
    /**
     * @param QuestionInterface   $question  Instance of question
     * 
     * @author Manda Ny Aina <andrianaivomanda@gmail.com>
     * @return QuestionInterface
     */
    public function execute(QuestionInterface $question): QuestionInterface;
}
