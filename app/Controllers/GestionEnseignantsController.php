<?php
namespace App\Controllers;
use App\Models\CompteModel;

class GestionEnseignantsController extends BaseController
{

    public function index()
    {
        if (session()->get('isDirecteur') == "f" || session()->get('isLoggedIn') == FALSE) {
            return redirect()->to('/rattrapages');
        }

        echo view('/utils/header', ['page_tilte' => 'Ajouter un enseignant']);
        echo view('ajouterEnseignantVue');
        echo view('/utils/footer');
    }

    // fonction ajouter un enseignant
    public function ajoutEnseignant(){
        helper(['form']);
        $rules = [
            'name' => 'required|min_length[2]|max_length[50]',
            'email' =>'required|min_length[4]|max_length[100]|valid_email|is_unique[Compte.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmPassword' => 'matches[password]'
        ];
        if($this->validate($rules)){
            $userModel = new CompteModel();
            $data = [
                'nom' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $userModel->ajout();
            return redirect()->to('/rattrapages');
        }else{
            echo view('/utils/header');
            echo view('ajouterEnseignantVue');
            echo view('/utils/footer');
        }
    }

    // fonction à faire à la fin : supprimer et modifier

}