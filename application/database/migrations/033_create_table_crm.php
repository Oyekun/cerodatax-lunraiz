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

class Migration_create_table_crm extends CI_Migration {

    public function up() {

         $this->dbforge->drop_table('crm_entidadcontacto',TRUE);
        $this->dbforge->drop_table('crm_contacto',TRUE);

        $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                        'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE
                        ),
                         
                        'apellidos' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'foto' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'direccion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'correo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ) ,
                        'celular' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ) ,
                        'telefono' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ) ,
                        'web' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),'pais_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        
                        'provincia_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                         
                        'municipio_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        'entidad_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        'organismo_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
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
                 $this->dbforge->add_key('pais_id');
                $this->dbforge->add_key('provincia_id'); 
                $this->dbforge->add_key('municipio_id');
                 $this->dbforge->add_key('organismo_id'); 
                 $this->dbforge->add_key('entidad_id'); 
                  $this->dbforge->add_field('CONSTRAINT pais_contacto_id FOREIGN KEY (pais_id) REFERENCES nomenclador_pais (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT provincia_contacto_id FOREIGN KEY (provincia_id) REFERENCES nomenclador_provincia (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT municipio_contacto_id FOREIGN KEY (municipio_id) REFERENCES nomenclador_municipio (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT organismo_contacto_id FOREIGN KEY (organismo_id) REFERENCES nomenclador_organismo (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT entidad_contacto_id FOREIGN KEY (entidad_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE');


        $this->dbforge->create_table('crm_contacto');

        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ), 
                                'entidad_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ),  
                                'contacto_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
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
                $this->dbforge->add_key('entidad_id');
                $this->dbforge->add_field('CONSTRAINT entidad_entidadpersona_id FOREIGN KEY (entidad_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('contacto_id');
                $this->dbforge->add_field('CONSTRAINT crm_contacto_id FOREIGN KEY (contacto_id) REFERENCES crm_contacto (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('id', TRUE);  
                $this->dbforge->create_table('crm_entidadcontacto',TRUE);
              
    }

    public function down() {
        $this->dbforge->drop_table('crm_entidadcontacto');
        $this->dbforge->drop_table('crm_contacto');
    }

}