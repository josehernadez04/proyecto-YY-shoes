<section class="content-header pb-0">
    <div class="container-fluid">
        <div class="row align-items-center mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" style="font-weight:600;">{{ $title ?? 'Título' }}</h1>
                @isset($subtitle)
                    <small class="text-muted">{{ $subtitle }}</small>
                @endisset
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right mb-0">
                    @foreach ($breadcrumbs ?? [] as $crumb)
                        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                            @if (!empty($crumb['route']) && !$loop->last)
                                <a href="{{ route($crumb['route']) }}">{{ $crumb['label'] }}</a>
                            @else
                                {{ $crumb['label'] }}
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>
