<?php

namespace ErosionYT\EasyGM\Commands;

use ErosionYT\EasyGM\Main;
use pocketmine\player\Player;
use pocketmine\player\GameMode;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginOwned;

class GmcCommand extends Command implements PluginOwned {

	public function __construct(string $name)
    {
        parent::__construct($name);
        $this->setPermission("easygamemode.command.gmc");
        $this->setDescription("Change your gamemode to creative");
        $this->setAliases(['creative', '1', 'c']);
        $this->setUsage("/gmc");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
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

    public function getOwningPlugin(): Plugin
    {
        return Main::getInstance();
    }
}
