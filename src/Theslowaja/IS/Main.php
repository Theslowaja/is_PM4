<?php

namespace Theslowaja\IS;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\command\{
    Command,
    CommandSender
};

use pocketmine\plugin\PluginBase;
use pocketmine\event\EventListener;
use pocketmine\utils\TextFormat as T;

class Main extends PluginBase{

    public function onEnable(): void{
        
    }

    public function onCommand(CommandSender $p, Command $c, string $l, array $arg): bool{
        if($c->getName() == "is"){
            if($p instanceof Player){
                if(isset($arg[0])){
                    $cht = implode(" ", $arg);
                    $this->getServer()->broadcastMessage(T::GREEN."Asker: ".$p->getName().T::GREEN."\nQuestion: ".T::RED."is ".$cht);
                    switch(rand(0, 3)){
                       case 0:
                           $this->getServer()->broadcastMessage("answer: ".T::DARK_GREEN."yes");
                       break;
                       case 1:
                           $this->getServer()->broadcastMessage("answer: ".T::DARK_RED."no");
                       break;
                       case 2:
                           $this->getServer()->broadcastMessage("answer: ".T::RED."maybe no");
                       break;
                       case 3:
                           $this->getServer()->broadcastMessage("answer: ".T::GREEN."maybe yes"); 
                       break;
                    }
                }else{
                    $p->sendMessage(T::RED."usage: /is <your question>");
                }
            } else { 
                $p->sendMessage("your not player");
            }
        return true;
        }
    }
}