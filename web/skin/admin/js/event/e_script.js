jQuery(function(){
	$('#frm-edit-cus').validationEngine({});
	
	$('#add-news').click(function(){
		$('#frm-news').slideToggle(400);
	});
	
	$( "#date_start" ).datetimepicker({
			defaultDate: new Date() ,
			showSecond: true,
			timeFormat: 'HH:mm:ss',
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear:true,
			yearRange: "2013:2015",
			onClose: function( selectedDate ) {
				$( "#date_end" ).datepicker( "option", "minDate", selectedDate );
			}
		});
	
	$( "#date_end" ).datetimepicker({
		defaultDate: new Date() ,
		changeMonth: true,
		changeYear:true,
		showSecond: true,
		timeFormat: 'HH:mm:ss',
		dateFormat: "yy-mm-dd",
		yearRange: "2013:2015",
		onClose: function( selectedDate ) {
			$( "#date_start" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
	$( "#reg_start" ).datetimepicker({
			defaultDate: new Date() ,
			showSecond: true,
			timeFormat: 'HH:mm:ss',
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear:true,
			yearRange: "2013:2015",
			onClose: function( selectedDate ) {
				$( "#reg_end" ).datepicker( "option", "minDate", selectedDate );
			}
		});
	
	$( "#reg_end" ).datetimepicker({
		defaultDate: new Date() ,
		changeMonth: true,
		changeYear:true,
		showSecond: true,
		timeFormat: 'HH:mm:ss',
		dateFormat: "yy-mm-dd",
		yearRange: "2013:2015",
		onClose: function( selectedDate ) {
			$( "#reg_start" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
	$('.remove-image-upload').live('click',function(){
		var event_id		=	$(this).attr('id');
		base_url		=	$('#ajax_url').val();
		
		$('.overlay').fadeIn(400);
		jQuery.ajax({
			url: base_url+'/admin/event/ajaxDeleteImg/'+event_id,
			type: 'POST',
			cache: false,
			dataType:'json',
			data: 'event_id='+event_id,
			success: function(result){		
				if(result.success){
					$('#img_flag_name').val('');
					$('#show_upload').attr('src', '#');
					$('.image-box').fadeOut(400);
				}else
					alert('Xảy ra lỗi trong quá trình xóa ảnh!');
					
				$('.overlay').fadeOut(400);
			},
			error: function (data){
				$('.overlay').fadeOut(400);
				alert(data.error);
				alert('Có lỗi xảy ra');
			}
		});
		
	})
	
});
