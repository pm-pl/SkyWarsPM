<?php

namespace Vecnavium\SkyWarsPM\Arena;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\block\VanillaBlocks;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\World;
use Vecnavium\SkyWarsPM\SkyWarsPM;

class Arena
{

    /** @var string */
    private string $name;
    /** @var int */
    private int $playercount, $dead, $alive;
    /** @var Player[] */
    private array $players;
    /** @var Block[] */
    private array $blocksPlaced, $blocksBroken;
    /** @var World */
    private World $world;
    /** @var Vector3 */
    private Vector3 $pos1, $pos2;
    /** @var Vector3[] */
    private array $spawns;

    public function __construct(string $name, World $world, Vector3 $pos1, Vector3 $pos2)
    {
        $this->name = $name;
        $this->world = $world;
        $this->pos1 = $pos1;
        $this->pos2 = $pos2;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return World
     */
    public function getWorld(): World
    {
        return $this->world;
    }

    /**
     * @return Vector3
     */
    public function getPos1(): Vector3
    {
        return $this->pos1;
    }

    /**
     * @return Vector3
     */
    public function getPos2(): Vector3
    {
        return $this->pos2;
    }

    /**
     * @param Block $block
     */
    public function addBlocksPlaced(Block $block): void
    {
        $this->blocksPlaced[] = $block;
    }

    /**
     * @param Block $block
     */
    public function addBlocksBroken(Block $block): void
    {
        $this->blocksBroken[] = $block;
    }

    /**
     * @return void
     */
    public function reset(): void
    {
        foreach ($this->blocksPlaced as $block)
        {
            SkyWarsPM::getInstance()->getServer()->getWorldManager()->getWorldByName($this->name)->setBlock($block->getPosition(), VanillaBlocks::AIR());
        }
        foreach ($this->blocksBroken as $block)
        {
            SkyWarsPM::getInstance()->getServer()->getWorldManager()->getWorldByName($this->name)->setBlock($block->getPosition(), BlockFactory::getInstance()->get($block->getId(), $block->getMeta()));
        }
    }

}
