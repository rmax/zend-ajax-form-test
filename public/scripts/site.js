jQuery(function($) {
    $('#ajax-form').submit(function(e) {
        $.post('index/test-ajax', $(this).serialize(), function(data) {
            var result = $('<p/>').html(data);
            $('#ajax-result').append(result);
        });

        e.preventDefault();
        return false;
    });
});
