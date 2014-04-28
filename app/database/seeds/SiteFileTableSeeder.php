	
<?php

class SiteFileTableSeeder extends Seeder 
{

	public function run()
	{
		DB::table('site_files')->delete();

		SiteFile::create(array(
			'title' => 'page 1',
			'content' => 'oasdoamsdoasmdomasodoasdomasomdaosdomasdom',
			'site_id' => 1,
			'mime' => 'text/html'
		));

		SiteFile::create(array(
			'title' => 'page 2',
			'content' => 'asdasdasdasdasd',
			'site_id' => 1,
			'mime' => 'text/html'
		));

		SiteFile::create(array(
			'title' => 'page 3',
			'content' => 'wefwefwefwefwefwefwefwe',
			'site_id' => 1,
			'mime' => 'text/html'
		));
	}

}