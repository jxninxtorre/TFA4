<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Services;

class Users extends BaseController
{
    protected string $uploadPath = FCPATH . 'uploads/avatars/';

    public function index()
    {
        $userModel = new UserModel();
        $users     = $userModel->findAll();

        return view('users', ['title' => 'User Accounts', 'users' => $users]);
    }

    public function new()
    {
        return view('user_form', [
            'title'  => 'Add New User',
            'user'   => null,
            'action' => site_url('users/create'),
        ]);
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|min_length[2]|max_length[100]',
            'avatar'    => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];

        if (! $this->validate($rules)) {
            return view('user_form', [
                'title'  => 'Add New User',
                'user'   => $this->request->getPost(),
                'action' => site_url('users/create'),
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $data = [
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $avatarName = $this->handleAvatarUpload();
        if ($avatarName !== null) {
            $data['avatar'] = $avatarName;
        }

        $userModel = new UserModel();
        $userModel->insert($data);

        return redirect()->to(site_url('users'))->with('message', 'User added successfully.');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user      = $userModel->find($id);

        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('user_form', [
            'title'  => 'Edit User',
            'user'   => $user,
            'action' => site_url('users/update/' . $id),
        ]);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $existing  = $userModel->find($id);

        if (! $existing) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'username'  => "required|min_length[3]|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|min_length[2]|max_length[100]',
            'avatar'    => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];

        if (! $this->validate($rules)) {
            return view('user_form', [
                'title'  => 'Edit User',
                'user'   => array_merge($existing, $this->request->getPost()),
                'action' => site_url('users/update/' . $id),
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        $avatarName = $this->handleAvatarUpload();
        if ($avatarName !== null) {
            if (! empty($existing['avatar']) && is_file($this->uploadPath . $existing['avatar'])) {
                unlink($this->uploadPath . $existing['avatar']);
            }
            $data['avatar'] = $avatarName;
        }

        $userModel->update($id, $data);

        return redirect()->to(site_url('users'))->with('message', 'User updated successfully.');
    }

    private function handleAvatarUpload(): ?string
    {
        $file = $this->request->getFile('avatar');

        if ($file === null || ! $file->isValid() || $file->hasMoved()) {
            return null;
        }

        if (! is_dir($this->uploadPath)) {
            mkdir($this->uploadPath, 0775, true);
        }

        $newName = $file->getRandomName();
        $file->move($this->uploadPath, $newName);

        Services::image()
            ->withFile($this->uploadPath . $newName)
            ->fit(150, 150, 'center')
            ->save($this->uploadPath . $newName);

        return $newName;
    }
}