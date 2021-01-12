<div class="header">
    <div class="header-container">
        <div class="logo"><img src="{{ asset('index') }}/images/logo.jpg" alt=""></div>
        <ul class="nav">
            <li class="dropdown"><a href="/" class="nav">{{trans('message.home')}}</a></li>
            <li class="dropdown">
                <a href="/about" class="nav">{{trans('message.about_us')}}</a>
                <ul class="dropdown-menu" style="display: block;">
                    <li><a href="/about-company">{{ trans('message.about_company') }}</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="/service" class="nav">{{trans('message.our_service')}}</a>
                <ul class="dropdown-menu" style="display: block;">
                    <li><a href="/service-sourcing">{{ trans('message.service_sourcing') }}</a></li>
                    <li><a href="/service-conseil">{{ trans('message.service_conseil') }}</a></li>
                    <li><a href="/service-intermediation">{{ trans('message.service_intermediation') }}</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="https://www.guanxi-mall.com/" target="_blank" class="nav">{{trans('message.e_mall')}}</a></li>
            <li class="dropdown"><a href="/partner" class="nav">{{trans('message.our_partners')}}</a></li>
            <li class="dropdown"><a href="/contact" class="nav">{{trans('message.contact_us')}}</a></li>
        </ul>
        <ul class="switch">
            <li>
                <img src="{{ asset('index') }}/images/en.png" alt="">
                <a @if(Session::get('locale')=='en') class="select" @endif href="{{ url('/changeLocale/en') }}">En</a>
            </li>
            <li>
                <img src="{{ asset('index') }}/images/fr.png" alt="">
                <a @if(Session::get('locale')=='fr') class="select" @endif href="{{ url('/changeLocale/fr') }}">Fr</a>
            </li>
        </ul>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".header-container .nav").each(function(){
            $this = $(this);
            if( $this[0].href == String(window.location) ){
                $this.addClass("select");
            }
        });

        $(".dropdown-menu").hide();
        $(".dropdown").hover(function () {
            $(this).children('.dropdown-menu').stop().fadeIn();
        },function(){
            $(this).children('.dropdown-menu').stop().fadeOut();
        })

        if (navigator.userAgent.match(/IEMobile|BlackBerry|Android|iPod|iPhone|iPad/i)) {
            @if(Session::get('locale')=='fr')
            // $(".nav li").css('height','38px')
            @endif
        }
    });
</script>
