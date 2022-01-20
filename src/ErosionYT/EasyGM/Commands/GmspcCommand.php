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

class GmspcCommand extends Command{

    public function __construct(string $name) {
        parent::__construct($name);
        $this->setPermission("gmspc.command");
        $this->setDescription("Change your gamemode to Spectator");
        $this->setAliases(['Spectator', '3', 'spec']);
        $this->setUsage("/gmspc");
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

        $sender->setGamemode(GameMode::SPECTATOR());
        $sender->sendMessage("§6» §7You have changed your gamemode to Spectator");
        return true;
    }
}
