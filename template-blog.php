<?php
/*
   Template Name: Шаблон Blog
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

<!-- Blog Section Begin -->
<div class="blog-section spad">
   <div class="container">
      <div class="row">
         <?php
         // задаем нужные нам критерии выборки данных из БД
         $args = array(
            'posts_per_page' => get_field('blog_quantity'),
            'post_type' => 'post',
         );

         $query = new WP_Query($args);
         $count = 1;

         // Цикл
         if ($query->have_posts()) {
            while ($query->have_posts()) {
               $query->the_post();
         ?>
               <?php if ($count % 3 !== 0) { 
                  add_filter('excerpt_length', function () {
                     return 10;
                  });?>
                  <div class="col-lg-6">
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
               <?php } else { 
                  add_filter('excerpt_length', function () {
                     return 20;
                  });?>
                  <div class="col-lg-6">
                     <div class="blog-item solid-bg">
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
               <?php } 
               $count++;?>
         <?php
            }
         } else {
            // Постов не найдено
         }

         // Возвращаем оригинальные данные поста. Сбрасываем $post.
         wp_reset_postdata();
         ?>
      </div>
      <div class="row">
         <div class="col-lg-12 text-center">
            <div class="blog-btn">
               <a href="<?php echo get_field('blog_button')['url'] ?>" class="primary-btn"><?php echo get_field('blog_button')['title'] ?></a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Blog Section End -->

<?php get_footer(); ?>