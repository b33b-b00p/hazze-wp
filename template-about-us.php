<?php
/*
   Template Name: Шаблон About Us
   */
get_header();
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-6">
            <div class="breadcrumb-option">
               <?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs(''); ?>
            </div>
         </div>
         <div class="col-lg-6 col-md-6 text-right">
            <div class="breadcrumb-text">
               <h3><?php the_title() ?></h3>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Section End -->

<!-- About Us Section Begin -->
<section class="about-us-section spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="as-pic">
               <img src="<?php echo get_field('about-us_image')['url'] ?>" alt="<?php echo get_field('about-us_image')['alt'] ?>">
            </div>
         </div>
         <div class="col-lg-6">
            <div class="as-text ap-text">
               <div class="section-title">
                  <span><?php the_field('about-us_subtitle') ?></span>
                  <h2><?php the_field('about-us_title') ?></h2>
               </div>
               <p class="f-para"><?php the_field('about-us_description') ?></p>
               <div class="about-counter">
                  <?php
                  if (have_rows('about-us_repeater')) :
                     while (have_rows('about-us_repeater')) : the_row();
                  ?>
                        <div class="ac-item">
                           <h2 class="ab-count"><?php the_sub_field('number') ?></h2>
                           <p><?php the_sub_field('name') ?></p>
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
      </div>
   </div>
</section>
<!-- About Us Section End -->

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

<!-- Call To Action Section Begin -->
<?php echo do_shortcode("[pinkBanner]"); ?>
<!-- Call To Action Section End -->

<?php get_footer(); ?>