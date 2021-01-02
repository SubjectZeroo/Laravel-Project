<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getAvatarAttribute()
    // {
    //     return "https://picsum.photos/id/ . $this->id/50";
    // }

    public function timeline()
    {
        // dd($this->user_id);

        //include all of the user's post
        //as well as the tweets of everyone
        //they follow ... in descending order by date

        // return Tweet::where('user_id', $this->id)
        //         ->latest()
        //         ->get();

        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);
        return Tweet::whereIn('user_id',$ids)
                    ->latest()
                    ->get();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function path($append = '')
    {
        $path = route('profile' , $this->name);

        return $append ? "{$path}/{$append}" : $path;
    }

    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }


}
