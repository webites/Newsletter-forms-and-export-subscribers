<?php

function nfes_get_form_respond_msg()
{
    if (isset($_SESSION['nfes_form_respond_msg'])) {
        echo $_SESSION['nfes_form_respond_msg'];
        unset($_SESSION['nfes_form_respond_msg']);
    }
}

/*
* @params $message - message to display
* @params $type - type of displayed message 
* Types: info (default), warning, success
*/
function nfes_set_form_respond_msg(string $message, string $type = "info"): void
{
    $msg_html = "<div class='nfes__message nfes__message--" . $type . "'>";
    $msg_html .= $message;
    $msg_html .= "</div>";
    $_SESSION['nfes_form_respond_msg'] = $msg_html;
}
