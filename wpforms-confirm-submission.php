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
        // Get the email from the fields using the ID
        $user_email = $fields['1']['value']; // Replace '1' with the ID of your email field
        
        // Get the name from the fields using the ID
        $user_name = $fields['2']['value']; // Replace '2' with the ID of your name field
        
        // Customize your confirmation message here
        $message = "Cher $user_name,\n\nThank you for your submission. We have received your message and will get back to you shortly.\n\nSincerely,\nYour website";
        
        // Send the confirmation email
        wp_mail($user_email, 'Confirmation of form submission', $message);
    }
}
