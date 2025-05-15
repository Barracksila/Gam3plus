<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TwoFactorCode;


/**
 * @property string|null $two_factor_code
 * @property \Illuminate\Support\Carbon|null $two_factor_expires_at
 */
class User extends Authenticatable
{
    use Notifiable;

    public function generateTwoFactorCode()
    {
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10); // 10 minutes expiry
        $this->save();

        $this->notify(new TwoFactorCode($this->two_factor_code));
    }

    /**
     * Reset the two-factor code and expiration time.
     */
    public function resetTwoFactorCode()
    {
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }



}
