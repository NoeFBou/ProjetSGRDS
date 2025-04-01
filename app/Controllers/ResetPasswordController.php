<?php
namespace App\Controllers;
use App\Models\CompteModel;
use CodeIgniter\Controller;
class ResetPasswordController extends Controller
{
    public function index($token)
    {
        helper(['form']);
        $userModel = new CompteModel();
        $user = $userModel->where('reset_token', $token)->where('reset_token_expiration >', date('Y-m-d H:i:s'))->first();
        if ($user) {
            echo view ('/utils/header', ['page_title' => 'Réinitialiser le mot de passe']);
            echo view('resetPassword', ['token' => $token]);
            echo view('/utils/footer');
        } else {
            return redirect()->to('/');
        }
    }
    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirmPassword');
        // Valider et traiter les données du formulaire
        $userModel = new CompteModel();
        $user = $userModel->where('reset_token', $token)
        ->where('reset_token_expiration >', date('Y-m-d H:i:s'))
        ->first();
        if ($user && $password === $confirmPassword) {
            // Mettre à jour le mot de passe et réinitialiser le jeton
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $userModel->set('password', $hashedPassword)->set('reset_token', null)->set('reset_token_expiration', null)->update($user['id_utilisateur']);
            return redirect()->to('/');
        } else {
            return redirect()->to('/rattrapages');
        }
    }
}