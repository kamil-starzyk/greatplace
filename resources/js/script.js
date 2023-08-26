
$(document).ready(function(){
	

	$('#filters-toggler').on('click', function(){
		$(".filters").toggleClass('active');
    $(".search-form").toggleClass('active');
    $(".slogan").toggleClass('active');
    $(".search-box").toggleClass('active');
	});
  $('.pressable').on('click', function(){
    $('.pressable').removeClass('pressed');
    $(this).toggleClass('pressed');
	});
  $('.la-heart').on('click', function(){
    $(this).toggleClass('liked');
    var counter = $(this).closest('.right-span').find('.likes-counter');
    var likesCount = counter.text();
    if ($(this).hasClass("liked")) 
      likesCount++;
    else likesCount--;

    counter.text(likesCount);
	});

});