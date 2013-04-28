// JavaScript Document

jQuery(document).ready(function($) {

$(function() {
        $('ul.sub-menu').hide();

        $('.has-dropdown-menu').hover(
            function() {            
                $('ul.sub-menu', this).stop().animate({
                    height: 'toggle',
                    opacity: 'toggle',
                } /* [, duration in ms] */);
            }
        );
    });

});