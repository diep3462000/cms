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

            <form method="post" action="/" class="center">
                <input type="hidden" name="icurr" value="">
                <br>
                <div class="form_row">
                    <div class="form-group  col-lg-8">
                        <select class="form-control" id="sel1">
                            <option value="0">Chọn nhà cung cấp</option>
                            <option value="VTT">Vietel</option>
                            <option value="VNP">Vinaphone</option>
                            <option value="VMS">Mobifone</option>
                            <option value="VNM">Việt Nam Mobile</option>
                            <option value="MGC">Megacard</option>
                        </select>
                    </div>
                    <div class="clear">
                    </div>
                </div><!--end .form_row-->
                <div class="form-group col-lg-8">
                    <label for="usr">User ID trong game:</label>
                    <?php echo $form['user_id']?>
                    <?php if ($form['user_id']->hasError()): ?>
                        <span class='help-inline'>
            <ul class="error_list">
                <li><?php echo $form['user_id']->getError(); ?></li>
            </ul>
        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-lg-8">
                    <label for="pwd">serial:</label>
                    <?php echo $form['seria']?>
                    <?php if ($form['seria']->hasError()): ?>
                        <span class='help-inline'>
            <ul class="error_list">
                <li><?php echo $form['seria']->getError(); ?></li>
            </ul>
        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-lg-8">
                    <label for="pwd">Mã thẻ:</label>
                    <?php echo $form['card_code']?>
                    <?php if ($form['card_code']->hasError()): ?>
                        <span class='help-inline'>
            <ul class="error_list">
                <li><?php echo $form['card_code']->getError(); ?></li>
            </ul>
        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-lg-6">
                    <label for="pwd">Mã kiểm tra:</label>
                    <?php echo $form['captcha']?>
                    <?php if ($form['captcha']->hasError()): ?>
                        <span class='help-inline'>
                <ul class="error_list">
                    <li><?php echo $form['captcha']->getError(); ?></li>
                </ul>
                </span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="Student">Name:</label>
                    <input name="Student" />
                </div>
                <div class="col-sm-12 controls">
                    <button id="btn-login" type="submit" name="submit" class="btn btn-success">Nạp Ken</button>
                </div>
            </form>
        </div>
    </div>
</div>