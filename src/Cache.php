<?php

namespace Mars\Bin;

class Cache extends Base
{
    public protected(set) string $title = 'Clean Cache';

    public protected(set) array $actions = ['cache'];

    public protected(set) array $commands = [
        'clean'           => 'cleanAll',
        'clean:all'       => 'cleanAll',
        'clean:css'       => 'cleanCss',
        'clean:js'        => 'cleanJs',
        'clean:data'      => 'cleanData',
        'clean:pages'     => 'cleanPages',
        'clean:templates' => 'cleanTemplates',
    ];
    
    public protected(set) array $command_descriptions = [
        'cache:clean'           => 'Cleans all caches',
        'cache:clean:all'       => 'Cleans all caches',
        'cache:clean:css'       => 'Cleans the CSS cache',
        'cache:clean:js'        => 'Cleans the JavaScript cache',
        'cache:clean:data'      => 'Cleans the data cache',
        'cache:clean:pages'     => 'Cleans the page cache',
        'cache:clean:templates' => 'Cleans the template cache',
    ];

    /**
     * Cleans all the caches
     */
    public function cleanAll()
    {
        $this->show_done = false;

        $this->cleanCss();
        $this->cleanJavascript();
        $this->cleanData();
        $this->cleanPages();
        $this->cleanTemplates();

        $this->done();
    }

    /**
     * Cleans the Css cache
     */
    public function cleanCss()
    {
        $this->doing('Cleaning the CSS cache...');
        $this->app->cache->css->clean();
    }

    /**
     * Cleans the Javascript cache
     */
    public function cleanJavascript()
    {
        $this->doing('Cleaning the JavaScript cache...');
        $this->app->cache->javascript->clean();
    }

    /**
     * Cleans the Data cache
     */
    public function cleanData()
    {
        $this->doing('Cleaning the Data cache...');
        $this->app->cache->data->clean();
    }

    /**
     * Cleans the Pages cache
     */
    public function cleanPages()
    {
        $this->doing('Cleaning the Pages cache...');
        $this->app->cache->pages->clean();
    }

    /**
     * Cleans the Templates cache
     */
    public function cleanTemplates()
    {
        $this->doing('Cleaning the Templates cache...');
        $this->app->cache->templates->clean();
    }
}