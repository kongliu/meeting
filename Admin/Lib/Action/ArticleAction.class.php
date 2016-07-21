<?php

// 文章模块
class ArticleAction extends MyBaseAction {

	public function __construct() {
		parent::__construct();
       
	/*	if(!session('?admin_id')){
			$this->redirect('login/index','',1,'请登录');
		}*/
	}

	// 文章列表
	public function article_list()
	{
	
		// 栏目父子列表
		$myweb_cms_column = M('cms_column');
		$column_parent_list = $myweb_cms_column->where('parent_id=0')->order('sort_order asc, cid asc')->select();
		$column_son_list=$myweb_cms_column->where('parent_id != 0')->select();
		//组合栏目显示顺序
		foreach($column_parent_list as $value){
			$column_list[]=$value;
			foreach($column_son_list as $val){
				if($val['parent_id']==$value['cid']){
				$column_list[]=$val;
				}
			}
		}
		//用一个变量来区别列表页和搜索页的分页的不同
		$flag_list=1;
		$this->assign('column_list', $column_list);
		// 分页
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1;
		$page_size = 10;
		
		// 总的记录数
		$myweb_cms_article = M('cms_article');
		$total = $myweb_cms_article->count();
		
		// 最大页数
		if($total == 0) { $page_total = 1; }
		else{ $page_total = ceil($total / $page_size); }

		// 页码矫正
		$p = $p >= $page_total ? $page_total : $p;
		$p = $p <= 1 ? 1 : $p;

		// 前后页
		$prev_page = ($p <= 1) ? 1 : $p - 1;
		$next_page = ($p >= $page_total) ? $page_total : $p + 1;

		// 注册页码信息
		$page = array(
			'total'		 => $total,
			'page_total' => $page_total,
			'p'			 => $p,
			'prev_page'	 => $prev_page,
			'next_page'	 => $next_page
		);
		$this->assign('page',$page);
		$this->assign('flag_list',$flag_list);
		
		// 查询文章
		$from = ($p - 1 ) * $page_size;
		$article_list = $myweb_cms_article->field('myweb_cms_article.aid,myweb_cms_column.cname,myweb_cms_article.title,myweb_cms_article.is_pub,myweb_cms_article.home_show,
		myweb_cms_article.is_focus,myweb_cms_article.add_time')->join('myweb_cms_column ON myweb_cms_article.cid = myweb_cms_column.cid')->order('aid desc')->limit($from,$page_size)->select();
		$this->assign('article_list', $article_list);
		/*ob_start();

		
		$data = ob_get_contents();
		ob_end_clean();
		file_put_contents('./1.html',$data);*/
		$this->display('art_list');
		
	}

	// 文章检索
	public function article_search()
	{	
		//组合栏目显示顺序
		$myweb_cms_column = M('cms_column');
		$column_parent_list = $myweb_cms_column->where('parent_id=0')->order('sort_order asc, cid asc')->select();
		$column_son_list=$myweb_cms_column->where('parent_id != 0')->select();
		
		foreach($column_parent_list as $value){
			$column_list[]=$value;
			foreach($column_son_list as $val){
				if($val['parent_id']==$value['cid']){
				$column_list[]=$val;
				}
			}
		}
		$this->assign('column_list', $column_list);
		
		//分页
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1;
		$page_size = 10;
		//过滤title为空的情况
		if($_GET['title']=="null"){
			$_GET['title']='';
		}
		
		
		$myweb_cms_article = M('cms_article');
		//传入
		if($_POST['title']!='' ||$_GET['title']!=''||$_POST['option'!='']||$_GET['option'!='']||$_POST['cid']!=''||$_GET['cid']!=''){
			$cid=$_POST['cid']==''?$_GET['cid']:$_POST['cid'];
			$title=$_POST['title']==''?$_GET['title']:$_POST['title'];
			$option=$_POST['option']==''?$_GET['option']:$_POST['option'];
			
			$limit_from=($p-1)*10;

			//重写搜索
			

			if(empty($cid)){
				if(!empty($title)){
				$where_title = " title like '%".$title."%' ";
				// var_dump($where_title);exit;
			}else{
				$where_title = '';
			}
			switch ($option) {
				case '0':
					$where_option = '';
					break;
				case '1':
					$where_option = 'is_pub = 1';
					break;
				case '2':
					$where_option = 'is_pub = 0';
					break;
				case '3':
					$where_option = 'home_show = 1';
					break;
				case '4':
					$where_option = 'home_show = 0';
					break;
				case '5':
					$where_option = 'is_focus = 1 ';
					break;
				case '6':
					$where_option = 'is_focus = 0';
					break;
				default:
					break;
			}
			if(empty($where_title)&&empty($where_option)){
				$where = '';
			}elseif(empty($where_title)&&!empty($where_option)){
				$where = $where_option;
			}elseif (!empty($where_title)&&empty($where_option)) {
				$where = $where_title;
			}elseif(!empty($where_title)&&!empty($where_option)){
				$where = $where_title.' and '.$where_option;
			}
			$total = $myweb_cms_article->field('aid,title,is_pub,home_show,is_focus,add_time,sort_order')->where($where)->count();
			$article_list= $myweb_cms_article->field('aid,title,is_pub,home_show,is_focus,add_time,sort_order')->where($where)->limit($limit_from,$page_size)->select();
			}else{

			if(!empty($title)){
				$where_title = " myweb_cms_article.title like '%".$title."%' ";
				// var_dump($where_title);exit;
			}else{
				$where_title = '';
			}
			switch ($option) {
				case '0':
					$where_option = '';
					break;
				case '1':
					$where_option = 'myweb_cms_article.is_pub = 1';
					break;
				case '2':
					$where_option = 'myweb_cms_article.is_pub = 0';
					break;
				case '3':
					$where_option = 'myweb_cms_article.home_show = 1';
					break;
				case '4':
					$where_option = 'myweb_cms_article.home_show = 0';
					break;
				case '5':
					$where_option = 'myweb_cms_article.is_focus = 1 ';
					break;
				case '6':
					$where_option = 'myweb_cms_article.is_focus = 0';
					break;
				default:
					break;
			}
			if(empty($where_title)&&empty($where_option)){
				$where = '';
			}elseif(empty($where_title)&&!empty($where_option)){
				$where = $where_option;
			}elseif (!empty($where_title)&&empty($where_option)) {
				$where = $where_title;
			}elseif(!empty($where_title)&&!empty($where_option)){
				$where = $where_title.' and '.$where_option;
			}
			if(empty($where)){
				$where = 'myweb_cms_column.cid =' .$cid;	
			}else{
				$where = 'myweb_cms_column.cid =' .$cid .' and '.$where;
			}
			

// var_dump($where);exit;
				$total = $myweb_cms_article->field('myweb_cms_article.aid,myweb_cms_article.sort_order,myweb_cms_column.cname,myweb_cms_article.title,myweb_cms_article.is_pub,myweb_cms_article.home_show,
		myweb_cms_article.is_focus,myweb_cms_article.add_time')->where($where)->join('myweb_cms_column ON myweb_cms_article.cid = myweb_cms_column.cid')->count();
				$article_list = $myweb_cms_article->field('myweb_cms_article.aid,myweb_cms_article.sort_order,myweb_cms_column.cname,myweb_cms_article.title,myweb_cms_article.is_pub,myweb_cms_article.home_show,
		myweb_cms_article.is_focus,myweb_cms_article.add_time')->where($where)->join('myweb_cms_column ON myweb_cms_article.cid = myweb_cms_column.cid')->limit($limit_from,$page_size)->select();

			}
	
		

		// 最大页数
		if($total == 0) { $page_total = 1; }
		else{ $page_total = ceil($total / $page_size); }

		// 页码矫正
		$p = $p >= $page_total ? $page_total : $p;
		$p = $p <= 1 ? 1 : $p;

		// 前后页
		$prev_page = ($p <= 1) ? 1 : $p - 1;
		$next_page = ($p >= $page_total) ? $page_total : $p + 1;
		// 注册页码信息
		$page = array(
			'total'		 => $total,
			'page_total' => $page_total,
			'p'			 => $p,
			'prev_page'	 => $prev_page,
			'next_page'	 => $next_page
		);
		//防止title为空url解析错误
		if($title==''){
			$title="null";
		}
		
		$this->assign('page',$page);
		$this->assign('cid',$cid);
		$this->assign('title',$title);
		$this->assign('option',$option);
		
		}
		
		$this->assign('article_list',$article_list);
		
		$this->display('art_list');
	}

	// 文章添加页
	public function article_add()
	{
		// 栏目父子列表
		$myweb_cms_column = M('cms_column');
		$column_parent_list = $myweb_cms_column->where('parent_id=0')->order('sort_order asc, cid asc')->select();
		$column_son_list=$myweb_cms_column->where('parent_id != 0')->select();
		//组合栏目显示顺序
		foreach($column_parent_list as $value){
			$column_list[]=$value;
			foreach($column_son_list as $val){
				if($val['parent_id']==$value['cid']){
				$column_list[]=$val;
				}
			}
		}
		
		$this->assign('column_list', $column_list);
		$this->assign('column_son_list',$column_son_list);
		$this->assign('is_add', 1);
		$this->display('art_info');
	}

	// 文章添加
	public function article_insert()
	{
		// 文章信息
		$article_info['cid'] = intval($_POST['cid']);
		$article_info['title'] = $this->_post('title');
		$article_info['content'] = $_POST['content'];
		$article_info['author'] = $_POST['author'];
		$article_info['afrom'] = $this->_post('afrom');
		$article_info['video'] = $this->_post('video');

		$article_info['keyword'] = $this->_post('keyword');
		$article_info['summary'] = $this->_post('summary');
		$article_info['is_pub'] = intval($_POST['is_pub']);
		$article_info['sort_order'] = intval($_POST['sort_order']);
		$article_info['home_show'] = intval($_POST['home_show']);
		$article_info['is_focus'] = intval($_POST['is_focus']);
		$article_info['focus_img'] = '';
		
		if($_POST['atime']==''){
			$article_info['atime']=date('Y-m-d H:i:s');
		}else{
			$article_info['atime'] = $this->_post('atime');
		}

		// 排列序号自动纠正
		if( !empty($article_info['sort_order']) && ($article_info['home_show']||$article_info['is_focus']) )
		{	

			$article_info['sort_order'] = $this->auto_sort($article_info['sort_order']);
			
		}

		// 焦点图上传
		if(is_uploaded_file($_FILES['focus_img']['tmp_name']))
		{
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize = 1024 * 1024 * 1;
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
			$upload->savePath =  './Public/images/focus/';
			$upload->saveRule = 'time';
			if($upload->upload())
			{
				$uploadList = $upload->getUploadFileInfo();
				$article_info['focus_img'] = $uploadList[0]['savename'];
			}
		}
		//图片不能为空
		if(!$article_info['focus_img']){
			$article_error['focus_img'] = 1;
		}
		// 栏目不能为空
		// var_dump($article_info);exit;
		if($article_info['cid'] == 0)
		{
			$article_error['cid'] = 1;
		}
		
		// 文章标题不能为空
		if(empty($article_info['title']))
		{
			$article_error['title'] = 1;
		}

		// 错误信息提示
		if(!empty($article_error))
		{
			// 栏目列表
			$myweb_cms_column = M('cms_column');
			$column_list = $myweb_cms_column->field('cid,cname')->order('sort_order asc, cid asc')->select();
			$this->assign('column_list', $column_list);
			
			// 提示信息
			$this->assign('article_info', $article_info);
			$this->assign('article_error', $article_error);
			$this->assign('is_add', 1);
			$this->display('art_info');
			exit;
		}



		// 添加文章
		$article_info['admin_id'] = $_SESSION['admin_id'];
		$article_info['add_time'] = date('Y-m-d H:i:s');
		$myweb_cms_article = M('cms_article');
		$article_id = $myweb_cms_article->add($article_info);

		// 添加是否成功
		if($article_id > 0)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Article/article_list';
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Article/article_add';
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
	}
	
	// 文章修改页
	public function article_edit()
	{	
		// 栏目ID
		$aid = intval($_GET['id']);
		
		// 查询栏目
		$myweb_cms_column = M('cms_column');
		$myweb_cms_article = M('cms_article');
		$article_info = $myweb_cms_article->where("aid=".$aid)->find();
		// 栏目父子列表
		
		$column_parent_list = $myweb_cms_column->where('parent_id=0')->order('sort_order asc, cid asc')->select();
		$column_son_list=$myweb_cms_column->where('parent_id != 0')->select();
		//组合栏目显示顺序
		foreach($column_parent_list as $value){
			$column_list[]=$value;
			foreach($column_son_list as $val){
				if($val['parent_id']==$value['cid']){
				$column_list[]=$val;
				}
			}
		}
		
	
		
		
		/* dump($col_parent_info['cid']);
		exit(); */
		$this->assign('cid',$cid);
		$this->assign('column_list', $column_list);
		$this->assign('article_info',$article_info);
		$this->display('art_info');
	}
	private function auto_sort($sort){


			$web_cms_article = M('cms_article');
			$res = $web_cms_article->where('sort_order = '.$sort)->find();
			if(!empty($res))
			{
				$sort = $sort + 1;
				// echo $sort;
				// exit;
				return $this->auto_sort($sort);
				
			}else{
				return $sort;
			}
			
		

	}
	
	// 文章修改
	public function article_update()
	{
		// 文章信息
		$article_info['aid'] = intval($_POST['article_aid']);
		$article_info['cid'] = intval($_POST['cid']);
		$article_info['title'] = $this->_post('title');
		$article_info['content'] = $_POST['content'];
		$article_info['author'] = $_POST['author'];
		$article_info['afrom'] = $this->_post('afrom');
		$article_info['video'] = $this->_post('video');
		
		$article_info['keyword'] = $this->_post('keyword');
		$article_info['summary'] = $this->_post('summary');
		$article_info['is_pub'] = intval($_POST['is_pub']);
		$article_info['sort_order'] = intval($_POST['sort_order']);
		$article_info['home_show'] = intval($_POST['home_show']);
		$article_info['is_focus'] = intval($_POST['is_focus']);
		if(!empty($_POST['focus_img'])){
		$article_info['focus_img'] = $_POST['focus_img'];
		}
		
		if($_POST['atime']==''){
			$article_info['atime']=date('Y-m-d H:i:s');
		}else{
			$article_info['atime'] = $this->_post('atime');
		}
		// 栏目不能为空
		if($article_info['cid'] == 0)
		{
			$article_error['cid'] = 1;
		}
		
		// 文章标题不能为空
		if(empty($article_info['title']))
		{
			$article_error['title'] = 1;
		}

		// 错误信息提示
		if(!empty($article_error))
		{
			// 栏目列表
			$myweb_cms_column = M('cms_column');
			$column_list = $myweb_cms_column->field('cid,cname')->order('sort_order asc, cid asc')->select();
			$this->assign('column_list', $column_list);
			
			// 提示信息
			$this->assign('article_info', $article_info);
			$this->assign('article_error', $article_error);
			$this->assign('is_add', 1);
			$this->display('art_info');
			exit;
		}
		// 排列序号自动纠正
		if( !empty($article_info['sort_order']) && ($article_info['home_show']||$article_info['is_focus']) )
		{	

			$article_info['sort_order'] = $this->auto_sort($article_info['sort_order']);
			// var_dump($article_info['sort_order']);exit;
			
		}

		// 焦点图上传
		if(is_uploaded_file($_FILES['focus_img']['tmp_name']))
		{
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize = 1024 * 1024 * 1;
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
			$upload->savePath =  './Public/images/focus/';
			$upload->saveRule = 'time';
			if($upload->upload())
			{
				$uploadList = $upload->getUploadFileInfo();
				$article_info['focus_img'] = $uploadList[0]['savename'];
			}
		}

		// 编辑文章
		$article_info['admin_id'] = $_SESSION['admin_id'];
		$article_info['add_time'] = date('Y-m-d H:i:s');
		$myweb_cms_article = M('cms_article');
		$article_id = $myweb_cms_article->save($article_info);

		// 添加是否成功
		if($article_id > 0)
		{

			$this->assign('success', 1);
			$url = __APP__ . '/Article/article_list';
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Article/article_edit/id/'.$article_info['aid'];
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
		$this->redirect('article_list');
	}
	
	// 文章删除
	public function article_delete()
	{	// 文章ID
		$aid = intval($_GET['id']);
		
		

		// 删除文章
		$myweb_cms_article = M('cms_article');
		$flag = $myweb_cms_article->where('aid = ' . $aid)->delete();

		// 删除是否成功
		if($flag)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Article/article_list';
			$this->assign('url', $url);
			// $this->assign('waitSecond', 2);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/article/article_list';
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
		$this->redirect('article_list');
	}
	}
		

