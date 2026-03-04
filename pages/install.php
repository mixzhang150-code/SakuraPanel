<?php
global $_config;
$form = $data['form'] ?? [];
$ok = isset($data['status']) && $data['status'] === true;
?>
<!DOCTYPE HTML>
<html lang="zh_CN">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=11">
		<link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
		<title>安装向导 :: <?php echo $_config['sitename']; ?></title>
	</head>
	<body style="background:#f5f6f8;">
		<div class="container" style="max-width:900px;padding:30px 15px;">
			<div class="card shadow-sm">
				<div class="card-body">
					<h3>安装向导</h3>
					<p class="text-muted">首次部署时请填写以下信息，系统会自动导入数据库并创建管理员账号。</p>
					<?php if(isset($data['message'])) { ?>
					<div class="alert alert-<?php echo $ok ? 'success' : 'danger'; ?>"><?php echo htmlspecialchars($data['message']); ?></div>
					<?php } ?>
					<form method="POST" action="?action=install&page=install">
						<div class="row">
							<div class="col-md-6">
								<label class="form-label">站点名称</label>
								<input class="form-control" name="sitename" value="<?php echo htmlspecialchars($form['sitename'] ?? $_config['sitename']); ?>" required>
							</div>
							<div class="col-md-6">
								<label class="form-label">站点简介</label>
								<input class="form-control" name="description" value="<?php echo htmlspecialchars($form['description'] ?? $_config['description']); ?>" required>
							</div>
						</div>

						<hr>
						<h5>数据库</h5>
						<div class="row">
							<div class="col-md-4"><label class="form-label">地址</label><input class="form-control" name="db_host" value="<?php echo htmlspecialchars($form['db_host'] ?? $_config['db_host']); ?>" required></div>
							<div class="col-md-4"><label class="form-label">端口</label><input class="form-control" name="db_port" value="<?php echo htmlspecialchars($form['db_port'] ?? $_config['db_port']); ?>" required></div>
							<div class="col-md-4"><label class="form-label">编码</label><input class="form-control" name="db_code" value="<?php echo htmlspecialchars($form['db_code'] ?? $_config['db_code']); ?>" required></div>
						</div>
						<div class="row mt-2">
							<div class="col-md-4"><label class="form-label">数据库名</label><input class="form-control" name="db_name" value="<?php echo htmlspecialchars($form['db_name'] ?? $_config['db_name']); ?>" required></div>
							<div class="col-md-4"><label class="form-label">用户</label><input class="form-control" name="db_user" value="<?php echo htmlspecialchars($form['db_user'] ?? $_config['db_user']); ?>" required></div>
							<div class="col-md-4"><label class="form-label">密码</label><input class="form-control" type="password" name="db_pass" value="<?php echo htmlspecialchars($form['db_pass'] ?? $_config['db_pass']); ?>"></div>
						</div>

						<hr>
						<h5>管理员账号</h5>
						<div class="row">
							<div class="col-md-4"><label class="form-label">用户名</label><input class="form-control" name="admin_user" value="<?php echo htmlspecialchars($form['admin_user'] ?? 'admin'); ?>" required></div>
							<div class="col-md-4"><label class="form-label">邮箱</label><input class="form-control" name="admin_email" value="<?php echo htmlspecialchars($form['admin_email'] ?? 'admin@example.com'); ?>" required></div>
							<div class="col-md-4"><label class="form-label">密码</label><input class="form-control" type="password" name="admin_pass" required></div>
						</div>

						<div class="mt-4 d-flex gap-2">
							<button class="btn btn-primary" type="submit">开始安装</button>
							<a class="btn btn-outline-secondary" href="?page=login">返回登录</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
