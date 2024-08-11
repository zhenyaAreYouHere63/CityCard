<?php

namespace App\Providers;

use App\Models\Card;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class CustomUserAuthenticationProvider implements UserProvider
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        if (
            empty($credentials['number'])
            || empty($credentials['phone_number'])
        ) {
            return null;
        }

        $card = Card::where('number', $credentials['number'])->first();

        if (!$card) {
            return null;
        }

        return $this->model::where('id', $card->user_id)
            ->where('phone_number', $credentials['phone_number'])
            ->first();
    }

    public function retrieveById($identifier): ?Authenticatable
    {
        return $this->model::find($identifier);
    }

    public function retrieveByToken(
        $identifier,
        #[\SensitiveParameter] $token
    ) {
        // TODO: Implement retrieveByToken() method.
    }

    public function updateRememberToken(
        Authenticatable $user,
        #[\SensitiveParameter] $token
    ) {
        // TODO: Implement updateRememberToken() method.
    }

    public function validateCredentials(
        Authenticatable $user,
        #[\SensitiveParameter] array $credentials
    ) {
        return true;
    }

    public function rehashPasswordIfRequired(
        Authenticatable $user,
        #[\SensitiveParameter] array $credentials,
        bool $force = false
    ) {
        // TODO: Implement rehashPasswordIfRequired() method.
    }
}
