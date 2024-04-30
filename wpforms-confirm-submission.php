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
        // Get the form object
        $form = wpforms()->form->get($form_data['id']);
        
        // Get the ID of the email field
        $email_field_id = $form->get_field_id('email');
        // Get the email from the fields using the ID
        $user_email = $fields[$email_field_id];
        
        // Get the ID of the name field
        $name_field_id = $form->get_field_id('name');
        // Get the name from the fields using the ID
        $user_name = $fields[$name_field_id];
        
        // Customize your confirmation message here
        $message = "Dear $user_name,\n\nThank you for your submission. We have received your message and will get back to you shortly.\n\nRegards,\nYour Website";
        
        // Send the confirmation email
        wp_mail($user_email, 'Confirmation of Form Submission', $message);
    }
}

