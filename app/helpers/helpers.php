<?php
function notification($alert_type, $message)
{
    $notification['alert-type'] = $alert_type;
    $notification['message'] = $message;
    return $notification;
}
