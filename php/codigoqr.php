<?php  
    include "libreria/phpqrcode.php"; 
	class codigoqr{
		private $datos;
		private $imagen;
		public function __construct($datos){
			$this->datos=$datos;
			$nivelerror = 'H';
    		$matrixtamano = 9;
			$PNG_TEMP_DIR = '../imagenes'.DIRECTORY_SEPARATOR.'codigos'.DIRECTORY_SEPARATOR;
    		$PNG_WEB_DIR = '../imagenes/codigos/';
       		if (!file_exists($PNG_TEMP_DIR))mkdir($PNG_TEMP_DIR);
    		$direcctorio = $PNG_TEMP_DIR.'qr'.md5($this->datos.'|'.$nivelerror.'|'.$matrixtamano).'.png';
    		QRcode::png($this->datos, $direcctorio, $nivelerror, $matrixtamano, 2); 
			$this->imagen=$PNG_WEB_DIR.basename($direcctorio);
			$imagen=$this->imagen;
			$img=imagecreatefrompng($imagen);
			imagepng($img,$imagen);
		}
		
		public function setDatos($datos){
			$this->datos=$datos;	
		}
		
		public function getdatos(){
			return $this->datos;	
		}
		public function getImagen(){
			return $this->imagen;
		}
		
		public function verCodigo(){
			echo '<img src= '.$this->imagen.' />';
		}
	}

?> 