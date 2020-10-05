<nav class="navbar navbar-expand-lg navbar-light bg-light bgds-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="mainmenu">
        <ul class="navbar-nav">
            @foreach ($menu as $url => $item)
                @if (!$item['visible'])
                   @continue
                @endif
                @if ($item['sub'] && $item['sub']['visible'])
                    <li class="nav-item dropdown">
                        @if ($item['disabled'])
                            <a class="nav-link dropdown-toggle disabled" href="#" id="{{ $url }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-disabled="true">{{ $item['name'] }}</a>
                        @else
                            <a class="nav-link dropdown-toggle" href="#" id="{{ $url }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $item['name'] }}</a>
                        @endif

                        <div class="dropdown-menu" aria-labelledby="{{ $url }}">
                            @foreach ($item['sub']['menu'] as $subUrl => $subItem)
                                @if ($subItem['disabled'])
                                    <a class="dropdown-item disabled" href="{{ '/' . $url . '/' . $subUrl }}" aria-disabled="true">{{ $subItem['name'] }}</a>
                                @else
                                    <a class="dropdown-item" href="{{ '/' . $url . '/' . $subUrl }}">{{ $subItem['name'] }}</a>
                                @endif

                            @endforeach
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        @if ($item['disabled'])
                            <a class="nav-link disabled" href="{{ '/' . $url }}" tabindex="-1" aria-disabled="true">{{ $item['name'] }}</a>
                        @else
                            <a class="nav-link" href="{{ '/' . $url }}">{{ $item['name'] }}</a>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>