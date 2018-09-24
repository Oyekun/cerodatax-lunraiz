

<?php
/**
 * Niveleducacional
 *
 * @package     Nomenclador
 * @subpackage  Persona
 * @category    Category
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Init_api_rest extends CI_Migration {

        public function up()
        {
             $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'INT',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                                'user_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'null' => FALSE,
                        ),
                                'key' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,

                        ),      'level' => array(
                                'type' => 'INT',
                                'constraint' => '2', 
                                'null' => FALSE,
                        ),
                                'ignore_limits' => array(
                                'type' => 'INT',
                                'constraint' => '2', 
                                'null' => FALSE,
                                'default'=>0
                        ),
                                'is_private_key' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'null' => FALSE,
                                'default'=>0
                        ),
                                'ip_addresses' => array(
                                'type' => 'VARCHAR',
                                'null' => TRUE,
                        ),
                             
                                'date_created' => array(
                                'type' => 'INT',
                                'constraint' => '11', 
                                'null' => FALSE,
                        ),                
                ));
                $this->dbforge->add_key('id', TRUE); 
                $this->dbforge->create_table('rest_keys',TRUE);

 
                 $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'INT',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                                'uri' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                                'null' => FALSE,
                        ),
                                'method' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 6,
                                'null' => FALSE,
                        ),
                                'params' => array(
                                'type' => 'VARCHAR',
                                 
                                 'default'=> NULL
                        ),
                                'api_key' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,

                        ),      'ip_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '45', 
                                'null' => FALSE,
                        ),
                                'time' => array(
                                'type' => 'INT',
                                'constraint' => '11', 
                                'null' => FALSE,
                                 
                        ),
                                'rtime' => array(
                                'type' => 'FLOAT', 
                                'default'=> NULL
                        ),
                                'authorized' => array(
                                'type' => 'VARCHAR',
                                 'constraint' => '20',
                                'null' => FALSE,
                        ),
                             
                                'response_code' => array(
                                'type' => 'INT',
                                'constraint' => '3', 
                                'default'=>0
                        ),                
                ));
                $this->dbforge->add_key('id', TRUE); 
                $this->dbforge->create_table('rest_logs',TRUE);
                

 
     
           
         $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'INT',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                                 
                                'key' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,

 						 ),
                                'all_access' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'null' => FALSE,
                                'default'=>0
                       
                        ),      'controller' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50', 
                                'null' => FALSE,
                                'default'=>''
                        ),
                                'date_created' => array(
                                'type' => 'VARCHAR', 
                                'default'=>NULL
                        ),
                                'date_modified' => array(
                                'type' => 'VARCHAR',
                                'default'=>NULL
                        ),
                             
                              
                ));
                $this->dbforge->add_key('id', TRUE); 
                $this->dbforge->create_table('rest_acces',TRUE);


         $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'INT',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                                 
                                'uri' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255', 
                                'null' => FALSE,

 						 ),
                                'count' => array(
                                'type' => 'INT',
                                'constraint' => '10', 
                                'null' => FALSE,
                                 
                       
                        ),      'hour_started' => array(
                                'type' => 'INT',
                                'constraint' => '11', 
                                'null' => FALSE,
                                 
                        ),
                                'api_key' => array(
                                'type' => 'VARCHAR', 
                                'constraint' => '40', 
                                'null' => FALSE,
                                 
                        )
                             
                              
                ));
                $this->dbforge->add_key('id', TRUE); 
                $this->dbforge->create_table('rest_limits',TRUE);
 
        }
        
                    public function down()
        {
            $tb = 'keys';      
            $this->db->delete("$tb");
                 
        }
}