jQuery(function(){
	$('#frm-edit-rule').validationEngine({});
	
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
	
	$('#cp').blur(function(){
		var found	=	false;
		$( "#cp option:selected" ).each(function(){ 
			
			if($(this).val() == '*'){
				found	=	true;
				
				return false;
			}
		});
		
		if(found){
			$( "#cp option:selected" ).each(function(){
				if($(this).val() != '*')
					$(this).attr('selected',false);
			})
		}
	})
	
});
