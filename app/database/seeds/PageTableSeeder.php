	
<?php

class PageTableSeeder extends Seeder 
{

	public function run()
	{
		DB::table('pages')->delete();

		Page::create(array(
			'title' => 'page 1',
			'content' => 'oasdoamsdoasmdomasodoasdomasomdaosdomasdom',
			'site_id' => 1
		));

		Page::create(array(
			'title' => 'page 2',
			'content' => 'asdasdasdasdasd',
			'site_id' => 1
		));

		Page::create(array(
			'title' => 'page 3',
			'content' => 'wefwefwefwefwefwefwefwe',
			'site_id' => 1
		));
	}

}