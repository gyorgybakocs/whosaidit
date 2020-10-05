<section>
    <section class="bgds-wrap">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 pt-1 pb-1">
                    <p class="breadcrumb">
                        @foreach ($pages as $page)
                            @if (!empty($page['url']))
                                <span class="breadcrumb-item mr-2">
                                <a href="{{ $page['url'] }}">{{ $page['name'] }}</a>
                            </span>
                            @else
                                <span class="breadcrumb-item">{{ $page['name'] }}</span>
                            @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </section>
</section>