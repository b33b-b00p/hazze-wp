<?php
/*
   Template Name: Шаблон ГЛАВНОЙ страницы
   */
get_header();
?>

<!-- Hero Section Begin -->
<section class="hero-section set-bg" data-setbg="<?php the_field('hero_bg') ?>">
   <div class="container">
      <div class="row">
         <div class="col-lg-5">
            <div class="hs-text">
               <span><?php the_field('hero_subtitle') ?></span>
               <h2><?php the_field('hero_title') ?></h2>
               <p><?php the_field('hero_description') ?></p>
               <a href="<?php echo get_field('hero_button')['url'] ?>" class="primary-btn"><?php echo get_field('hero_button')['title'] ?></a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Hero Section End -->

<!-- About Us Section Begin -->
<section id="about-us" class="about-us-section spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="as-pic">
               <img src="<?php echo get_field('about-us_img')['url'] ?>" alt="<?php echo get_field('about-us_img')['alt'] ?>">
            </div>
         </div>
         <div class="col-lg-6">
            <div class="as-text">
               <div class="section-title">
                  <span><?php the_field('about-us_subtitle') ?></span>
                  <h2><?php the_field('about-us_title') ?></h2>
               </div>
               <p class="f-para"><?php the_field('about-us_description') ?></p>
               <a href="<?php echo get_field('about-us_button')['url'] ?>" class="primary-btn"><?php echo get_field('about-us_button')['title'] ?></a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- About Us Section End -->

<!-- Services Section Begin -->
<section id="services" class="services-section spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="section-title">
               <span>Our Services</span>
               <h2>Best Services Save The World</h2>
            </div>
         </div>
      </div>
      <div class="row services-custom-row">
         <?php
         if (have_rows('services_repeater')) :
            while (have_rows('services_repeater')) : the_row();
         ?>
               <div class="col-lg-4 col-md-6">
                  <div class="service-item">
                     <img src="<?php the_sub_field('icon') ?>" alt="">
                     <h4><?php the_sub_field('title') ?></h4>
                     <p><?php the_sub_field('description') ?></p>
                  </div>
               </div>
         <?php
            endwhile;
         else :
            echo 'ERROR! Fields not found...';
         endif;
         ?>
      </div>
   </div>
</section>
<!-- Services Section End -->

<!-- Portfolio Section Begin -->
<section id="portfolio" class="portfolio-section spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="section-title">
               <span><?php the_field('field') ?></span>
               <h2><?php the_field('field') ?></h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6">
            <div class="portfolio-item set-bg large-item" data-setbg="<?php echo get_field('portfolio_img-1')['url'] ?>">
               <div class="pi-hover">
                  <a href="#" class="chain-icon"><i class="fa fa-chain"></i></a>
                  <a href="<?php echo get_field('portfolio_img-1')['url'] ?>" class="search-icon image-popup"><i class="fa fa-search"></i></a>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="portfolio-item set-bg" data-setbg="<?php echo get_field('portfolio_img-2')['sizes']['hazze-custom'] ?>">
               <div class="pi-hover">
                  <a href="#" class="chain-icon"><i class="fa fa-chain"></i></a>
                  <a href="<?php echo get_field('portfolio_img-2')['url'] ?>" class="search-icon image-popup"><i class="fa fa-search"></i></a>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="portfolio-item set-bg" data-setbg="<?php echo get_field('portfolio_img-3')['url'] ?>">
                     <div class="pi-hover">
                        <a href="#" class="chain-icon"><i class="fa fa-chain"></i></a>
                        <a href="<?php echo get_field('portfolio_img-3')['url'] ?>" class="search-icon image-popup"><i class="fa fa-search"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="portfolio-item set-bg" data-setbg="<?php echo get_field('portfolio_img-4')['url'] ?>">
                     <div class="pi-hover">
                        <a href="#" class="chain-icon"><i class="fa fa-chain"></i></a>
                        <a href="<?php echo get_field('portfolio_img-4')['url'] ?>" class="search-icon image-popup"><i class="fa fa-search"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Portfolio Section End -->

<!-- Counter Section Begin -->
<section id="counter" class="counter-section spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="counter-text">
               <div class="section-title">
                  <span><?php the_field('counter_subtitle') ?></span>
                  <h2><?php the_field('counter_title') ?></h2>
               </div>
               <a href="<?php echo get_field('counter_button')['url'] ?>" class="primary-btn"><?php echo get_field('counter_button')['title'] ?></a>
            </div>
         </div>
         <div class="col-lg-6">
            <?php
            if (have_rows('counter_repeater')) :
               while (have_rows('counter_repeater')) : the_row();
            ?>
                  <div class="counter-item">
                     <div class="ci-number count">
                        <?php the_sub_field('number') ?>
                     </div>
                     <div class="ci-text">
                        <h4><?php the_sub_field('title') ?></h4>
                        <p><?php the_sub_field('description') ?></p>
                     </div>
                  </div>
            <?php
               endwhile;
            else :
               echo 'ERROR! Fields not found...';
            endif;
            ?>
         </div>
      </div>
   </div>
</section>
<!-- Counter Section End -->

