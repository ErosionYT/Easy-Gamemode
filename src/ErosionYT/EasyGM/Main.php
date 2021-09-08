<?php

namespace ErosionYT\EasyGM;

# Commands

use ErosionYT\EasyGM\Commands\GmcCommand;
use ErosionYT\EasyGM\Commands\GmsCommand;
use ErosionYT\EasyGM\Commands\GmspcCommand;

# Pocketmine
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\tile\Tile;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\Player;

class Main extends PluginBase{
    
	const MAIN_PREFIX = "EasyGM";
	
    
	
	public function onEnable(): void
	    {
            
		# Command Unregister
		$this->getServer()->getCommandMap()->unregister($this->getServer()->getCommandMap()->getCommand("defaultgamemode"));
		$this->getServer()->getCommandMap()->unregister($this->getServer()->getCommandMap()->getCommand("gamemode"));
		
		# Commands
		$this->getServer()->getCommandMap()->register("gmc", new GmcCommand("gmc", $this));
		$this->getServer()->getCommandMap()->register("gms", new GmsCommand("gms", $this));
		$this->getServer()->getCommandMap()->register("gmspc", new GmspcCommand("gmspc", $this));
	    }
	 }