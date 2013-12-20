<?php
class PairModel extends Model {
	
	private $pairId = 0;
	private $billOrignContent = NULL;
	private $billContent = NULL;
	
	public function updateLowId($pairId,$lowId)//更新pair的lowId
	{
		$data = NULL;
		$data["pairId"] = $pairId;
		$data["lowId"] = $lowId;
		if (!$this->save($data))
			return 0;
		else
			return 1;
	}
	
	public function init($pairId)
	{
		$this->pairId = $pairId;
	}
	
	public function getOriginBillContent()
	{
		if ($this->billOrignContent === NULL)
		{
			$result = NULL;
			$result = $this->where("pairId=$this->pairId")->select();
			if (!$result)
				return -1;
			$this->billOrignContent = $result[0]["billContent"];
		}
		return $this->billOrignContent;
	}
	
	public function getBillContent()
	{
		if ($this->billContent === NULL)
		{
			//得到原样
			$this->getOriginBillContent();
	
			//解析
			
		}
	
		return $this->billContent;
	}
}
?>