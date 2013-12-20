<?php
class PairModel extends Model {

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
}
?>