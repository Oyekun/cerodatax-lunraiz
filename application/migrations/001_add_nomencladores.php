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


class Migration_Add_nomencladores extends CI_Migration {

        public function up()
        {
               // $attributes = array('ENGINE' => 'InnoDB');
                //Nomencladores
                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'orden' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),      'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),  
                ));
                $this->dbforge->add_key('id', TRUE); 
                $this->dbforge->create_table('nomenclador_calificador',TRUE);
                
                
                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'orden' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),      'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),      'abreviatura' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),  
                ));
                $this->dbforge->add_key('id', TRUE); 
                $this->dbforge->create_table('nomenclador_categoria',TRUE);
                

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),

                                'posicion' => array(
                                'type' => 'INT',
                                'constraint' => '2',
                                'null' => FALSE,
                        ),  
                ));
                $this->dbforge->add_key('id', TRUE);
				 
                $this->dbforge->create_table('nomenclador_categoriaentidad',TRUE);
                

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),      'abreviatura' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_clasificacion',TRUE);
                

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_colorpiel',TRUE);
                

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_defensa',TRUE);
                

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_estadocivil',TRUE);
                

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                      'orden' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                                'salario' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ) 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_grupoescala',TRUE);
                

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                           
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ) 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_gruposanguineo',TRUE);
                
                
                
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                        'orden' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                        'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                         'abreviatura' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),  
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_niveleducacional',TRUE);     

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),

                                'codigo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                                'abreviatura' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_organismo',TRUE);
                        
				
                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_continente',TRUE);
