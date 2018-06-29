<?php
namespace SalmonDE\SkinChanger\Tasks;

use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\utils\TextFormat as TF;

class CheckSkinTask extends Task
{
  public function __construct($player, Array $data){
      $this->player = $player;
      $this->skindata = $data['SkinData'];
      $this->skinid = $data['SkinID'];
      $this->lang = $this->getOwner()->getMessages();
  }

  public function onRun($currenttick){
      if(base64_encode($this->player->getSkinData()) == $this->skindata){
          if(!$this->player->getSkinId() == $this->skinid){
              $this->player->kick(TF::AQUA.$this->lang['SkinCheck']['WrongSkinID'], false);
          }else{
              $this->player->sendPopup(TF::GREEN.TF::BOLD.$this->lang['SkinCheck']['Success']);
          }
      }else{
          $this->player->kick(TF::AQUA.$this->lang['SkinCheck']['WrongSkinData'], false);
      }
      unset($this->getOwner()->tasks[strtolower($this->player->getName())]);
  }
}
