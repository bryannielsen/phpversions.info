<?php

use Illuminate\Database\Seeder;

class DistributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$distributions = array(
			['family' => 'Debian', 'major_version' => 8, 'name' => 'Jessie', 'default' => '5.6.12'],
			['family' => 'Debian', 'major_version' => 7, 'name' => 'Wheezy', 'default' => '5.4.44'],
			['family' => 'Debian', 'major_version' => 6, 'name' => 'Squeeze', 'default' => '5.3.3'],
			['family' => 'Ubuntu', 'major_version' => 15, 'minor_version' => '04', 'name' => 'Vivid', 'default' => '5.6.4'],
			['family' => 'Ubuntu', 'major_version' => 14, 'minor_version' => '10', 'name' => 'Utopic', 'default' => '5.5.12'],
			['family' => 'Ubuntu', 'major_version' => 14, 'minor_version' => '04', 'name' => 'Trusty (LTS)', 'default' => '5.5.9'],
			['family' => 'Ubuntu', 'major_version' => 12, 'minor_version' => '04', 'name' => 'Precise (LTS)', 'default' => '5.3.10'],
			['family' => 'CentOS', 'major_version' => 7, 'default' => '5.4.16'],
			['family' => 'CentOS', 'major_version' => 6, 'default' => '5.3.3'],
			['family' => 'CentOS', 'major_version' => 5, 'default' => '5.1.6']
		);

		foreach($distributions as $distribution)
		{
			$default = explode('.', $distribution['default']);
			unset($distribution['default']);

			$distro = \App\Distribution::create($distribution);

		}
    }
}
