<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->orderBy('id', 'ASC')->findAll();

        return view('users', ['users' => $users]);
    }

    public function newForm()
    {
        return view('user_form', ['title' => 'New User', 'user' => null]);
    }

    public function create()
    {
        $rules = [
            'username' => 'required|min_length[4]|max_length[50]|is_unique[users.username]',
            'password' => 'required|min_length[8]|max_length[255]',
            'full_name' => 'required|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new UserModel())->insert([
            'username'  => trim((string) $this->request->getPost('username')),
            'password'  => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/users')->with('success', 'User account created successfully.');
    }

    public function edit(int $id)
    {
        $user = (new UserModel())->find($id);
        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('user_form', ['title' => 'Edit User', 'user' => $user]);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user = $model->find($id);
        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        }

        $usernameRule = 'required|min_length[4]|max_length[50]';
        if ((string) $this->request->getPost('username') !== (string) $user['username']) {
            $usernameRule .= '|is_unique[users.username]';
        }

        $rules = [
            'username' => $usernameRule,
            'full_name' => 'required|max_length[100]',
            'password' => 'permit_empty|min_length[8]|max_length[255]',
            'avatar' => 'permit_empty|is_image[avatar]|max_size[avatar,2048]|mime_in[avatar,image/jpg,image/jpeg,image/png]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];

        $password = (string) $this->request->getPost('password');
        if ($password !== '') {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $avatar = $this->request->getFile('avatar');
        if ($avatar && $avatar->isValid() && ! $avatar->hasMoved()) {
            $uploadPath = FCPATH . 'uploads';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $filename = $avatar->getRandomName();
            $avatar->move($uploadPath, $filename);

            // Resize the saved copy so the listing always has a display-ready thumbnail.
            service('image')->withFile($uploadPath . DIRECTORY_SEPARATOR . $filename)
                ->fit(300, 300, 'center')
                ->save($uploadPath . DIRECTORY_SEPARATOR . $filename, 80);

            $data['avatar'] = $filename;
            if (! empty($user['avatar'])) {
                $oldAvatar = $uploadPath . DIRECTORY_SEPARATOR . basename($user['avatar']);
                if (is_file($oldAvatar)) {
                    unlink($oldAvatar);
                }
            }
        }

        $model->update($id, $data);
        return redirect()->to('/users')->with('success', 'User account updated successfully.');
    }
}
