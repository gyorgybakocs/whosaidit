<?php

namespace App\View\Components;

use BGDS\Utils\Util;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;

/**
 * Class Menu
 * @package App\View\Components
 */
class Rightcol extends Component
{
    /**
     * Rightcol constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        return view('pages.parts.right-col');
    }
}