<?php

namespace ErosionYT\EasyGM\Commands;

use ErosionYT\EasyGM\Main;

use pocketmine\player\Player;
use pocketmine\player\GameMode;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\plugin\Plugin;

class GmcCommand extends Command{

	public function __construct(string $name) {
        parent::__construct($name);
        $this->setPermission("gmc.command");
        $this->setDescription("Change your gamemode to creative");
        $this->setAliases(['creative', '1', 'c']);
        $this->setUsage("/gmc");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
        if (!$sender instanceof Player) {
            $sender->sendMessage("Use the command in-game");
            return false;
        }
        if (!$this->testPermission($sender)) {
            $sender->sendMessage("§cYou do not have permission to use this command");
            return false;
        }
	    
		$sender->setGamemode(GameMode::CREATIVE());
		$sender->sendMessage("§6» §7You have changed your gamemode to Creative");
		return true;
	}
}
