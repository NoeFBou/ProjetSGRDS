<?php
namespace App\Models;
use CodeIgniter\Model;

class RattrapageModel extends Model
{
    protected $table = 'Rattrapage';

    protected $allowedFields = ['id_rattrapage', 'nom', 'ressource','semestre', 'enseignant', 'etat', 'salle', 'type', 'dateDS','dateRattrapage', 'duree', 'commentaire', 'etudiantsJustifie', 'etudiantsNonJustifie'];
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_rattrapage';


    public function __construct()
    {
        // super()
        parent::__construct(); 
        // création de la table si elle n'existe pas déjà
        $this->forge = \Config\Database::forge();
        $this->db = \Config\Database::connect();

        if (!$this->db->tableExists($this->table))
        {
        $fields = [
            'id_rattrapage' => [
                'type' => 'INT',
                'constraint' => 100,
                'auto_increment' => true,
            ],
            'nom' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            ],
            'ressource' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                ],
            'semestre' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                ],
            'enseignant' => [
                'type' => 'INTEGER',
                'constraint' => 100,
                ],
            'etat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                ],
            'salle' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'=>true,
                ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                ],
            'dateDS' => [
                'type' => 'TIMESTAMP',
                'constraint' => 100,
                ],
            'dateRattrapage' => [
                'type' => 'TIMESTAMP',
                'constraint' => 100,
                'null'=>true,
                ],
            'duree' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                ],
            'commentaire' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null'=>true,
                ],
            'etudiantsJustifie' => [
                'type' => 'INTEGER[]',
                'null'=>true,
                ],
            'etudiantsNonJustifie' => [
                'type' => 'INTEGER[]',
                'null'=>true,
            ],
                    
        ];




        $this->forge->addField($fields);
        $this->forge->addKey('id_rattrapage', TRUE); // clé primaire
        $this->forge->addForeignKey('enseignant','Compte','id_utilisateur'); // clé étrangère
        $this->forge->createTable($this->table, TRUE);
        }


    }

    public function get_all(){

        return $this->orderBy('id_rattrapage')->findAll();
    }

    public function get($id){

        return $this->where('id_rattrapage', $id)->first();
    }

    public function ajout()
    {
        $request = \Config\Services::request();

        $etudiantsJustifie='{}';
        $etudiantsNonJustifie='{}';
        if ($request->getPost('etudiantsJustifie') !=null)
            $etudiantsJustifie = '{'.implode(',',$request->getPost('etudiantsJustifie')).'}';

        if ($request->getPost('etudiantsNonJustifie') !=null)
            $etudiantsNonJustifie = '{'.implode(',',$request->getPost('etudiantsNonJustifie')).'}';

        $data = [
            'nom' => $request->getPost('nom'),
            'ressource' => $request->getPost('ressource'),
            'semestre' => $request->getPost('semestre'),
            'enseignant' => $request->getPost('enseignant'),
            'etat' => 'En cours',
            'salle' => NULL,
            'type' => $request->getPost('type'),
            'dateDS' => $request->getPost('dateDS'),
            'dateRattrapage' => NULL,
            'duree' => $request->getPost('duree'),
            'commentaire' => NULL,
            'etudiantsJustifie' => $etudiantsJustifie,
            'etudiantsNonJustifie' => $etudiantsNonJustifie,  
        ];

        $this->insert($data);

     


    }

    public function majDirecteur()
    {
        $request = \Config\Services::request();
        
        $etudiantsJustifie='{}';
        $etudiantsNonJustifie='{}';
        
        if ($request->getPost('etudiantsJustifie') !=null)
            $etudiantsJustifie = '{'.implode(',',$request->getPost('etudiantsJustifie')).'}';
        if ($request->getPost('etudiantsNonJustifie') !=null)
            $etudiantsNonJustifie = '{'.implode(',',$request->getPost('etudiantsNonJustifie')).'}';

        $data = [
            'nom' => $request->getPost('nom'),
            'ressource' => $request->getPost('ressource'),
            'semestre' => $request->getPost('semestre'),
            'enseignant' => $request->getPost('enseignant'),
            'type' => $request->getPost('type'),
            'dateDS' => $request->getPost('dateDS'),
            'duree' => $request->getPost('duree'),
            'etudiantsJustifie' => $etudiantsJustifie,
            'etudiantsNonJustifie' => $etudiantsNonJustifie,
        ];
        $this->where('id_rattrapage', $request->getPost('id_rattrapage'))->set($data)->update();
    
    }

    public function majEnseignant()
    {
        $request = \Config\Services::request();
        $data = [
            'etat' => $request->getPost('etat'),
            'salle' => $request->getPost('salle'),
            'dateRattrapage' => $request->getPost('dateRattrapage'),
            'commentaire' => $request->getPost('commentaire'),
        ];
        $this->where('id_rattrapage', $request->getPost('id_rattrapage'))->set($data)->update();
    }

    public function supprimer($id_rattrapage, bool $purge = false)
    {
        if (!is_null($id_rattrapage)){
            return $this->builder()->where('id_rattrapage', $id_rattrapage)->delete();
        }
        return false;
    }

    public function get_by_enseignant($enseignant)
    {
        return $this->where('enseignant', $enseignant)->findAll();
    }

    public function get_by_semestre($semestre, $enseignant)
    {
        return $this->where('semestre', $semestre)->where('enseignant', $enseignant)->findAll();
    }

    public function get_by_etat_by_enseignant($etat, $enseignant)
    {
        return $this->where('etat', $etat)->where('enseignant', $enseignant)->findAll();
    }

    public function get_by_etudiant($etudiant)
    {
        return $this->where('etudiants', $etudiant)->findAll();
    }

    public function get_by_ressource_by_enseignant($ressource, $enseignant)
    {
        return $this->where('ressourcehttps://prod.liveshare.vsengsaas.visualstudio.com/join?E9749E1CA675D86A983A2EF9C8E711A4C969', $ressource)->findAll();
    }

    public function get_by_ressource($ressource)
    {
        return $this->where('ressource', $ressource)->findAll();
    }

    public function get_by_etat($etat)
    {
        return $this->where('etat', $etat)->findAll();
    }

    public function count_nb_rattrapages()
    {
        return $this->countAll();
    }
    public function get_etudiant_by_id($id)
    {
        return $this->where('id_rattrapage', $id)->first()['etudiantsJustifie'];
    }
    public function get_ressource_by_id($id){
        return $this->where('id_rattrapage', $id)->first()['ressource'];
    }
    public function get_nom_by_id($id){
        return $this->where('id_rattrapage', $id)->first()['nom'];
    }
    public function get_duree_by_id($id){
        return $this->where('id_rattrapage', $id)->first()['duree'];
    }

    public function get_enseignant_by_id($id){
        return $this->where('id_rattrapage', $id)->first()['enseignant'];
    }

}