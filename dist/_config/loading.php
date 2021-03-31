<?php

# IEの時
if (strstr($ua, 'Trident') || strstr($ua, 'MSIE')) {
	
}

# もし違うドメインからの遷移の場合
if($referer == false){
	$HTML['loading'] = <<< HTML
	<style>
		#loading{
			display:flex;
		}
	</style>
	<div id="loading" class="loading">
		<div class="load">Now Loading...</div>
	</div>
HTML;
	  
$HTML['loadingJS'] = <<< HTML
<script>
	let loading = false;

	async function main() {
		try {
			await wait(10); // ここで10秒間止まります
			// ここに目的の処理を書きます。
			if(loading == false){
				loading = true;
				document.querySelector('#loading').classList.add('hidden');
				
				setTimeout(() => {
					document.querySelector('#loading').style.display = 'none';
				}, 1200);
			};
		} catch (err) {
			console.error(err);
		}
	}

	window.addEventListener("load", function(){
		if(loading == false){
			loading = true;
			document.querySelector('#loading').classList.add('hidden');
			setTimeout(() => {
				document.querySelector('#loading').style.display = 'none';
			}, 1200);
		};
	});
</script>
HTML;
}