<?php
include('.\Conf\MyConfigINI.php');

class UserAction extends Action
{
	private function isOk($time,$ok,$trueStr,$trueU,$falseStr,$falseU)//判读是否成功写入数据库
	//参数分别为：跳转时间（-1为默认）、判断量、为真提示符、为真跳转U操作参数（字符串）、为假提示符，为假跳转U操作参数（字符串）,若没有跳转操作则传0
	//注：立即跳转需要传入U函数参数
	{
		//$this->assign('waitSecond',135);
		
		if ($time == -1)//默认跳转时间
		{
			if ($ok)
			{
				if ($trueU === 0)
				{
					$this->success($trueStr);
				}
				else
					$this->success($trueStr,U($trueU));
			}
			else
			{
				if ($falseU === 0)
					$this->error($falseStr);
				else
					$this->error($falseStr,U($falseU));
			}
		}
		else
		if ($time == 0)//立即跳转
		{
			if ($ok)
			{
				redirect(U($trueU),0);
			}
			else
			{
				redirect(U($falseU),0);
			}
		}
		else//延时跳转
		{
			$this->assign('waitSecond',$time);
			if ($ok)
			{
				if ($trueU === 0)
				{
					$this->success($trueStr);
				}
				else
					$this->success($trueStr,U($trueU));
			}
			else
			{
				if ($falseU === 0)
					$this->error($falseStr);
				else
					$this->error($falseStr,U($falseU));
			}
		}
	}
	
	private function isFalse($time,$ok,$falseStr,$falseU)//当$ok为false时进行跳转
	//参数分别为：跳转时间（-1为默认）、判断量、为假提示符，为假跳转U操作参数（字符串）,若没有跳转操作则传0
	{
		if ($time == -1)//默认跳转时间
		{
			if (!$ok)
			{
				if ($falseU === 0)
					$this->error($falseStr);
				else
					$this->error($falseStr,U($falseU));
			}
		}
		else//延时跳转
		{
			if (!$ok)
			{
				$this->assign('waitSecond',$time);
				if ($falseU === 0)
					$this->error($falseStr);
				else
					$this->error($falseStr,U($falseU));
			}
		}
	}
	
	public function index()
	{
		$this->assign('waitSecond',135);
		
		$dbuser = M("User");
		$condition = NULL;
		$condition['userId'] = session('userId');
		$result = $dbuser->where($condition)->select();
		if($result)
		{
			session('moodValue',$result[0]['moodValue']);
			session('pairId',$result[0]['pairId']);
			session('pairUserId',$result[0]['pairUserId']);
		}
		else
		{
			$this->error('登陆有问题，系统退出后请重新登录','__APP__/Index/logout');
		}
		
		if (session('pairId') == 0)
		{
			redirect(U('User/ping'),0);
		}
		
		//下面的操作是建立在 用户已经配对 的前提下的
		$db = M("Pair");
		$condition = NULL;
		$condition['pairId'] = session('pairId');
		$result = $db->where($condition)->select();
		if($result)
		{
			$lowId = $result[0]['lowId'];
			$money = $result[0]['money'];
		}
		else
		{
			$this->error('登陆有问题，系统退出后请重新登录','__APP__/Index/logout');
		}
		
		$db = M("User");
		$condition = NULL;
		$condition['userId'] = session('pairUserId');
		$result = $db->where($condition)->select();
		if($result)
		{
			session('myMoodValue',$result[0]['moodValue']);
			session('pairUserName',$result[0]['userName']);
		}
		else
		{
			$this->error('登陆有问题，系统退出后请重新登录','__APP__/Index/logout');
		}
		
		if ($lowId == 1)//用户还没有创建条约
		{
			redirect(U('User/treaty'),0);
		}
		
		$this->assign('View_currency',_CURRENCY);
		$this->assign('View_money',$money);
		
		$this->display();
	}
	
