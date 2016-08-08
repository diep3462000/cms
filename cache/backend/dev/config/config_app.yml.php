<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2016/08/05 11:12:34
sfConfig::add(array(
  'app_tmcTwitterBootstrapPlugin_bootstrap_path' => '/tmcTwitterBootstrapPlugin/css/bootstrap.min.css',
  'app_tmcTwitterBootstrapPlugin_responsive_bootstrap_path' => '/tmcTwitterBootstrapPlugin/css/bootstrap-responsive.min.css',
  'app_tmcTwitterBootstrapPlugin_admin_styles_path' => '/tmcTwitterBootstrapPlugin/css/styles.css',
  'app_tmcTwitterBootstrapPlugin_jquery_path' => '/tmcTwitterBootstrapPlugin/js/jquery.min.js',
  'app_tmcTwitterBootstrapPlugin_bootstrap_js_path' => '/tmcTwitterBootstrapPlugin/js/bootstrap.min.js',
  'app_tmcTwitterBootstrapPlugin_admin_js_path' => '/tmcTwitterBootstrapPlugin/js/global.js',
  'app_tmcTwitterBootstrapPlugin_header' => array (
  'menu' => 
  array (
    'Quản trị hệ thống' => 
    array (
      'credentials' => 
      array (
        0 => 'admin',
      ),
      'dropdown' => 
      array (
        'Danh sách người dùng' => 
        array (
          'route' => 'sf_guard_user',
        ),
        'Danh sách người dùng Frontend' => 
        array (
          'route' => 'vtp_users',
        ),
        'Danh sách quyền hạn' => 
        array (
          'route' => 'sf_guard_permission',
        ),
      ),
    ),
    'Quản lý doanh thu' => 
    array (
      'credentials' => 
      array (
        0 => 'admin',
      ),
      'dropdown' => 
      array (
        'Quản lý tiền phế trong game' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'money_log',
        ),
      ),
    ),
    'Quản lý game' => 
    array (
      'credentials' => 
      array (
        0 => 
        array (
          0 => 'admin',
        ),
      ),
      'dropdown' => 
      array (
        'Quản lý game' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'game',
        ),
        'Quản lý lịch sử chơi game' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'game_history',
        ),
        'Quản lý Log Game' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'game_log',
        ),
        'Quản lý nhà cung cấp game' => 
        array (
          'credentials' => 
          array (
            0 => 'admin',
          ),
          'route' => 'game_provider',
        ),
        'Danh sách giao dịch game' => 
        array (
          'credentials' => 
          array (
            0 => 'admin',
          ),
          'route' => 'game_transaction',
        ),
        'Quản lý Version Game' => 
        array (
          'credentials' => 
          array (
            0 => 'admin',
          ),
          'route' => 'game_version',
        ),
        'Quản lý phòng Game' => 
        array (
          'credentials' => 
          array (
            0 => 'admin',
          ),
          'route' => 'room',
        ),
      ),
    ),
    'Quản lý người chơi game' => 
    array (
      'credentials' => 
      array (
        0 => 
        array (
          0 => 'admin',
        ),
      ),
      'dropdown' => 
      array (
        'Quản lý user đăng ký' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'user_register',
        ),
        'Quản lý thông tin người chơi' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'user',
        ),
      ),
    ),
    'Quản lý tiền trong game' => 
    array (
      'credentials' => 
      array (
        0 => 
        array (
          0 => 'admin',
        ),
      ),
      'dropdown' => 
      array (
        'Quản lý tiền trong game' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'money_log',
        ),
        'Quản lý cash cược' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'bet_cash',
        ),
        'Quản lý gold cược' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'bet_gold',
        ),
        'Quản lý nhà cung cấp thẻ' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'card_provider',
        ),
        'Quản lý quà tặng' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'gift',
        ),
        'Quản lý loại quà tặng' => 
        array (
          'credentials' => 
          array (
            0 => 
            array (
              0 => 'admin',
            ),
          ),
          'route' => 'gift_type',
        ),
      ),
    ),
    'Quản lý tin nhắn' => 
    array (
      'credentials' => 
      array (
        0 => 
        array (
          0 => 'admin',
        ),
      ),
      'dropdown' => 
      array (
        'Quản lý tin nhắn đến user' => 
        array (
          'credentials' => 
          array (
            0 => 'admin',
          ),
          'route' => 'message',
        ),
        'Quản lý loại tin nhắn' => 
        array (
          'credentials' => 
          array (
            0 => 'admin',
          ),
          'route' => 'message_type',
        ),
        'Quản lý thông báo đến user' => 
        array (
          'credentials' => 
          array (
            0 => 'admin',
          ),
          'route' => 'notification',
        ),
      ),
    ),
    'Các phân hệ khác' => 
    array (
      'credentials' => 
      array (
        0 => 
        array (
          0 => 'admin',
        ),
      ),
      'dropdown' => 
      array (
        'Quản lý testcase' => 
        array (
          'credentials' => 
          array (
            0 => 'admin',
          ),
          'route' => 'gv_test_case',
        ),
        'Quản lý CCU' => 
        array (
          'credentials' => 
          array (
            0 => 'admin',
          ),
          'route' => 'online_log',
        ),
        'Quản lý hệ điều hành' => 
        array (
          'credentials' => 
          array (
            0 => 'admin',
          ),
          'route' => 'client_type',
        ),
      ),
    ),
    'Ngôn ngữ' => 
    array (
      'dropdown' => 
      array (
        'Tiếng Việt' => 
        array (
          'route' => 'pageVI',
        ),
        'English' => 
        array (
          'route' => 'pageEN',
        ),
      ),
    ),
  ),
),
  'app_sf_captchagd_image_width' => 180,
  'app_sf_captchagd_image_height' => 27,
  'app_sf_captchagd_charset' => 'ABCDEFGHJKLMNPRSTUXYZabcdefghkmnprstuyz23456789',
  'app_sf_captchagd_code_length_min' => 2,
  'app_sf_captchagd_code_length_max' => 2,
  'app_sf_captchagd_perturbation' => 0.20000000000000001,
  'app_sf_captchagd_num_lines' => 1,
  'app_sf_captchagd_noise_level' => 1,
  'app_sf_captchagd_use_transparent_text' => true,
  'app_sf_captchagd_text_transparency_percentage' => 10,
  'app_sf_captchagd_image_bg_color' => 'ffffff',
  'app_sf_captchagd_text_color' => 252525,
  'app_sf_captchagd_line_color' => 616161,
  'app_sf_captchagd_chars' => '123456789abcdefghijklmnopqrstuvwxyz',
  'app_sf_captchagd_length' => 6,
  'app_sf_captchagd_font_size' => 14,
  'app_sf_captchagd_force_new_captcha' => true,
  'app_sf_captchagd_fonts' => array (
  0 => 'akbar/vavobi.ttf',
),
  'app_image_maxsize' => 5242880,
  'app_upload_max_size' => 10485760,
  'app_excel_max_row' => 1000,
  'app_category_images' => 'category_images',
  'app_flash' => 'flash',
  'app_article_images' => 'article',
  'app_service_images' => 'service',
  'app_advertise_images' => 'advertise',
  'app_product_images' => 'products',
  'app_album_images' => 'album',
  'app_import_max_size' => 20971520,
  'app_prepaid' => 268,
  'app_postpaid' => 271,
  'app_upload_media_file' => '/var/www/vuagame/web/uploads',
  'app_upload_avatar_dir' => 'E:\\2015\\xampp\\htdocs\\vuagame\\web\\media\\vuagameAvatars\\upload',
  'app_url_media_file' => 'http://vuagame.vn/uploads',
  'app_url_media_default_file' => 'http://vuagame.vn/images/default-image.jpg',
  'app_image_default_default' => '/img/default.png',
  'app_image_default_img1' => '/themeWap/default/default1.jpg',
  'app_image_default_img2' => '/themeWap/default/default2.jpg',
  'app_image_default_img3' => '/themeWap/default/default3.jpg',
  'app_image_default_slide' => '/themeWap/default/slide.jpg',
  'app_image_default_product' => '/themeWap/default/product.jpg',
  'app_image_default_product_slide' => '/themeWap/default/slide-product.jpg',
  'app_image_default_service' => '/themeWap/default/service.jpg',
  'app_image_default_article_295_150' => '/img/site-news-top.jpg',
  'app_image_default_article_63_63' => '/img/news-1.jpg',
  'app_image_default_service_icon_112_122' => '/img/icon_phone.png',
  'app_image_default_service_news_92_54' => '/img/service_news.jpg',
  'app_image_default_service_225_335' => '/img/hight-school.jpg',
  'app_image_default_service_322_334' => '/img/r4.png',
  'app_image_default_link_32_32' => '/img/icon-link.jpg',
  'app_image_default_article_270_180' => '/img/article270.jpg',
  'app_image_default_article_52_50' => '/img/article5250.jpg',
  'app_image_default_article_180_110' => '/img/article180_110.png',
  'app_image_default_article_83_81' => '/img/tin-tuc-7.png',
  'app_image_default_creative_54_54' => '/img/sang-tao.png',
  'app_image_default_product_71_71' => '/img/dt-1.jpg',
  'app_image_default_service_vas_90_52' => '/img/danh-sach-cua-hang.png',
  'app_image_default_product_210_210' => '/img/m1.jpg',
  'app_image_default_product_324_328' => '/img/d-full.jpg',
  'app_image_default_product_88_88' => 'img/d2.jpg',
  'app_ckeditor_basePath' => '/js/ckeditor',
  'app_ckfinder_active' => true,
  'app_ckfinder_basePath' => '/js/ckfinder',
  'app_addcslashes_charlist' => '%_-\\\'',
  'app_vas_services_id' => 229,
  'app_link_list_store' => 'http://shop.viettel.vn/',
  'app_link_checkout' => 'http://shop.viettel.vn/',
  'app_google_api_key' => 'AIzaSyDNLpCBii2o5tK4fbXMbuKqcNnLBC10XJw',
));
