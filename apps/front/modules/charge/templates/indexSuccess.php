<div id="loginbox" style="" class="mainbox ">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Nạp Ken</div>
            <!--<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Quên mật khẩu?</a></div>-->
        </div>
        <div style="" class="panel-body">
            <div class="text-danger"></div>
            <div class="text-danger"></div>
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <p><?php echo __('Vui lòng nhập chính xác mã số in trên thẻ. Hệ thống chỉ cho phép nhập sai không quá 3 lần.') ?></p>
            <div class="row" style="text-align: center">
                <?php include_partial('common/flashes') ?>
            </div>
            <form class="form-horizontal" method="post"  id="nap_ken" >
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Chọn nhà mạng</label>
                    <div class="col-sm-6">
                        <?php echo $form['telco_code']?>
                        <?php if ($form['telco_code']->hasError()): ?>
                            <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['telco_code']->getError(); ?></li>
                            </ul>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">User Id</label>
                    <div class="col-sm-3">
                        <?php echo $form['user_id']?>
                        <?php if ($form['user_id']->hasError()): ?>
                            <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['user_id']->getError(); ?></li>
                            </ul>
                            </span>
                        <?php endif; ?>
                    </div>
                    <label for="inputEmail3" class="col-sm-3 control-label" id="display_name"></label>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Seri thẻ</label>
                    <div class="col-sm-6">
                        <?php echo $form['serial']?>
                        <?php if ($form['serial']->hasError()): ?>
                            <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['serial']->getError(); ?></li>
                            </ul>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mã thẻ</label>
                    <div class="col-sm-6">
                        <?php echo $form['card_code']?>
                        <?php if ($form['card_code']->hasError()): ?>
                            <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['card_code']->getError(); ?></li>
                            </ul>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mã xác nhận</label>
                    <div class="col-sm-6">
                        <?php echo $form['captcha']?>
                        <?php if ($form['captcha']->hasError()): ?>
                            <span class='help-inline'>
                            <ul class="error_list">
                                <li><?php echo $form['captcha']->getError(); ?></li>
                            </ul>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <?php echo $form['_csrf_token']?>
                    <?php if ($form['_csrf_token']->hasError()): ?>
                        <span class='error'><?php echo __('Token không hợp lệ.') ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Nạp Ken</button>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th>Loại thẻ nạp</th>
                    <?php $list_provider = CardProviderTable::getListProvider();
                    foreach ($list_provider as $provider) {
                        echo "<th>" . $provider["providerName"] ."</th>";
                    }?>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Tỉ lệ Ken nhận được</td>
                    <?php  foreach ($list_provider as $provider) {
                    echo "<th>" . $provider["valuePercent"] * 100 ."%</th>";
                    }?>
                </tr>
                </tbody>
            </table>
            <p>Ví dụ với 10.000đ thẻ megacard bạn sẽ nhận được 8.500 Ken trong game</p>
            <p>Hướng dẫn nạp thẻ</p>
            <p style="text-align:justify">Số seri thẻ là dãy kỹ tự số thường gồm 13 chữ số in phía trên thẻ, bên cạnh là dòng chữ Số Seri.
                Nếu cần trợ giúp khẩn cấp bạn gọi lên Hotline : 0124.983.5555 để được trợ giúp ngay nhé</p>
            <p style="text-align:center">
                <img alt="so seri the viettel" src="/images/so-seri-the-viettel.jpg"
                     title="Số seri và mã thẻ Viettel trên thẻ cào Viettel 50K">
            </p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('input[type="text"]').change(function() {
            $(this).val($(this).val().trim());
        });
        $('#nap_ken').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'vt_charging[user_id]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: "<?php echo __("Vui lòng nhập Id")?>"
                        },
                        stringLength: {
                            min: 6,
                            max: 8,
                            message: "<?php echo __("Id từ 6 đến 8 ký tự")?>"
                        },
                        numeric: {
                            message: "<?php echo __("Id chỉ được là số.")?>"
                        },
                        callback: {
                            message: "<?php echo __("User Id không tồn tại")?>",
                            callback: function(value, validator, $field) {
                                var user_id = $("#vt_charging_user_id").val();
                                var url = '<?php echo url_for('ajax_check_user_exits')?>';
                                result = 1;
                                $("#display_name")[0].innerHTML = "";
                                if(user_id.length > 5){
                                    $.ajax({
                                        type: "POST",
                                        url: url,
                                        async: false,
                                        data:{
                                            user_id: user_id
                                        },
                                        cache: false,
                                        success: function (data) {
                                            result = data;
                                            var data = JSON.parse(result);
                                            result = data.status;
//                                        alert(data.status);
                                            if(result == 1){
                                                $("#display_name")[0].innerHTML = data.display_name;
                                            }
                                        }
                                    });
                                }
                               // alert(result);
                                return result == 1;
                            }
                        }
                    }
                },
                'vt_charging[telco_code]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: "<?php echo __("Vui lòng chọn nhà mạng")?>"
                        }
                    }
                },
                'vt_charging[captcha]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: "<?php echo __("Vui lòng nhập captcha")?>"
                        }
                    }
                },
                'vt_charging[serial]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: "<?php echo __("Vui lòng nhập serial")?>"
                        },
                        stringLength: {
                            min: 11,
                            max: 15,
                            message: "<?php echo __("Serial từ 11 đến 15 ký tự")?>"
                        },
                        numeric: {
                            message: "<?php echo __("Serial chỉ gồm kỹ tự số.")?>"
                        }
                    }
                },
                'vt_charging[card_code]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: "<?php echo __("Vui lòng nhập mã thẻ")?>"
                        },
                        stringLength: {
                            min: 11,
                            max: 15,
                            message: "<?php echo __("Mã thẻ từ 11 đến 15 ký tự")?>"
                        },
                        numeric: {
                            message: "<?php echo __("Mã thẻ chỉ gồm kỹ tự số.")?>"
                        }
                    }
                },
            }
        });
    });
</script>