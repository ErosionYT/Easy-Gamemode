<?php

namespace ErosionYT\EasyGM;

# Commands
use ErosionYT\EasyGM\Commands\GmcCommand;
use ErosionYT\EasyGM\Commands\GmsCommand;
use ErosionYT\EasyGM\Commands\GmspcCommand;
use ErosionYT\EasyGM\Commands\GmaCommand;
use ErosionYT\EasyGM\Commands\GmuiCommand;

# PocketMine
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    private static self $instance;

	public function onEnable(): void
    {
        # Instance register
        self::$instance = $this;

		# Command Unregister
		$this->getServer()->getCommandMap()->unregister($this->getServer()->getCommandMap()->getCommand("defaultgamemode"));
		$this->getServer()->getCommandMap()->unregister($this->getServer()->getCommandMap()->getCommand("gamemode"));
		
		# Commands register
		$this->getServer()->getCommandMap()->register("gmc", new GmcCommand('gmc'));
		$this->getServer()->getCommandMap()->register("gms", new GmsCommand('gms'));
		$this->getServer()->getCommandMap()->register("gmspc", new GmspcCommand('gmspc'));
        $this->getServer()->getCommandMap()->register("gma", new GmaCommand('gma'));
        $this->getServer()->getCommandMap()->register("gmui", new GmuiCommand('gmui'));
    }

    public static function getInstance () : self
    {
        return self::$instance;
    }
}
