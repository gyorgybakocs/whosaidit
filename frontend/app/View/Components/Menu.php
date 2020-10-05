<?php

namespace App\View\Components;

use BGDS\Utils\Util;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;

/**
 * Class Menu
 * @package App\View\Components
 */
class Menu extends Component
{
    /**
     * @var array
     */
    public $menu;

    /**
     * Menu constructor.
     */
    public function __construct()
    {
        $this->menu = config('menu.menu.menu');
        $this->enrichMenu();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        return view('components.menu.menu');
    }

    private function enrichMenu()
    {
        foreach ($this->menu as $itemUrl => &$item) {
            $item['name'] = config('menu.details.'. $itemUrl . '.name');
            if (!empty($item['sub'])) {
                foreach ($item['sub']['menu'] as $subUrl => &$subItem) {
                    $subItem['name'] = config('menu.details.'. $subUrl . '.name');
                    $subItem['description'] = config('menu.details.'. $subUrl . '.description');
                }
            }
        }

        $token = Cookie::get(Util::TOKEN);

        $this->menu['login']['visible'] = empty($token);
        $this->menu['logout']['visible'] = !empty($token);
        $this->menu['saved']['visible'] = !empty($token);
    }
}