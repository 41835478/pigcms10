<?php
//����Դ������ www.gope.cn
class OrderPackageModel extends Model
{
	public function getPackages($where)
	{
		$packages = $this->where($where)->select();
		return $packages;
	}
}

?>
