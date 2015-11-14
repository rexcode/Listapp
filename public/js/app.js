$(document).ready(function(){

	$('form').submit(function(event){
		var method = $(this).children(':hidden[name=_method]').val();
		if ($.type(method) !== 'udefined' && method == 'DELETE') {
			if(!confirm('Are you sure ?')){
				event.preventDefault();
			}
		}
	});

	// $('.hover-list-name').hover(
	// 	function(){
	// 		$('.hover-effect').append($('<span>"click to see / add tasks"</span>'));
	// 	}, function(){
	// 		$('.hover-effect').find("span:last").remove();
	// 	}
	// );
});