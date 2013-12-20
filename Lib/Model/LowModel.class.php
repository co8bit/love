<?php
class LowModel extends Model {

	private $content = -1;
	private $score = -1; 
	
	public function getContentAndScore($id)
	{
		if ($this->score !== -1)
			return 1;
		$result = NULL;
		$result = $this->where("lowId=$id")->select();
		if (!$result)//userName不存在
			return -1;
		$this->content = $result[0]["content"];
		$this->score = $result[0]["score"];
		//echo "<br>inMode:"."cont:".$this->content;echo "score:".$this->score;
	}
	
	public function getContent()
	{
		return $this->content;
	}
	
	public function getScore()
	{
		return $this->score;
	}
	
	public function insertLow($orignData)//插入一条新条约
	/*
	 * @参数：$data默认是selector查询回来的result，即是一个二维数组，真正的值在$data[0]["content"]
	 */
	{
		$data = NULL;
		$data["content"] = $orignData[0]["content"];
		$data["score"] = $orignData[0]["score"];
		if (_DEBUG)
		{
			//echo dump($data);
			//trace(dump($orignData),"data");
			//trace($data["lowId"],"data[lowId]");
		}
		return $this->add($data);
	}
	
	public function updateRecord($pairId,$data)
	{
		$dbUser = D("User");//要对UserModel实例化只能通过D操作
		$lowId = $dbUser->getUserLowId($pairId);
		
		$data["lowId"] = $lowId;
		if ($this->save($data) === false)//必须是这样，因为save返回的是影响多少条记录，如果更新前后的记录内容一样会返回0，如果用0判断就有问题
			return false;
		else
			return 1;
	}
}
?>