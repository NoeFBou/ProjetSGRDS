<?php
namespace App\Controllers;

use App\Models\RattrapageModel;
use App\Models\RessourceModel;
use App\Models\EtudiantModel;
use App\Models\CompteModel;

class AccueilController extends BaseController
{
    public function index($rattrapages_filtre = "")
    {
        $session = session();

        if (!$session->get('isLoggedIn'))
        {
            return redirect()->to('/');
        }

        $rattrapages_model = new RattrapageModel();

        //récupérer le model
        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $ressource_model = new RessourceModel();
        $ressources = $ressource_model->get_all();

        $compte_model = new CompteModel();
        $enseignant = $compte_model->get_all();

        $etudiant_model = new EtudiantModel();
        $etudiants = $etudiant_model->get_all();

        $rattrapages = $rattrapages_model->get_all();

        echo view ('/utils/header', ['page_title' => 'Rattrapages']);
        echo view('rattrapagesVue',['rattrapages' => $rattrapages, 'ressources' => $ressources,'enseignants' => $enseignant, 'etudiants'=>$etudiants]);
        echo view('/utils/footer');
    }

    public function ajouterRattrapage()
    {
        $rattrapages_model = new RattrapageModel();
        $rattrapages_model->ajout();

        $request = \Config\Services::request();
        // Utilisez la classe Email de CodeIgniter pour envoyer l'e-mail
        $emailService = \Config\Services::email();
        //paramètres du mail
        $from ='noreply@code.com';
        $to = $request->getPost('email');

        $compte_model = new CompteModel();
        $emailenseignant = $compte_model->get_email_by_id($request->getPost('enseignant'));

        //envoi du mail
        $emailService->setTo($emailenseignant);
        $emailService->setFrom($from);
        $emailService->setSubject("Assignation du DS : ".$request->getPost('nom'));

        $etudiant_model = new EtudiantModel();

        $msg="  <div style=\"font-family: sans-serif;\">
                <h1>Rattrapage du DS : ".$request->getPost('nom')." en ".$request->getPost('ressource').
            "   </h1><p>Bonjour ".$compte_model->get_nom_by_id($request->getPost('enseignant')).",".
            "   <p>Vous êtes invité à confirmer le rattrapage de votre DS : ".$request->getPost('nom')." en ".$request->getPost('ressource').
            "   <p>
                    <a href=\"http://localhost:8080/\" style=\"background-color: #BB4F21;
                    border: none;
                    color: white;
                    margin-left: 10vh;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    \">Aller sur le site</a>
                <p>".
            "   <p>Voici les étudiants avec une absence justifié : ".
            "   <table style=\"text-align: center\">
                <tr>
                    <th style=\"width: 15vh\">Prénom</th>
                    <th style=\"width: 15vh\">Nom</th>
                    <th style=\"width: 15vh\">Classe</th>
                </tr>";
        if ($request->getPost('etudiantsJustifie') != null)
            foreach($request->getPost('etudiantsJustifie') as $id){
                $msg .= "<tr>
                            <td>" . $etudiant_model->get_nom_by_id($id) . "</td>
                            <td>" . $etudiant_model->get_prenom_by_id($id) . "</td>
                            <td>" . $etudiant_model->get_classe_by_id($id) . "</td></tr>";
            }

        $msg .= "   </table></p>
                    <p>Cordialement,<br>
                    <img src=\"https://www.univ-lehavre.fr/wp-content/uploads/2018/11/logo-univ-rvb.jpg\" alt=\"Logo Université du Havre\" style=\"width: 20vh\">
                    <br>
                    <strong>Directeur des études</strong>
                    </div>";

        $emailService->setMessage('Vous avez été assigné au DS : '.$request->getPost('nom').$msg);
        $emailService->send();

        return redirect()->to('/rattrapages');
    }

    public function modifierRattrapagesView($id)
    {
        $session = session();

        if (!$session->get('isLoggedIn'))
        {
            return redirect()->to('/');
        }

        $rattrapages_model = new RattrapageModel();

        $checkIfRattrapageExist = $rattrapages_model->get($id);
        if($checkIfRattrapageExist == null)
            return redirect()->to('/rattrapages');

        $rattrapage = $rattrapages_model->get($id);

        $ressource_model = new RessourceModel();
        $ressources = $ressource_model->get_all();

        $compte_model = new CompteModel();
        $enseignant = $compte_model->get_all();

        $etudiant_model = new EtudiantModel();
        $etudiants = $etudiant_model->get_all();

        echo view ('/utils/header');

        if(session()->get('isDirecteur') == "t")
            echo view('modifRattrapageDirectVue',['rattrapage' => $rattrapage, 'ressources' => $ressources,'enseignants' => $enseignant, 'etudiants'=>$etudiants]);
        else
            echo view('modifRattrapageEnseigVue',['rattrapage' => $rattrapage, 'ressources' => $ressources,'enseignants' => $enseignant, 'etudiants'=>$etudiants]);
        
        echo view('/utils/footer');
    }

