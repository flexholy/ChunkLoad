<?php  
namespace procompteam; 

use pocketmine\plugin\PluginBase; 
use pocketmine\event\Listener; 
use pocketmine\scheduler\PluginTask; 
use pocketmine\event\level\ChunkLoadEvent;
use pocketmine\level\generator\LightPopulationTask;

class Service extends PluginBase implements Listener 
{
	public function onEnable()
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function fix(ChunkLoadEvent $e)
	{
		if($e->getChunk()->isPopulated())
		{
			$this->getServer()->getScheduler()->scheduleAsyncTask(new LightPopulationTask($e->getLevel(), $e->getChunk()));
		}
	}
}  