	public function changeMood()
	{
		//$this->assign('waitSecond',135);
		
		if (session('myMoodValue') == $this->_get("mood"))//更新前更新后是一样的值会导致$result返回false，即没有更新
		{
			redirect(U('User/index'),0);
		}
		else
		{
			$condition = NULL;
			//$condition['userId'] = session('pairUserId');
			$condition['moodValue'] = $this->_get("mood");
			$dbUser = M("User");
			$result = $dbUser->where('userId='.session('pairUserId'))->save($condition);
			if($result)
			{
				redirect(U('User/index'),0);
			}
			else
			{
				$this->error('登陆有问题，系统退出后请重新登录','__APP__/Index/logout');
			}
		}
	}
	
	public function add()
	{
		$this->display();
	}
	
	public function toAdd()
	{
		$dbBill = D("Bill");
		$dbBill 
	}
	
	public function sub()
	{
		
	}

	public function friend()
	{
		$this->display();
	}
	
	public function account()
	{
		if (session('pairUserId') == 0)
		{
			redirect(U('User/ping'),0);
		}
		$this->display();
	}
	
	public function toAccount()
	{
		$condition = NULL;
		$condition['userPassword'] = $this->_post("userPassword");
		if ($condition['userPassword'] != "")
		{
			$dbUser = M("User");
			$result = $dbUser->where('userId='.session('userId'))->save($condition);
			if(!$result)
			{
				$this->error('登陆有问题，系统退出后请重新登录','__APP__/Index/logout');
			}
		}
		redirect(U('User/index'),0);
	}
	
	public function ping()//连接另一半的账户
	{
		$db = M("Temppair");//大写的话相当于加了一个下划线，比如M("TempPair");相当于连接数据库temp_pair
		if ($db->where("userStartId=".session("userId"))->select())//已发送申请
		{
			redirect(U('User/alreadyPing'),0);
		}
		if ($db->where("userEndId=".session('userId'))->select())//被发送申请
		{
			redirect(U('User/bePing'),0);
		}
		$this->display();
	}
	
	public function alreadyPing()//已经发生关联请求，但对方还没有确认（与bePing对称）
	{
		$dbUser  = M("User");
		$db = M("Temppair");
		$result = $db->where("userStartId=".session('userId'))->select();
		$this->assign('remark',$result[0]['remark']);
		$result = $dbUser->where("userId=".$result[0]['userEndId'])->select();
		$this->assign('pairUserName',$result[0]['userName']);
		$this->display();
	}
	
	public function bePing()//被他人发送了关联请求(与alreadyPing对称)
	{
		$dbUser  = M("User");
		$db = M("Temppair");
		$result = $db->where("userEndId=".session('userId'))->select();
		$this->assign('remark',$result[0]['remark']);
		//////
		session("pairUserId",$result[0]['userStartId']);
		//////
		$result = $dbUser->where("userId=".$result[0]['userStartId'])->select();
		$this->assign('pairUserName',$result[0]['userName']);
		$this->display();
	}
	
	public function verifyTempCon()//确认关联请求
	{
		//得到pairUserId
		$pairUserId = session('pairUserId');
		
		//更新pair
		$dbPair = M("Pair");
		$data = NULL;
		$data["user1Id"] = session('userId');
		$data["user2Id"] = $pairUserId;
		$data["pairDate"] = date("Y-m-d H:i:s");
		$data["money"] = _INIT_MONEY;
		if (!$dbPair->add($data))
		{
			$this->error("关联失败，请重试");
		}
		//得到pairId
		$result = NULL;
		$result = $dbPair->where("user1Id=".session('userId'))->select();
		if (!$result)
		{
			$this->error("关联失败，请重试");
		}
		$pairId = $result[0]["pairId"];
		
		//更新本账户
		$dbUser = M("User");
		$data = NULL;
		$userName = session('userName');
		$data["pairUserId"] = $pairUserId;
		$data["pairId"] = $pairId;
		if (!$dbUser->where('userName='."'$userName'")->save($data))
		{
			$this->error("关联失败，请重试");
		}
		
		//更新对方账户
		$data = NULL;
		$data["pairId"] = $pairId;
		$data["pairUserId"] = session('userId');
		if (!$dbUser->where("userId=".$pairUserId)->save($data))
		{
			$this->error("关联失败，请重试");
		}
		
		//删除临时匹配记录tempPair
		$dbTempPair = M("Temppair");
		$this->isOk(-1,$dbTempPair->where("userEndId=".session('userId'))->delete(),"关联成功","User/index","关联失败，请重试",0);
		
	}
	
