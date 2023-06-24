// JavaScript Document

$('.menu-bars').click(function(){
	"use strict";
	if ($('.menu-cont').is(':hidden') ) {
		$('.menu-cont').slideDown();

	}else {
		$('.menu-cont').slideUp();

	}
});