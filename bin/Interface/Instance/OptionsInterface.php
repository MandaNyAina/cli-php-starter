<?php

namespace bin\Interfaces\Instance;

interface OptionsInterface {
    /**
     * @param string   $option_name  Name of option
     * @param string   $option_description  Description of option
     * @param string   $option_function   Name of the function who executed when option call in CLI
     * 
     * @author Manda Ny Aina <andrianaivomanda@gmail.com>
     * @return void
     */
    public function addOption(string $option_name, string $option_description, string $option_function): void;

    /**
     * @param string   $option_name  Name of option
     * @param string   $option_description  This is the user value
     * 
     * @author Manda Ny Aina <andrianaivomanda@gmail.com>
     * @return void
     */
    public function exectute(string $option_name, string $params): void;
}