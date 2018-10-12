<?php

namespace App;

class logs
{
    public function savelog($user, $message)
    {
        $audit = new AuditLog();

        $audit->user_id = $user;
        $audit->description = $message;
        $audit->save();
    }
}