	public function cancelTempCon()//在对方还未确定时取消连接（与ignoreTempPair函数对称）
	{
		$db = M("Temppair");
		$result = $db->where("userStartId=".session('userId'))->delete();
		$this->isOk(-1,$result,'已撤销关联申请','User/ping','撤销申请发送失败，请重试',0);
	}
	
	public function ignoreTempPair()//忽视对方的申请连接（与cancelTempCon函数对称）
	{
		$db = M("Temppair");
		$result = $db->where("userEndId=".session('userId'))->delete();
		$this->isOk(0,$result,0,'User/ping',0,0);
	}
	
	public function cancelCon()//已经确定关联后取消连接
	{
		/*
		$db = M("pair");
		$result = $db->where("userStartId=".session('userId'))->delete();
		$this->isOk($result,'已撤销关联申请','User/ping','撤销申请发送失败，请重试',0);
		*/
	}
	
	public function toPing()
	{
		$dbUser = M("User");
		$db = M("Temppair");
		$toUserName = $this->_post('userName');//要连接的那个人的userName
		if ($toUserName == "")//userName为空
		{
			$this->error("账户名不能为空");
		}
		$result = $dbUser->where("userName="."'$toUserName'")->select();
		if (!$result)//userName不存在
		{
			$this->error("对方还没有开户，请邀请对方来本银行开户");
		}
		if ($result[0]["pairId"] != 0)
			$this->error("对方账户已经被其他用户关联");
		
		$data["userStartId"] = session('userId');
		$data["userEndId"] = $result[0]["userId"];
		$data["remark"] = $this->_post("remark");
		$data["pairDate"] = date("Y-m-d H:i:s");
		if ($db->add($data))
		{
			$this->success('申请已发送',U('User/ping'));
		}
		else
		{
			$this->error('申请发送失败，请重试');
		}
	}
	
	public function message()//新消息
	{
		
	}
	
	public function note()//重要提醒
	{
	
	}
	
	public function treaty()//爱情条约
	{
		$dbUser = D("User");//要对UserModel实例化只能通过D操作
		$lowId = $dbUser->getUserLowId(session("pairId"));
		
		if ($lowId == 1)//用户还没有创建条约
		{
			$dbLow = D("Low");
			$result = $dbLow->where("lowId=1")->select();//拷贝内容
			$this->isFalse(-1,$result,"读取爱情条约错误，请重新登录","Index/logout");
			$lowId = $dbLow->insertLow($result);//插入一条新条约
			$this->isFalse(-1,$lowId,"读取爱情条约错误，请重新登录","Index/logout");
			
			if (_DEBUG)
			{
				trace($result,"result");
			}
			
			//更新pair的lowId
			$dbPair = D("Pair");
			$this->isFalse(-1,$dbPair->updateLowId(session("pairId"),$lowId),"读取爱情条约错误，请重新登录","Index/logout");
		}
		
		$dbLow = D("Low");
		$dbLow->init(session("pairId"),$lowId);
		$list = $dbLow->getContentAndScore();
		
		/*
		 * 这段代码是条约显示时，先显示左边，后显示右边的代码
		 * 
		//$count+1才是数量
		if ( ($count == 0) && ($list == NULL) )
		{
			$leftLen = 0;
			$count = -1;
		}
		else
		{
			if ( ($count + 1) % 2 == 0)//能被2整除
				$leftLen = ($count + 1) / 2;
			else
				$leftLen = ($count / 2) + 1;//让左边多
		}
		
		if (_DEBUG)
		{
			trace($leftLen,"leftLen");
			trace($count,"count");
		}
		
		for ($i = 0; $i < $leftLen; $i++)
		{
			$leftList[$i] = $list[$i]["content"]._SELECT_CONTENT_BREAK_FLAG.$list[$i]["score"]._CURRENCY."，没做到-".$list[$i]["score"]._CURRENCY;
		}
		for ($i = $leftLen; $i <= $count; $i++)//count+1才是数量，所以要<=
		{
			$rightList[$i] = $list[$i]["content"]._SELECT_CONTENT_BREAK_FLAG.$list[$i]["score"]._CURRENCY."，没做到-".$list[$i]["score"]._CURRENCY;
		}
		
		//输出
		$this->assign('list1',$leftList);//左边
		$this->assign('list2',$rightList);//右边
		$this->assign('leftLen',$leftLen);//中断点
		*/
		$count = count($list);
		for ($i = 0; $i < $count; $i++)
		{
			$outputList[$i] = $list[$i]["content"]._SELECT_CONTENT_BREAK_FLAG.$list[$i]["score"]._CURRENCY."，没做到-".$list[$i]["score"]._CURRENCY;
		}
		$this->assign('list',$outputList);
		
		$this->display();
	}
	
