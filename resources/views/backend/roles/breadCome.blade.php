<div class="ibox">
    <div class="ibox-body px-3 py-2 d-flex align-items-center justify-content-between">
        <ul class="mb-0 pl-0 breadcrumb-nav">
                @foreach ($breadCrumb as $key=>$value)
                    <li class="{{ $loop->last ? '' : 'active' }}">@if ($loop->last)
                        {{ $key }}
                        @else
                        <a href="{{ $value }}">{{ $key }}</a>
                    @endif</li>
                @endforeach
        </ul>
        <div class="action-btn">
            @yield('action')
        </div>
    </div>
</div>