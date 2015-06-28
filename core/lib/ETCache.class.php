<?php
// Copyright 2011 Toby Zerner, Simon Zerner
// This file is part of esoTalk. Please see the included license file for usage information.

/**
 * Caching service. Allows values to be cached and retrieved later.
 *
 * This implementation is a dirty cache, which does not cache anything. This class
 * should be extended to implement real caching behaviour.
 *
 * @package esoTalk
 */

class ETCache {
    
    public $mmc;

    public $filenames = array();
    
    public $fnamechanged = false;

    public $fname_key = 'c_filenames';
    
    function __construct(){

        $this->mmc = memcache_init();
        //Load filenames
        $arr = self::get($this->fname_key);
        if(is_array($arr)) $this->filenames = $arr;
 	}

/**
 * Check if a value exists in the cache.
 *
 * @param string $key The identifier for which value to get.
 * @return bool True if exists, false if not.
 */
public function exists($key)
{
    if( $this->mmc == false ) return false;
    return $this->mmc->get($key)?true:false;
}

/**
 * Get a value stored in the cache. Returns false if it does not exist.
 *
 * @param string $key The identifier for which value to get.
 * @return mixed The stored value, or false if not found.
 */
public function get($key)
{
    //return false;
	if( $this->mmc == false ) return false;
    return $this->mmc->get($key);
}

/**
 * Store a value in the cache. Overwrites any already-existing value.
 *
 * @param string $key The identifier to store the value under.
 * @param mixed $value The value to store.
 * @param int Number of seconds before the cache entry expires. 0 = unlimited.
 * @return bool true on success, false on failure.
 */
public function store($key, $value, $ttl = 0)
{
    //return true;
	if( $this->mmc == false ) return true;
    return $this->mmc->set($key, $value ,0, $ttl);
}

/**
 * Remove a value from the cache.
 *
 * @param string $key The identifier for the value to remove.
 * @return bool true on success, false on failure.
 */
public function remove($key)
{
    //return true;
	if( $this->mmc == false ) return true;
    return $this->mmc->delete($key);

}

}
