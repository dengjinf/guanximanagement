<div class="header">
    <div class="header-container">
        <div class="logo">
            <img src="{{ asset('index') }}/images/logo.jpg" alt="">
            <img id="menu" class="menu" src="{{ asset('index') }}/images/menu.png" alt="">
        </div>
        <ul class="nav">
            <li class="dropdown"><a href="/" class="nav">{{trans('message.home')}}</a></li>
            <li class="dropdown">
                <a href="/about" class="nav">{{trans('message.about_us')}}</a>
                <img class="down-mark" src="{{ asset('index') }}/images/down.png" alt="" style="position: absolute;right: 0;">
                <ul class="dropdown-menu">
                    <li><a href="/about-company">{{ trans('message.about_company') }}</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="/service" class="nav">{{trans('message.our_service')}}</a>
                <img class="down-mark" src="{{ asset('index') }}/images/down.png" alt="" style="position: absolute;right: 0;">
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
        $(".down-mark").click(function () {
            $(this).siblings('.dropdown-menu').stop().fadeToggle();
        })

        $('.nav').hide();
        $('#menu').click(function(){
            $('.nav').slideToggle()
        })
    });
</script>
