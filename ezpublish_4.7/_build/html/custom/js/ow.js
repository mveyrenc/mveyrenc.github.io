$(document).ready(function() {
    Reveal.addEventListener( 'slidechanged', function( event ) {
        // event.previousSlide, event.currentSlide, event.indexh, event.indexv
        var slide_title = '';
        parent_title = $(event.currentSlide).parent().data('title');
        if (parent_title) {
            slide_title += parent_title;
        }
        current_title = $(event.currentSlide).data('title');
        if (current_title) {
            if (slide_title) {
                slide_title += ' &raquo; ' + current_title;
            } else {
                slide_title += current_title;
            }
        }
        $('#header .title').html(slide_title);
    } );
});