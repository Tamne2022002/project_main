<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.partials.head')
    @include('client.partials.css')
</head>

<body>
    <div class="wrap-container">
        <div class="{{ Request::route()->getName() == 'index' ? 'external-page' : 'internal-page' }}">
            @include('client.partials.header')
            {{-- @include('client.partials.menu') --}}
            @include('client.partials.slider')
            <div class="{{ Request::route()->getName() == 'index' ? 'external-content' : 'internal-content py50' }}">
                @if (Request::route()->getName() == 'index')
                    @include('client.partials.content')
                @else
                    @yield('content')
                @endif
            </div>
            @include('client.partials.footer')
            @include('client.partials.modal')
            @include('client.partials.support')
            @include('client.partials.anticopy')
            @include('client.partials.js')
            @yield('js')
        </div>
    </div>
</body>

</html>
