<?php

namespace Vecnavium\SkyWarsPM\Arena;
use Vecnavium\SkyWarsPM\SkyWarsPM;

class ArenaManager
{

    /** @var Arena[] */
    private array $arenas;

    public function __construct()
    {
        foreach (scandir(SkyWarsPM::getInstance()->getDataFolder() . DIRECTORY_SEPARATOR . 'Arenas') as $file)
        {
            if ($file !== '.' and $file !== '..')
                continue;
            $data = (array)json_decode(file_get_contents($file));
            $this->arenas[$data['name']] = new Arena();
        }
    }

}
