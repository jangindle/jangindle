<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
</div><!-- site-wrapper -->
<style>
#footer-top{background-color: #2b2b2b; color:#a1a1a1; text-align: center;}

#footer-top a{ display: block; width: 16.66%; float:left; position: relative; line-height: 3em; font-size: 0.9em; }
#footer-top span{ position:absolute; right:0px; display: block; top:0px;}

.mobile #footer-top span{ display: none;}
.mobile #footer-top a { width:33.33%; float:left; padding:0px; display: block; margin:0px;}

#footer-main{background-color: #222222; color:#a1a1a1; font-size:0.9em; }
#footer-main .top{color: #fff; }
#footer-main .top img{display: inline-block;margin-left: 15px; padding-bottom: 5px;}
#footer-main .bottom{ }
#footer-main .kb {margin-top:20px;}
#footer-main .kb img{margin:0 auto;}


.mobile #footer-main .left-div{width: 100%; margin-bottom: 20px;}
.mobile #footer-main .right-div{width: 100%; margin-bottom: 20px;}
.mobile #footer-main .kb{width: 100%; float: none;}

#side-bar { position: fixed; bottom:350px; width:100%; }
#side-bar .float-side-bar{ position:absolute; right:-100px; z-index: 10;}
#side-bar .float-side-bar img{ width:100px; }

</style>

<script>

$(document).ready(function() {

    $(window).scroll(function() {
        $(this).scrollTop() > 1000 ? $(".float-side-bar").fadeIn() : $(".float-side-bar").fadeOut()
    });


    $( '#side-bar .float-side-bar img' ).click( function() {
      $( 'html, body' ).animate( { scrollTop : 0 }, 400 );
      //onopen();
	  return false;
    });
});

</script>

<script language="JavaScript">
function onopen()
{
var url =
"http://www.ftc.go.kr/bizCommPop.do?wrkr_no=6377900133";
window.open(url, "bizCommPop", "width=750, height=700;");
}
</script>


<div id="footer">

    <div id="side-bar" style='display:none;'>
        <div class="row">
            <div class="float-side-bar">
                <img src="/assets/images/common/top-icon.png"/>
            </div>
        </div>
    </div>

    <div id="footer-top">
        <div class="row">
            <div class="im-x">
	            <a href="/?p=introduce-jangin">장인들 소개<span>|</span></a>
	            <a class="btn-privacy">정보처리방침<span>|</span></a>
	            <a class="btn-recruit">장인들 모집<span>|</span></a>
	            <a class="btn-terms">이용약관<span>|</span></a>
	            <a class="btn-refund">환불정책<span>|</span></a>
	            <a href='/?p=user-guide#section-faq'>자주 묻는 질문</a>

				<div class="clear"></div>
            </div>
        </div>
    </div>

<script>
  window.channelPluginSettings = {
    "pluginKey": "16f9adec-cba3-40f1-9ce2-d0ecfea33c9a"
  };
  (function() {
    var node = document.createElement('div');
    node.id = 'ch-plugin';
    document.body.appendChild(node);
    var async_load = function() {
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = '//cdn.channel.io/plugin/ch-plugin-web.js';
      s.charset = 'UTF-8';
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    };
    if (window.attachEvent) {
      window.attachEvent('onload', async_load);
    } else {
      window.addEventListener('DOMContentLoaded', async_load, false);
    }
  })();
</script>

    <div id="footer-main">

    					<!--
                        <a><img src="/assets/images/common/icon-insta.png"/></a>
                        <a><img src="/assets/images/common/icon-facebook.png"/></a>
                        <a><img src="/assets/images/common/icon-blog.png"/></a>-->


<style>
#footer-main ul li{display: inline-block;margin-left: 10px;}
</style>
        <div class="row" style="padding:30px 0;">
            <div class="im-x">

					<script>
					function onPopKBAuthMark()
					{
						window.open('','KB_AUTHMARK','height=604, width=648, status=yes, toolbar=no, menubar=no,location=no');
						document.KB_AUTHMARK_FORM.action='https://okbfex.kbstar.com/quics';
						document.KB_AUTHMARK_FORM.target='KB_AUTHMARK';
						document.KB_AUTHMARK_FORM.submit();
					}

                    $(function(){

                        $('.icon-ul li a img').hover(function(){

                            _src = $(this).attr('src');

                            $(this).attr('src', _src.replace('_off', '_on'));

                        }, function(){

                            $(this).attr('src', _src.replace('_on', '_off'));

                        });

                    });

					</script>
					<form name="KB_AUTHMARK_FORM" method="get">
					<input type="hidden" name="page" value="C021590"/>
					<input type="hidden" name="cc" value="b034066:b035526"/>
					<input type="hidden" name="mHValue" value='47aee6e6b34b98ad4ce9402b16f0b7c1201802081425257'/>
					</form>

            	<div class="clear" style="border-bottom:1px solid #333; color:#fff; margin-bottom:10px;">
            		<span> 고객센터 &nbsp;<span style="color: #ff8d20; font-size:1.5em;"><a href="tel:1588-3667">042-322-8666</a></span> &nbsp;&nbsp;&nbsp;&nbsp;(평일 AM9:00-PM06:00 / 주말 및 공휴일 휴무)</span>

                    <ul class="fr icon-ul">
                        <li><a href="https://www.instagram.com/jangindle" target="_blank"><img src="/assets/images/common/icon_insta_off.png"/></a></li>
                        <li><a href="https://www.facebook.com/%EC%9E%A5%EC%9D%B8%EB%93%A4-203970087014518/?modal=admin_todo_tour" target="_blank"><img src="/assets/images/common/icon_facebook_off.png"/></a></li>
                        <li><a href="https://blog.naver.com/innerscape" target="_blank"><img src="/assets/images/common/icon_blog_off.png"/></a></li>
                    </ul>
                    <div class="clear"></div>
            	</div>

                <div class="w-12-8 fl">
                    <p class="top">

                    </p>
                    <p class="bottom">
                        장인들&nbsp;&nbsp;|&nbsp;&nbsp;대표자 : 이영남,윤보현  |  사업자 등록번호 : [637-79-00133]  <br />  통신판매업신고 : 제 2018-대전대덕-0079호 <a onclick='onopen();return false;'>[사업자정보확인]</a><br />
                        주소 : 대전시 유성구 관평동 1355번지 2동 106호<br />개인정보관리책임자 : 이영남
                        안전결제: KB에스크로 결제
                    </p>
                </div>

                <div class="w-12-2 fr">
                    <a><img src="/assets/images/main/kb.png" onclick="onPopKBAuthMark();" style="margin:0 auto; float:right;"/></a>
                </div>

                <div class="clear">
                	<br/>
	                COPYRIGHT &copy;장인들 ALL RIGHTS RESERVED.
                </div>
            </div>
        </div>
    </div>
</div>


<script>

	$(function(){

			$( ".btn-recruit" ).click(function(){
					child = $( "<div id='recruit-jangin'></div>" ).load( "/?p=recruit-jangin #recruit-jangin" );
					popup( child, function(){ });

			});

            $( ".btn-privacy" ).click(function(){
                    child = $( "<div id='privacy-jangin'></div>" ).load( "/?p=privacy #privacy" );
                    popup( child, function(){ });

            });

            $( ".btn-refund" ).click(function(){
                    child = $( "<div id='refund-jangin'></div>" ).load( "/?p=refund #refund" );
                    popup( child, function(){ });

            });

            $( ".btn-terms" ).click(function(){
                    child = $( "<div id='terms-jangin'></div>" ).load( "/?p=terms #terms" );
                    popup( child, function(){ });

            });
	});

</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>
