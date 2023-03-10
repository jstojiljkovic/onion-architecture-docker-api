<?php

namespace App\Providers;

use App\Interfaces\Services\AuthServiceInterface;
use App\Interfaces\Services\EquipmentServiceInterface;
use App\Interfaces\Services\MediaServiceInterface;
use App\Interfaces\Services\OrganisationServiceInterface;
use App\Interfaces\Services\ScheduleServiceInterface;
use App\Interfaces\Services\SessionServiceInterface;
use App\Interfaces\Services\UserServiceInterface;
use App\Interfaces\Services\VideoServiceInterface;
use App\Interfaces\Services\WorkHourExceptionServiceInterface;
use App\Interfaces\Services\WorkHourServiceInterface;
use App\Interfaces\Services\WorkoutServiceInterface;
use App\Services\AuthService;
use App\Services\EquipmentService;
use App\Services\MediaService;
use App\Services\OrganisationService;
use App\Services\ScheduleService;
use App\Services\SessionService;
use App\Services\UserService;
use App\Services\VideoService;
use App\Services\WorkHourExceptionService;
use App\Services\WorkHourService;
use App\Services\WorkoutService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(OrganisationServiceInterface::class, OrganisationService::class);
        $this->app->bind(EquipmentServiceInterface::class, EquipmentService::class);
        $this->app->bind(MediaServiceInterface::class, MediaService::class);
        $this->app->bind(VideoServiceInterface::class, VideoService::class);
        $this->app->bind(WorkoutServiceInterface::class, WorkoutService::class);
        $this->app->bind(WorkHourServiceInterface::class, WorkHourService::class);
        $this->app->bind(SessionServiceInterface::class, SessionService::class);
        $this->app->bind(ScheduleServiceInterface::class, ScheduleService::class);
        $this->app->bind(WorkHourExceptionServiceInterface::class, WorkHourExceptionService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
