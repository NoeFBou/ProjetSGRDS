<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CompteModel;

class LoginController extends BaseController
{
    public function index()
    {
        if(session()->get('isLoggedIn')){
            return redirect()->to('/rattrapages');
        }
        helper(['form']);
        echo view ('/utils/header', ['page_title' => 'Connexion']);
        echo view('Connexion');
        echo view('/utils/footer');
    }

    public function loginAuth()
    {
        $userModel = new CompteModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $userModel->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            $session = session();
            if($authenticatePassword){
                $ses_data = [
                'id' => $data['id_utilisateur'],
                'email' => $data['email'],
                'nom' => $data['nom'],
                'isLoggedIn' => TRUE,
                'isDirecteur' => $data['isDirecteur'],
                ];

                $session->set($ses_data);
                return redirect()->to('/rattrapages');
            }else{
                $session->setFlashdata('msg', 'Email ou mot de passe incorrect.');
                return redirect()->to('/');
            }
        }else{
            $session->setFlashdata('msg', 'Email ou mot de passe incorrect.');
            return redirect()->to('/');
        }
    }


    public function logout()
    {
        // Détruire toutes les données de session
        session()->destroy();

        // Rediriger vers la page de connexion ou toute autre page appropriée
        return redirect()->to('/'); // Remplacez "/login" par l'URL de votre page de connexion
    }

}