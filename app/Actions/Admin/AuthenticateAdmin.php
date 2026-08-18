<?php

namespace App\Actions\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticateAdmin
{
    public function handle(string $email, string $password, string $ipAddress): void
    {
        $throttleKey = $this->throttleKey($email, $ipAddress);

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            throw ValidationException::withMessages([
                'email' => "Terlalu banyak percobaan login. Coba lagi dalam {$seconds} detik.",
            ]);
        }

        if (! Auth::attempt(['email' => $email, 'password' => $password])) {
            RateLimiter::hit($throttleKey, 60);

            throw ValidationException::withMessages([
                'email' => 'Email atau password tidak valid.',
            ]);
        }

        RateLimiter::clear($throttleKey);
    }

    public function throttleKey(string $email, string $ipAddress): string
    {
        return Str::lower($email).'|'.$ipAddress;
    }
}
