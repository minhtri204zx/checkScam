<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.layouts.app', function ($view) {
            $reportNotVerifi = Post::where('status_id', 1)->count();
            $reports = Post::paginate(1);
            $user = Auth::user();
            $noti = Notification::select('noti', 'number')->first(1);
            $accounts = Account::paginate(16);
            $view->with([
                'reportNotVerifi' => $reportNotVerifi,
                'reports' => $reports,
                'accounts' => $accounts,
                'noti' => $noti,
                'user' => $user
            ]);
        });

    }
}
