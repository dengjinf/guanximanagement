<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>{{ trans('message.partner_mate_title') }}</title>
        <link rel="stylesheet" href="{{ asset('index') }}/css/guanxi.css">
        <link rel="stylesheet" href="{{ asset('index') }}/css/swiper.min.css">
        <script type="text/javascript" src="{{ asset('index') }}/js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="{{ asset('index') }}/js/swiper.min.js"></script>
    </head>
    <body>
        {{--    头部内容    --}}
        @include('home.header')

        {{--    ourpartner内容    --}}
        <div class="partner-container">
            @if( $banner )
                <img src="storage/{{ $banner['image'] }}" alt="">
            @endif
            <div class="content container">
                <div class="title">{{ trans('message.our') }} <span>{{ trans('message.partner') }}</span></div>
                <div class="partner">
                    @if( $top )
                        <div class="top"><img src="storage/{{ $top['image'] }}" alt=""></div>
                    @endif
                    @if( $bot )
                        @foreach( $bot as $value )
                            <div class="items">
                                @foreach( $value as $v )
                                    <div class="item"><img src="storage/{{ $v['image'] }}" alt=""></div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        {{--    底部   --}}
        @include('home.footer')
    </body>
</html>
