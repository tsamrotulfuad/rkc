<?php

namespace App\Providers\Filament;

use App\Filament\PerangkatDaerah\Pages\Auth\PerangkatDaerahRegister;
use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Enums\ThemeMode;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class PerangkatDaerahPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('perangkatDaerah')
            ->path('instansiperangkatdaerah')
            ->login()
            ->registration(PerangkatDaerahRegister::class)
            ->brandLogo(asset('img/rkc-logo.png'))
            ->brandLogoHeight(fn() => auth()->check() ? '3.6rem' : '9rem' )
            ->favicon(asset('img/rkc-logo.png'))
            ->sidebarCollapsibleOnDesktop(true)
            ->maxContentWidth(MaxWidth::Full)
            ->defaultThemeMode(ThemeMode::Light)
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/PerangkatDaerah/Resources'), for: 'App\\Filament\\PerangkatDaerah\\Resources')
            ->discoverPages(in: app_path('Filament/PerangkatDaerah/Pages'), for: 'App\\Filament\\PerangkatDaerah\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/PerangkatDaerah/Widgets'), for: 'App\\Filament\\PerangkatDaerah\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make()
            ]);
    }
}
