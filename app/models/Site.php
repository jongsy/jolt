<?php

class Site extends Eloquent {
    // let eloquent know that these attributes will be available for mass assignment
	protected $fillable = array('title');
	public function pages()
    {
        return $this->hasMany('Page');
    }

}