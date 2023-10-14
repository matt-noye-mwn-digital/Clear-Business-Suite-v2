@unless ($breadcrumbs->isEmpty())
    <section class="breadCrumbsBanner">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <ol >
                        @foreach ($breadcrumbs as $breadcrumb)

                            @if ($breadcrumb->url && !$loop->last)
                                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                            @else
                                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb->title }}</li>
                            @endif

                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </section>

@endunless
