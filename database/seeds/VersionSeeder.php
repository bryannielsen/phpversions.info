<?php

use Illuminate\Database\Seeder;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$service = new \App\Services\VersionCheckService;
    	$versions = $service->check();

		foreach($versions as $version)
		{
			$version = \App\Version::firstOrCreate($version);
		}
    }
}
