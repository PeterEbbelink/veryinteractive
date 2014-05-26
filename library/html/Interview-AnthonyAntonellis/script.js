(function($) { 
    $(document).ready(function () {
        $('.pic').click(function () {
            $(this).hide();
            var next = $(this).next();
            console.log(next.length);
            if (next.length == 0)
                next = $(this).parent().find('.pic').first();
            
            next.show();
        });
    });
})(jQuery);