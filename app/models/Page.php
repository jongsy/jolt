<?php

class Page extends Eloquent {
    // let eloquent know that these attributes will be available for mass assignment
	protected $fillable = array('content', 'site_id', 'title');
	public function site()
    {
        return $this->belongsTo('Site');
    }
}