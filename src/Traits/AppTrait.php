<?php

namespace App\Traits;

use DateTime;

trait AppTrait
{
    public function getAppCurrentDate(): DateTime
    {
        date_default_timezone_set('Africa/Nairobi');
        
        return new DateTime(date('m/d/Y H:i:s'));
    }
}