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
        $user_email = $fields['1']['value']; // Remplacez '1' par l'ID de votre champ email
        
        // Get the name from the fields using the ID
        $user_name = $fields['2']['value']; // Remplacez '2' par l'ID de votre champ nom
        
        // Customize your confirmation message here
        $message = "Cher $user_name,\n\nMerci pour votre soumission. Nous avons reçu votre message et nous vous répondrons sous peu.\n\nCordialement,\nVotre site Web";
        
        // Send the confirmation email
        wp_mail($user_email, 'Confirmation de soumission du formulaire', $message);
    }
}
