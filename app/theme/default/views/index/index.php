<header>
    <h1>Simple, simple, this is life.</h1>
</header>

<section id="cd-timeline" class="cd-container">
    <?php foreach ($timeline as $key => $val): ?>
        <div class="cd-timeline-block">
            <div class="cd-timeline-img cd-<?php echo $val['category'];?>">
                <img src="<?=BASEURL;?>/base/img/cd-icon-<?php echo $val['category'];?>.svg" alt="Picture">
            </div>
            
            <div class="cd-timeline-content">
                <h2><?php echo $val['title'];?></h2>
                <p><?php echo $val['content'];?></p>
                <span class="cd-date"><?php echo $val['added_time'];?></span>
            </div>
        </div>
    <?php endforeach; ?>
</section>