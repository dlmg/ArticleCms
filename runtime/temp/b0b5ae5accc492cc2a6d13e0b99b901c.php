<?php /*a:1:{s:79:"D:\phpstudy_pro\WWW\articleAdmin\application\index\view\index\article_list.html";i:1585730661;}*/ ?>
<!--﻿-->

<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>区块链落地应用|区块链开发|区块链平台|溯源区块链</title>
    <meta name="description"
          content="赛思特科技是一家基于区块链虚拟币系统开发的数字货币交易所平台，专注为互联网金融领域的区块链钱包、区块链系统开发、数字货币开发及区块链技术开发问题提供数据共享资源解决方案"/>
    <meta name="keywords" content="区块链技术开发,虚拟币系统,数字货币交易所平台开发,区块链钱包开发">
    <meta name="keywords" content="Website Keywords">
    <link rel="icon" type="image/png" sizes="96x96" href="/static/img/favicon.ico">
    <link rel="stylesheet" href="/static/css/bootstrap.css">
    <link rel="stylesheet" href="/static/css/font-awesome.min.css">
    <link rel="stylesheet" href="/static/css/reset.css">
    <link rel="stylesheet" href="/static/css/app.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <link rel="stylesheet" href="/static/css/swiper.min.css">
    <script src="/static/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="/static/js/jquery-3.4.1.min.js"></script>
    <script src="/static/js/bootstrap.js"></script>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<div class="nav-top"></div>
<div class="head_cont">
    <nav class="navbar navbar-expand-md navbar-dark app-navbar">
        <div class="container">
            <a class="navbar-brand" href="/index.html">
                <img class="nav-logo" src="/static/img/1572577150.png" alt="赛思特科技logo"/></a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="" style="color: #000;">☰</span>
            </button>
            <div class="navbar-collapse collapse" id="navbarsExample07">
                <ul class="navbar-nav ml-auto navbar-nav ml-auto justify-content-end col-lg-12 pr-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="index.html">首页</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/btb.html">数字货币交易所</a>
                    </li>
                    <li class="nav-item">
                        <img src="/static/img/hot.gif" class="hot" style="margin-left:100px">
                        <a class="nav-link" href="pages/wallet.html">数字货币钱包</a>
                    </li>
                    <li class="nav-item">
                        <img src="/static/img/hot.gif" class="hot" style="margin-left:70px">
                        <a class="nav-link" href="pages/runSub.html">跑分系统</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <img src="/static/img/hot.gif" class="hot" style="margin-left:100px">
                        <a class="nav-link dropdown-toggle" href="http://qkl.jinbocc.com/yycj/" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">区块链产品</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">
                            <a class="dropdown-item" href="pages/show.php-lang=cn&id=120.html" tppabs="http://qkl.jinbocc.com/yycj/show.php?lang=cn&id=120">数字资产交易系统</a>
                            <a class="dropdown-item" href="pages/show.php-lang=cn&id=107.html" tppabs="http://qkl.jinbocc.com/yycj/show.php?lang=cn&id=107">数字资产钱包</a>
                        </div>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="pages/anli.html">案例与优势</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/contact.html">联系我们</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<link rel="stylesheet" href="/static/css/news.css">
<!--平台钱包-->
<div class="ptb-banner">
    <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=97693188&amp;site=qq&amp;menu=yes" target="_blank">
        <img src="/static/img/ptb-banner1.png" alt="">
        <img src="/static/img/ptb-banner2.png" alt="" class="ptb-banner-img">
    </a>
