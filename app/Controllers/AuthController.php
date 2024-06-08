<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {

        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $model->getUserByUsername($username);
        
        //return json_encode($data);

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $sessionData = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'nombre' => $data['nombre'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);
                return redirect()->route('dashboard');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->route('/');
            }
        } else {
            $session->setFlashdata('msg', 'Username does not exist.');
            return redirect()->route('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->route('/');
    }
}