    public function updateRattrapageDirecteur()
    {
        $rattrapages_model = new RattrapageModel();
        $rattrapages_model->majDirecteur();
        return redirect()->to('/rattrapages');
    }

    public function updateRattrapageEnseignant()
    {
        $rattrapages_model = new RattrapageModel();
        $rattrapages_model->majEnseignant();

        $request = \Config\Services::request();
        // Utilisez la classe Email de CodeIgniter pour envoyer l'e-mail
        $emailService = \Config\Services::email();


        //paramètres du mail
        $from ='noreply@code.com';
        $to = $request->getPost('email');

        $etudiant_model = new EtudiantModel();

        $ressource_model = new RessourceModel();

        $lstetudiant = $rattrapages_model->get_etudiant_by_id($request->getPost('id_rattrapage'));

        $ressource_ratra = $rattrapages_model->get_ressource_by_id($request->getPost('id_rattrapage'));
        $nom_ratra = $rattrapages_model->get_nom_by_id($request->getPost('id_rattrapage'));
        $duree_ratra = $rattrapages_model->get_duree_by_id($request->getPost('id_rattrapage'));
        $enseignid_ratra = $rattrapages_model->get_enseignant_by_id($request->getPost('id_rattrapage'));

        $compte_model = new CompteModel();

        $enseign_ratra = $compte_model->get_nom_by_id($enseignid_ratra);


        $string = trim($lstetudiant, '{}');
        $array=explode(',',$string);
        foreach($array as $etu){
            $emailetudiant = $etudiant_model->get_email_by_id($etu);            
            //envoi du mail
            $emailService->setTo($emailetudiant);
            $emailService->setFrom($from);
            $emailService->setSubject("Rattrapage du DS : ".$nom_ratra);
            $emailService->setMessage(
            "   <div style=\"font-family: sans-serif;\">
                    <h1>Rattrapage du DS : ".$nom_ratra." en ".$ressource_ratra. "</h1>
                    <p>Bonjour,</p>
                    <p>Vous êtes invité à rattraper le DS : ".$nom_ratra." en ".$ressource_ratra.".</p>
                    <p>Voici les informations liées au DS qui vous est proposé de rattraper :
                        <table style=\"text-align: center; border:1px solid black;\">
                            <tr>
                                <th style=\"width: 15vh;\"></th>
                                <th style=\"width: 20vh;border:1px solid black;\">Informations</th>
                            </tr>
                            <tr>
                                <td  style=\"font-weight: bold;border:1px solid black;\">Nom</td>
                                <td>".$nom_ratra."</td>
                            </tr>
                            <tr>
                                <td  style=\"font-weight: bold;border:1px solid black;\">Ressource</td>
                                <td>".$ressource_ratra."</td>
                            </tr>
                            <tr>
                                <td  style=\"font-weight: bold;border:1px solid black;\">Salle</td>
                                <td>".$request->getPost('salle')."</td>
                            </tr>
                            <tr>
                                <td  style=\"font-weight: bold;border:1px solid black;\">Date de rattrapage</td>
                                <td>".$request->getPost('dateRattrapage')."</td>
                            </tr>
                            <tr>
                                <td  style=\"font-weight: bold;border:1px solid black;\">Durée</td>
                                <td>".$duree_ratra."</td>
                            </tr>
                        </table>
                    </p>

                    <br>

                    <p>
                        Cordialement,<br>
                        <img src=\"https://www.univ-lehavre.fr/wp-content/uploads/2018/11/logo-univ-rvb.jpg\" alt=\"Logo Université du Havre\" style=\"width: 20vh\">
                        <br>
                        <strong>".$enseign_ratra."</strong>

                </div>");
            $emailService->send();
        }

        return redirect()->to('/rattrapages');
    }

    public function supprimerRattrapage($id)
    {
        $rattrapages_model = new RattrapageModel();
        $rattrapages_model->supprimer($id);
        return redirect()->to('/rattrapages');
    }

    public function getAllRessource()
    {
        $ressource_model = new RessourceModel();
        $ressources = $ressource_model->get_all();
        $arra= array('test'=>"test");
        return json_encode($arra);
    }
    
    
       
    
}
