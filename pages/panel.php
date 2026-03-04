<?php
namespace SakuraPanel;

use SakuraPanel;

global $_config;

$module = $_GET['module'] ?? "home";
$rs = Database::querySingleLine("users", Array("username" => $_SESSION['user']));
$isAdmin = isset($rs['group']) && $rs['group'] === "admin";

$menuSections = [
	[
		'header' => null,
		'items' => [
			['module' => 'home', 'icon' => 'fas fa-tachometer-alt', 'title' => '管理面板'],
			['module' => 'profile', 'icon' => 'fas fa-user', 'title' => '用户信息'],
		],
	],
	[
		'header' => '内网穿透',
		'items' => [
			['module' => 'proxies', 'icon' => 'fas fa-list', 'title' => '隧道列表'],
			['module' => 'addproxy', 'icon' => 'fas fa-plus', 'title' => '创建隧道'],
			['module' => 'sign', 'icon' => 'fas fa-check-square', 'title' => '每日签到'],
			['module' => 'download', 'icon' => 'fas fa-download', 'title' => '软件下载'],
			['module' => 'configuration', 'icon' => 'fas fa-file', 'title' => '配置文件'],
		],
	],
];

if($isAdmin) {
	$menuSections[] = [
		'header' => '管理员',
		'items' => [
			['module' => 'userlist', 'icon' => 'fas fa-users', 'title' => '用户管理'],
			['module' => 'nodes', 'icon' => 'fas fa-server', 'title' => '节点管理'],
			['module' => 'traffic', 'icon' => 'fas fa-paper-plane', 'title' => '流量统计'],
			['module' => 'settings', 'icon' => 'fas fa-wrench', 'title' => '站点设置'],
		],
	];
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>管理面板 :: <?php echo $_config['sitename']; ?> - <?php echo $_config['description']; ?></title>
		<link rel="stylesheet" href="assets/panel/plugins/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="assets/panel/dist/css/adminlte.min.css">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body class="hold-transition sidebar-mini">
		<div class="wrapper">
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="?page=panel&module=home" class="nav-link">主页</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="?page=logout&csrf=<?php echo $_SESSION['token']; ?>" title="退出登录">
							登出&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
						</a>
					</li>
				</ul>
			</nav>

			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<a href="?page=panel&module=home" class="brand-link">
					<center><span class="brand-text font-weight-light"><?php echo $_config['sitename']; ?></span></center>
				</a>
				<div class="sidebar">
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="https://secure.gravatar.com/avatar/<?php echo md5($_SESSION['mail']); ?>?s=64" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<a href="#" class="d-block"><?php echo htmlspecialchars($_SESSION['user']); ?></a>
						</div>
					</div>

					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<?php foreach($menuSections as $section) { ?>
								<?php if(!empty($section['header'])) { ?>
								<li class="nav-header"><?php echo $section['header']; ?></li>
								<?php } ?>
								<?php foreach($section['items'] as $item) { ?>
								<li class="nav-item">
									<a href="?page=panel&module=<?php echo $item['module']; ?>" class="nav-link <?php echo $module === $item['module'] ? 'active' : ''; ?>">
										<i class="nav-icon <?php echo $item['icon']; ?>"></i>
										<p><?php echo $item['title']; ?></p>
									</a>
								</li>
								<?php } ?>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</aside>

			<div class="content-wrapper">
				<?php
				$page = new SakuraPanel\Pages();
				if(isset($_GET['module']) && preg_match("/^[A-Za-z0-9\_\-]{1,16}$/", $_GET['module'])) {
					$page->loadModule($_GET['module']);
				} else {
					$page->loadModule("home");
				}
				?>
			</div>

			<aside class="control-sidebar control-sidebar-dark"></aside>

			<footer class="main-footer">
				<strong>Copyright &copy; <?php echo date("Y"); ?> <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>"><?php echo $_config['sitename']; ?></a>.</strong>
				All rights reserved.
				<div class="float-right d-none d-sm-inline-block">Powered by <b>Sakura Panel</b></div>
			</footer>
		</div>

		<script src="assets/panel/plugins/jquery/jquery.min.js"></script>
		<script src="assets/panel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/panel/dist/js/adminlte.js"></script>
	</body>
</html>
