<?php

return [
    // Admin receives new application notifications here
    'admin_email' => env('ADMIN_CAREERS_EMAIL', 'careers@rareinput.com'),

    // Acknowledgement emails to candidates are sent from this address
    'from_address' => env('CAREERS_ACK_FROM', 'careers@rareinput.com'),
];
