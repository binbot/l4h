<?php
class dbclass{
	private $host = "localhost";
	private $account = "l4hadmin_site";
	private $phppass = "_OEfAUu!#*vA";
	private $dbselect = "LINUX4HOPE";
	public $cxn;

	public function __construct(){
	$this->cxn = mysqli_connect($this->host,$this->account,$this->phppass,$this->dbselect) or die ("Couldn't make connection");
	}

}
?>
