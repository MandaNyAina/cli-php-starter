<?php

namespace bin\Interfaces\Instance;

interface QuestionInterface {
    /**
     * @param string   $option_name  Name of option
     * @param string   $option_description  This is the user value
     * 
     * @author Manda Ny Aina <andrianaivomanda@gmail.com>
     * @return string
     */
    public function getQuestion(): string;

    /**
     * @param string   $response  This is the user value
     * 
     * @author Manda Ny Aina <andrianaivomanda@gmail.com>
     * @return void
     */
    public function setResponse(string $response): void;

    /**
     * 
     * @author Manda Ny Aina <andrianaivomanda@gmail.com>
     * @return string
     */
    public function getReponse(): string;
}