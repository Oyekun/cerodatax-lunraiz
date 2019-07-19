<?php

        /**
 * NombreClase
 *
 * @package     rh
 * @subpackage  ClaveImpuntualidad
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_rh_claveimpuntualidad extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'codigo'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'nombre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'justificada'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'date_created' => array(
                                'type' => 'TIMESTAMP',  
                                'null' => FALSE,    
                        ),
                                'date_updated' => array(
                                'type' => 'TIMESTAMP',  
                                'null' => FALSE,    
                        ),
                                'created_from_ip' => array(
                                'type' => 'VARCHAR',  
                                'constraint' => '100',
                                'null' => FALSE,    
                        ),
                                'updated_from_ip' => array(
                                'type' => 'VARCHAR',  
                                'constraint' => '100',
                                'null' => FALSE,    
                        )
        ));
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('rh_claveimpuntualidad');
               
    }

    public function down() {
        $this->dbforge->drop_table('rh_claveimpuntualidad');
    }

}