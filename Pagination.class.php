<?php 
/**
 * 属性
 * 	$len 单页记录数
 *  $offset 单页起始序号
 *  $show 显示分页按钮
 *  $left $right 分页按钮_过渡使用
 *  
 * 局部变量
 *  $page 当前页
 *  $pages 总页数
 *  $tot 总记录数
 * 	
 * 
 */
	class Pagination{
		public $len;
		public $offset;
		public $show;

		public function __construct($tot,$len){
			$this->len = $len;

			$page = $_GET["page"] ? $_GET["page"] : 1;	#当前页
			$pages = ceil($tot/$this->len);	#总页数=总记录数/单页记录数  向上取整

			$prev = $page==1 ? 1 : $page-1; //上一页
			$next = $page==$pages ? $pages : $page+1;	//下一页

			$this->offset = ($page-1)*$this->len;	//limit起点


			if($page==1){
    		$this->left = "<li class='previous disabled'><a href='javascript:;'><span >&larr;</span> 上一页</a></li>";
    	}else{
    		$this->left = "<li class='previous'><a href='".$_SERVER['PHP_SELF']."?page={$prev}'><span >&larr;</span> 上一页</a></li>";
    	}

    	if($page==$pages){
    		$this->right = "<li class='next disabled'><a href='javascript:;'>下一页 <span>&rarr;</span></a></li>";
    	}else{
    		$this->right = "<li class='next'><a href='".$_SERVER['PHP_SELF']."?page={$next}'>下一页 <span>&rarr;</span></a></li>";
    	}


		}


		public function show(){
			echo $this->left.$this->right;
		}
	}

?>