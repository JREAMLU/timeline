<link rel="stylesheet" href="<?=BASEURL;?>/base/css/nav.css" type="text/css">
<!-- 导航菜单 -->
<div class='main_nav'>
    <nav class="nav">
    	<ul class="nav-list">
    		<li class="nav-item"><a href="<?=BASEURL?>">心作坊</a></li>
    		<?php foreach ($navigations as $key => $value):?>
    		<li class="nav-item"><a href="<?=BASEURL.DS.$value->paramCode.$url_suffix;?>"><?php echo $value->paramValue;?></a></li>
    		<?php endforeach;?>
    		<li class="nav-item"><a>|</a></li>
    		<?php if (! isset ( $_SESSION ['user_id'] )) :?>
    		<li class="nav-item"><a href='<?=BASEURL;?>/welcome.html'>加入心作坊</a></li>
    		<?php else :?>
    		<li class="nav-item"><a href='<?=BASEURL;?>/user'><?php echo $_SESSION ['nickname']?> 的个人中心</a></li>
    		<li class="nav-item"><a href='<?=BASEURL;?>/add/publish.html'>快速发教程</a></li>
    		<li class="nav-item"><a>|</a></li>
    		<li class="nav-item"><a href='<?=BASEURL;?>/welcome/signout.html'>登出</a></li>
    		<?php endif;?>
    	</ul>
    </nav>
</div>
<!-- /导航菜单 -->