<!-- Testimonial Section Begin -->
<section id="testimonial" class="testimonial-section spad">
   <div class="container">
      <div class="row testimonial-slider owl-carousel">
         <?php
         $currentSlideNumber = 1;
         if (have_rows('testimonials_repeater')) :
            while (have_rows('testimonials_repeater')) : the_row();
         ?>
               <div class="col-lg-6">
                  <div class="testimonial-item" <?php if ($currentSlideNumber % 2 === 0) echo 'style="background-color: #e32879;"' ?>>
                     <div class="ti-pic">
                        <img src="<?php echo get_sub_field('img')['sizes']['thumbnail'] ?>" alt="<?php echo get_sub_field('img')['alt'] ?>">
                     </div>
                     <div class="ti-text">
                        <div class="ti-title">
                           <h4><?php the_sub_field('name') ?></h4>
                           <span <?php if ($currentSlideNumber % 2 === 0) echo 'style="color: #fff;"' ?>><?php the_sub_field('occupation') ?></span>
                        </div>
                        <p <?php if ($currentSlideNumber % 2 === 0) echo 'style="color: #fff;"' ?>><?php the_sub_field('review') ?></p>
                     </div>
                  </div>
               </div>
         <?php
               $currentSlideNumber++;
            endwhile;
         else :
            echo 'ERROR! Fields not found...';
         endif;
         ?>
      </div>
   </div>
</section>
<!-- Testimonial Section End -->

<!-- Call To Action Section Begin -->
<?php echo do_shortcode("[pinkBanner]"); ?>
<!-- Call To Action Section End -->

<style>

</style>

<!-- Member Section Begin -->
<section id="member" class="member-section spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="section-title">
               <span><?php the_field('member_subtitle') ?></span>
               <h2><?php the_field('member_title') ?></h2>
            </div>
         </div>
      </div>
      <div class="row">
         <?php
         // задаем нужные нам критерии выборки данных из БД
         $args = array(
            'posts_per_page' => get_field('member_quantity'),
            'post_type' => 'our-team',
         );

         $query = new WP_Query($args);

         // Цикл
         if ($query->have_posts()) {
            while ($query->have_posts()) {
               $query->the_post();
         ?>
               <div class="col-lg-4 col-md-6">
                  <div class="member-item set-bg" data-setbg="<?php echo get_the_post_thumbnail_url() ?>">
                     <div class="mi-text" <?php if (get_field('member_highlight-status')) echo 'style="background-color: #e32879;"' ?>>
                        <p <?php if (get_field('member_highlight-status')) echo 'style="color: #fff;"' ?>><?php the_field('member_description') ?></p>
                        <div class="mt-title">
                           <h4><?php the_title() ?></h4>
                           <span <?php if (get_field('member_highlight-status')) echo 'style="color: #fff;"' ?>><?php the_field('member_occupation') ?></span>
                        </div>
                        <div class="mt-social">
                           <?php
                           if (have_rows('member_repeater-socials')) :
                              while (have_rows('member_repeater-socials')) : the_row();
                           ?>
                                 <a href="<?php the_sub_field('link') ?>" <?php if (get_field('member_highlight-status')) echo 'style="color: #e32879; background-color: #fff;"' ?>><i class="fa fa-<?php the_sub_field('selection') ?>"></i></a>
                           <?php
                              endwhile;
                           else :
                              echo 'ERROR! Fields not found...';
                           endif;
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
         <?php
            }
         } else {
            // Постов не найдено
         }

         // Возвращаем оригинальные данные поста. Сбрасываем $post.
         wp_reset_postdata();
         ?>
      </div>
   </div>
</section>
<!-- Member Section End -->

<!-- Blog Section Begin -->
<div id="blog" class="blog-section latest-blog spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="section-title">
               <span>Latest Blog</span>
               <h2>From Our Blog</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <?php
         // задаем нужные нам критерии выборки данных из БД
         $args = array(
            'posts_per_page' => 2,
            'post_type' => 'post',
         );

         $query = new WP_Query($args);

         // Цикл
         if ($query->have_posts()) {
            while ($query->have_posts()) {
               $query->the_post();
         ?>
               <div class="col-md-6">
                  <div class="blog-item">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="bi-pic set-bg" data-setbg="<?php echo get_the_post_thumbnail_url() ?>"></div>
                        </div>
                        <div class="col-lg-6">
                           <div class="bi-text">
                              <ul>
                                 <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date() ?></li>
                              </ul>
                              <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                              <?php the_excerpt() ?>
                              <div class="bt-author">
                                 <div class="ba-pic">
                                    <?php
                                    global $post;
                                    $url = get_avatar_url($post, "size=150&default=monsterid");
                                    $img = '<img alt="" src="' . $url . '">';
                                    echo $img;
                                    ?>
                                 </div>
                                 <div class="ba-text">
                                    <h5><?php the_author() ?></h5>
                                    <span>
                                       <?php
                                       $post_id = get_the_ID(); // Assuming you're inside the loop
                                       $author_id = get_post_field('post_author', $post_id);
                                       
                                       if ($author_id) {
                                          $author_data = get_userdata($author_id);
                                          if ($author_data) {
                                             $author_roles = $author_data->roles;
                                             // $author_roles is an array, you may want to loop through it if the user has multiple roles
                                             if (!empty($author_roles)) {
                                                $author_role = $author_roles[0]; // Assuming you want to use the first role if multiple
                                                echo $author_role;
                                             } else {
                                                echo "Author has no roles.";
                                             }
                                          } else {
                                             echo "Failed to retrieve author data.";
                                          }
                                       } else {
                                          echo "Failed to retrieve author ID.";
                                       }
                                       ?>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         <?php
            }
         } else {
            // Постов не найдено
         }

         // Возвращаем оригинальные данные поста. Сбрасываем $post.
         wp_reset_postdata();
         ?>
      </div>
   </div>
</div>
<!-- Blog Section End -->

<?php get_footer(); ?>