<div class="footer">
    <div class="footer-content container">
        <div class="message-box">
            <div class="skip">
                <div class="contact-logo"><img src="{{ asset('index') }}/images/logo.jpg" alt=""></div>
                <div class="contact-img"><a href="/contact#dituContent"><img src="{{ asset('index') }}/images/contact.png" alt=""></a></div>
                <div class="contact-text"><a href="/contact#dituContent">{{trans('message.message_box_contact')}}</a></div>
                <div class="narrow">
                    <img src="{{ asset('index') }}/images/close.png" alt="">
                </div>
            </div>
            <div class="large"><img src="{{ asset('index') }}/images/contact.jpg" alt=""></div>
        </div>
        <div class="title">
            @if( Session::get('locale') == 'en')
                CONTACT <span>US</span>
            @elseif ( Session::get('locale') == 'fr' )
                CONTACTEZ - <span>NOUS</span>
            @endif
        </div>
        <div class="items">
            <div class="item">
                <img src="{{ asset('index') }}/images/footer-1.jpg" alt="">
                <div class="address">
                    <p>{{ trans('message.china') }}: 11 Floor, Jian She Liu Rd, Guangzhou, 510060, PR China /</p>
                    <p>COTE D'IVOIRE : Abidjan, Plateau Bd. Angoulvant</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('index') }}/images/footer-2.jpg" alt="">
                <div class="phone">
                    <p>(+225) 08 63 10 20 – 89 05 21 98 - 85 36 34 54 /</p>
                    <p>(+86) 131 673 712 33</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('index') }}/images/footer-3.jpg" alt="">
                <div class="email">
                    <p>info@guanxi-management.com</p>
                </div>
            </div>
        </div>
        <div class="copyright">Copyright: XX Co., Ltd</div>
        <ul class="country-flag">
            <li><img src="{{asset('index')}}/images/zhongguo.png" alt=""></li>
            <li><img src="{{asset('index')}}/images/ketediwa.png" alt=""></li>
            <li><img src="{{asset('index')}}/images/beining.png" alt=""></li>
            <li><img src="{{asset('index')}}/images/saineijiaer.png" alt=""></li>
            <li><img src="{{asset('index')}}/images/nirier.png" alt=""></li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function(){
        if (navigator.userAgent.match(/IEMobile|BlackBerry|Android|iPod|iPhone|iPad/i)) {
            $(".skip").hide()
            $(".narrow").click(function(){
                $(".skip").hide()
                $(".large").fadeIn()
            })
            $(".large").click(function(){
                $(".skip").stop().fadeIn()
                $(".large").hide()
            })
        }else{
            $(".large").hide()
            $(".narrow").click(function(){
                $(".skip").stop().fadeOut()
                $(".large").fadeIn()
            })
            $(".large").click(function(){
                $(".skip").stop().fadeIn()
                $(".large").fadeOut()
            })
        }
    })
</script>
