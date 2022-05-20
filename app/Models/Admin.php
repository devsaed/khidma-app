<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable implements MustVerifyEmail

{
    use HasFactory,HasRoles,Notifiable;

    public function getActiveStatusAttribute()
    {
        return $this->active ? 'Active' : 'In-Active';
    }

    public function getVerifiedStatusAttribute()
    {
        return $this->verified ? 'Verified' : 'Not-Verified';
    }
}
