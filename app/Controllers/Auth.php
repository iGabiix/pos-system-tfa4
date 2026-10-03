<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->has('user_id')) {
            return redirect()->to('/');
        }

        return view('login');
    }

    public function authenticate()
    {
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');
        $user = (new UserModel())->where('username', $username)->first();

        if (! $user || ! password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        session()->regenerate();
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'full_name' => $user['full_name'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to(session()->get('redirect_url') ?: '/');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
