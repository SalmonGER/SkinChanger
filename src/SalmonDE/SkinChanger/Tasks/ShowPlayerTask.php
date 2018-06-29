<?php
namespace SalmonDE\SkinChanger\Tasks;

use pocketmine\Player;
use pocketmine\scheduler\Task;

class ShowPlayerTask extends Task
{

    public function __construct($owner, Player $player){
        $this->player = $player;
    }

    public function onRun($currenttick){
        $this->player->spawnToAll();
    }
}
