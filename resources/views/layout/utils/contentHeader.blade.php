@if (isset($no_content))
    <div class="mt-3"></div>
@else
    <div class="row mb-1">
        <div class="col-sm-3 col-12">
            <h3>{{ $title }}</h3>
        </div>
        <div class="col-sm-9 col-12">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Início</a></li>
                @foreach ($items as $key => $value)
                    <li class="breadcrumb-item @if ($loop->last) active @endif ">
                        @if ($value)
                            <a href="{{ $value }}">
                                {{ $key }}
                            </a>
                        @else
                            {{ $key }}
                        @endif
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
@endif
