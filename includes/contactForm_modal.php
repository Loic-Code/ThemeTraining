<?php

function mycustom_wp_footer()
{ ?>
    <script type="text/javascript">
        document.addEventListener('wpcf7mailsent', function(event) {
            if ('666' == event.detail.contactFormId) { // Change 123 to the ID of the form 
                jQuery('#SuccessModal').modal('show'); //this is the bootstrap modal popup id
            }
        }, false);
        document.addEventListener('wpcf7invalid', function(event) {
            if ('666' == event.detail.contactFormId) { // Change 123 to the ID of the form 
                jQuery('#InvalidModal').modal('show'); //this is the bootstrap modal popup id
            }
        }, false);
    </script>
<?php }