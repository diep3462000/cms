<?php
require ('config.php');
require ('services.php');
if(!empty($_POST)){
    $error = '';
    if(empty($_POST['provider'])){
        $error = 'Bạn phải chọn nhà cung cấp';
    }else if(empty($_POST['amount'])){
        $error = 'Bạn phải nhập mệnh giá thẻ';
    }else if(empty($_POST['quantity'])){
        $error = 'Bạn phải nhập số lượng thẻ';
    }else{
        $service = new CDV_Service($config);
        $sofpin = $service->downloadSofpin($_POST);
        echo '<meta charset="utf-8" />';
        echo 'Thong tin tra ve: <br/>';
        echo "<pre>"; print_r($sofpin);
        echo "</pre>";
        $key = substr(md5($config['key_sofpin']), 0, 24);
        $cleartext = mcrypt_decrypt("tripledes", $key, base64_decode($sofpin->listCards), "ecb", "\0\0\0\0\0\0\0\0");
        echo "Sofpin decrypt: ". $cleartext . "<br>";
		
		
		$cleartext = substr($cleartext, 0, stripos($cleartext,"]}") + 2);
		echo "Sofpin decrypt: ". $cleartext . "<br>";
		var_dump(json_decode($cleartext));
		
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html;charset=UTF-8" http-equiv="Content-Type">
    <title>Code Demo Download Sofpin</title>
</head>
<body>
<div class="container" style="width: 1000px; margin: 0px auto; background: #f9f9f9; padding: 20px 10px;">
    <h3 style="width: 100%; text-transform: uppercase; text-align: center;">Download Sofpin</h3>
    <div class="form_box">
        <div class="form_error" style="text-align: center; color: red; margin-bottom: 10px;">
            <?php if(!empty($error)) echo $error; ?>
        </div><!--end .form_error-->
        <form name="frm_megabank" id="frm_megabank" action="" method="post">

            <div class="form_row">
                <div class="form_row_left">
                    Nhà cung cấp:
                </div><!--end .form_row_left-->
                <div class="form_row_right">
                    <select name="provider" class="input_text">
                        <option value="0">Chọn nhà cung cấp</option>
                        <option value="VTT">Vietel</option>
                        <option value="VNP">Vinaphone</option>
                        <option value="VMS">Mobifone</option>
                    </select>
                </div><!--end .form_row_right-->
                <div class="clear"></div>
            </div><!--end .form_row-->

            <div class="form_row">
                <div class="form_row_left">
                    Mệnh giá thẻ:
                </div><!--end .form_row_left-->
                <div class="form_row_right">
                    <input type="text" class="input_text" name="amount" value="100000" />
                </div><!--end .form_row_right-->
                <div class="clear"></div>
            </div><!--end .form_row-->


            <div class="form_row">
                <div class="form_row_left">
                    Số lượng thẻ:
                </div><!--end .form_row_left-->
                <div class="form_row_right">
                    <input type="text" class="input_text" name="quantity" value="10" />
                </div><!--end .form_row_right-->
                <div class="clear"></div>
            </div><!--end .form_row-->


            <div class="form_row">
                <div class="form_row_left">&nbsp;</div><!--end .form_row_left-->
                <div class="form_row_right">
                    <input type="submit" name="frm_submit" value="Thanh toán" style="padding: 0px 10px; height: 25px; line-height: 25px;" />
                </div><!--end .form_row_right-->
                <div class="clear"></div>
            </div><!--end .form_row-->

        </form>
    </div><!--end .form_box-->
</div><!--end .container-->
</body>
</html>
<style type="text/css">
    .clear{
        clear: both;
    }
    .form_box{
        width: 500px;
        margin: 0px auto;
    }
    .form_row{
        line-height: 30px;
        margin-bottom: 10px;
    }
    .form_row_left{
        float: left;
        font-weight: bold;
        margin-right: 10px;
        width: 150px;
        text-align: right;
    }
    .form_row_right{
        width: 330px;
        float: left;
    }
    .input_text{
        width: 300px;
        height: 25px;
        padding-left: 10px;
    }
</style>