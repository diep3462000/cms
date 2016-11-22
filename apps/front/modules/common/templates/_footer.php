<!-- Footer -->
<div class="vtt-footer" id ="footer">
    <div class="container footer">
        <div class="row footer-1">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div id="footer-1-left">
                    <h4><?php echo __('APIs và Công cụ') ?></h4>
                    <p>
                        <a href="<?php echo url_for('apis_list') ?>" style="text-decoration: none"><?php echo __('Danh sách APIs') ?></a>
                    </p>
                    <p>
                        <a href="<?php echo url_for('download') ?>" style="text-decoration: none"><?php echo __('SDK')  ?></a>
                    </p>
                    <p>
                        <a href="<?php echo url_for('apis_price_list'); ?>" style="text-decoration: none"><?php echo __('Bảng giá')  ?></a>
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div id="footer-1-center">
                    <h4><?php echo __('Sản phẩm') ?></h4>
                    <p><?php echo __('Ứng dụng nổi bật') ?></p>
                    <p><?php echo __('Telcos Advertising') ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div id="footer-1-right">
                    <h4><?php echo __('Tìm hiểu và hỗ trợ') ?></h4>
                    <p><a href="<?php echo url_for('page_policy_details', array('slug_id' => 'dieu-khoan-dich-vu'))?>"><?php echo __("Điều khoản dịch vụ")?></a></p>
                    <p><a href="<?php echo url_for('page_policy_details', array('slug_id' => 'chinh-sach-quyen-rieng-tu'))?>"><?php echo __("Chính sách quyền riêng tư")?></a></p>
                    <p><a href="<?php echo url_for('contact'); ?>" style="text-decoration: none"><?php echo __('Liên hệ') ?></a></p>
                    <p><a href="<?php echo url_for('tro_giup') ?>" style="text-decoration: none"><?php echo __('FAQs') ?></a></p>
                    <p><?php echo __('Diễn đàn') ?></p>
                </div>
            </div>
        </div>

        <div class="row footer-2">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <div id="footer-2-left">
                    <img src="/images/telecomapi_logo.png" id="logo-viettel-footer" width="59px" height="35px">
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                <div id="footer-2-center">
                    <p><?php echo __('Công ty CP Truyền Số Liệu Việt Nam') ?></p>
                    <p><?php echo __('Địa chỉ: Tầng 3, tòa nhà Mỹ Đình Plaza, số 138 Trần Bình, P Mỹ Đình, Q Nam Từ Liêm, Hà Nội') ?></p>
                    <p><?php echo __('Điện thoại: 0462944447') ?></p>
                    <p><?php echo __('Email: contact@telecomapi.net hoặc contact@dcv.vn') ?></p>
                </div>
            </div>
        </div>

    </div>
</div><!-- /Footer -->