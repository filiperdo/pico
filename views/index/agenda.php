
<section id="content">
    <div class="container_12">
        <div class="grid_12 marg_1">
            <div class="grid_8 alpha">
            
                <h2>Agenda</h2>
                <h3></h3>
                <div class="txt_info">
                	<?php foreach( $this->event->listarEvent() as $event ){?>
                	<p><?php echo $event->getTitle();?></p>
                	<?php } ?>
                </div>
			
            </div>
            <div class="grid_4 omega">
                <h2>Últimos</h2>
                <h3>posts</h3>
                <ul class="list_2">
                <?php foreach( $this->post->listarPost(3) as $post ) { ?>
                    <li>
                        <img alt="" src="<?php echo URL?>public/img/page1_pic8.jpg">
                        <div class="txt_info">
                            <h5><a href="#" class="link_2 animate"><small><?php echo $post->getTitle(); ?></small></a></h5>
                            <p><?php echo substr(strip_tags($post->getContent()), 0,120)?>...</p>
                        </div>
                    </li>
                   <?php } ?>
                </ul>
                
                <ul class="list_2">
                	<iframe width="275" height="206" src="//www.youtube.com/embed/iLn2UgAhetk?autoplay=1&loop=1&playlist=iLn2UgAhetk"> <param name="movie" value=" frameborder=" 0" allowfullscreen /></iframe>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        
    </div>
</section>




