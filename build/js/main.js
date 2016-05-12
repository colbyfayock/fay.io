$(function() {
    
    $('.project-images').magnificPopup({
        delegate: '.project-images-thumb',
        type: 'image',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [ 0, 1 ]
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    });

});