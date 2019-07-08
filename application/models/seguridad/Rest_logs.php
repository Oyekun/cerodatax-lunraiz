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
class Rest_logs extends CI_Model {
	    public $id;
        public $nombre;  
        public $descripcion;  
          
		public $uuid;
	public function __construct()
        {
                parent::__construct();
                
                                
                                $this->uuid = 'date_created';
        }
}
