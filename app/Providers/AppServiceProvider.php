<?php

namespace App\Providers;

use App\Korisnici;
use App\Notifikacije;
use App\PregledFalse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.mainheader', function($view)
        {
            $view->with('notifikacije', $notifikacije = Notifikacije::select('imeKorisnika', 'datum', 'status', 'id')
                ->where('imeKorisnika', '=', Auth::user()->name)
                ->orderBy('datum', 'DESC')->get());
        });

        view()->composer('partials.mainheader', function($view)
        {
            $view->with('brojac', $brojac = Notifikacije::select('imeKorisnika', 'datum', 'status', 'id')
                ->where('imeKorisnika', '=', Auth::user()->name)
                ->count());
        });

        view()->composer('partials.sidebar', function($view)
        {
            $view->with('korisnici', $korisnici = Korisnici::where('imePrezime', '=', Auth::user()->name)
                ->where('email', '=', Auth::user()->email)
                ->get());
        });

        view()->composer('partials.mainheader', function($view)
        {
            $view->with('korisnici', $korisnici = Korisnici::where('imePrezime', '=', Auth::user()->name)
                ->where('email', '=', Auth::user()->email)
                ->get());
        });

        view()->composer('profil', function($view)
        {
            $view->with('korisnici', $korisnici = Korisnici::where('imePrezime', '=', Auth::user()->name)
                ->where('email', '=', Auth::user()->email)
                ->get());
        });

        view()->composer('karton', function($view)
        {
            $view->with('korisnici', $korisnici = Korisnici::where('imePrezime', '=', Auth::user()->name)
                ->where('email', '=', Auth::user()->email)
                ->get());
        });

        view()->composer('termin', function($view)
        {
            $view->with('korisnici', $korisnici = Korisnici::where('imePrezime', '=', Auth::user()->name)
                ->where('email', '=', Auth::user()->email)
                ->get());
        });

        view()->composer('zahtjevi', function($view)
        {
            $view->with('korisnici', $korisnici = Korisnici::where('imePrezime', '=', Auth::user()->name)
                ->where('email', '=', Auth::user()->email)
                ->get());
        });

        view()->composer('partials.sidebar', function($view)
        {
            $view->with('brNotifikacija', $brNotifikacija = PregledFalse::select('pregled_false.id')
                ->where('imeDoktora', '=', Auth::user()->name)->count());

        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
