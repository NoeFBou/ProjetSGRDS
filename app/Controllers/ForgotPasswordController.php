<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CompteModel;
class ForgotPasswordController extends Controller
    {
    public function index()
    {
        helper(['form']);
        echo view ('/utils/header', ['page_title' => 'Réinitialisation de mot de passe']);
        echo view('sendMdpOublieLink', ['texte' => '']);        
        echo view('/utils/footer');
    }

    public function sendResetLink()
    {
        $email = $this->request->getPost('email');
        $userModel = new CompteModel();
        $user = $userModel->get_by_email($email);
        // Dans la méthode sendResetLink du contrôleur ForgotPasswordController
        if ($user) {
            // Générer un jeton de réinitialisation de MDP et enregistrer-le dans BD
            $token = bin2hex(random_bytes(16));
            $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $userModel->set('reset_token', $token)
            ->set('reset_token_expiration', $expiration)
            ->update($user['id_utilisateur']);
            // Envoyer l'e-mail avec le lien de réinitialisation
            $resetLink = "http://localhost:8080/updatePassword/$token";
            $message = "Cliquez sur le lien suivant pour réinitialiser MDP: $resetLink";
            // Utilisez la classe Email de CodeIgniter pour envoyer l'e-mail
            $emailService = \Config\Services::email();
            //paramètres du mail
            $from ='noreply@code.com';
            $to = $this->request->getPost('to');
            $subject = $this->request->getPost('subject');
            //envoi du mail
            $emailService->setTo($email);
            $emailService->setFrom($from);
            $emailService->setSubject('Réinitialisation de mot de passe');
            $emailService->setMessage($message);

            
        if ($emailService->send()) {
            echo view ('/utils/header');
            echo view('sendMdpOublieLink', ['texte' => 'E-mail envoyé avec succès.']);
            echo view('/utils/footer');

        } else {
            echo $emailService->printDebugger();
        }
    } else {
        echo view ('/utils/header');
        echo view('sendMdpOublieLink', ['texte' => 'E-mail envoyé avec succès.']);
        echo view('/utils/footer');
    }
    }
}