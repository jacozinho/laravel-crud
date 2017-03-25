$(document).ready(function(){
	$(".button-collapse").sideNav();
	$(".slider").slider({full_with:true});
	$('select').material_select();
});

function slidePrev(){
	$('.slider').slider('pause');
	$('.slider').slider('prev');
}

function slideNext(){
	$('.slider').slider('pause');
	$('.slider').slider('next');
}