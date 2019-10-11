<?php
namespace App\Models;
use App\Models\Traits\SlugRoutable;
use Illuminate\Auth\MustVerifyEmail as Verification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements MustVerifyEmail
{
    use SlugRoutable,Notifiable,Verification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'facebook_id', 'google_id', 'github_id','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return in_array($this->role,config('samk.roles'))||$this->role=='admin';
    }

    public static function login($request)
    {
        $remember = $request->remember;
        $email = $request->email;
        $password = $request->password;
        
        return (\Auth::attempt(['email' => $email, 'password' => $password], $remember));
    }
}
