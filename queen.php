<?php
/**
* 
*/
class Queen
{
	
	public $num;
	
	private $array;

	public function __construct(){
		$this->num = 0;
		$this->array = [1,2,3,4,5,6,7,8];
	}

	public function main(){
		$this->fun($this->array,1,[]);
		echo $this->num;

	}

	public function fun($array,$num,$arrayDone=[]){
		$array_def = $array;
		while(current($array)){
			// 备份数据
			$arrayDone_def = $arrayDone;
			$num_def = $num;
			$token = 0;

			// 正对斜角的重复
			if($num>1){
				for ($i=1; $i < $num; $i++) {
					$tang = $arrayDone_def;$tang[]=current($array);

					if(abs(($num-$i))==abs((current($array)-$arrayDone[$i-1]))){
						$token =1;
						break;
					}
				}
				if($token ==1){
					next($array);
					continue;
				}
			}
			if($num==8){var_dump($tang);echo "<br/>";
				$this->num+=1;
			}else{
				$arrayDone_def[] = current($array);
				$this->fun($this->deletElemnt($array_def,current($array)),++$num_def,$arrayDone_def);
			}

			next($array);
		}
		return;
	}

	public function deletElemnt($array,$value){
		foreach ($array as $k => $v) {
			if($value==$v){
				unset($array[$k]);
				break;
			}
		}
		return $array;
	}
}

$time1=microtime();
$queen = new Queen();
$queen->main();
echo '<br/>'.(microtime()-$time1);

?>