</div>
<div class="news-content" id="comments">
    <div class="news-center">
        <div class="container">
            <div class="row">
                <div class="side-box col-md-3">
                    <dl class="side-list">
                        <dt>
                            <h4>新闻资讯<br>
                                <small>News</small>
                            </h4>
                        </dt>
                        <dd class="cord-fff" id="n1">
                            <ul class="left10">
                                <?php if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i;?>
                                <li><a href="<?php echo url('index/index/articleList',array('categoryid'=>$result['id'])); ?>"><?php echo htmlentities($result['category']); ?></a>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>

                            </ul>
                        </dd>
                    </dl>
                    <div class="whether-box">
                        <img src="/static/img/icon-i44.png" tppabs="/news/icon-i44.png">
                        <ul>
                            <li>全国咨询热线:</li>
                            <li><p>15188358607</p></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <script>
                    var myNav = document.getElementById("n1").getElementsByTagName("a");
                    for (var i = 0; i < myNav.length; i++) {
                        var links = myNav[i].getAttribute("href");
                        //alert(links);
                        // alert(myNav[i]);
                        var myURL = document.location.href;
                        if (myURL.indexOf(links) != -1) {
                            myNav[i].className = "on";
                        }
                    }
                </script>
                <!--右边内容-->
                <div class="news-right col-lg-9">
                    <div class="top-position">当前位置:资讯动态 > <?php echo htmlentities($title); ?></div>
                    <ul class="content-box">
                        <?php if($data != '暂无相关内容'): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                        <li>
                            <h1><a href="<?php echo url('index/showDetail',array('id'=>$data['id'])); ?>" target="_blank"
                                   title="<?php echo htmlentities($data['title']); ?>"><?php echo htmlentities($data['title']); ?></a>
                            </h1>
                            <h2><a href="<?php echo url('index/showDetail',array('id'=>$data['id'])); ?>"> <?php echo htmlentities($data['description']); ?></a></h2>
                            <h3><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($data['date'])? strtotime($data['date']) : $data['date'])); ?></h3>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <li>暂无相关内容</li>
                        <?php endif; ?>
                    </ul>

                </div>

                <div class="col-md-12" style="text-align:center;">
                    <?php echo $page; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<!--﻿
