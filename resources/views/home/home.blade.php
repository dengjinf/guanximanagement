<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>{{ trans('message.home_mate_title') }}</title>
        <link rel="stylesheet" href="{{ asset('index') }}/css/guanxi.css">
        <link rel="stylesheet" href="{{ asset('index') }}/css/swiper.min.css">
        <link rel="stylesheet" href="{{ asset('index') }}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('index') }}/css/font-awesome-animation.css">
        <script type="text/javascript" src="{{ asset('index') }}/js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="{{ asset('index') }}/js/swiper.min.js"></script>

        <style>
            .swiper-button-next, .swiper-button-prev {
                width: 100%;
                height: 100%;
                opacity: 1;
                top: 8%;
                background-size: 60px;
            }
            .swiper-container .swiper-button-prev{
                background-image: url({{ asset('index') }}/images/prev.jpg);
            }
            .swiper-container .swiper-button-next{
                background-image: url({{ asset('index') }}/images/next.jpg);
            }
            .swiper-button-next{
                right: -46%;
            }
            .swiper-button-prev{
                left: -46%;
            }
            .swiper-container-android .swiper-slide, .swiper-wrapper{
                margin-left: 100px;
            }
            @media screen and (max-width: 768px) {
                .swiper-container-android .swiper-slide, .swiper-wrapper{
                    margin-left: 0;
                }
                .swiper-button-next, .swiper-button-prev{
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        {{--    头部内容    --}}
        @include('home.header')

        {{--    首页内容    --}}
        <div class="home-container">
            @if( isset($banner['image']) )
                <img src="storage/{{ $banner['image'] }}" alt="">
            @endif
            @if( isset($small_banner['image']) )
                <img src="storage/{{ $small_banner['image'] }}" alt="">
            @endif
            <div class="content container">
                @if( isset($part4) )
                <div class="brief">
                    @foreach( $part4 as $value )
                    <div class="brief-item">
                        <h4><span>{{ $value['front_title'] }}</span> <span class="after-title">{{ $value['after_title'] }}</span></h4>
                        {!! $value['text'] !!}
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="row">
                    <div class="row-item">
                        <i class="fa fa-folder fa-5x  icon-round  faa-ring animated"></i>
                        <h4>{{ trans('message.row_intermediation_title') }}</h4>
                        <p>{{ trans('message.row_intermediation_desc') }}</p>
                    </div>
                    <div class="row-item">
                        <i class="fa fa-paper-plane-o  fa-5x icon-round  faa-pulse animated"></i>
                        <h4>{{ trans('message.row_sourcing_title') }}</h4>
                        <p>{{ trans('message.row_sourcing_desc') }}</p>
                    </div>
                    <div class="row-item">
                        <i class="fa fa-bullhorn  fa-5x icon-round faa-horizontal animated"></i>
                        <h4>{{ trans('message.row_appui_title') }}</h4>
                        <p>{{ trans('message.row_appui_desc') }}</p>
                    </div>
                </div>
                <div class="title">{{ trans('message.about') }}  <span>{{ trans('message.us') }}</span></div>
                <div class="title-description">
                    <t2>{{ $part1['title'] }}</t2>
                    <p>{{ $part1['description'] }}</p>
                </div>
                <div class="subtitle">
                    <div class="item">
                        <p class="fa num faa-pulse animated">3000+</p>
                        <p class="text">{{ trans('message.subtitle_factories') }}</p>
                    </div>
                    <div class="item">
                        <p class="fa num faa-pulse animated">150+</p>
                        <p class="text">{{ trans('message.subtitle_participation') }}</p>
                    </div>
                    <div class="item">
                        <p class="fa num faa-pulse animated">200+</p>
                        <p class="text">{{ trans('message.subtitle_business') }}</p>
                    </div>
                    <div class="item">
                        <p class="fa num faa-pulse animated">10+</p>
                        <p class="text">{{ trans('message.subtitle_guanxi') }}</p>
                    </div>
                </div>
                <div class="why">
                    <div class="left-img">
                        @if( isset($part1['content_image']) )
                            <img src="{{ $part1['content_image'] }}" alt="">
                        @endif
                        <div class="float">{{ trans('message.why') }}</div>
                    </div>
                    <div class="mid-img">
                        <img src="{{ asset('index') }}/images/index-4.jpg" alt="">
                    </div>
                    <div class="explain">
                        @if( isset($part1['text']) )
                            {!! $part1['text'] !!}
                        @endif
                    </div>
                </div>
                <div class="case">
                    <div class="title">{{ trans('message.wonderful') }} <span>{{ trans('message.cases') }}</span></div>
                    <div class="items">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @if($part2['case'])
                                    @foreach( $part2['case'] as $value )
                                        <div class="swiper-slide">
                                            @foreach( $value as $v )
                                                <div class="case-item">
                                                    <img src="storage/{{ $v['image'] }}" alt="">
                                                    <div class="desc">{{ $v['content'] }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="team">
                    @if( isset($part3['content_image']) )
                        <div class="title">{{ trans('message.company') }} <span>{{ trans('message.team') }}</span></div>
                        <div class="items">
                            @foreach( $part3['content_image'] as $key => $image )
                                <div class="team-item">
                                    <img src="{{ $image }}" alt="">
                                    @if( $part3['hoverText'][$key] )
                                        <div class="cover">{{ $part3['hoverText'][$key] }}</div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="gray"></div>
        </div>

        {{--    底部   --}}
        @include('home.footer')
    </body>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            cssMode: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination'
            },
            mousewheel: true,
            keyboard: true,
        });
    </script>
</html>
