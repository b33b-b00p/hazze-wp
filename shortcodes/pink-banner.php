<section id="callto" class="callto-section set-bg" data-setbg="<?php the_field('pink-banner_bg', 'option') ?>">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 m-auto">
            <div class="ctc-text">
               <h2><?php the_field('pink-banner_title', 'option') ?></h2>
               <p><?php the_field('pink-banner_description', 'option') ?></p>
               <a href="<?php echo get_field('pink-banner_button', 'option')['url'] ?>" class="primary-btn ctc-btn"><?php echo get_field('pink-banner_button', 'option')['title'] ?></a>
            </div>
         </div>
      </div>
   </div>
</section>