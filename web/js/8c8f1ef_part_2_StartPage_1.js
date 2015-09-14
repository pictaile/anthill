/**
 * Created with JetBrains PhpStorm.
 * User: yuri
 * Date: 9/10/15
 * Time: 3:07 PM
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(default_init);

function mycarousel_initCallback(carousel){
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });
    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

function default_init(){
    jQuery('#tenders,#vacancies').jcarousel({
        auto: 3,
        wrap: 'last',
        scroll: 1,
        initCallback: mycarousel_initCallback
    });
}