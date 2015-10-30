$(document).ready(function(){

	// $('div').css('background', 'red');
	//Confirm all Deletions
	$('form').submit(function(event){
		var method = $(this).children(':hidden[name=_method]').val();
		if ($.type(method) !== 'udefined' && method == 'DELETE') {
			if(!confirm('Are you sure ?')){
				event.preventDefault();
			}
		}
	});
});