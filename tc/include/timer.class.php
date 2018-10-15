<?php

!defined('IN_MYMPS') && exit('FORBIDDEN');
class timer
{
	public $StartTime = 0;
	public $StopTime = 0;
	public $TimeSpent = 0;

	public function start()
	{
		$this->StartTime = microtime();
	}

	public function stop()
	{
		$this->StopTime = microtime();
	}

	public function spent()
	{
		if ($this->TimeSpent) {
			return $this->TimeSpent;
		}
		else {
			$StartMicro = substr($this->StartTime, 0, 10);
			$StartSecond = substr($this->StartTime, 11, 10);
			$StopMicro = substr($this->StopTime, 0, 10);
			$StopSecond = substr($this->StopTime, 11, 10);
			$start = doubleval($StartMicro) + $StartSecond;
			$stop = doubleval($StopMicro) + $StopSecond;
			$this->TimeSpent = $stop - $start;
			return substr($this->TimeSpent, 0, 8) . '秒';
		}
	}
}


?>
