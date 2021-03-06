<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
class AuthServiceProvider extends ServiceProvider
{
   /**
    * The policy mappings for the application.
    *
    * @var array
    */
   protected $policies = [
      // 'App\Model' => 'App\Policies\ModelPolicy',
   ];

   /**
    * Register any authentication / authorization services.
    *
    * @return void
    */
   public function boot()
   {
      $this->registerPolicies();

      Gate::define('delete-permission', function ($user) 
      {
         return ($user->sebagai == 'owner' ? Response::allow() : Response::deny('Kamu harus admin untuk bisa hapus.'));
      });

      Gate::define('checkmember',function($user)
      {
         return ($user->sebagai == 'member' ? Response::allow() : Response::deny('Anda harus daftar sebagai member dulu.'));
      });
   }
}