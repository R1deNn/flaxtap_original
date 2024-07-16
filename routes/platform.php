<?php

declare(strict_types=1);

use App\Orchid\Screens\BannerEditScreen;
use App\Orchid\Screens\BannersScreen;
use App\Orchid\Screens\CategoryEditScreen;
use App\Orchid\Screens\CategorysScreen;
use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\OrderEditScreen;
use App\Orchid\Screens\OrdersScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\ShopEditScreen;
use App\Orchid\Screens\ShopScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use App\Orchid\Screens\VoblerEditScreen;
use App\Orchid\Screens\VoblersScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Shop
Route::screen('/shop', ShopScreen::class)
    ->name('platform.shop')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Shop'), route('platform.shop'));
    });

// Platform > Shop > Create
Route::screen('shop/create', ShopEditScreen::class)
    ->name('platform.systems.shop.create');

// Platform > System > Shop > Shop
Route::screen('shop/{shop}/edit', ShopEditScreen::class)
    ->name('platform.shop.edit')
    ->breadcrumbs(fn (Trail $trail, $shop) => $trail
        ->parent('platform.shop')
        ->push($shop->title, route('platform.shop.edit', $shop)));

// Platform > Categorys
Route::screen('/categorys', CategorysScreen::class)
    ->name('platform.categorys')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Категории'), route('platform.categorys'));
    });

// Platform > Categorys > Create
Route::screen('category/create', CategoryEditScreen::class)
    ->name('platform.category.create');

// Platform > Categorys > Category
Route::screen('category/{category}/edit', CategoryEditScreen::class)
    ->name('platform.category.edit')
    ->breadcrumbs(fn (Trail $trail, $category) => $trail
        ->parent('platform.categorys')
        ->push($category->title, route('platform.shop.edit', $category)));

// Platform > Orders
Route::screen('/orders', OrdersScreen::class)
    ->name('platform.orders')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Заказы'), route('platform.orders'));
    });

// Platform > Orders > Order
Route::screen('order/{order}/edit', OrderEditScreen::class)
    ->name('platform.order.edit')
    ->breadcrumbs(fn (Trail $trail, $order) => $trail
        ->parent('platform.orders'));

// Platform > Voblers
Route::screen('/voblers', VoblersScreen::class)
    ->name('platform.voblers')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('CTA'), route('platform.voblers'));
    });

// Platform > Voblers > Create
Route::screen('vobler/create', VoblerEditScreen::class)
    ->name('platform.vobler.create');

// Platform > Voblers > Vobler
Route::screen('vobler/{vobler}/edit', VoblerEditScreen::class)
    ->name('platform.vobler.edit')
    ->breadcrumbs(fn (Trail $trail, $vobler) => $trail
        ->parent('platform.voblers')
        ->push($vobler->title, route('platform.vobler.edit', $vobler)));

// Platform > Banners
Route::screen('/banners', BannersScreen::class)
    ->name('platform.banners')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Banners'), route('platform.banners'));
    });

// Platform > Banners > Banner
Route::screen('banners/{banner}/edit', BannerEditScreen::class)
    ->name('platform.banner.edit')
    ->breadcrumbs(fn (Trail $trail, $banner) => $trail
        ->parent('platform.banners')
        ->push($banner->id, route('platform.shop.edit', $banner)));

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->fio, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/examples/form/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/examples/form/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/examples/form/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/examples/form/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/examples/grid', ExampleGridScreen::class)->name('platform.example.grid');
Route::screen('/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

//Route::screen('idea', Idea::class, 'platform.screens.idea');
