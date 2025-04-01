<?php
namespace App\Models;
use CodeIgniter\Model;

class RessourceModel extends Model
{
    protected $table = 'Ressource';

    protected $allowedFields = ['id_ressource', 'nom', 'semestre'];
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_ressource';

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
            'id_ressource' => [
                'type' => 'INT',
                'constraint' => 100,
                'auto_increment' => true,

                ],
            'nom' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            ],
            'semestre' => [
            'type' => 'INT',
            'constraint' => 10,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id_ressource'); // clé primaire

        $this->forge->createTable($this->table, TRUE);

        }

        if(empty($this->orderBy('id_ressource')->findAll())){
                if (file_exists(APPPATH.'Database/ressource.csv')){
                    $fichier = fopen(APPPATH.'Database/ressource.csv','r');
                    if($fichier){
                        while(($ligne = fgetcsv($fichier)) !== false){
                            $data = [
                                'nom' => $ligne[0],
                                'semestre' => $ligne[1],
                            ];
                            $this->insert($data);
                        }   
                    }
                    fclose($fichier);
                }
            }
    }

    public function get_all(){
        return $this->orderBy('id_ressource')->findAll();
    }

    public function ajout($id, $nom, $semestre)
    {
        $data = [
            'id_ressource' => $id,
            'nom' => $nom,
            'semestre' => $semestre,
        ];
        $this->insert($data);
    }

    public function get($id)
    {
        return $this->where('id_ressource', $id)->first();
    }

    public function addRessource(){
        
    }
}