<?php

namespace App\Utils;

use App\Models\Configuration;

class Config
{
    public static function Get($name)
    {
        $config = Configuration::where('name', '=', $name)->first();

        switch($config->type)
        {
            case "bool":
                return $config->value == "true";
            default:
                return $config->value;
        }
    }
}
