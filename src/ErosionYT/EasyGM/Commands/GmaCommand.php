<?php

namespace ErosionYT\EasyGM\Commands;

use ErosionYT\EasyGM\Main;

use pocketmine\player\Player;
use pocketmine\player\GameMode;
use pocketmine\plugin\PluginOwned;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\plugin\Plugin;

class GmaCommand extends Command implements PluginOwned {

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->setPermission("easygamemode.command.gma");
        $this->setDescription("Change your gamemode to adventure");
        $this->setAliases(['2', 'a', 'adventure']);
        $this->setUsage("/gma");
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
        $sender->setGamemode(GameMode::ADVENTURE());
        $sender->sendMessage("§6» §7You have changed your gamemode to Adventure");
        return true;
    }

    public function getOwningPlugin(): Plugin
    {
        return Main::getInstance();
    }
}
