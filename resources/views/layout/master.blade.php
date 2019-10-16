@include('layout.partials.header')


<div class="header_slide">
    <div class="header_bottom_left">
        @include('layout.partials.categories')
    </div>
    @include('layout.partials.slide')
    <div class="clear"></div>
</div>
</div>
<div class="main">
    <div class="content">
        @yield('content')
    </div>
</div>
</div>


@include('layout.partials.footer')