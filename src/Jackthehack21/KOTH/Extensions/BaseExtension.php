<?php
/*
*    /$$   /$$  /$$$$$$  /$$$$$$$$ /$$   /$$
*   | $$  /$$/ /$$__  $$|__  $$__/| $$  | $$
*   | $$ /$$/ | $$  \ $$   | $$   | $$  | $$
*   | $$$$$/  | $$  | $$   | $$   | $$$$$$$$
*   | $$  $$  | $$  | $$   | $$   | $$__  $$
*   | $$\  $$ | $$  | $$   | $$   | $$  | $$
*   | $$ \  $$|  $$$$$$/   | $$   | $$  | $$
*   |__/  \__/ \______/    |__/   |__/  |__/
*
*   Copyright (C) 2019 Jackthehack21 (Jack Honour/Jackthehaxk21/JaxkDev)
*
*   This program is free software: you can redistribute it and/or modify
*   it under the terms of the GNU General Public License as published by
*   the Free Software Foundation, either version 3 of the License, or
*   any later version.
*
*   This program is distributed in the hope that it will be useful,
*   but WITHOUT ANY WARRANTY; without even the implied warranty of
*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*   GNU General Public License for more details.
*
*   You should have received a copy of the GNU General Public License
*   along with this program.  If not, see <https://www.gnu.org/licenses/>.
*
*   Twitter :: @JaxkDev
*   Discord :: Jackthehaxk21#8860
*   Email   :: gangnam253@gmail.com
*/

declare(strict_types=1);
namespace Jackthehack21\KOTH\Extensions;

use Jackthehack21\KOTH\Main;
use pocketmine\event\Listener;
use pocketmine\Server;

abstract class BaseExtension implements Extension, Listener
{

    /** @var Main */
    public $plugin;

    /** @var ExtensionData|null */
    private $extensionData;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    public function setExtensionData(string $name, string $author, string $version, string $api, array $plugin_depends = [], array $ext_depends = []): void
    {
        $this->extensionData = new ExtensionData($this, $name, $author, $version, $api, $plugin_depends, $ext_depends);
    } //todo look at https://github.com/pmmp/PocketMine-MP/blob/3.8.0/src/pocketmine/plugin/ScriptPluginLoader.php#L63

    /**
     * @return ExtensionData|null
     */
    public function getExtensionData()
    {
        return $this->extensionData;
    }

    public function onLoad() : bool{
        return false;
    }

    public function onEnable() : bool{
        return false;
    }

    public function onDisable() : void{
        return;
    }

    public function getServer() : Server{
        return $this->plugin->getServer();
    }
}