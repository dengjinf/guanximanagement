<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>{{ trans('message.service_mate_title') }}</title>
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

        {{--    our service内容    --}}
        <div class="service-container">
            @if( $banner )
                <img src="storage/{{ $banner['image'] }}" alt="">
            @endif
            <div class="content">
                <div class="title">{{ trans('message.our') }} <span>{{ trans('message.service') }}</span></div>
                <div class="bg">
                    <div class="left-box">
                        <div class="serial">
                            <div class="square"><span>01</span></div>
                        </div>
                        <div class="box-title">{{ $part1['title'] }}</div>
                        <div class="desc">{{ $part1['description'] }}</div>
                    </div>
                    <div class="right-box">
                        @if( $part1['image'] )
                            <img src="storage/{{ $part1['image'] }}" alt="">
                        @endif
                        <div class="cover"></div>
                        <div class="more"><a href="">{{ $part1['hoverText'][0] }}</a></div>
                    </div>
                </div>
                <div class="no-bg">
                    <div class="left-box">
                        @if( $part2['image'] )
                            <img src="storage/{{ $part2['image'] }}" alt="">
                        @endif
                    </div>
                    <div class="right-box">
                        <div class="serial">
                            <div class="square"><span>02</span></div>
                        </div>
                        <div class="box-title">{{ $part2['title'] }}</div>
                        <div class="desc">{{ $part2['description'] }}</div>
                    </div>
                </div>
                <div class="bg">
                    <div class="left-box">
                        <div class="serial">
                            <div class="square"><span>03</span></div>
                        </div>
                        <div class="box-title">{{ $part3['title'] }}</div>
                        <div class="desc">{{ $part3['description'] }}</div>
                    </div>
                    <div class="right-box">
                        @if( $part2['image'] )
                            <img src="storage/{{ $part3['image'] }}" alt="">
                        @endif
                    </div>
                </div>
                <div class="no-bg">
                    <div class="left-box">
                        @if( $part4['image'] )
                            <img src="storage/{{ $part4['image'] }}" alt="">
                        @endif
                    </div>
                    <div class="right-box">
                        <div class="serial">
                            <div class="square"><span>04</span></div>
                        </div>
                        <div class="box-title">{{ $part4['title'] }}</div>
                        <div class="desc">{{ $part4['description'] }}</div>
                    </div>
                </div>
                <div class="events">
                    @if(isset($part5))
                        <div class="title event-title">{{ trans('message.business') }} <span>{{ trans('message.events') }}</span></div>
                        @if( $part5['content'] )
                            @foreach($part5['content'] as $event)
                                <div class="events-item">
                                    <div class="item-content">
                                        @if( $event['image'] )
                                        <div class="pic"><img src="storage/{{ $event['image'] }}" alt=""></div>
                                        @endif
                                        <div class="detail">
                                            <div class="detail-title">{{ $event['title'] }}</div>
                                            <div class="detail-content">{!! $event['description'] !!}</div>
                                        </div>
                                        <div class="date">
                                            <div class="day">{{ $event['day'] }}</div>
                                            <div class="year">{{ $event['year_month'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                    <div class="more"><a href="">{{ trans('message.click') }}</a></div>
                </div>
            </div>
        </div>

        {{--    底部   --}}
        @include('home.footer')
    </body>
</html>
