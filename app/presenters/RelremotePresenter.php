<?php

namespace App\Presenters;

use Nette;
use Nette\Forms\Container;
use Nette\Application\UI;
use Nette\Application\UI\Presenter;
use Nette\Utils\Paginator;



class RelremotePresenter extends BasePresenter
{
	private $RelremoteRepository;
	private $by;
	
	public function inject(\Temp\RelremoteRepository $relremoteRepository)						
    {
	    $this->RelremoteRepository = $relremoteRepository;
    }
	
	public function renderDefault()
	{					
		$this->template->sensors = $this->RelremoteRepository->GetAllSensors();
	}
	
	function actionDefault($sensorID,$day)
	{
		$this->by = array('sensorID'=>$sensorID,'day'=>$day);
	}
}
