
<!--=======content================================-->


<section id="content">
    <div class="container_12">
        <div class="grid_12 marg_1">
            <div class="grid_12 alpha">
                <h2>Blog</h2>
                <h3>Banda Legados</h3>
                
                <ul class="list_2">
				<?php foreach( $this->post->listarPost() as $post ) { ?>
                    <li>
                        <img alt="" src="<?php echo URL?>public/img/page1_pic8.jpg">
                        <div class="txt_info">
                            <h5><a href="<?php echo URL?>index/post/<?php echo $post->getSlug();?>" class="link_2 animate">
                            <small><?php echo $post->getTitle(); ?></small></a></h5>
                            <p><?php echo substr(strip_tags($post->getContent()), 0,420)?>...</p>
                        </div>
                    </li>
                   <?php } ?>
                </ul>
				
            </div>
            
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="grid_12">
            <h2>What our clients</h2>
            <h3>say about us</h3>
            <ul class="list_3">
                <li class="grid_4 alpha">
                    <div class="title">
                        <div class="figure">
                            <img src="<?php echo URL?>public/img/page1_pic11.jpg" alt="">
                        </div>
                        <div class="txt_info">
                            <h4><a href="#" class="link_2 animate">Dave Muol</a></h4>
                            <h6>Dj DAVE</h6>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet,consectetad ipis ctets.Tincidunt dolor nunc vule putate ulr ipco secte. Donec sempert laciniate.</p>
                </li>
                <li class="grid_4">
                    <div class="title">
                        <div class="figure">
                            <img src="<?php echo URL?>public/img/page1_pic12.jpg" alt="">
                        </div>
                        <div class="txt_info">
                            <h4><a href="#" class="link_2 animate">Mila Quoly</a></h4>
                            <h6>Soul Singer</h6>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet,consectetad ipis ctets.Tincidunt dolor nunc vule putate ulr ipco secte. Donec sempert laciniate.</p>
                </li>
                <li class="grid_4 omega">
                    <div class="title">
                        <div class="figure">
                            <img src="<?php echo URL?>public/img/page1_pic13.jpg" alt="">
                        </div>
                        <div class="txt_info">
                            <h4><a href="#" class="link_2 animate">Earl Dove</a></h4>
                            <h6>Country singer</h6>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet,consectetad ipis ctets.Tincidunt dolor nunc vule putate ulr ipco secte. Donec sempert laciniate.</p>
                </li>
            </ul>
             
        </div>
    </div>
</section>




