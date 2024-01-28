<?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    
    $subject = "TEST";
    $text = "This is TEST.\r\nHow are you?";
    $headers = "From: これはテストです2";
    mb_send_mail('akbnogizakakeyakizaka@gmail.com', $subject, $text, $headers);

?>