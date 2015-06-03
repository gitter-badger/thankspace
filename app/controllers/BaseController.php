<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}


	public function getFormCalendar()
	{
		$result = [];

		// get date
		for ($i=1; $i <= 9 ; $i++) { 
			$i = (int) "0".$i;
			$result['date'][$i] = $i;
		}
		for ($i=10; $i <= 30 ; $i++) { 
			$result['date'][$i] = $i;
		}

		// get month
		$result['month']['01'] = 'Januari';
		$result['month']['02'] = 'Februari';
		$result['month']['03'] = 'Maret';
		$result['month']['04'] = 'April';
		$result['month']['05'] = 'Mei';
		$result['month']['06'] = 'Juni';
		$result['month']['07'] = 'Juli';
		$result['month']['08'] = 'Agustus';
		$result['month']['09'] = 'September';
		$result['month']['10'] = 'Oktober';
		$result['month']['11'] = 'November';
		$result['month']['12'] = 'Desember';

		// get year
		$result['year'][2015] = 2015;

		return $result;
	}


	public function getOfficeHours()
	{
		return Config::get('thankspace.office_hours');
	}

}
