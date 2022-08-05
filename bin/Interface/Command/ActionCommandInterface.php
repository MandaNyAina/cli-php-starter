<?php

namespace bin\Interfaces\Command;

interface ActionCommandInterface {
    /**
     * @param array   $variables  List of response of question ready to be executed
     * 
     * @author Manda Ny Aina <andrianaivomanda@gmail.com>
     * @return void
     */
    public function execute(array $variables): void;
}
