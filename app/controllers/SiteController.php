<?php

class SiteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$site = new Site;
        $title = Input::get('title');
        if (!$title) {
        	return "fail";
        }
        $site->title = $title;
        $site->user_id = Auth::user()->id;
        $site->save();
		return "hooray!";
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user_name, $site_name)
	{
		$user = User::where('username', $user_name)->first();
		$site = Site::where('title', $site_name)->where('user_id', $user->id)->first();
		$siteFiles = $site->SiteFiles;
		return View::make('site.edit')->with('site', $site)->with('siteFiles', $siteFiles);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $user_name
	 * @param  string  $site_name
	 * @param  string  $file_name
	 * @return Response
	 */
	public function showPublicAlias($user_name, $site_name)
	{
		//TODO:
		//Validate to make sure the site belongs to the user
		//mime should be bale to handle images not just text

		$user = User::where('username', $user_name)->first();
		$site = Site::where('title', $site_name)->where('user_id', $user->id)->first();
		$site_id = $site->id;

		//find index siteFile and render
		$file = SiteFile::where('site_id', $site_id)->where('title', "index")->first();
		
		return View::make('iframe.iframe')->with('siteFile', $file);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$site = Site::find($id);
		$files = $site->siteFiles;
		return View::make('site.edit')->with('site', $site)->with('siteFiles', $files);
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();
		if ($data['site_id']) {
			$site = Site::find($data['site_id']);
			$site->title = $data['title'];
			$site->save();
			return Redirect::to('/'.$site->title.'/edit');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
