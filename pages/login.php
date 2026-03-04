<?php
global $_config;
?>
<!DOCTYPE HTML>
<html lang="zh_CN">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=11">
		<meta name="msapplication-TileColor" content="#F1F1F1">
		<script src="https://cdn.tailwindcss.com"></script>
		<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<?php if($_config['recaptcha']['enable']) echo '<script src="https://www.recaptcha.net/recaptcha/api.js?render=' . $_config['recaptcha']['sitekey'] . '" defer></script>'; ?>
		<title>登录 :: <?php echo $_config['sitename']; ?> - <?php echo $_config['description']; ?></title>
	</head>
	<body class="min-h-screen bg-slate-950 text-slate-100">
		<div class="absolute inset-0 bg-cover bg-center opacity-40" style="background-image:url('https://i.loli.net/2019/08/13/7EqLWfi1tw6M2Qn.jpg');"></div>
		<div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-8">
			<div class="w-full max-w-md rounded-2xl border border-white/10 bg-white/95 p-8 text-slate-800 shadow-2xl backdrop-blur">
				<div class="mb-6">
					<h1 class="text-2xl font-bold tracking-tight"><?php echo $_config['sitename']; ?></h1>
					<p class="mt-1 text-sm text-slate-500"><?php echo $_config['description']; ?></p>
				</div>

				<?php
				if(isset($data['status']) && isset($data['message'])) {
					$alertStyle = $data['status']
						? 'border-emerald-200 bg-emerald-50 text-emerald-700'
						: 'border-rose-200 bg-rose-50 text-rose-700';
					echo '<div class="mb-4 rounded-lg border px-4 py-3 text-sm ' . $alertStyle . '">' . $data['message'] . '</div>';
				}
				?>

				<form method="POST" action="?action=login&page=login" class="space-y-4">
					<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />

					<div>
						<label class="mb-1 block text-sm font-medium text-slate-700">账号</label>
						<input type="text" name="username" id="username" required class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-800 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
					</div>

					<div>
						<label class="mb-1 block text-sm font-medium text-slate-700">密码</label>
						<input type="password" name="password" id="password" required class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-800 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
					</div>

					<button type="submit" class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-500">登录</button>

					<p class="text-center text-sm text-slate-500">
					<?php
					if($_config['register']['enable']) {
						echo "<a class='text-indigo-600 hover:text-indigo-500' href='?page=register'>注册新账号</a> <span class='mx-1 text-slate-300'>|</span> ";
					}
					?>
					<a class="text-indigo-600 hover:text-indigo-500" href='?page=findpass'>忘记密码？</a>
					<span class="mx-1 text-slate-300">|</span>
					<a class="text-indigo-600 hover:text-indigo-500" href='?page=install'>安装向导</a>
					</p>
				</form>
			</div>
		</div>
		<p class="fixed bottom-4 left-4 z-20 text-xs text-slate-300/90">&copy; <?php echo date("Y") . " {$_config['sitename']}"; ?></p>
		<?php
		if($_config['recaptcha']['enable']) {
			echo <<<EOF
		<script type="text/javascript">
			window.onload = function() {
				grecaptcha.ready(function() {
					grecaptcha.execute('{$_config['recaptcha']['sitekey']}', {action:'validate_captcha'}).then(function(token) {
						document.getElementById('g-recaptcha-response').value = token;
					});
				});
			}
		</script>
EOF;
		}
		?>
	</body>
</html>
