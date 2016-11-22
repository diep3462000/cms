<?php $user = sfContext::getInstance()->getUser(); ?>
<?php
   $lang = sfContext::getInstance()->getUser()->getCulture();      // Lấy mã ngôn ngữ (EN hoặc VI)
   $flag_current = sfConfig::get('app_path_flag_' .$lang , '');    // Lấy đường dẫn cờ các nước
   if($lang == 'vi'){
       $flag_select = sfConfig::get('app_path_flag_en', '');
       $title = 'English';
       $lang_select = 'en';
   }else{
       $flag_select = sfConfig::get('app_path_flag_vi', '');
       $title = 'Tiếng Việt';
       $lang_select = 'vi';
   }
?>
<!-- Header -->
<div class="header-1 <?php if(!isset($mdl) || (isset($mdl) && $mdl != 'pageHome')) echo 'vtt-no-slide'?> <?php if(isset($mdl) && $mdl == 'pageRegistration') echo 'page-registration' ?>">
    <div class="container">
    <div class="row">
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                <?php if(!isset($mdl) || (isset($mdl) && $mdl != 'pageRegistration')){ ?>
                <form action="<?php echo url_for1('@tro_giup') ?>" method="get" class="navbar-form">
                    <input type="text" id="global-keywords" name="q" onkeypress="return doClick(event,'searchIcon')" class="form-control icon_seach_web" placeholder="Tìm kiếm..." style="height: 30px; border-radius: 4px; background-color: #ffffff">
                </form>
                <div id="suggestions" class="dropdown-box" style="display:none;"></div>
                <?php }else{ ?>
                    <form class="navbar-form"></form>
                <?php } ?>
            </div>

        </div>
        <div class="row">
            <?php if(!isset($mdl) || (isset($mdl) && $mdl != 'pageRegistration')){ ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="header-logo">
            <?php }else{ ?>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="header-logo">
            <?php } ?>
                <a href="<?php echo url_for('homepage')?>" style="text-decoration: none">
                    <img src="/images/telecomapi_logo.png" class="vtt-logo" style="">
                </a>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" id="header-menu">
                <ul class="nav nav-justified">
                    <?php if(!isset($mdl) || (isset($mdl) && $mdl != 'pageRegistration')){ ?>
                    <li> <!-- Menu: Trang chủ-->
                        <a href="<?php echo url_for('homepage')?>" class="vtt-menu-item <?php if(isset($mdl) && ($mdl== '' || $mdl == 'pageHome')) echo 'active' ?>">
                            <?php echo __('Trang chủ') ?>
                        </a>
                    </li>
                    <li class="dropdown vtt-uppercase"> <!-- Menu: APIs - Danh sách API -->
                        <a
                            href="" onclick="showListAPI();"
                            class="dropdown-toggle vtt-menu-item <?php if(isset($mdl) && ($mdl== 'pageApiTool')) echo 'active' ?>"
                            data-toggle="dropdown"
                            role="button"
                            id="dropdown_name"
                            aria-expanded="false"><?php echo __('API')?><span style="text-transform: lowercase">s</span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                                if(count($listAPI) > 0){
                                foreach($listAPI as $valAPI): ?>
                                    <li>
                                        <a href="<?php echo url_for('apis_details').'/'.$valAPI['id'].'/'. VtHelper::unsigned($valAPI['name']); ?>" class="vtt-sub-menu-item">
                                            <img src="<?php echo VtHelper::htmlToView($valAPI['url_icon']) ?>" style="width: 17px; height: 17px" title="<?php echo $valAPI['name'] ?>"> <?php echo $valAPI['name'] ?>
                                        </a>
                                    </li>
                                <?php endforeach;} else{ ?>
                                    <li>
                                        <a href="" class="vtt-sub-menu-item"><?php echo __('Đang cập nhật...') ?></a>
                                    </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li> <!-- Menu: SDK - Download thư viện -->
						<a
                            href="" onclick="downloadSDK();"
                            class="dropdown-toggle vtt-menu-item <?php if(isset($mdl) && ($mdl== 'pageDownload')) echo 'active' ?>"
                            data-toggle="dropdown"
                            role="button"
                            id="dropdown_name"
                            aria-expanded="false"><?php echo __('SDK')?>
                        </a>
						
                        <ul class="dropdown-menu" role="menu">
							<li class="<?php if(isset($mdl) && ($mdl== 'pageDownload')) ?>">
                                <a href="<?php echo url_for('download')?>" role="button" class="vtt-sub-menu-item">
                                    <?php echo __('Download SDK') ?>
                                </a>
                            </li>
							
                            <li class="<?php if(isset($mdl) && ($mdl== 'pageDownload')) ?>">
                                <a href="<?php
                                            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                                            $siteUrl = $protocol. $_SERVER['HTTP_HOST'];
                                            echo $siteUrl.'/document/ios/index.html';
                                        ?>" target="_blank" role="button" class="vtt-sub-menu-item">
                                    <?php echo __('Tài liệu sử dụng SDK iOS') ?>
                                </a>
                            </li>

                            <li class="<?php if(isset($mdl) && ($mdl== 'pageDownload'))?>">
                                <a href="<?php echo $siteUrl.'/document/android/index.html'; ?>" target="_blank" role="button" class="vtt-sub-menu-item">
                                    <?php echo __('Tài liệu sử dụng SDK Android') ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li> <!-- Menu: Bảng giá API -->
                        <a href="<?php echo url_for('apis_price_list') ?>" class="vtt-menu-item <?php if(isset($mdl) && ($mdl== 'pageApiPrice')) echo 'active' ?>">
                            <?php echo __('Bảng giá') ?>
                        </a>
                    </li>
                    <li> <!-- Menu: Trợ giúp -->
                        <a href="<?php echo url_for('tro_giup')?>" class="vtt-menu-item <?php if(isset($mdl) && ($mdl== 'pageHelp')) echo 'active' ?>">
                            <?php echo __('Trợ giúp') ?>
                        </a>
                    </li>
                    <?php if($user->isLogin()){?>
                    <li class="dropdown vtt-uppercase"> <!-- Menu: Nghiệp vụ sau khi đăng nhập -->
                        <a
                            href=""
                            class="dropdown-toggle vtt-menu-item
                            <?php if(isset($mdl) && ($mdl== 'pagePublisherIndex' ||
                                    $mdl== 'pagePublisherInspect' ||
                                    $mdl== 'pagePublisherInfo' ||
                                    $mdl== 'pagePublisherAppManager' ||
                                    $mdl== 'pagePublisherPayment' ||
                                    $mdl == 'pageSendSms' ||
                                    $mdl== 'pagePublisherMessage' ||
                                    $mdl== 'pageFeedBack' ||
                                    $mdl== 'pageContract'
                                )
                            ) echo 'active' ?>"
                            data-toggle="dropdown"
                            role="button"
                            id="dropdown_name"
                            aria-expanded="false"><?php echo VtHelper::htmlToView($user->getUsername()); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="<?php if(isset($mdl) && ($mdl== 'pagePublisherIndex')) echo 'active' ?>">
                                <a href="<?php echo url_for('thong_ke')?>" class="vtt-sub-menu-item">
                                    <span class="glyphicon glyphicon-stats"></span> <?php echo __('Thống kê') ?>
                                </a>
                            </li>

                            <li class="<?php if(isset($mdl) && ($mdl== 'pageCharging')) echo 'active' ?>">
                                <a href="<?php echo url_for('charging')?>" class="vtt-sub-menu-item">
                                    <span class="glyphicon glyphicon-briefcase"></span> <?php echo __('Ngân sách') ?>
                                </a>
                            </li>

                            <li class="<?php if(isset($mdl) && ($mdl== 'pagePublisherAppManager')) echo 'active' ?>">
                                <a href="<?php echo url_for('quan_ly_ung_dung', array('publisherId' => $user -> getMemberId()))?>" class="vtt-sub-menu-item">
                                    <span class="glyphicon glyphicon-th-large"></span> <?php echo __('Quản lý ứng dụng') ?>
                                </a>
                            </li>

                            <li class="<?php if(isset($mdl) && ($mdl== 'pagePublisherPayment')) echo 'active' ?>">
                                <a href="<?php echo url_for('thanh_toan')?>" class="vtt-sub-menu-item">
                                    <span class="glyphicon glyphicon-usd"></span> <?php echo __('Thanh toán') ?>
                                </a>
                            </li>

                            <li class="<?php if(isset($mdl) && ($mdl== 'pagePublisherInfo')) echo 'active' ?>">
                                <a href="<?php echo url_for('thong_tin_tai_khoan')?>" class="vtt-sub-menu-item">
                                    <span class="glyphicon glyphicon-user"></span> <?php echo __('Thông tin tài khoản') ?>
                                </a>
                            </li>

                            <li class="<?php if(isset($mdl) && ($mdl== 'pageSendSms')) echo 'active' ?>">
                                <a href="<?php echo url_for('send_sms_first_step')?>" class="vtt-sub-menu-item">
                                    <span class="glyphicon glyphicon-envelope"></span> <?php echo __('Bulk SMS') ?>
                                </a>
                            </li>
                            <li class="<?php if(isset($mdl) && ($mdl== 'pageFeedBack')) echo 'active' ?>">
                                <a href="<?php echo url_for('feedback')?>" class="vtt-sub-menu-item">
                                    <span class="glyphicon glyphicon-pencil"></span> <?php echo __('Phản hồi') ?>
                                </a>
                            </li>

                            <li class="nav-divider"></li>
                            <li>
                                <a
                                    href="<?php echo url_for('thoat') ?>"
                                    onclick="return confirm('Bạn có chắc chắn muốn thoát không?')"
                                    class="vtt-sub-menu-item vtt-p-black" style="text-decoration: none">
                                    <span class="glyphicon glyphicon-log-out"></span> <?php echo __('Đăng xuất') ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php #if($totalNotice > 0): ?>
                        <li class="dropdown" id="dropdown-notification">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="dropdown_name" aria-expanded="false">
                                <img src="/images/icon-message.png">
                                <?php if(count($noticePublisher)):?>
                                    <span id="icon-notification"><?php echo count($noticePublisher); ?></span>
                                <?php endif ?>
                                </a>
                            <ul class="dropdown-menu" role="menu">
                                <?php foreach($noticePublisher as $key => $publisherMessage): ?>
                                <li>
                                    <a
                                        href="<?php echo url_for('tin_nhan').'/'.$publisherMessage['id'] ?>"
                                        class="vtt-sub-menu-item" title="<?php
                                    echo $publisherMessage['title'];?>">
                                        <?php
                                            echo (VtHelper::truncate($publisherMessage['title'], 28)).'<br>';
//                                            echo "<span class='notification-sub-title'>".trim(VtHelper::trunicateHtmlToView($valPublisherMessage['content'], 28))."</span>";
                                        ?>
                                    </a>
                                </li>
                                <?php if($totalNotice > 1): ?>
                                    <li class="divider"></li>
                                <?php endif ?>
                                <?php endforeach ?>
                                <li>
                                    <a
                                        href="<?php echo url_for('tin_nhan') ?>"
                                        class="vtt-sub-menu-item">
                                        <?php
                                        echo __('Xem tất cả tin nhắn').'<br>';
                                        echo "<span class='notification-sub-title'>".__('Danh sách tin nhắn')."</span>";
                                        ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php #endif ?>
                            <?php #if($totalNotice > 0): ?>
                                <li class="dropdown" id="dropdown-notification">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="dropdown_name" aria-expanded="false">
                                        <img src="/images/bell_icon.png" style="width: 22px; height: 22px">
                                        <?php if ($totalNotice) :?>
                                            <span id="icon-notification"><?php echo $totalNotice; ?></span>
                                        <?php endif ?>
                                </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php foreach($listPublisherMessage as $key => $valPublisherMessage): ?>
                                            <li>
                                                <a
                                                    href="<?php echo url_for('thong_bao_chi_tiet').'/'.$valPublisherMessage['id'] ?>"
                                                    class="vtt-sub-menu-item" title="<?php
                                                echo $valPublisherMessage['title'];?>">
                                                    <?php
                                                    echo (VtHelper::truncate($valPublisherMessage['title'], 28)).'<br>';
                                                    //                                            echo "<span class='notification-sub-title'>".trim(VtHelper::trunicateHtmlToView($valPublisherMessage['content'], 28))."</span>";
                                                    ?>
                                                </a>
                                            </li>
                                            <?php if($totalNotice > 1): ?>
                                                <li class="divider"></li>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        <li>
                                            <a
                                                href="<?php echo url_for('notification') ?>"
                                                class="vtt-sub-menu-item">
                                                <?php
                                                echo __('Xem tất cả').'<br>';
                                                echo "<span class='notification-sub-title'>".__('Danh sách thông báo')."</span>";
                                                ?>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php #endif ?>

                    <?php }else{ ?>
                        <li> <!-- Menu: Đăng nhập -->
                            <a
                                href="<?php echo url_for('dang_nhap')?>"
                                class="vtt-menu-item <?php if(isset($mdl) && ($mdl== 'pageLogin')) echo 'active' ?>">
                                <?php echo __('Đăng nhập') ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>

            <?php if($user->isLogin()){?>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 vtt-right">
                <a href="<?php echo url_for('quan_ly_ung_dung', array('publisherId' => $user -> getMemberId()))?>" class="vtt-menu-item">
                    <button class="btn btn-danger" style="background-color: #f26522"><?php echo __('Ứng dụng') ?></button>
                </a>
            </div>
            <?php }else{ ?>
                <?php if(!isset($mdl) || (isset($mdl) && $mdl != 'pageRegistration')){ ?>
                   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 vtt-right">
                        <a href="<?php echo url_for('dang_ky')?>" class="vtt-menu-item">
                            <button class="btn btn-danger" style="background-color: #f26522"><?php echo __('Đăng ký miễn phí') ?></button>
                        </a>
                    </div>
                <?php }else{ ?>
                    <div class="vtt-right">
                        <ul class="nav nav-justified">
                            <li>
                                <a href="<?php echo url_for('homepage')?>" class="vtt-menu-item"><?php echo __('Trang chủ') ?></a>
                            </li>
                            <li>
                                <a href="<?php echo url_for('tro_giup')?>" class="vtt-menu-item"> <?php echo __('Trợ giúp') ?></a>
                            </li>
                            <li>
                                <a href="<?php echo url_for('dang_nhap')?>" class="vtt-menu-item"> <?php echo __('Đăng nhập') ?></a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div><!-- /Header -->

<script type="text/javascript">
    /* Điều hướng đến trang danh sách API khi kích vào menu API */
    function showListAPI(){
        var url = '<?php echo url_for('apis_list') ?>';
        window.location.href = url;
    }
	/* Điều hướng đến trang danh sách API khi click vào menu SDK */
	function downloadSDK(){
		var url = '<?php echo url_for('download')?>';
		window.location.href = url;
	}
</script>
