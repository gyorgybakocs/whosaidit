<?php

namespace App\View\Components;

use BGDS\Utils\Util;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

/**
 * Class Head
 * @package App\View\Components\Head
 */
class Head extends Component
{
    public $title;
    public $description;

    /**
     * Title constructor.
     */
    public function __construct()
    {
        $path = empty(trim(Util::getPath(Request::url()), '/')) ? '.home' : '.' . trim(Util::getPath(Request::url()), '/');
        $config =  'head.main' . $path;
        $this->title = config( $config . '.title');
        $this->description = config($config . '.description');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        return view('components.head.head');
    }
}