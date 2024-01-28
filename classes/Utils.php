<?php

class Utils
{
	public static function getAge($then)
	{
		$then_ts = strtotime($then);
		$then_year = date('Y', $then_ts);
		$age = date('Y') - $then_year;
		if (strtotime('+' . $age . ' years', $then_ts) > time())
		{
			$age--;
		}
		return $age;
	}
}