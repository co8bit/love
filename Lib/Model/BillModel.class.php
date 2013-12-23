<?php
class BillModel extends Model {

	private $nowUserId = -1;//当前操作人Id
	private $pairUserId = -1;//当前操作人配偶Id
	private $isAdd = true;//是加分订单还是减分订单
	
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
	
	public function init($nowUserId,$pairUserId = -1,$isAdd = true)//初始化，传入isAdd,当前登录id.伙伴id可以不传入
	{
		$this->isAdd = $isAdd;
		$this->nowUserId = $nowUserId;
		$this->pairUserId = $pairUserId;
	}
	
	protected function _before_insert(&$data,$options)
	{
		//这里$this->data还没有值
		if ($data["remark"] == "")
		{
			if ($this->isAdd)
			{
				$data["remark"] = _ADD_REMARK;
			}
			else
			{
				$data["remark"] = _SUB_REMARK;
			}
		}
		$data["billTime"] = date("Y-m-d H:i:s");
	}
	
	public function insertTempBill($remark = NULL,$money = NULL)//插入一个临时账单
	{
		//准备数据
		if ($remark === NULL)
		{
			$this->create();
			
			$data = NULL;
			$data = $this->data;
			$data["isAdd"] = $this->isAdd;
			$billId = $this->add($data);
		}
		else
		{
			$data = NULL;
			$data["remark"] = $remark;
			$data["money"] = $money;
			$data["isAdd"] = $this->isAdd;
			$billId = $this->add($data);
		}
		
		//更新账户billContent
		$dbUser = D("User");
		$dbUser->init($this->pairUserId);//给对方插入一个账单
		return $dbUser->updateUserBillContent($billId);
	}
	
	public function editTempBill($billId)//用户修改账单，并转给配偶申请审核。传入billId
	{
		$dbUser = D("User");
		$dbUser->init($this->nowUserId);
		$this->create();
		
		//更新bill表
		$data = $this->data;
		$data["billId"] = $billId;
		$this->save($data);
		
		//更新user表中的tempBillContent内容
		$dbUser->deleteOneBillInContent($billId);//删除本账户的内容
		//创建关于配偶的user操作
		$dbPairUser = new UserModel();//因为D方法在已经存在模型类的时候不创建一个新的，所以要用new
		$dbPairUser->init($this->pairUserId);
		return $dbPairUser->updateUserBillContent($billId);//插入到配偶账户中去
	}
	
	public function acceptTempBill($billId,$pairId)//接收订单
	{
		//找到billId的详细信息
		$info = NULL;
		$info = $this->where("billId=".$billId)->select();
		
		//更新pair中的确认账单信息
		$dbPair = D("Pair");
		$dbPair->init($pairId);
		$dbPair->updateBillArray($info[0]["isAdd"],$billId,$info[0]["money"]);
		
		//从user的tempBillContent中删除billId
		$dbUser = D("User");
		$dbUser->init($this->nowUserId);
		return $dbUser->deleteOneBillInContent($billId);
	}
	
	public function getBillInfo($billIdList)//从一个一维数组中获取billId，然后返回billId的详细信息
	//不需要init
	{
		$info = NULL;
		for ($i = 0; $i < count($billIdList); $i++)
		{
			$tmp = $this->where("billId=".$billIdList[$i])->select();
			$info[$i] = $tmp[0];
		}
		return $info;//info[i]["money"] = money
	}
}
?>