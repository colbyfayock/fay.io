$(function() {

    // window.fbAsyncInit = function() {
    //     FB.init({
    //         appId      : '',
    //         xfbml      : true,
    //         version    : 'v2.4'
    //     });
    // };

    // Load Social SDKs Async
    (function(doc, script) {
        var js,
        fjs = doc.getElementsByTagName(script)[0],
        add = function(url, id) {
        if (doc.getElementById(id)) {return;}
        js = doc.createElement(script);
        js.src = url;
        id && (js.id = id);
        fjs.parentNode.insertBefore(js, fjs);
        };
        // Google+
        // add('//apis.google.com/js/plusone.js');
        // Facebook SDK
        // add('//connect.facebook.net/en_US/sdk.js', 'facebook-jssdk');
        // Twitter SDK
        // add('//platform.twitter.com/widgets.js', 'twitter-wjs');
        // Pinterest
        // add('//assets.pinterest.com/js/pinit.js');
    }(document, 'script'));

});