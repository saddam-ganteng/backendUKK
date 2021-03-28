<?php

namespace App\Providers;

use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.
        
        // $this->app['auth']->viaRequest('api', function ($request) {
        //     $token = $request->header('Authorization');
        //     if ($token === 'tokenapi'){
        //         return new Masyarakat();
        //         }
        // });
        // 55a13eb571d18553a87c0ebe06ccaeb8de967990842467c3684d58b288e78cf119988a9066e2303a
        // b27bce460b1162f6dbfb1364c55ac91d4b181f7325405c17c2261409270b4e07238fe2dd6bd76150
        $this->app['auth']->viaRequest('api', function ($request) {
            $token = $request->header('Authorization');
            
            $masyarakat = Masyarakat::where('token', $token)->first();
            $petugas = Petugas::where('token', $token)->first();

            if ($masyarakat) {
                // print_r("ini rakyat");
                return Masyarakat::where('token', $token)->first();
            } elseif ($petugas) {
                // print_r("ini admin");
                return Petugas::where('token', $token)->first();
            }
        });
    }
}
