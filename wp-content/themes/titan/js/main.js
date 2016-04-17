(function(TI, $, undefined){

    var $window,
        $body;

    //
    // functions
    //


    //
    // init
    //
    TI.init = function(){

        $window = $(window);
        $body   = $('body');

    }

    // -------------------------------
    // DOM ready
    //
    $(document).ready(function(){
        TI.init();
    });

})(window.TI = window.TI || {}, jQuery);