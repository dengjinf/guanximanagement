<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
{{--        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ trans('message.contact_mate_title') }}</title>
        <link rel="stylesheet" href="{{ asset('index') }}/css/guanxi.css">
        <link rel="stylesheet" href="{{ asset('index') }}/css/swiper.min.css">
        <script type="text/javascript" src="{{ asset('index') }}/js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="{{ asset('index') }}/js/swiper.min.js"></script>
        <script type="text/javascript" src="{{ asset('index') }}/js/layer/layer.js"></script>
        <!--引用百度地图API-->
        <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=tcNUnMmjPlYxGcffIls0RFgMYECb8Gbs&s=1"></script>
    </head>
    <body>
        {{--    头部内容    --}}
        @include('home.header')

        {{--    contactus内容    --}}
        <div class="contact-container">
            @if( $part1['image'] )
                <img src="storage/{{ $part1['image'] }}" alt="">
            @endif
            <div class="content">
                <div class="title">{{ trans('message.contact') }}<span> {{ trans('message.us') }}</span></div>
                <div class="address">
                    <div class="detail">
                        @if( $part2['china_address'] )
                            <p>{{ trans('message.china_address') }}:{{ $part2['china_address'] }}</p>
                        @endif
                        @if( $part2['address'] )
                            <p>{{ trans('message.address') }}: {{ $part2['address'] }}</p>
                        @endif
                        @if( $part2['phone'] )
                            <p>{{ trans('message.tel') }}. {{ $part2['phone'] }}</p>
                        @endif
                        @if( $part2['email'] )
                            <p>{{ trans('message.email') }}: {{ $part2['email'] }}</p>
                        @endif
                    </div>
                    <div class="map" id="dituContent"></div>
                </div>
                <form action="" id="info">
                    {{ csrf_field() }}
                    <p>{{ trans('message.message_title') }}</p>
                    <input type="text" name="title">
                    <p>{{ trans('message.message_content') }}</p>
                    <textarea name="content" id="" cols="20" rows="10"></textarea>
                    <p>{{ trans('message.message_email') }}</p>
                    <input type="text" name="email">
                    <p>{{ trans('message.message_code') }}</p>
                    <div class="code">
                        <input class="input-code" type="text" name="code" id="inputCode">
                        <div class="captcha" id="captcha" onclick="exchange()"></div>
                    </div>
                    <input class="send" type="button" value="{{ trans('message.message_submit') }}" onclick="send()">
                </form>
            </div>
        </div>

        {{--    底部   --}}
        @include('home.footer')

    </body>

    <script>
        var emali;
        //产生验证码
        createCode();
        var code;
        function createCode() {
            code = "";
            var codeLength = 6; //验证码的长度
            var random = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
            for(var i = 0; i < codeLength; i++) {
                var index = Math.floor(Math.random() * 10); //取得随机数的索引（0~9）
                code += random[index]; //根据索引取得随机数加到code上
            }
            $('#captcha').text(code); //把code值赋给验证码
        }
        //校验验证码
        function send() {
            var email_reg = new RegExp("^([\\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\\.[a-zA-Z0-9_-])+");
            email = $("input[name = 'email']").val();
            var inputCode = $('#inputCode').val();
            if (email == ''){
                @if( Session::get('locale')=='en' )
                    layer.msg("Please enter email address!");
                @else
                    layer.msg("Entrez l’adresse!");
                @endif
            }else{
                if( !email_reg.test(email) ){
                    @if( Session::get('locale')=='en' )
                        layer.msg("Please enter the correct email address!");
                    @else
                        layer.msg("Indiquez la bonne adresse électronique!");
                    @endif
                }
                else if(inputCode.length <= 0) {
                    @if( Session::get('locale')=='en' )
                        layer.msg("Please enter verification code!");
                    @else
                        layer.msg("Veuillez captcha!");
                    @endif
                }
                else if(inputCode != code) {
                    @if( Session::get('locale')=='en' )
                        layer.msg("The verification code was incorrectly entered!");
                    @else
                        layer.msg("Captcha incorrect");
                    @endif
                    createCode(); //刷新验证码
                    $('#inputCode').val('');//清空文本框
                }
                else {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        type:'POST',
                        dataType:'json',
                        url:'message',
                        data:$('#info').serialize(),
                        success:function(res){
                            console.log(res)
                            if (res.status == 200){
                                layer.msg(res.message)
                            }else{
                                layer.msg(res.message)
                            }
                        }
                    })
                }
            }
        }
        //点击更换验证码
        function exchange(){
            createCode();
        }
    </script>

    <script type="text/javascript">
        //创建和初始化地图函数：
        function initMap(){
            createMap();//创建地图
            setMapEvent();//设置地图事件
            addMapControl();//向地图添加控件
        }

        //创建地图函数：
        function createMap(){
            var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
            var point = new BMap.Point(-4.021308,5.328122);//定义一个中心点坐标
            map.centerAndZoom(point,16);//设定地图的中心点和坐标并将地图显示在地图容器中
            window.map = map;//将map变量存储在全局
        }

        //地图事件设置函数：
        function setMapEvent(){
            map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
            map.enableScrollWheelZoom();//启用地图滚轮放大缩小
            map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
            map.enableKeyboard();//启用键盘上下左右键移动地图
        }

        //地图控件添加函数：
        function addMapControl(){
            //向地图中添加缩放控件
            var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_SMALL});
            map.addControl(ctrl_nav);
            //向地图中添加缩略图控件
            var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
            map.addControl(ctrl_ove);
            //向地图中添加比例尺控件
            var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
            map.addControl(ctrl_sca);
        }

        initMap();//创建和初始化地图
    </script>

</html>
