<?php
    header("Content-Security-Policy: default-src 'self'; script-src 'self' 'nonce-randomNonceValue'");
    
    function sanitizeInput($data) { //Input Sanitation
        $data = trim($data);            
        $data = stripslashes($data);    
        $data = htmlspecialchars($data);
        $data = preg_replace('/\s+/', '', $data);
        return $data;
    }

?>