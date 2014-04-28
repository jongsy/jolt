<?php

class SiteFile extends Eloquent {
    // let eloquent know that these attributes will be available for mass assignment
	protected $fillable = array('content', 'site_id', 'title', 'mime', 'parent_id');
	public function site()
    {
        return $this->belongsTo('Site');
    }
}