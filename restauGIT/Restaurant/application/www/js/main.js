'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////
var selected;

function selectItem(event){
	selected = event.currentTarget.value;
	return selected;
}

$(document).ready(function(){
	$('option').on('click',function(event){

		$.ajax({
			type: 'GET',
			url: 'order/selected?add='+selected,

			success: function(results){

				var div = document.getElementById('basket-product');
				div.innerHTML = results;
			},

			error: function(results){
				alert('error'+ results);
			}
		});
	});
});