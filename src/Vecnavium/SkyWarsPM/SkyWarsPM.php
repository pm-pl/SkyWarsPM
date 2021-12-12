<?php

declare(strict_types=1);

namespace Vecnavium\SkyWarsPM;

use pocketmine\plugin\PluginBase;

class SkyWarsPM extends PluginBase{

    /** @var self */
    private static self $instance;

    public function onLoad(): void
    {
        self::$instance = $this;
    }

    protected function onEnable(): void
    {
        @mkdir($this->getDataFolder() . DIRECTORY_SEPARATOR .'Arenas');
        @mkdir($this->getDataFolder() . DIRECTORY_SEPARATOR .'Kits');
    }

    /**
     * @return SkyWarsPM
     */
    public static function getInstance(): SkyWarsPM
    {
        return self::$instance;
    }

}
