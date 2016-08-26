(function(TI, $, undefined){
    
    //
    // initializes all of the sliders on the page
    // all options for the slider here: http://kenwheeler.github.io/slick/
    //
    function initSlickSliders() {
        $('.slider').slick();
    }

    // -------------------------------
    // DOM ready
    //
    $(document).ready(function(){

        initSlickSliders();
    
    });

})(window.TI = window.TI || {}, jQuery);