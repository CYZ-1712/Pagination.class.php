<?php 
	$pdo = new PDO('mysql:host=localhost;dbname=data','root','root');
	$pdo->exec('set names utf8');
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); #设置默认结果集模式为关联数组
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);#修改报错模式

	$sqlTotal = "select count(Id) from t1";
	$smtTotal = $pdo->prepare($sqlTotal);
	$smtTotal->execute();
	$tot = $smtTotal->fetchColumn();	//总记录数


	include 'Pagination.class.php';
	$pagination = new Pagination($tot,3);

	$sql = "select * from t1 order by Id desc limit {$pagination->offset},{$pagination->len}";

	$smt = $pdo->prepare($sql);
	$smt->execute();
	$rows =  $smt->fetchAll();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>pdo</title>
	<meta charset="utf-8">
</head>
<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<body>
	<div class="container">
		<h1 class="page-header">
			<a href="" class="btn btn-warning">查看用户</a>
			<a href="" class="btn btn-primary">添加用户</a>
		</h1>
		<table class="table table-striped table-bordered">
			<tr>
				<th>编号</th>
				<th>用户名</th>
				<th>密码</th>
				<th>修改</th>
				<th>删除</th>
			</tr>

			<?php 
				foreach ($rows as $key => $value) {
					echo '<tr>';
					echo "<td>{$value['Id']}</td>";
					echo "<td>{$value['Name']}</td>";
					echo "<td>{$value['Pwd']}</td>";
					echo "<td><a href='' class='btn btn-success'>修改</a></td>";
					echo "<td><a href='' class='btn btn-danger'>删除</a></td>";
					echo '</tr>';
				}
			?>
		</table>

		<nav>
		  <ul class="pager">
		    <?php 
		    	$pagination->show();
		     ?>
		  </ul>
		</nav>
	</div>
</body>
</html>
