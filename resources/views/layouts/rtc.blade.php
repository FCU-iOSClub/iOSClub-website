@extends('layouts.app') 
@section('nav') 
    @include('rtc.nav') 
@endsection 
@section('footer') 
    @include('rtc.footer') 
@endsection 
@section('content') 
    @yield('content') 
@endsection 
@section('hidden-content') 
<div class="scroll-top d-lg-none">
    <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
</div>

    @yield('hidden-content')

@endsection 
@push('scripts')
<script src="{{asset('js/rtc.js')}}"></script>
@endpush 
@push('css')
<link href="{{asset('css/rtc.css')}}" rel="stylesheet"></link>
@endpush
@section('addon-script') 
    @parent
    <script>
        RTC.run();
    </script>
<script>
function Load_with_axios($this) {
    console.log($($this).data('href'),window.location.href)
    if ($($this).data('href')+'/' != window.location.href) {
        console.log('false')
        axios.get($($this).data('href'))
            .then(function(response) {
                $("html, body").stop().animate({ scrollTop: 0 }, 350, 'swing');
                $('.nav-item.active , .nav-link.active,.dropdown-item.active').removeClass('active');
                if ($($this).hasClass('dropdown-item')) {
                    $($this).parent().parent().find('.nav-link.dropdown-toggle').addClass('active');
                    $($this).addClass('active');
                } else {
                    $($this).addClass('active');
                }
                $('#content').stop().animate({ opacity: 0 }, 200, 'swing', function() {
                    $('#content').html(response.data.html).animate({ opacity: 1 }, 200, 'swing', function() {
                        if (response.data.run) RTC[response.data.run]();
                    })
                });
                document.getElementsByTagName("title").innerHTML = response.data.title;
                window.history.pushState(response.data, "", $($this).data('href'));
            })
            .catch(function(error) {});
        event.preventDefault();
        return false;
    }else if ($this.hash) {
        var target = $($this.hash);
        target = target.length ? target : $('[name=' + $this.hash.slice(1) + ']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: (target.offset().top - 48)
            }, 1000, "easeInOutExpo");
            return false;
        }
    }
}
window.onpopstate = function(e) {
    if (e.state) {
        document.getElementById("content").innerHTML = e.state.html;
        document.getElementsByTagName("title").innerHTML = e.state.title;
    }
};
</script>
@endsection 
