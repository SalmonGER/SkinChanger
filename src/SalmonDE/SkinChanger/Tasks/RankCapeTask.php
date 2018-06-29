<?php
namespace SalmonDE\SkinChanger\Tasks;

use pocketmine\Player;
use pocketmine\scheduler\Task;

class RankCapeTask extends Task
{

    public function __construct($owner, Player $player, $skinid){
        $this->player = $player;
        $this->skinid = $skinid;
    }

    public function onRun($currenttick){
        $this->player->setSkin($this->player->getSkinData(), $this->skinid);
    }
}
