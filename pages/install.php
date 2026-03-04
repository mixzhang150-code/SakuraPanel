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
		<script src="https://cdn.tailwindcss.com"></script>
		<title>安装向导 :: <?php echo $_config['sitename']; ?></title>
	</head>
	<body class="min-h-screen bg-slate-100 text-slate-800">
		<div class="mx-auto max-w-5xl px-4 py-8 sm:py-12">
			<div class="mb-6 flex items-center justify-between">
				<div>
					<h1 class="text-2xl font-bold tracking-tight">安装向导</h1>
					<p class="mt-1 text-sm text-slate-500">使用 Tailwind 重构后的部署页面，首次部署可在此完成初始化。</p>
				</div>
				<a href="?page=login" class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">返回登录</a>
			</div>

			<?php if(isset($data['message'])) { ?>
			<div class="mb-6 rounded-xl border px-4 py-3 text-sm <?php echo $ok ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-rose-200 bg-rose-50 text-rose-700'; ?>">
				<?php echo htmlspecialchars($data['message']); ?>
			</div>
			<?php } ?>

			<form method="POST" action="?action=install&page=install" class="space-y-6">
				<section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
					<h2 class="text-lg font-semibold">站点信息</h2>
					<div class="mt-4 grid gap-4 sm:grid-cols-2">
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">站点名称</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" name="sitename" value="<?php echo htmlspecialchars($form['sitename'] ?? $_config['sitename']); ?>" required>
						</div>
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">站点简介</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" name="description" value="<?php echo htmlspecialchars($form['description'] ?? $_config['description']); ?>" required>
						</div>
					</div>
				</section>

				<section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
					<h2 class="text-lg font-semibold">数据库配置</h2>
					<div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">地址</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" name="db_host" value="<?php echo htmlspecialchars($form['db_host'] ?? $_config['db_host']); ?>" required>
						</div>
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">端口</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" name="db_port" value="<?php echo htmlspecialchars($form['db_port'] ?? $_config['db_port']); ?>" required>
						</div>
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">编码</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" name="db_code" value="<?php echo htmlspecialchars($form['db_code'] ?? $_config['db_code']); ?>" required>
						</div>
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">数据库名</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" name="db_name" value="<?php echo htmlspecialchars($form['db_name'] ?? $_config['db_name']); ?>" required>
						</div>
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">用户</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" name="db_user" value="<?php echo htmlspecialchars($form['db_user'] ?? $_config['db_user']); ?>" required>
						</div>
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">密码</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" type="password" name="db_pass" value="<?php echo htmlspecialchars($form['db_pass'] ?? $_config['db_pass']); ?>">
						</div>
					</div>
				</section>

				<section class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
					<h2 class="text-lg font-semibold">管理员账号</h2>
					<div class="mt-4 grid gap-4 sm:grid-cols-3">
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">用户名</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" name="admin_user" value="<?php echo htmlspecialchars($form['admin_user'] ?? 'admin'); ?>" required>
						</div>
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">邮箱</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" name="admin_email" value="<?php echo htmlspecialchars($form['admin_email'] ?? 'admin@example.com'); ?>" required>
						</div>
						<div>
							<label class="mb-1 block text-sm font-medium text-slate-700">密码</label>
							<input class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" type="password" name="admin_pass" required>
						</div>
					</div>
				</section>

				<div class="flex justify-end">
					<button class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-500" type="submit">开始安装</button>
				</div>
			</form>
		</div>
	</body>
</html>
