<?php

return [
    // Admin receives new lead notifications here
    'admin_email' => env('ADMIN_CONTACT_EMAIL', 'leads@rareinput.com'),

    // Acknowledgement emails to leads are sent from this address
    'from_address' => env('CONTACT_ACK_FROM', 'hello@rareinput.com'),
];
