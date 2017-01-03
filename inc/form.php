<div id="page-wrapper">

    <div id="form-messages"></div>

    <form id="ajax-contact" method="post" action="mailer.php">
        <div class="field">
            <input type="text" id="name" name="name" placeholder="Name" required>
        </div>

        <div class="field">
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>

        <div class="field">
            <input type="number" id="phone" name="phone" placeholder="Phone" required>
        </div>

        <div class="field">
            <textarea id="message" name="message" placeholder="Message" required></textarea>
        </div>

        <div class="field">
            <button type="submit">Send</button>
        </div>
    </form>
</div>
<script>
    $(function() {

        // Get the form.
        var form = $('#ajax-contact');

        // Get the messages div.
        var formMessages = $('#form-messages');

        // Set up an event listener for the contact form.
        $(form).submit(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();

            // Serialize the form data.
            var formData = $(form).serialize();

            // Submit the form using AJAX.
            $.ajax({
                    type: 'POST',
                    url: $(form).attr('action'),
                    data: formData
                })
                .done(function(response) {
                    // Make sure that the formMessages div has the 'success' class.
                    $(formMessages).removeClass('error');
                    $(formMessages).addClass('success');

                    // Set the message text.
                    $(formMessages).text(response);

                    // Clear the form.
                    $('#name, #email, #message, #phone').val('');
                })
                .fail(function(data) {
                    // Make sure that the formMessages div has the 'error' class.
                    $(formMessages).removeClass('success');
                    $(formMessages).addClass('error');

                    // Set the message text.
                    if (data.responseText !== '') {
                        $(formMessages).text(data.responseText);
                    } else {
                        $(formMessages).text('Oops! An error occured and your message could not be sent.');
                    }
                });

        });

    });

</script>
