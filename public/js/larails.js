jQuery(function () {

    var larails = {

        // Define the name of the hidden input field for method submission
        methodInputName: '_method',
        // Define the name of the hidden input field for token submission
        tokenInputName: '_token',
        // Define the name of the meta tag from where we can get the csrf-token
        metaNameToken: 'csrf-token',

        initialize: function()
        {
            $('a[data-method]').on('click', this.handleMethod);
        },

        handleMethod: function(e)
        {
            e.preventDefault();

            var link = $(this),
                httpMethod = link.data('method').toUpperCase(),
                confirmMessage = link.data('confirm'),
                form;

            // Exit out if there is no data-methods of PUT, PATCH or DELETE.
            if ($.inArray(httpMethod, ['PUT', 'PATCH', 'DELETE']) === -1)
            {
                return;
            }

            // Allow user to optionally provide data-confirm="Are you sure?"
            if (confirmMessage)
            {
                if( confirm(confirmMessage) ) {
                    form = larails.createForm(link);
                    form.submit();
                }
            } else {
               form = larails.createForm(link);
               form.submit();
            }
        },

        createForm: function(link)
        {
            var form = $('<form>',
                {
                    'method': 'POST',
                    'action': link.prop('href')
                });

            var token =	$('<input>',
                {
                    'type': 'hidden',
                    'name': larails.tokenInputName,
                    'value': $('meta[name=' + larails.metaNameToken + ']').prop('content')
                });

            var method = $('<input>',
                {
                    'type': 'hidden',
                    'name': larails.methodInputName,
                    'value': link.data('method')
                });

            return form.append(token, method).appendTo('body');
        }
    };

    larails.initialize();
});