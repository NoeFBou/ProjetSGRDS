<?php
namespace App\Models;
use CodeIgniter\Model;
class EtudiantModel extends Model
{
    protected $table = 'Etudiant';

    protected $allowedFields = ['id_etudiant', 'nom', 'prenom', 'classe', 'email'];
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_etudiant';

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
            'id_etudiant' => [
            'type' => 'INT',
            'constraint' => 100,
            'auto_increment' => true,
            ],
            'nom' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            ],
            'prenom' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            ],
            'classe' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            ],
            'email' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id_etudiant', TRUE); // clé primaire
        $this->forge->createTable($this->table, TRUE);
        }

        

        if(empty($this->orderBy('id_etudiant')->findAll())){
            if (file_exists(APPPATH.'Database/etudiant.csv')){
                $fichier = fopen(APPPATH.'Database/etudiant.csv','r');

                while(($ligne = fgetcsv($fichier)) != false){
                    $data = [
                        'nom' => $ligne[0],
                        'prenom' => $ligne[1],
                        'classe' => $ligne[2],
                        'email' => $ligne[3],
                    ];
                    $this->insert($data);
                }    
                fclose($fichier);
            }
        }

    }

    public function get_all(){
        return $this->orderBy('id_etudiant')->findAll();
    }

    public function ajout($nom,$prenom,$classe,$email){
        $data = [
            'nom' => $nom,
            'prenom' => $prenom,
            'classe' => $classe,
            'email' => $email,
        ];
        $this->insert($data);
    }

    public function get($id)
    {
        return $this->where('id_etudiant', $id)->first();
    }

    public function get_nom_by_id($id)
    {
        return $this->where('id_etudiant', $id)->first()['nom'];
    }

    public function get_prenom_by_id($id)
    {
        return $this->where('id_etudiant', $id)->first()['prenom'];
    }

    public function get_classe_by_id($id)
    {
        return $this->where('id_etudiant', $id)->first()['classe'];
    }

    public function get_email_by_id($id)
    {
        return $this->where('id_etudiant', $id)->first()['email'];
    }
    
    
}