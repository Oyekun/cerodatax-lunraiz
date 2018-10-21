

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
/*
Id: Campo auto incremental.
Key: Serán las api keys que vayamos generando, estas deberán ser únicas.
Level: Podremos dar distintos niveles a nuestros usuarios, por ejemplo level 1 para obtener datos, level 2 para modificar, level 3 para eliminar etc.
Ignore limits: Este campo es muy importante, si lo dejamos en 0, los usuarios no tienen límite de consultas y de acceso a datos, en cambio, si lo dejamos en 1 y creamos las restricciones a nuestros métodos como veremos, se verán limitados a lo que nosotros digamos, super interesante.
Id addresses: Este campo va ligado de la mano de is_private_key, si is_private_key lo dejamos en 1, significa que la api key en cuestión es de acceso privado, para esto está el campo ip_addresses, donde, separadas por comas podremos colocar todas las ips a las que deseemos dar acceso, así de sencillo.
Date created: Simplemente la fecha de creación de la api key.*/
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
                                'ip_address' => array(
                                'type' => 'VARCHAR',
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
                 $this->dbforge->add_key('user_id');
                $this->dbforge->add_field('CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES seguridad_usuario (id) ON UPDATE CASCADE ON DELETE CASCADE');
               
                $this->dbforge->create_table('seguridad_rest_keys',TRUE);

 
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
                $this->dbforge->create_table('seguridad_rest_logs',TRUE);
                

 
     
           
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
                $this->dbforge->create_table('seguridad_rest_acces',TRUE);


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
                $this->dbforge->create_table('seguridad_rest_limits',TRUE);
 
        }
        
                    public function down()
        {
            $tb = 'keys';      
            $this->db->delete("$tb");
                 
        }
}