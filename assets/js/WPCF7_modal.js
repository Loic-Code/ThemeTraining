// Get Id from the form
const x = parseInt(document.getElementsByName("_wpcf7")[0].value);

document.addEventListener('wpcf7mailsent', function(event) {
    if ( x === event.detail.contactFormId) {
        jQuery('#SuccessModal').modal('show'); //this is the bootstrap modal popup id
    }
}, false);
document.addEventListener('wpcf7invalid', function(event) {
    if ( x === event.detail.contactFormId) {
        jQuery('#InvalidModal').modal('show'); //this is the bootstrap modal popup id
    }
}, false);
