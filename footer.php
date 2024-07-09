<!-- Footer Section Begin -->
<section class="footer-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-6">
            <div class="footer-option">
               <div class="fo-logo">
                  <a href="/">
                     <img src="<?php echo get_field('header_logo', 'option')['url'] ?>" alt="<?php echo get_field('header_logo', 'option')['alt'] ?>">
                  </a>
               </div>
               <ul>
                  <?php
                  if (have_rows('footer_repeater-contact', 'option')) :
                     while (have_rows('footer_repeater-contact', 'option')) : the_row();
                  ?>
                        <?php if (!get_sub_field('is_link', 'option')) { ?>
                           <li><?php the_sub_field('field-name', 'option') ?> <?php the_sub_field('field-text', 'option') ?></li>
                        <?php } else { ?>
                           <li><?php the_sub_field('field-name', 'option') ?> <a href="<?php echo get_sub_field('field-link', 'option')['url'] ?>"><?php echo get_sub_field('field-link', 'option')['title'] ?></a></li>
                        <?php } ?>
                  <?php
                     endwhile;
                  else :
                     echo 'ERROR! Fields not found...';
                  endif;
                  ?>
               </ul>
               <div class="fo-social">
                  <?php
                  if (have_rows('footer_repeater-socials', 'option')) :
                     while (have_rows('footer_repeater-socials', 'option')) : the_row();
                  ?>
                        <a href="<?php the_sub_field('link', 'option') ?>"><i class="fa fa-<?php the_sub_field('selection', 'option') ?>"></i></a>
                  <?php
                     endwhile;
                  else :
                     echo 'ERROR! Fields not found...';
                  endif;
                  ?>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="footer-widget fw-links">
               <h5><?php the_field('footer_menu-title', 'option') ?></h5>
               <?php
               wp_nav_menu(array(
                  'container'       => '',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
                  'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
                  'theme_location'  => 'footer'               // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
               ));
               ?>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
               <?php
               echo do_shortcode('[contact-form-7 id="f2ce73d" title="Контактная форма в футере" html_class="news-form"]');
               ?>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
               <h5><?php the_field('footer_gallery-title', 'option') ?></h5>
               <div class="insta-pic">
                  <?php
                  $images = get_field('footer_gallery', 'option');
                  if ($images) : ?>
                     <ul>
                        <?php foreach ($images as $image) : ?>
                           <li>
                              <a href="<?php echo esc_url($image['url']); ?>">
                                 <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                              </a>
                              <p><?php echo esc_html($image['caption']); ?></p>
                           </li>
                        <?php endforeach; ?>
                     </ul>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
      <div class="copyright-text">
         <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>
               document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made
            with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
         </p>
      </div>
   </div>
</section>
<!-- Footer Section End -->

<?php wp_footer(); ?>

</body>

</html>