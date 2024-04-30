<?php
/*
Plugin Name: WPForms Confirm Submission
Description: Send a confirmation email to the user after form submission.
Version: 1.0
Author: Karim Kompissi
*/

// Hook to process form submission
add_action('wpforms_process_complete', 'wpforms_confirm_submission', 10, 4);

function wpforms_confirm_submission($fields, $entry, $form_data, $entry_id) {
    // Check if the form ID is 945 (replace 945 with the ID of your WPForms form)
    if ($form_data['id'] == 945) {
        // Get the user's email from the form fields
        $user_email = $fields['email'];
        
        // Get the user's name from the form fields
        $user_name = $fields['name'];
        
        // Customize your confirmation message here
        $message = "Dear $user_name,\n\nThank you for your confirmation. We have received your confirmation message..\n\nRegards,\nDiamand's Events";
        
        // Send the confirmation email
        wp_mail($user_email, 'Confirmation of Form Submission', $message);
    }
}
