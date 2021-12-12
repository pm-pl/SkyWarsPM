<?php

namespace Vecnavium\SkyWarsPM\Listeners\SkyWars;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class ArenaCreationListener implements Listener
{

    /**
     * @param PlayerChatEvent $event
     * @return void
     * @priority HIGHEST
     */
    public function onChat(PlayerChatEvent $event): void
    {
        // TODO stuff ok
    }

}
