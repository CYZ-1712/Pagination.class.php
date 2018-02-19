# Pagination.class.php
	A class  for paging, using PHP , MySQL and BootStrap .

# How to use?
	 属性
	 	$len 单页记录数
	  $offset 单页起始序号
	  $show 显示分页按钮
	  ** $left $right 分页按钮_过渡使用
	  
	 局部变量
	  $page 当前页
	  $pages 总页数
	  $tot 总记录数
	 	
	 方法
	 	show() 显示分页按钮

	
		include 'Pagination.class.php';
		$pagination = new Pagination($tot,3);
		$sql = "select * from t1 order by Id desc limit {$pagination->offset},{$pagination->len}";

		<nav>
		  <ul class="pager">
		    <?php 
		    	$pagination->show();
		     ?>
		  </ul>
		</nav>

