<?php
class BillModel extends Model {

	private $pairId = 0;
	private $billList = NULL;//账单列表，billList[i]为bill表的一个记录
	
	// 自动验证设置
	protected $_validate = array(
			array('money', 'require', '转账金额不能为空！'),
			array('money', 'number', '转账金额必须为数字且为整数！'),
	);
	
	//自动填充
	protected $_auto = array (
			array('billTime','mydate',Model:: MODEL_BOTH,'callback'),
	);
	
	protected function mydate()
	{
		return date("Y-m-d H:i:s");
	}
	
	public function init($pairId)
	{
		$this->pairId = $pairId;
	}
	
	protected function _before_insert(&$data,$options)
	{
		//这里$this->data还没有值
		if ($data["remark"] == "")
		{
			$data["remark"] = _ADD_REMARK;
		}
	}
	
	public function insertTempBill($isAdd)
	{
		$dbPair = D("Pair");
		$dbPair->init($this->pairId);
		trace($this->pairId,"pairId");
		$this->create();
		
		$data = $this->data;
		$data["isAdd"] = $isAdd;
		$billId = $this->add($data);
		
		//更新账户billContent
		return $dbPair->updateOneTempBillContent($billId);
	}
	
	public function getTempBillContent()
	{
		$dbPair = D("Pair");
		$dbPair->init($this->pairId);
		
		$list = $dbPair->getTempBillContent();
		$count = count($list);
		for ($i = 0; $i < $count; $i++)
		{
			$tmp = $this->where("billId=".$list[$i])->select();
			$this->billList[$i] = $tmp[0];
		}
		return $this->billList;
	}
	
	public function updateTempBill($mid)
	{
		$dbPair = D("Pair");
		$dbPair->init($this->pairId);
		$this->create();
		
		$data = $this->data;
		$data["billId"] = $mid;
		return $this->save($data);
	}
	
	
	
	public function acceptTempBill($mId)
	{
		$dbPair = D("Pair");
		$dbPair->init($this->pairId);
		
		$this->getTempBillContent();
		$count = count($this->billList);
		for ($i = 0; $i < $count; $i++)
		{
			if ($this->billList[$i]["billId"] == $mId)
				break;
		}
		$dbPair->updateBillArray($this->billList[$i]["isAdd"],$mId,$this->billList[$i]["money"]);
		return $dbPair->deleteOneTempBill($mId);
	}
}
?>