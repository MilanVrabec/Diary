(function($){

    var form  = $('#add-form');
    
    $('.one-more').on('click', function( event ){

        form.find('.text:first')
            .clone()
            .insertBefore(
                form.find('.submit-button')
            );
        
        event.preventDefault();

    });

}(jQuery));