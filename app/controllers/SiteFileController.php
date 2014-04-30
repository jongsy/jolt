<?php

class SiteFileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return Response::json(SiteFile::get());
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
		$input = Input::all();
        
        $file = SiteFile::create($input);

        return Response::json($file);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		return Response::json(SiteFile::find($id));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showPublic($id)
	{
		$file = SiteFile::find($id);
		return View::make('iframe.iframe')->with('siteFile', $file);

	}

	
	/**
	 * Display the specified resource.
	 *
	 * @param  string  $user_name
	 * @param  string  $site_name
	 * @param  string  $file_name
	 * @return Response
	 */
	public function showPublicAlias($user_name, $site_name, $fileName)
	{
		//TODO:
		//Validate to make sure the site belongs to the user
		//mime should be bale to handle images not just text

		$user = User::where('username', $user_name)->first();
		$site = Site::where('title', $site_name)->where('user_id', $user->id)->first();
		$site_id = $site->id;
		//build into url filename parser
		$fileArray = explode(".", $fileName);
		$fileType = array_pop($fileArray);
		if (strpos('html|htm|css', $fileType) !== false) {
    		$fileName = join(".", $fileArray);
    		$file = SiteFile::where('site_id', $site_id)->where('title', $fileName)->where('mime', 'text/'.$fileType)->first();
		} else {
			$file = SiteFile::where('site_id', $site_id)->where('title', $fileName)->first();
		}
		
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
		$file = SiteFile::find($id);
		$site = Site::find($file->site_id);
		$files = $site->SiteFiles;
		return View::make('site.file.edit')->with('siteFile', $file)->with('site', $site)->with('siteFiles', $files);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
        
        $file = SiteFile::find($id);
        $file->update($input);
        return Response::json($file);
        

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
