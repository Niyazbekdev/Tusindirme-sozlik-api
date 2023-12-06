<?php

namespace App\Services\Auth;

use App\Models\Role;
use App\Models\User;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginAdmin extends BaseService
{
    public function rules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function execute(array $data)
    {
        $this->validate($data);

        $user = User::where('email', $data['email'])->first();

        $password = Hash::check($data['password'], $user->password);

        if(!$user || !$password){
            throw new Exception('user not found or password in correct', 401);
        }

        $role_id = Role::where('id', $user->role_id)->first();

        $role = $role_id['title'];

        $token = $user->createToken('user modle', [$role])->plainTextToken;

        return [$user, $token, $role];
    }
}
