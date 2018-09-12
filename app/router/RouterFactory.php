<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\SimpleRouter;


class RouterFactory
{

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		// alternativně zapsáno polem
		$router = new RouteList();		
		$router[] = new Route('<presenter>/<action>/[<sensorID>]', 'Relremote:default');		
		return $router;
	}

}
