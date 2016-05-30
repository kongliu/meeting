<?php

// Kindeditor 模块
class KindeditorAction extends Action {

	// 图片上传
	public function upload_img()
	{
		// 文件保存路径
		$save_base_path = './Public/images/focus';
		
		// 取得当前月份
		$month = date('Y-m-d');
		$save_month_path = $save_base_path . '/' . $month . '/';
		
		// 没有路径的话，创建路径
		if(!file_exists($save_month_path))
		{
			mkdir($save_month_path, '777');
		}
		
		// 图片名称
		$file_save_name = '';
		
		// 上传图片
		if(is_uploaded_file($_FILES['imgFile']['tmp_name']))
		{
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize = 1024 * 1024 * 1;
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
			$upload->savePath =  $save_month_path;
			$upload->saveRule = 'time';
			if($upload->upload())
			{
				$uploadList = $upload->getUploadFileInfo();
				$file_save_name = $uploadList[0]['savename'];
			}
		}

		// 返回结果
		if(!empty($file_save_name))
		{
			//$file_url = __PUBLIC__ . '/images/focus/' . $month . '/' . $file_save_name;
			$file_url = '/meeting/Public/images/focus/' . $month . '/' . $file_save_name;
			echo '{"error":0, "url":"'.$file_url.'"}';
			exit;
		}
		else
		{
			echo '{"error":1, "message":"上传失败"}';
			exit;
		}
	}

}