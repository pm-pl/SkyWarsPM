<?php

namespace Vecnavium\SkyWarsPM\Session;

class Session
{

    /** @var string */
    private string $arena = '';
    /** @var int  */
    private int $wins, $losses, $wlr, $winstreak, $kills;

    public function __construct()
    {
        $stats = ['wins', 'losses', 'wlr', 'winstreak'];
        foreach ($stats as $stat)
            $this->{$stat} = 0;
    }

    /**
     * @return string
     */
    public function getArena(): string
    {
        return $this->arena;
    }

    /**
     * @param string $arena
     */
    public function setArena(string $arena): void
    {
        $this->arena = $arena;
    }

    /**
     * @return int
     */
    public function getWins(): int
    {
        return $this->wins;
    }

    /**
     * @return int
     */
    public function getLosses(): int
    {
        return $this->losses;
    }

    /**
     * @return int
     */
    public function getWlr(): int
    {
        return $this->wlr;
    }

    /**
     * @return int
     */
    public function getWinstreak(): int
    {
        return $this->winstreak;
    }

    /**
     * @return int
     */
    public function getKills(): int
    {
        return $this->kills;
    }

    /**
     * @return void
     */
    public function add(): void
    {
        $this->kills = $this->kills + 1;
    }

    /**
     * @return void
     */
    public function win(): void
    {
        $this->wins = $this->wins + 1;
        $this->winstreak = $this->winstreak + 1;
    }

    /**
     * @return void
     */
    public function lose(): void
    {
        $this->losses = $this->losses + 1;
        $this->winstreak = 0;
    }

    /**
     * @return void
     */
    public function calculateWLR(): void
    {
        $losses = $this->getLosses();
        if ($losses == 0)
            $losses = 1;
        $this->wlr = ($this->wins / $losses) * 100;
    }

}
