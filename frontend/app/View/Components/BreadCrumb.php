<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

/**
 * Class Menu
 * @package App\View\Components
 */
class BreadCrumb extends Component
{
    /**
     * @var array
     */
    public $pages;

    /**
     * @var array
     */
    public $home;

    /**
     * @var array
     */
    public $last;

    /**
     * @var array
     */
    public $main;

    /**
     * BreadCrumb constructor.
     */
    public function __construct()
    {
        $this->makePages();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        return view('components.breadcrumb.breadcrumb');
    }

    private function makePages()
    {
        $path = trim(Request::path() === '/' || empty(Request::path()) ? 'home' : Request::path(), '/');
        $pathArray = explode('/', $path);

        $this->pages[] = [
            'name' => config('menu.details.home.name'),
            'url' => '/home',
        ];

        foreach ($pathArray as $index => $menuItem) {
            if ($menuItem === 'home' || $menuItem === 'quiz') {
                continue;
            }

            $this->pages[] = [
                'name' => config('menu.details.'. $menuItem . '.name'),
                'url' => end($pathArray) === $menuItem ? '' : $this->buildPath($pathArray, $index),
            ];
        }
    }

    /**
     * @param $pathArray
     * @param $stopIndex
     * @return string
     */
    private function buildPath($pathArray, $stopIndex)
    {
        $path = '/';
        foreach ($pathArray as $index => $menuItems) {
            if($index < $stopIndex) {
                $path .= $menuItems . '/';
            } elseif ($index === $stopIndex) {
                $path .= $menuItems ;
            }
        }

        return $path;
    }
}