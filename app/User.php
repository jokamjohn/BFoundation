<?php

namespace App;

use App\Notifications\EmployerWelcome;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'birthDate', 'admin', 'status', 'employer','token','verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**Create a e-mail confirmation token when saving a user.
     *
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user){
            $user->token = str_random(32);
        });
    }

    /**Alter these fields after the user verifies their email addresses.
     *
     */
    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;
        $this->save();
        return $this;
    }

    /**Get the user who posted these jobs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function jobs()
    {
        return $this->belongsToMany(Job::class)->withTimestamps();
    }

    /**Get the trainings added by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trainings()
    {
        return $this->belongsToMany(Training::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

}
