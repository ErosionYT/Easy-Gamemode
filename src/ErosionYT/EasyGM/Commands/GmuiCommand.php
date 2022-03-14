<?php

namespace ErosionYT\EasyGM\Commands;

use ErosionYT\EasyGM\Libs\SimpleForm;
use ErosionYT\EasyGM\Main;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginOwned;
use pocketmine\utils\TextFormat;
use pocketmine\player\GameMode;


class GmuiCommand extends Command implements PluginOwned
{
    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->setPermission("easygamemode.command.ui");
        $this->setDescription("Open the gamemode UI");
        $this->setUsage("/gmui");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender instanceof Player) {
            $sender->sendMessage("Use the command in-game");
            return false;
        }
        if (!$this->testPermission($sender)) {
            $sender->sendMessage("§cYou do not have permission to use this command");
            return false;
        }
        $this->GamemodeUI($sender);
        return true;
    }

    public function GamemodeUI(Player $player) : void {
        $form = new SimpleForm(function (Player $player, int $data = null) {
            $result = $data;
            if ($result === null) {
                return;
            }
            switch ($result) {
            case 0:
                $this->CreativeUI($player);
                break;
            case 1:
                $this->SurvivalUI($player);
                break;
            case 2:
                $this->SpectatorUI($player);
                break;
            case 3:
                $this->AdventureUI($player);
                break;
            }
        });

        $form->setTitle(TextFormat::AQUA . "Choose your gamemode");
        $form->addButton(TextFormat::RED . "Creative");
        $form->addButton(TextFormat::RED . "Survival");
        $form->addButton(TextFormat::RED . "Spectator");
        $form->addButton(TextFormat::RED . "Adventure");
        $player->sendForm($form);
    }

    public function CreativeUI(Player $player) : void {
        if ($player->hasPermission("easygamemode.command.gmc")) {

            $player->setGamemode(GameMode::CREATIVE());
            $player->sendMessage("§6» §7You have changed your gamemode to Creative");
        }
    }

    public function SurvivalUI(Player $player) : void {
        if ($player->hasPermission("easygamemode.command.gms")) {

            $player->setGamemode(GameMode::SURVIVAL());
            $player->sendMessage("§6» §7You have changed your gamemode to Survival");
        }
    }

    public function SpectatorUI(Player $player) : void {
        if ($player->hasPermission("easygamemode.command.gmspc")) {

            $player->setGamemode(GameMode::SPECTATOR());
            $player->sendMessage("§6» §7You have changed your gamemode to Spectator");
        }
    }

    public function AdventureUI(Player $player) : void {
        if ($player->hasPermission("easygamemode.command.gma")) {

            $player->setGamemode(GameMode::ADVENTURE());
            $player->sendMessage("§6» §7You have changed your gamemode to Adventure");
        }
    }

    public function getOwningPlugin(): Plugin
    {
        return Main::getInstance();
    }
}