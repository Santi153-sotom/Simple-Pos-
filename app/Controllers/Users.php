<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index(): string
    {
        return view('users/index', [
            'title' => 'User Accounts',
            'users' => (new UserModel())->orderBy('full_name')->findAll(),
        ]);
    }

    public function new()
    {
        $rules = [
            'username' => 'required|min_length[5]|max_length[50]|alpha_numeric_punct|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
            'role' => 'required|in_list[Administrator,Manager,Cashier,Inventory Staff]',
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            (new UserModel())->insert([
                'username' => trim((string) $this->request->getPost('username')),
                'full_name' => trim((string) $this->request->getPost('full_name')),
                'role' => $this->request->getPost('role'),
            ]);

            return redirect()->to(site_url('users'))->with('success', 'User added successfully.');
        }

        return view('users/form', [
            'title' => 'New User',
            'user' => null,
            'validation' => $this->validator,
        ]);
    }

    public function edit(int $id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        $rules = [
            'username' => "required|min_length[5]|max_length[50]|alpha_numeric_punct|is_unique[users.username,user_id,{$id}]",
            'full_name' => 'required|max_length[100]',
            'role' => 'required|in_list[Administrator,Manager,Cashier,Inventory Staff]',
        ];

        $avatar = $this->request->getFile('avatar');
        if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] = 'uploaded[avatar]|max_size[avatar,2048]|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]|ext_in[avatar,jpg,jpeg,png]';
        }

        if ($this->request->is('post') && $this->validate($rules)) {
            $data = [
                'username' => trim((string) $this->request->getPost('username')),
                'full_name' => trim((string) $this->request->getPost('full_name')),
                'role' => $this->request->getPost('role'),
            ];

            if ($avatar !== null && $avatar->isValid() && ! $avatar->hasMoved()) {
                $extension = $avatar->getMimeType() === 'image/png' ? 'png' : 'jpg';
                $filename = bin2hex(random_bytes(16)) . '.' . $extension;
                $destination = FCPATH . 'uploads/avatars/' . $filename;

                service('image')->withFile($avatar->getTempName())
                    ->fit(300, 300, 'center')
                    ->save($destination, 85);

                $data['avatar'] = $filename;

                if (! empty($user['avatar'])) {
                    $oldAvatar = FCPATH . 'uploads/avatars/' . basename($user['avatar']);
                    if (is_file($oldAvatar)) {
                        unlink($oldAvatar);
                    }
                }
            }

            $model->update($id, $data);

            return redirect()->to(site_url('users'))->with('success', 'User updated successfully.');
        }

        return view('users/form', [
            'title' => 'Edit User',
            'user' => $user,
            'validation' => $this->validator,
        ]);
    }
}
