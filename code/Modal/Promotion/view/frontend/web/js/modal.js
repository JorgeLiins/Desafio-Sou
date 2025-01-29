require(['jquery'], function($) {
    $(document).ready(function() {
        if (!localStorage.getItem('notificationPreference')) {
            $('#notification-modal').show();
        }

        $('#accept-notifications').click(function() {
            localStorage.setItem('notificationPreference', 'accepted');
            $('#notification-modal').hide();
            $('#promotion-modal').show();
        });

        $('#decline-notifications').click(function() {
            localStorage.setItem('notificationPreference', 'declined');
            $('#notification-modal').hide();
        });

        $('#close-promotion').click(function() {
            $('#promotion-modal').hide();
        });
    });
});