-->
<section id="foot" class="app-foot">
    <div class="container foot-box">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="foot-logo">
                    <img src="/static/img/foot_logo.png">
                    <ul>
                        <li><a href="#" target="_blank">区块链开发</a></li>
                        <li><a href="#" target="_blank">隐私政策</a></li>
                        <li><a href="/sitemap.xml" target="_blank">xml地图</a></li>
                        <!-- <li><a href="#" target="_blank"></a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-3">
                <dl class="foot-tel">
                    <dt>服务热线</dt>
                    <dd>
                        <h2><a href="tel://400-8052-988">15188358607</a></h2>
                        <p>服务咨询（24小时服务）</p>
                    </dd>
                </dl>
            </div>
            <div class="col-12 col-sm-3">
                <dl class="foot-tel">
                    <dt>微信服务</dt>
                    <dd>
                        <img src="/static/img/wx.png" alt="">
                    </dd>
                </dl>
            </div>
            <div class="col-12 col-sm-5">
                <dl>
                    <dt>郑州赛思特电子科技有限公司</dt>
                    <dd>
                        <ul>
                            <li>总部地址：河南省郑州市金水区绿地之窗</li>
                            <li>分部地址：深圳市南山区科创大厦</li>
                            <!-- <li>分公司地址：深圳市罗湖区建设路汇展阁大厦25F-18号</li>
                            <li>分公司地址：广州市天河区建工路4号佳都科技大厦2号楼1F-A41号</li> -->
                        </ul>
                    </dd>
                </dl>
            </div>
            <div class="col-12 col-sm-12">
                <p class="text-center">
                    <img style="width: 101px;
                        height: 41px;" src="/static/img/lg360img.png" alt="">
                    <img style="width: 101px;
                        height: 41px;" src="/static/img/zr.png" alt="">
                    <img style="width: 101px;
                        height: 41px;" src="/static/img/label_sm_90030.png" alt="">
                    <img style="width: 101px;
                        height: 41px;" src="/static/img/gaoXin.png" alt="">
                    <img style="width: 101px;
                        height: 41px;" src="/static/img/qw.png" alt="">
                    <img style="width: 101px;
                        height: 41px;" src="/static/img/kx.png" alt="">
                </p>
                <p class="foot-info">Copyright © 2017 &nbsp; 郑州赛思特电子科技有限公司 &nbsp; 版权所有 &nbsp;<a href="#"
                                                                                                target="_blank"><img
                        src="/static/img/beian.png"/>&nbsp;ICP备14001146号-1</a></p></div>
        </div>
        <link rel="stylesheet" href="/static/css/animate.min.css">
        <script src="/static/js/app.js"></script>
        <script src="/static/js/wow.js"></script>
        <script src="/static/js/GoToTop.js"></script>
        <script>
            new WOW().init();
        </script>

        <link href="/static/css/kf.css" type="text/css" rel="stylesheet">
        <!-- <script src="/static/js/kf.js"></script> -->
        <!-- <script language="javascript">
            if(document.all || document.getElementById)
            {
                document.write('<span id="LR_User_Icon0"></span>');
            }
            else if(document.layers)
            {
                document.write('<layer name="LR_User_Icon0"></layer>');
            }
        </script> -->
        <span id="LR_User_Icon0">
        <div class="bottom_fix">
            <div class="bottom_left">
                <li>
                    <a href="/index.html"><img src="/static/img/common_icon_home.png">返回首页</a>
                </li>
                <li>
                    <a href="tel:15188358607"><img src="/static/img/common_icon_tel.png">电话咨询</a>
                </li>
            </div>
            <div class="bottom_right">
                <li>
                    <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=97693188&amp;site=qq&amp;menu=yes" target="_blank">
                        <img src="/static/img/common_icon_qq.png">在线交谈</a>
                </li>
                <li>
                    <a href="contact.html" target="_blank">
                        <img src="/static/img/common_icon_dh.png">联系我们
                    </a>
                </li>
            </div>
        </div>
    </span>
        <!-- <script language="javascript">
            if(document.all || document.getElementById)
            {
                document.write('<span id="LR_User_TextLink0"></span>');
            }
            else if(document.layers)
            {
                document.write('<layer name="LR_User_TextLink0"></layer>');
            }
        </script> -->
        <!-- <span id="LR_User_TextLink0"><div class="dui-kf-main" id="xfkefu" style="top: 180px; right: 0px; position: absolute;"><div id="open_im" class="open-im">&nbsp;</div><div class="im_main" id="im_main"><div id="close_im" class="close-im"><a href="javascript:void(0);" title="点击关闭" target="_blank"><img src="/static/img/kf_closebt2.png"></a></div><ul class="dui-kf-ul"><li><a class="zx-hover" href="javascript:void(0)" onclick="openZoosUrl(&#39;chatwin&#39;,&#39;&amp;e=%25u5BF9%25u8BDD%25u8BF4%25u660E&#39;);return false;" title="客服人员在线,欢迎点击咨询" target="_self"><div class="dui-kf-d">1</div></a></li><li><a class="qq-hover" href="http://wpa.qq.com/msgrd?v=3&amp;uin=505562005&amp;site=qq&amp;menu=yes" target="_blank" title="客服人员在线,欢迎点击咨询"></a></li><li><a class="sh-hover" href="http://wpa.qq.com/msgrd?v=3&amp;uin=196290158&amp;site=qq&amp;menu=yes" target="_blank" title="客服人员在线,欢迎点击咨询">&nbsp;</a></li><li><img src="/static/img/kf_4.jpg"></li><li><img src="/static/img/kf_5.jpg"></li></ul></div></div></span>
        <span id="LR_User_Icon0"><div class="dui-kf-box" style="display: none;"><a href="javascript:void(0)" onclick="openZoosUrl(&#39;chatwin&#39;,&#39;&amp;e=%25u5BF9%25u8BDD%25u8BF4%25u660E&#39;);return false;" title="欢迎点击咨询" target="_self"><img src="/static/img/kf_img.png" class="kf-img" border="0"><img class="kf-btn" src="img/tc.gif"></a><a class="dui-kf-closebt"><img style="width: 70%" src="img/kf_closebt.png"></a></div></span> -->

        <script language="javascript" src="/static/js/LsJS.aspx"></script>
        <link href="/static/css/JS5.css" rel="stylesheet" type="text/css">
        <div id="LRdiv0" style="display:none;"></div>
        <div id="LRdiv1" style="display:none;"></div>
        <div id="LRdiv2" style="display:none;"></div>
        <div id="LRdiv3" style="display:none;"></div>
        <!-- <script language="javascript">

            LR_GetObj('LR_User_Icon0').innerHTML='<div class="dui-kf-box"><a '+LiveReceptionCode_BuildChatWin('对话说明','欢迎点击咨询')+' target="_blank"><img src="/static/img/kf_img.png" class="kf-img" border="0"><img class="kf-btn" src="img/tc.gif"></a><a class="dui-kf-closebt"><img style="width: 70%" src="img/kf_closebt.png"></a></div>';

            //    浮动客服 <a '+LiveReceptionCode_BuildChatWin('对话说明','客服人员在线,欢迎点击咨询')+' target="_blank">在线咨询</a>
            LR_GetObj('LR_User_TextLink0').innerHTML='<div class="dui-kf-main" id="xfkefu"><div id="open_im" class="open-im">&nbsp;</div><div class="im_main" id="im_main" ><div id="close_im" class="close-im"><a href="javascript:void(0);" title="点击关闭" target="_blank"><img src="/static/img/kf_closebt2.png"></a></div><ul class="dui-kf-ul"><li><a class="zx-hover" '+LiveReceptionCode_BuildChatWin('对话说明','客服人员在线,欢迎点击咨询')+' target="_blank"><div class="dui-kf-d">1</div></a></li><li><a class="qq-hover" href="http://wpa.qq.com/msgrd?v=3&uin=505562005&site=qq&menu=yes" target="_blank" title="客服人员在线,欢迎点击咨询"></a></li><li><a class="sh-hover" href="http://wpa.qq.com/msgrd?v=3&uin=196290158&site=qq&menu=yes" target="_blank" title="客服人员在线,欢迎点击咨询">&nbsp;</a></li><li><img src="/static/img/kf_4.jpg"></li><li><img src="/static/img/kf_5.jpg"></li></ul></div></div>';
        </script> -->
        <!-- <script language="javascript">
            /*弹窗 */
            LR_GetObj('LR_User_Icon0').innerHTML='<div class="bottom_fix">' +
                '<div class="bottom_left">' +
                '<li><a href="/"><img src="/static/img/common_icon_home.png">首页</a></li>' +
                '<li><a href="tel:400-8052-988" ><img src="/static/img/common_icon_tel.gif">电话</a></li></div>' +
                '<div class="xuanfu_mi"><a '+LiveReceptionCode_BuildChatWin('对话说明','欢迎点击咨询')+' target="_blank"><img src="/static/img/common_icon_msg.png"></a><sup>2</sup></div>' +
                '<div class="bottom_right">' +
                '<li><a href="http://wpa.qq.com/msgrd?v=3&uin=505562005&site=qq&menu=yes" target="_blank"><img src="/static/img/common_icon_qq.png">QQ</a></li>' +
                '<li><a href="http://api.map.baidu.com/geocoder?output=html&address=郑州市东城区东城中路辉煌商务大厦七楼D17号" target="_blank"><img src="/static/img/common_icon_dh.png">导航</a></li></div></div>';
        </script>
        <script type="text/javascript">
            Kefu('xfkefu',180,0);
            lastScrollY=0;
        </script> -->

        <script>

            // 需要下载的URL列表
            var img = ['img/1572577150.png'];
            console.log(img)
            loadImg(img);

            function loadImg(img) {
                img.map(function (imgSrc) {
                    var img = new Image();
                    console.log(img);
                    // 绑定加载完成事件处理函数
                    img.addEventListener("load", loadHandler);
                    // 这里为img指定src之后浏览器就会发出请求
                    img.src = imgSrc;
                })
            }

            function loadHandler(e) {
                /*这里可以通过this拿到加载好的图片对象，可以对它为所欲为。*/
                // 注销事件，释放内存。
                this.removeEventListener("load", loadHandler);
                // 判断是不是最后一个要加载的图片
                if (this.num === img.length) console.log("加载完成！");
            }

            var myNav = document.getElementById("navbarsExample07").getElementsByTagName("a");
            for (var i = 0; i < myNav.length; i++) {
                var links = myNav[i].getAttribute("href");
                //alert(links);
                // alert(myNav[i]);
                var myURL = document.location.href;
                if (myURL.indexOf(links) != -1) {
                    myNav[i].parentNode.className = "nav-item active";
                }
            }

            var viewH = window.screen.width;  //可见高度 
            var num = 4;
            if (viewH > 768) {
                $(".nav-logo").attr({src: '/static/img/1572577150.png'})
                $(window).scroll(function () {
                    /*  console.log($(".navbar").offset().top)*/
                    if ($(this).scrollTop() > 50) {
                        $(".nav-logo").attr({src: '/static/img/1572577150s.png'})
                        // $(".app-navbar").addClass("navbar-fixed-top");
                    } else if ($(this).scrollTop() < 50) {
                        $(".nav-logo").attr({src: '/static/img/1572577150.png'})
                        //  $(".app-navbar").removeClass("navbar-fixed-top");
                    }
                });
            } else if (viewH <= 768) {
                $(".nav-logo").attr({src: '/static/img/1572577150s.png'})
            }
        </script>
        <!----></div>
</section>
</body>
</html>
<!--