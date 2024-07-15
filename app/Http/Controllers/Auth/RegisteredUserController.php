<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserRegisteredAdmin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Orchid\Platform\Core\Models\User as PlatformUser;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $customMessages = [
            'name.required' => 'Необходимо заполнить поле имени',
            'name.max' => 'Вы превысили максимальную длину имени (255 символов)',
            'email.required' => 'Необходимо запомнить поле электронной почты',
            'email.lowercase' => 'Адрес электронной почты должен быть в нижнем регистре',
            'email.email' => 'Введите правильный формат почты',
            'email.max' => 'Вы превысили максимальную длину почты (255 символов)',
            'email.unique' => 'Такая почта уже занята',
            'password.required' => 'Необходимо ввести пароль',
            'password.confirmed' => 'Пароли не совпадают',
            'validation.min.string' => 'Пароль должен быть не менее 6 символов',
            'tel.unique' => 'Такой телефон уже занят',
            'tel.max' => 'Номер телефона не может быть больше 14 символов',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'tel' => ['required', 'string', 'max:14', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], $customMessages);

        $filePath = '';

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage'), $fileName);
            $filePath = url('storage/' . $fileName); 

            $users = User::whereHas('roles', function ($query) {
                $query->where('slug', 'admin');
            })->get();
            foreach ($users as $user) {
                $user->notify(new UserRegisteredAdmin());
            }
        }
        
        $user = User::create([
            'fio' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => Hash::make($request->password),
            'certificate' => $filePath ?? null, 
        ]);
        
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
