<?
require_once 'query/QueryList.class.php';


class CollectMatch{
	
	private $url;
	private $arr_rang = array();

	public function getMatch($url,$reg,$rang,$d0="2014-08-01",$d1="2014-08-03"){
		$this->reg = $reg;
		$this->rang = $rang;
		
		$_time = range(strtotime($d0),strtotime($d1),24*60*60);
		$_time = array_map(create_function('$v','return date("Y-m-d",$v);'),$_time);

		$link=db_connect();            
		$empire=new mysqlquery();  
		foreach($_time as $key => $t){
			$this->url = $url.$t;
			$jsonArr = $this->getJsonArr();
			print_r($jsonArr);

		}

		db_close();
		$empire=null;   

	}

	public function getSchedule($url,$reg,$rang){

	}

	public function getTeam($url){

	}

	public function getMember($url){
		
	}

	public function getJsonArr(){
		echo $this->url."</br>";
		echo $this->reg."</br>";
		echo $this->rang."</br>";
		$hj = new QueryList($this->url,$this->reg,$this->rang);
		//print_r($hj);
		$arr = $hj->jsonArr;
		return $arr;
	}

}