<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>{{ trans('message.about_mate_title') }}</title>
        <link rel="stylesheet" href="{{ asset('index') }}/css/guanxi.css">
        <link rel="stylesheet" href="{{ asset('index') }}/css/swiper.min.css">
        <script type="text/javascript" src="{{ asset('index') }}/js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="{{ asset('index') }}/js/swiper.min.js"></script>
    </head>
    <body>
        {{--    头部内容    --}}
        @if ($agent->isMobile())
            @include('home.m-header')
        @else
            @include('home.header')
        @endif

        {{--    aboutus内容    --}}
        <div class="about-container">
            @if( $banner )
                <img src="storage/{{ $banner['image'] }}" alt="">
            @endif
            <div class="content container">
                <div class="title">
                    {{ trans('message.about') }} <span>{{ trans('message.us') }}</span>
                </div>
                <div class="detail">
                    <div class="description">{{ $part1['description'] }}</div>
                    @if( $part1['image'] )
                        <img src="storage/{{ $part1['image'] }}" alt="">
                    @endif
                </div>

            </div>
        </div>

        {{--    底部   --}}
        @include('home.footer')
    </body>
</html>
