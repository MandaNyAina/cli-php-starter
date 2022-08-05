<?php

namespace bin\lib\Instance;

use bin\Exception\Option\OptionInvalideException;
use bin\Interfaces\Instance\OptionsInterface;

class Options implements OptionsInterface {

    private array $_options_list = [];

    public function addOption(string $option_name, string $option_description, string $option_function): void {
        $this->_options_list[$option_name] = [$option_description, $option_function];
    }

    public function getOptionList() {
        if (!empty($this->_options_list)) {
            $optionListString = "List of available options : \n";
            foreach ($this->_options_list as $option_name => $option_info) {
                $optionListString .= "
                    --$option_name : {$option_info[0]} \n";
            }
            echo $optionListString."\n";
        }
    }

    public function exectute(string $option_name, string $params): void {
        if (key_exists($option_name, $this->_options_list)) {
            foreach($this->_options_list as $option_key => $option_value) {
                if ($option_key == $option_name) {
                    $callback = $option_value[1];
                    $callback($params);
                    echo "\n";
                }
            }
        } else {
            throw new OptionInvalideException($option_name);
        }
    }
    
}