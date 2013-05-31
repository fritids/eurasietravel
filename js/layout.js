(function($){
	var initLayout = function() {
		
		$('#arriveDate').DatePicker({
			format:'m/d/Y',
			date: $('#arriveDate').val(),
			current: $('#arriveDate').val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				$('#arriveDate').DatePickerSetDate($('#arriveDate').val(), true);
			},
			onChange: function(formated, dates){
				$('#arriveDate').val(formated);
			}
		});
		$('#departureDate').DatePicker({
			format:'m/d/Y',
			date: $('#departureDate').val(),
			current: $('#departureDate').val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				$('#departureDate').DatePickerSetDate($('#departureDate').val(), true);
			},
			onChange: function(formated, dates){
				$('#departureDate').val(formated);
			}
		});
		
		/*$('#date3').DatePicker({
			format:'m/d/Y',
			date: ['11-7-2011','12-11-2011'],
			current: $('#date3').val(),
			calendars: 3,
			mode: 'range',
			starts: 1,
			onBeforeShow: function(){
				$('#date3').DatePickerSetDate($('#date3').val(), true);
			},
			onChange: function(formated, dates){
				$('#date3').val(formated);
			}
		});*/
	};	
	EYE.register(initLayout, 'init');
})(jQuery)