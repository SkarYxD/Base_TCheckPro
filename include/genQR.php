<?php
				class QRGenerator { 

				    protected $size; 
				    protected $data; 
				    protected $encoding; 
				    protected $errorCorrectionLevel; 
				    protected $marginInRows; 
				    protected $debug; 

				    public function __construct($data='',$size='200') { 

				        $this->data=urlencode($data); 
				        $this->size=($size>100 && $size<800)? $size : 120; 
				       
				    }
					public function generate(){ 

				        $QRLink = "https://chart.googleapis.com/chart?cht=qr&chs=".$this->size."x".$this->size.                            "&chl=" . $this->data .  
				                   "&choe=" . $this->encoding . 
				                   "&chld=" . $this->errorCorrectionLevel . "|" . $this->marginInRows; 
				        if ($this->debug) echo   $QRLink;          
				        return $QRLink; 
				    }
					}
					$ra=rand();
					$ex3 = new QRGenerator($ra,100,'ISO-8859-1'); 
					echo "<img src=".$e=$ex3->generate().">";
		

?>
