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

	// $(".hover").hover(function(){
	// 		// var name = $(this).html().val();
 //      $(this).html('Click here to enter task.');
 //      }, function(){
 //      $(this).html('');
 //  });
});