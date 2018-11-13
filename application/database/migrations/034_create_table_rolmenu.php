 <?php

        /**
 * NombreClase
 *
 * @package     Nomenclador
 * @subpackage  Persona
 * @category    Sexo
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_rolmenu extends CI_Migration {

    public function up() {

         $this->dbforge->drop_table('seguridad_menurol',TRUE);

 $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'unsigned'       => TRUE,
            ),
            'menu_id' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unsigned'   => TRUE
            ),
            'rol_id' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unsigned'   => TRUE
            ),  
                         'date_created' => array(
                                'type' => 'TIMESTAMP',  
                                'null' => TRUE,    
                        ),
                         'date_updated' => array(
                                'type' => 'TIMESTAMP',  
                                'null' => TRUE,    
                        ),
                          'created_from_ip' => array(
                                'type' => 'VARCHAR',  
                                'constraint' => '100',
                                'null' => TRUE,    
                        ),
                          'updated_from_ip' => array(
                                'type' => 'VARCHAR',  
                                'constraint' => '100',
                                'null' => TRUE,    
                        )
        ));
                $this->dbforge->add_key('menu_id');
                $this->dbforge->add_field('CONSTRAINT seguridad_menu_id FOREIGN KEY (menu_id) REFERENCES configuracion_menu (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('persona_id');
                $this->dbforge->add_field('CONSTRAINT seguridad_rol_id FOREIGN KEY (rol_id) REFERENCES seguridad_rol (id) ON UPDATE CASCADE ON DELETE CASCADE');
                
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('seguridad_menurol');
    }
}