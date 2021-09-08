<?php

namespace ErosionYT\EasyGM\Commands;

use ErosionYT\EasyGM\Main;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\plugin\Plugin;

class GmsCommand extends PluginCommand{

	public function __construct($name, Main $plugin) {
        parent::__construct($name, $plugin);
        $this->setDescription("Change your gamemode to survival");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
		if (!$sender->hasPermission("gms.command")) {
			$sender->sendMessage("§cYou do not have permission to use this command");
			return false;
		}
		$sender->setGamemode(Player::SURVIVAL);
		$sender->sendMessage("§6» §7You have changed your gamemode to Survival");
		return true;
	}
}