<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('customers'));
        }

        $rules = [
            'username' => 'required|max_length[50]',
            'password' => 'required|max_length[255]',
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $username = trim((string) $this->request->getPost('username'));
            $user = (new UserModel())->where('username', $username)->first();

            if ($user !== null && password_verify((string) $this->request->getPost('password'), $user['password'])) {
                session()->regenerate();
                session()->set([
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                    'full_name' => $user['full_name'],
                    'role' => $user['role'],
                    'isLoggedIn' => true,
                ]);

                return redirect()->to(site_url('customers'))->with('success', 'Welcome, ' . $user['full_name'] . '.');
            }

            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        return view('auth/login', [
            'title' => 'Login',
            'validation' => $this->validator,
        ]);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'))->with('success', 'You have been logged out.');
    }
}
