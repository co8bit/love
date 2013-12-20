<?php
class PairModel extends Model {
	
	private $pairId = 0;
	private $billOrignContent = NULL;//未解析的原始内容，形如：string字符串
	private $billContent = NULL;//billId数组，形如：$billContent[i] = billId;
	private $money = 0;
	private $tempBillOrignContent = NULL;
	private $tempBillContent = NULL;
	
	
	public function init($pairId)
	{
		$this->pairId = $pairId;
		$this->money = $this->getMoney();
	}
	
	public function getMoney()
	{
		$result = $this->where("pairId=".$this->pairId)->select();
		if (!$result)
			return false;
		return $this->money = $result[0]["money"];
	}
	
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
	
			//解析content
			$st = 0;
			$count = 0;
			$contentLen = strlen($this->billOrignContent);
			while ($st < $contentLen)
			{
				$breakPoint = strpos($this->billOrignContent,_SPECAL_BILL_END_FLAG,$st);
				if (!$breakPoint)//到字符串最后一个内容了
				{
					$this->billContent[$count] = substr($this->billOrignContent,$st);
					break;
				}
				$this->billContent[$count] = substr($this->billOrignContent,$st,$breakPoint - $st);
				$count++;
				$st = $breakPoint + _SPECAL_BILL_END_FLAG_STRLEN;
			}
		}
	
		return $this->billContent;
	}
	
	public function getTempOriginBillContent()
	{
		if ($this->tempBillOrignContent === NULL)
		{
			$result = NULL;
			$result = $this->where("pairId=$this->pairId")->select();
			if (!$result)
				return -1;
			$this->tempBillOrignContent = $result[0]["tempBillContent"];
		}
		return $this->tempBillOrignContent;
	}
	
	public function getTempBillContent()
	{
		if ($this->tempBillContent === NULL)
		{
			//得到原样
			$this->getTempOriginBillContent();
			
			//解析content
			$st = 0;
			$count = 0;
			$contentLen = strlen($this->tempBillOrignContent);
			while ($st < $contentLen)
			{
				$breakPoint = strpos($this->tempBillOrignContent,_SPECAL_BILL_END_FLAG,$st);
				if (!$breakPoint)//到字符串最后一个内容了
				{
					$this->tempBillContent[$count] = substr($this->tempBillOrignContent,$st);
					break;
				}
				$this->tempBillContent[$count] = substr($this->tempBillOrignContent,$st,$breakPoint - $st);
				$count++;
				$st = $breakPoint + _SPECAL_BILL_END_FLAG_STRLEN;
			}
		}
		
		return $this->tempBillContent;
	}
	
	public function updateOneTempBillContent($billId)//更新未确认账单
	/*
	 * 参数是：isAdd=true说明是加分账单，一个billId
	*/
	{
		$this->getTempOriginBillContent();
	
		if ($this->tempBillOrignContent == "")
			$this->tempBillOrignContent = "$billId";
		else
			$this->tempBillOrignContent = $this->tempBillOrignContent . _SPECAL_BILL_END_FLAG . $billId;
	
		$data = NULL;
		$data["pairId"] = $this->pairId;
		$data["tempBillContent"] = $this->tempBillOrignContent;

		return $this->save($data);
	}
	
	public function updateBillArray($isAdd,$billId,$changeMoney)//更新pair的账单id数组
	/*
	 * 参数是：isAdd=true说明是加分账单，一个billId
	 */
	{
		$this->getOriginBillContent();
		
		if ($this->billOrignContent == "")
			$this->billOrignContent = "$billId";
		else
			$this->billOrignContent = $this->billOrignContent . _SPECAL_BILL_END_FLAG . $billId;
		
		$data = NULL;
		$data["pairId"] = $this->pairId;
		$data["billContent"] = $this->billOrignContent;
		if ($isAdd)
			$data["money"] = $this->money + $changeMoney;
		else
			$data["money"] = $this->money - $changeMoney;
		return $this->save($data);
	}
	
	public function deleteOneTempBill($mId)
	{
		$this->getTempBillContent();
		$count = count($this->tempBillContent);
		for ($i = 0; $count; $i++)
		{
			if ($this->tempBillContent[$i] == $mId)//把当前值删掉
			{
				for ($j = $i + 1; $j < $count; $j++)
				{
					$this->tempBillContent[$j - 1] = $this->tempBillContent[$j];
				}
				$this->tempBillContent[$j-1] = NUlL;//这条语句并不能把最后一个元素删除了，count($this->tempBillContent)之后还是$count（没减一）
				$count--;//上面这条语句并不能把最后一个元素删除了，所以需要减掉
				break;
			}
		}
		
		/*
		 * 下面开始，$this->tempBillContent的长度必须用$count，因为$this->tempBillContent数组删除掉了一个值。
		 */
		
		//更新tempBill
		$this->tempBillOrignContent = "";
		for ($i = 0; $i < $count; $i++)//必须用$count，因为$this->tempBillContent数组删除掉了一个值。这里的count已经减1了
		{
			$tmp = $this->tempBillContent[$i];
			if ($this->tempBillOrignContent == "")
				$this->tempBillOrignContent = "$tmp";
			else
				$this->tempBillOrignContent = $this->tempBillOrignContent . _SPECAL_BILL_END_FLAG . $tmp;
		}
		$data = NULL;
		$data["pairId"] = $this->pairId;
		$data["tempBillContent"] = $this->tempBillOrignContent;
		return $this->save($data);
	}
}
?>