	public function selectTreaty()//选择条约
	{
		/*
		 * 下面这段代码是根据value的值进行解析select[]，这样做会导致顺序不确定
		 *
		$select = $this->_post("select");
		$selectCount = count($select);
		$data = NULL;
		$data["content"] = "";
		$data["score"] = "";
		for ($i = 0; $i < $selectCount; $i++)
		{
			//解析被选中的条约内容
			$breakPoint = strpos($select[$i],_SELECT_CONTENT_BREAK_FLAG);//内容后的中断符位置
			$scoreBehindBreak = strpos($select[$i],_CURRENCY);//分数后的中断符位置
			$scoreSt = $breakPoint + _SELECT_CONTENT_BREAK_FLAG_STRLEN;//分数的开始处
			if ($data["content"] == "")
				$data["content"] = substr($select[$i],0,$breakPoint);
			else
				$data["content"] = $data["content"] . _SPECIAL_END_FLAG . substr($select[$i],0,$breakPoint);
			if ($data["score"] == "")
				$data["score"] = substr($select[$i],$scoreSt,$scoreBehindBreak - $scoreSt);
			else
				$data["score"] = $data["score"] . _SPECIAL_END_FLAG . substr($select[$i],$scoreSt,$scoreBehindBreak - $scoreSt);
		}
		
		//更新条约	
		$dbLow = D("Low");
		$this->isFalse(-1,$dbLow->updateRecord(session("pairId"),$data),"更新失败，请重试","User/treaty");
		$this->isOk(0,true,0,"User/treaty",0,"User/treaty");
		*/
		
		
		/*
		 * 这里是根据数据库解析select[]，即value的值是数字
		 */
		
		//取出条约
		$data = NULL;
		$dbLow = D("Low");
		$dbLow->init(session("pairId"));
		$list = $dbLow->getContentAndScore();
		
		$select = $this->_post("select");
		$selectCount = count($select);
		for ($i = 0; $i < $selectCount; $i++)
		{
			$data[$select[$i]] = $list[$select[$i]];
			if (_DEBUG)
			{
				echo $select[$i];
			}
		}
		ksort($data,SORT_NUMERIC);//$select[$i]是乱序，导致顺序不对，但是key值的顺序即是当前顺序
		if (_DEBUG)
		{
			dump($data);
		}
		
		//更新条约
		/*
		 * //因为data是在list范围内组装的，所以必须传list的范围,
		 * 不然会出现count($data)范围和条约项的键值不匹配的情况(因为data的下标是select[i])
		*/
		$this->isFalse(-1,$dbLow->updateRecord($data,count($list)),"更新失败，请重试","User/treaty");
		$this->isOk(0,true,0,"User/treaty",0,"User/treaty");
	}
	
	public function newTreaty()//添加新条约的处理
	{
		$dbLow = D("Low");
		$dbLow->init(session("pairId"));
		
		$content = $dbLow->getOriginContent();
		$score = $dbLow->getOriginScore();
		$data = NULL;
		$data["lowId"] = $dbLow->getLowId();
		$data["content"] = $content._SPECIAL_END_FLAG.$this->_post("content"); //默认最后一条尾部没有结束标志
		$data["score"] = $score._SPECIAL_END_FLAG.$this->_post("score");
		$this->isOk(0,$dbLow->save($data),0,"User/treaty",0,"User/treaty");
	}
	
	public function diary()//爱情日记
	{
	
	}
	
}