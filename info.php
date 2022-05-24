<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"> <title>calculator</title></head>
<body>
<?php

class Op{
	protected $f;
	protected $s;
	function __construct($f,$s){
			$this->f=$f;
			$this->s=$s;

	}
	function eval(){}
}

Class plus extends Op{
	function eval(){
			return $this->f+$this->s;
	}
}

Class minus extends Op{
	function eval(){
			return $this->f-$this->s;
	}
}
Class mult extends Op{
	function eval(){
			return $this->f*$this->s;
	}
}
Class divide extends Op{
	function eval(){
			if($this->s==0){
					return "ERROR INPUT! Denominator should not be 0";
			}
			else{
					return $this->f/$this->s;
			}
	}
}

$first = $_GET['first'];
$last = $_GET['second'];

$operation = $_GET['symbol'];
echo "RESULT. <br/>";
echo $first . " " .$operation." ". $last." = ";
if($operation=="plus"){
	$op=new plus($first, $last);
}
else if ($operation=="minus"){
	$op=new minus($first, $last);
}
else if ($operation=='mult'){
	$op= new mult($first, $last);
}
else{
	$op= new divide($first, $last);
}

echo $op->eval();

?>
</body>
</html>