$this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),  'codigo_iso' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_moneda',TRUE);
                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),

                                'codigo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                                'siglas' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),

                            
                                'continente_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ),
                                'moneda_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        )
                ));
                $this->dbforge->add_key('continente_id');
                $this->dbforge->add_field('CONSTRAINT continente_id FOREIGN KEY (continente_id) REFERENCES nomenclador_continente (id) ON UPDATE CASCADE');
                $this->dbforge->add_key('moneda_id');
                $this->dbforge->add_field('CONSTRAINT moneda_id FOREIGN KEY (moneda_id) REFERENCES nomenclador_moneda (id) ON UPDATE CASCADE');
                
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_pais',TRUE);

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                                'siglas' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100', 
                                'null' => FALSE,
                        ),
                                'codigo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100', 
                                'null' => FALSE,
                        ), 
                                'pais_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',                                 
                                'null' => FALSE,
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->add_key('pais_id');
                $this->dbforge->add_field('CONSTRAINT pais_id FOREIGN KEY (pais_id) REFERENCES nomenclador_pais (id) ON UPDATE CASCADE');
                
                $this->dbforge->create_table('nomenclador_provincia',TRUE);
                
                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                
                                'null' => FALSE,
                        ), 
                                'siglas' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100', 
                                'null' => FALSE,
                        ),
                                'codigo' => array(
                                'type' => 'INT',
                                'constraint' => '10', 
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                             
                                'provincia_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        )
                ));
                $this->dbforge->add_key('provincia_id');
                $this->dbforge->add_field('CONSTRAINT provincia_id FOREIGN KEY (provincia_id) REFERENCES nomenclador_provincia (id) ON UPDATE CASCADE');
                $this->dbforge->add_key('id', TRUE);  
                $this->dbforge->create_table('nomenclador_municipio',TRUE);
                        
                
                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),  'abreviatura' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_sexo',TRUE);


                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),

                                'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255', 
                                'null' => FALSE,
                        ) 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_tiporegistro',TRUE);

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),

                                'abreviatura' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),  
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_tipoentidad',TRUE);

              //Nomencladores

 $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',                                 
                                'null' => FALSE,
                        ),
                                'seccion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',                                 
                                'null' => FALSE,
                        ),    

                                'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '4048',
                                'null' => FALSE,
                        ),      
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_seccionnae',TRUE);


                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',                                 
                                'null' => FALSE,
                        ),
                                'division' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',                                 
                                'null' => FALSE,
                        ),    

                                'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '4048',
                                'null' => FALSE,
                        ),        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_divisionnae',TRUE);

                        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',                                 
                                'null' => FALSE,
                        ),
                                'codigo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',                                 
                                'null' => FALSE,
                        ),    

                                'activo' => array(
                                'type' => 'INT',
                                'constraint' => '1',
                                'default' => '0'
                        ),   
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_union',TRUE);
                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ), 
                               
                                'seccionnae_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ),
                                
                                'divisionnae_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ),

                                'clase' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ),
                                 'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,
                        ),    

                                'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '8048',
                                'null' => FALSE,
                        ),  
                         
                ));
                $this->dbforge->add_key('seccionnae_id');
                $this->dbforge->add_field('CONSTRAINT seccionnae_id FOREIGN KEY (seccionnae_id) REFERENCES nomenclador_seccionnae (id) ON UPDATE CASCADE');
                $this->dbforge->add_key('divisionnae_id');
                $this->dbforge->add_field('CONSTRAINT divisionnae_id FOREIGN KEY (divisionnae_id) REFERENCES nomenclador_divisionnae (id) ON UPDATE CASCADE');
                $this->dbforge->add_key('id', TRUE);  
                $this->dbforge->create_table('nomenclador_nae',TRUE);
        

                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                        'version' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                        'fecha_actualizacion' => array(
                                'type' => 'TIMESTAMP',  
                                'null' => FALSE,
                                 
                        ),
                       
                        'usuario_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'null' => FALSE,
                        ),
                        'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255'
                        ),
                         'nombre_fichero' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255'
                        ) 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->add_key('usuario_id');
                //$this->dbforge->add_field('CONSTRAINT usuario_id FOREIGN KEY (seccionnae_id) REFERENCES nomenclador_seccionnae (id) ON UPDATE CASCADE');
               
                $this->dbforge->create_table('actualizacion_actualizacion',TRUE);


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
						'leaf' => array(
                                'type' => 'INT',
                                'constraint' => '1',
                                'default' => '1'
                        ),
                        'orden' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ), 
                       
                        'parent_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE 
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                 $this->dbforge->add_key('parent_id');
                $this->dbforge->add_field('CONSTRAINT parent_id FOREIGN KEY (parent_id) REFERENCES estructura_area (id) ON UPDATE CASCADE');
               
                $this->dbforge->create_table('estructura_area',TRUE);
                

                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                                 
                        ),
                        'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'unique' => FALSE,
                                'null' => FALSE
                        ),
                        'abreviatura' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                 
                                'null' => TRUE
                        ),
                        
                        'tipo_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                        
                        'categoria_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE 
                        ),
                     
                        'municipio_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                       
                        'provincia_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                      
                        'pais_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                        
                        'nae_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                        'codigo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'unique' => TRUE,
                                'null' => TRUE
                        ),
                       
                        'tipo_registro_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                        'codigo_registro' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100', 
                                'null' => TRUE,
                                 'unique' => TRUE,
                        ),
                       
                        'perfercionamiento' => array(
                                'type' => 'INT',
                                'constraint' => '1',
                                'default' => '0'
                        ),
                        'telefono' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'null' => TRUE
                        ),
                        'correo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'null' => TRUE
                        ),
                        'direccion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                        
                        'clasificacion_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                        'logotipo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                       
                        'organismo_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                      
                        'union_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                         'fecha_alta' => array(
                                'type' => 'DATE',  
                                'null' => TRUE,
                        ),
						'leaf' => array(
                                'type' => 'INT',
                                'constraint' => '1',
                                'default' => '1'
                        ),
                        'codigo_parent' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100', 
                                'null' => TRUE,
                                  
                        ),
                       
                        'parent_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
								//'default' => 'root'
                        )
						

                ));
                $this->dbforge->add_key('tipo_id');
                $this->dbforge->add_key('tipo_registro_id');
                $this->dbforge->add_key('categoria_id');
                $this->dbforge->add_key('pais_id');
                $this->dbforge->add_key('provincia_id'); 
                $this->dbforge->add_key('municipio_id');
                $this->dbforge->add_key('nae_id');
                $this->dbforge->add_key('clasificacion_id'); 
                $this->dbforge->add_key('organismo_id'); 
                $this->dbforge->add_key('union_id'); 
                $this->dbforge->add_key('parent_id'); 
                $this->dbforge->add_field('CONSTRAINT tipo_id FOREIGN KEY (tipo_id) REFERENCES nomenclador_tipoentidad (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT tipo_registro_id FOREIGN KEY (tipo_registro_id) REFERENCES nomenclador_tiporegistro (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT categoria_id FOREIGN KEY (categoria_id) REFERENCES nomenclador_categoriaentidad (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT pais_id FOREIGN KEY (pais_id) REFERENCES nomenclador_pais (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT provincia_id FOREIGN KEY (provincia_id) REFERENCES nomenclador_provincia (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT municipio_id FOREIGN KEY (municipio_id) REFERENCES nomenclador_municipio (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT nae_id FOREIGN KEY (nae_id) REFERENCES nomenclador_nae (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT clasificacion_id FOREIGN KEY (clasificacion_id) REFERENCES nomenclador_clasificacion (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT organismo_id FOREIGN KEY (organismo_id) REFERENCES nomenclador_organismo (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT union_id FOREIGN KEY (union_id) REFERENCES nomenclador_union (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT parent_id FOREIGN KEY (parent_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE');
                 
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('estructura_entidad',TRUE);

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
                                'area_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        )
						 
                ));
                $this->dbforge->add_key('entidad_id');
                $this->dbforge->add_field('CONSTRAINT entidad_id FOREIGN KEY (entidad_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE');
                $this->dbforge->add_key('area_id');
                $this->dbforge->add_field('CONSTRAINT area_id FOREIGN KEY (area_id) REFERENCES estructura_area (id) ON UPDATE CASCADE');
                $this->dbforge->add_key('id', TRUE);  
                $this->dbforge->create_table('estructura_areaentidad',TRUE);
                
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                                 
                        ),
                        'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                        'nivel_educacional_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                         'categoria_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                         'calificador_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
 
                        'periodo_prueba' => array(
                                'type' => 'INT',
                                'constraint' => '3',
                                'null' => TRUE,      
                        ),
                        'funcionario' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'default' => '0',
                        ),  
                        'grupoescala_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        )

                )); 
                $this->dbforge->add_key('nivel_educacional_id');
                $this->dbforge->add_key('categoria_id');
                $this->dbforge->add_key('calificador_id'); 
                $this->dbforge->add_key('grupoescala_id');  
                $this->dbforge->add_field('CONSTRAINT nivel_educacional_id FOREIGN KEY (nivel_educacional_id) REFERENCES nomenclador_niveleducacional (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT categoria_id FOREIGN KEY (categoria_id) REFERENCES nomenclador_categoria (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT calificador_id FOREIGN KEY (calificador_id) REFERENCES nomenclador_calificador (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT grupoescala_id FOREIGN KEY (grupoescala_id) REFERENCES nomenclador_grupoescala (id) ON UPDATE CASCADE');
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('persona_cargo',TRUE);
                
                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '2048',        
                                'null' => FALSE,
                        ), 
                                'cargo_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ), 
                ));
                $this->dbforge->add_key('cargo_id');  
                $this->dbforge->add_field('CONSTRAINT cargo_id FOREIGN KEY (cargo_id) REFERENCES persona_cargo (id) ON UPDATE CASCADE');
               
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('persona_cargofuncion',TRUE);
 

                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'accion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('seguridad_accion',TRUE);
                
                
              
                
                
                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'rol' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                                'habilitado' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'default' => '0',
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('seguridad_rol',TRUE);		
		 
		$this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                                 
                        ),
                        'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                        'carnet_identidad' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '11',
                                'unique' => TRUE,
                                'null' => FALSE
                        ),
						
                        'edad' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'null' => TRUE
                        ),
                      
                        'sexo_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                        'apellidos' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                       
                        'estado_civil_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                       
                        'color_piel_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),  
                        'padre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ), 
                        'madre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),

                        'tomo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '3',
                                'null' => TRUE
                        ),

                        'folio' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '3',
                                'null' => TRUE
                        ), 
                        'ano' => array(
                                'type' => 'DATE',
                                'null' => TRUE
                                
                        ),
                        'telefono' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'null' => TRUE
                        ),
						
                        'celular' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'null' => TRUE
                        ),
                        'correo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'null' => TRUE
                        ),
                        'direccion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                 'null' => FALSE
                        ),
                        'estatura' => array(
                                'type' => 'FLOAT',
                                'constraint' => '5',
                                'null' => TRUE
                        ),
                        'peso' => array(
                                'type' => 'FLOAT',
                                'constraint' => '5',
                                'null' => TRUE
                        ),

                      
                        'pais_id' => array(
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
                        
                         'nivel_educacional_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        
                          'situacion_defensa_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        'foto' => array(
                                'type' => 'TEXT',
                                 
                                'null' => TRUE
                        ),
                        'donante' => array(
                                'type' => 'INT',
                                'constraint' => '1',
                                'null' => TRUE
                        ),

                        'trabaja' => array(
                                'type' => 'INT',
                                'constraint' => '1',
                                'null' => TRUE
                        ),
                        'fecha_nacimiento' => array(
                                'type' => 'DATE',  
                                'null' => TRUE,
                        ),
                         'cantidad_hijos' => array(
                                'type' => 'INT',
                                'constraint' => '1',
                                'null' => TRUE 

                        ),
                        
                          'grupo_sanguineo_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                           'organismo_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                       
                        'pais_registro_civil_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
						
                       
                        'provincia_registro_civil_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
						
                       
                        'municipio_registro_civil_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),

                ));
        
                $this->dbforge->add_key('sexo_id');
                $this->dbforge->add_key('estado_civil_id');
                $this->dbforge->add_key('color_piel_id');
                $this->dbforge->add_key('pais_id');
                $this->dbforge->add_key('provincia_id'); 
                $this->dbforge->add_key('municipio_id');
                $this->dbforge->add_field('CONSTRAINT sexo_id FOREIGN KEY (sexo_id) REFERENCES nomenclador_sexo (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT estado_civil_id FOREIGN KEY (estado_civil_id) REFERENCES nomenclador_estadocivil (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT color_piel_id FOREIGN KEY (color_piel_id) REFERENCES nomenclador_colorpiel (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT pais_id FOREIGN KEY (pais_id) REFERENCES nomenclador_pais (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT provincia_id FOREIGN KEY (provincia_id) REFERENCES nomenclador_provincia (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT municipio_id FOREIGN KEY (municipio_id) REFERENCES nomenclador_municipio (id) ON UPDATE CASCADE');

                $this->dbforge->add_key('pais_registro_civil_id');
                $this->dbforge->add_key('provincia_registro_civil_id'); 
                $this->dbforge->add_key('municipio_registro_civil_id');
                $this->dbforge->add_field('CONSTRAINT pais_registro_civil_id FOREIGN KEY (pais_registro_civil_id) REFERENCES nomenclador_pais (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT provincia_registro_civil_id FOREIGN KEY (provincia_registro_civil_id) REFERENCES nomenclador_provincia (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT municipio_registro_civil_id FOREIGN KEY (municipio_registro_civil_id) REFERENCES nomenclador_municipio (id) ON UPDATE CASCADE');

                $this->dbforge->add_key('nivel_educacional_id'); 
                $this->dbforge->add_key('situacion_defensa_id'); 
                $this->dbforge->add_key('grupo_sanguineo_id');
                $this->dbforge->add_key('entidad_id');
                $this->dbforge->add_key('organismo_id'); 
                $this->dbforge->add_field('CONSTRAINT nivel_educacional_id FOREIGN KEY (nivel_educacional_id) REFERENCES nomenclador_niveleducacional (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT situacion_defensa_id FOREIGN KEY (situacion_defensa_id) REFERENCES nomenclador_defensa (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT grupo_sanguineo_id FOREIGN KEY (grupo_sanguineo_id) REFERENCES nomenclador_gruposanguineo (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT organismo_id FOREIGN KEY (organismo_id) REFERENCES nomenclador_organismo (id) ON UPDATE CASCADE');
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('persona_persona',TRUE);

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
                                'persona_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        )
                         
                ));
                $this->dbforge->add_key('entidad_id');
                $this->dbforge->add_field('CONSTRAINT entidad_id FOREIGN KEY (entidad_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('persona_id');
                $this->dbforge->add_field('CONSTRAINT persona_id FOREIGN KEY (persona_id) REFERENCES persona_persona (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('id', TRUE);  
                $this->dbforge->create_table('persona_entidadpersona',TRUE);



                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'usuario' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                                'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                 
                                'null' => FALSE,
                        ),
                                'correo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                'null' => TRUE 
                        ),
                        
                                'persona_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),

                                'organismo_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                                'administrador' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'default' => '0',
                        ),
                                'habilitado' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'default' => '0',
                        ), 
                                'ldap' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'default' => '0',
                        ), 
                ));
                $this->dbforge->add_key('id', TRUE);
                 $this->dbforge->add_key('persona_id');
                 $this->dbforge->add_key('organismo_id');
                $this->dbforge->add_field('CONSTRAINT persona_id FOREIGN KEY (persona_id) REFERENCES persona_persona (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT organismo_id FOREIGN KEY (organismo_id) REFERENCES nomenclador_organismo (id) ON UPDATE CASCADE');
               
                $this->dbforge->create_table('seguridad_usuario',TRUE);  

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
                                'usuario_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        )
                         
                ));
                $this->dbforge->add_key('entidad_id');
                $this->dbforge->add_field('CONSTRAINT entidad_id FOREIGN KEY (entidad_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('usuario_id');
                $this->dbforge->add_field('CONSTRAINT usuario_id FOREIGN KEY (usuario_id) REFERENCES seguridad_usuario (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('id', TRUE);  
                $this->dbforge->create_table('seguridad_entidadusuario',TRUE);

                  $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),

                                'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255', 
                                'null' => FALSE,
                        ) 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('nomenclador_icono',TRUE);

                


                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),

                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                                
                                'orden' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),

                                'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255', 
                                'null' => FALSE,
                        ) 
                ));
                $this->dbforge->add_key('id', TRUE);
                
                $this->dbforge->create_table('nomenclador_tipomodulo',TRUE);

         
               
               
                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => FALSE,
                                'null' => FALSE,
                        ),

                                'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255', 
                                'null' => FALSE,
                        ),
                                'icono_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
 

                                'orden' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                
                                'null' => FALSE,
                        ),

                                'tipo_modulo_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                                'activo' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'default' => '0',
                        ) 
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->add_key('tipo_modulo_id');
                $this->dbforge->add_key('icono_id');
                $this->dbforge->add_field('CONSTRAINT icono_id FOREIGN KEY (icono_id) REFERENCES nomenclador_icono (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT tipo_modulo_id FOREIGN KEY (tipo_modulo_id) REFERENCES nomenclador_tipomodulo (id) ON UPDATE CASCADE');
               
                $this->dbforge->create_table('configuracion_modulo',TRUE);  
                

                  $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),

                                'descripcion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255', 
                                'null' => FALSE,
                        ),

                                'icono_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),

                                'orden' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                 
                                'null' => FALSE,
                        ),
                                'modulo_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),

                                'id_menu' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),


 
                                'tabpanel' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'default' => '0',
                        ),

 
                                'activo' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'default' => '0',
                        ) 
                ));
                $this->dbforge->add_key('id', TRUE); 
                $this->dbforge->add_key('icono_id');
                $this->dbforge->add_key('modulo_id');
                 
                $this->dbforge->add_field('CONSTRAINT modulo_id FOREIGN KEY (modulo_id) REFERENCES configuracion_modulo (id) ON UPDATE CASCADE');
                $this->dbforge->add_field('CONSTRAINT icono_id FOREIGN KEY (icono_id) REFERENCES nomenclador_icono (id) ON UPDATE CASCADE');
               
                $this->dbforge->create_table('configuracion_menu',TRUE);  

                                $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ),
                                'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                                'orden' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                
                                'null' => FALSE,

                        ),      'id_contenedor' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                                'alias' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),

                                'menu_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),

                                
                                'activo' => array(
                                'type' => 'INT',
                                'constraint' => '1', 
                                'default' => '0',
                        )

                ));
                $this->dbforge->add_key('id', TRUE); 
                 $this->dbforge->add_key('menu_id');
                $this->dbforge->add_field('CONSTRAINT menu_id FOREIGN KEY (menu_id) REFERENCES configuracion_menu (id) ON UPDATE CASCADE');
                $this->dbforge->create_table('configuracion_panel',TRUE);

                
                 		
        }

        public function down()
        {
                $this->dbforge->drop_table('actualizacion_actualizacion',TRUE);
                $this->dbforge->drop_table('estructura_area',TRUE);
                $this->dbforge->drop_table('estructura_entidad',TRUE);
                $this->dbforge->drop_table('estructura_areaentidad',TRUE);
                $this->dbforge->drop_table('estructura_entidadpersona',TRUE);
                $this->dbforge->drop_table('nomenclador_calificador',TRUE);
                $this->dbforge->drop_table('nomenclador_categoria',TRUE);
                $this->dbforge->drop_table('nomenclador_categoriaentidad',TRUE);
                $this->dbforge->drop_table('nomenclador_clasificacion',TRUE);
                $this->dbforge->drop_table('nomenclador_colorpiel',TRUE);
                $this->dbforge->drop_table('nomenclador_defensa',TRUE);
                $this->dbforge->drop_table('nomenclador_estadocivil',TRUE);
                $this->dbforge->drop_table('nomenclador_grupoescala',TRUE);
                $this->dbforge->drop_table('nomenclador_gruposanguineo',TRUE);
                $this->dbforge->drop_table('nomenclador_municipio',TRUE);
                $this->dbforge->drop_table('nomenclador_niveleducacional',TRUE);
                $this->dbforge->drop_table('nomenclador_organismo',TRUE);
                $this->dbforge->drop_table('nomenclador_continente',TRUE);
                $this->dbforge->drop_table('nomenclador_pais',TRUE);
                $this->dbforge->drop_table('nomenclador_provincia',TRUE);
                $this->dbforge->drop_table('nomenclador_sexo',TRUE);
                $this->dbforge->drop_table('nomenclador_tipoentidad',TRUE);
                $this->dbforge->drop_table('nomenclador_seccionnae',TRUE);
                $this->dbforge->drop_table('nomenclador_divisionnae ',TRUE);
                $this->dbforge->drop_table('nomenclador_nae',TRUE);
                $this->dbforge->drop_table('persona_cargo',TRUE);
                $this->dbforge->drop_table('persona_persona',TRUE);
                $this->dbforge->drop_table('seguridad_accion',TRUE);
                $this->dbforge->drop_table('seguridad_modulo',TRUE);
                $this->dbforge->drop_table('seguridad_rol',TRUE);
                $this->dbforge->drop_table('seguridad_usuario',TRUE);
                 $this->dbforge->drop_table('configuracion_modulo',TRUE);
                
}
}