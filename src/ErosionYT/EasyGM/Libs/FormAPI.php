<?php

declare(strict_types = 1);

namespace ErosionYT\EasyGM\Libs;

use pocketmine\plugin\PluginBase;

class FormAPI extends PluginBase{

    /**
     * @deprecated
     *
     * @param callable|null $function
     * @return SimpleForm
     */
    public function createSimpleForm(?callable $function = null) : SimpleForm {
        return new SimpleForm($function);
    }

}
