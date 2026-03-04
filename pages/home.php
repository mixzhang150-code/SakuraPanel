<?php
global $_config;
?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.tailwindcss.com"></script>
	<title><?php echo $_config['sitename']; ?> - <?php echo $_config['description']; ?></title>
</head>
<body class="bg-slate-950 text-slate-100">
	<div class="relative overflow-hidden">
		<div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_#312e81,_#020617_65%)] opacity-90"></div>
		<header class="relative z-10">
			<div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-6">
				<div class="text-lg font-bold tracking-tight"><?php echo $_config['sitename']; ?></div>
				<div class="space-x-2">
					<a href="?page=login" class="rounded-lg border border-white/20 px-4 py-2 text-sm hover:bg-white/10">登录</a>
					<?php if($_config['register']['enable']) { ?>
					<a href="?page=register" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold hover:bg-indigo-500">注册</a>
					<?php } ?>
				</div>
			</div>
		</header>

		<main class="relative z-10">
			<section class="mx-auto max-w-6xl px-4 pb-14 pt-12 sm:pt-20">
				<div class="grid items-center gap-10 lg:grid-cols-2">
					<div>
						<p class="mb-3 inline-flex rounded-full border border-indigo-300/30 bg-indigo-300/10 px-3 py-1 text-xs text-indigo-200">SakuraPanel</p>
						<h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl">更现代、更轻量的 Frp 管理面板</h1>
						<p class="mt-5 text-slate-300"><?php echo $_config['description']; ?>。支持多用户、多节点、流量控制、可视化管理，面向快速部署与日常运维。</p>
						<div class="mt-8 flex flex-wrap gap-3">
							<a href="?page=login" class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500">立即开始</a>
							<a href="?page=install" class="rounded-lg border border-white/20 px-5 py-2.5 text-sm hover:bg-white/10">安装向导</a>
						</div>
					</div>
					<div class="rounded-2xl border border-white/10 bg-white/5 p-6 backdrop-blur">
						<h2 class="text-lg font-semibold">核心能力</h2>
						<ul class="mt-4 space-y-3 text-sm text-slate-300">
							<li>• 多用户与用户组权限隔离</li>
							<li>• TCP / UDP / HTTP / HTTPS 隧道支持</li>
							<li>• 流量统计与限额控制</li>
							<li>• 节点统一管理与配置下发</li>
							<li>• 便捷的 Web 安装向导</li>
						</ul>
					</div>
				</div>
			</section>

			<section class="mx-auto max-w-6xl px-4 pb-16">
				<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
					<div class="rounded-xl border border-white/10 bg-white/5 p-5">
						<div class="text-2xl font-bold">5 分钟</div>
						<div class="mt-1 text-xs text-slate-400">快速部署上手</div>
					</div>
					<div class="rounded-xl border border-white/10 bg-white/5 p-5">
						<div class="text-2xl font-bold">多节点</div>
						<div class="mt-1 text-xs text-slate-400">支持跨地域管理</div>
					</div>
					<div class="rounded-xl border border-white/10 bg-white/5 p-5">
						<div class="text-2xl font-bold">可扩展</div>
						<div class="mt-1 text-xs text-slate-400">支持自定义配置策略</div>
					</div>
					<div class="rounded-xl border border-white/10 bg-white/5 p-5">
						<div class="text-2xl font-bold">开箱即用</div>
						<div class="mt-1 text-xs text-slate-400">安装后即可开始创建隧道</div>
					</div>
				</div>
			</section>
		</main>
	</div>
</body>
</html>
