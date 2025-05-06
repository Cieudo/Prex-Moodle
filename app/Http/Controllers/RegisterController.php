<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    // Redirecionamento após o registro
    protected $redirectTo = '/home'; // pode alterar para /dashboard depois

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,professor,aluno'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }

    protected function registered(Request $request, $user)
    {
        // Redirecionamento baseado no papel
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'professor':
                return redirect()->route('professor.dashboard');
            case 'aluno':
                return redirect()->route('aluno.dashboard');
            default:
                return redirect('/home');
        }
    }
}
