<?php
namespace App\Models;
use CodeIgniter\Model;
class CompteModel extends Model
{
    protected $table = 'Compte';

    protected $allowedFields = ['id_utilisateur','nom', 'email', 'password', 'reset_token', 'reset_token_expiration','isDirecteur'];
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_utilisateur';

    public function __construct()
    {
        // super()
        parent::__construct(); 
        // création de la table si elle n'existe pas déjà
        $this->forge = \Config\Database::forge();
        $this->db = \Config\Database::connect();
        // $this->forge->dropTable('Compte', TRUE);
        if (!$this->db->tableExists($this->table))
        {
        $fields = [
            'id_utilisateur' => [
            'type' => 'INT',
            'constraint' => 100,
            'auto_increment' => true,
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                ],
            'email' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            ],
            'password' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            ],
            'reset_token' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            'null' => true,
            ],
            'reset_token_expiration' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            'null' => true,
            ],
            'isDirecteur' => [
            'type' => 'BOOLEAN',
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id_utilisateur', TRUE); // clé primaire
        $this->forge->createTable($this->table, TRUE);
        }
        //$this->forge->dropTable('Compte', TRUE);


        // insérer un compte directeur
        $data = [
            'nom' => 'directeur',
            'email' => 'directeur@gmail.com',
            'password' => password_hash('directeur', PASSWORD_DEFAULT),
            'isDirecteur' => TRUE,
        ];

        $getDirecteurIfExist = $this->where('email', 'directeur@gmail.com')->first();
        if(!$getDirecteurIfExist)
        {
            $this->insert($data);
        }
    }

    public function get_all(){
        return $this->orderBy('id_utilisateur')->findAll();
    }

    public function ajout()
    {
        $request = \Config\Services::request();
        $data = [
            'nom' => $request->getPost('name'),
            'email' => $request->getPost('email'),
            'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
            'isDirecteur' => FALSE,
        ];
        $this->insert($data);
    }

    public function get($id)
    {
        return $this->where('id_utilisateur', $id)->first();
    }

    public function get_email_by_id($id)
    {
        return $this->where('id_utilisateur', $id)->first()['email'];
    }

    public function get_all_enseignants()
    {
        return $this->where('isDirecteur', 'false')->findAll();
    }

    public function get_all_directeurs()
    {
        return $this->where('id_utilisateur', 'true')->findAll();
    }

    public function get_by_email($email){
        return $this->where('email', $email)->first();
    }

    public function get_nom_by_id($id){
        return $this->where('id_utilisateur', $id)->first()['nom'];
    }
}