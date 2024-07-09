<?php
get_header();
?>

<!-- Blog Details Hero  Section Begin -->
<section class="blog-hero-section set-bg spad" data-setbg="<?php the_field('single_bg') ?>">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-9 text-center">
            <div class="bh-text">
               <div class="categories-custom">
                  <?php
                  global $post;
                  $categories = get_the_category($post->ID);
                  if ($categories) {
                     foreach ($categories as $category) {
                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->name . '</a>';
                     }
                  }
                  ?>
               </div>
               <h2><?php the_title() ?></h2>
               <ul>
                  <li>
                     <?php
                     while (have_posts()) :
                        the_post();
                        echo 'By ';
                        the_author();

                     endwhile;
                     ?>
                  </li>
                  <li><?php echo get_the_date() ?></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Blog Details Hero Section End -->

<!-- Blog Details Section Begin -->
<section class="blog-details-section spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 m-auto">
            <div class="bd-text">
               <div class="custom-content">
                  <?php the_content() ?>
               </div>
               <div class="tag-share">
                  <div class="tags">
                     <?php
                     global $post;
                     $tags = get_the_tags($post->ID);
                     if ($tags) {
                        foreach ($tags as $tag) {
                           echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . $tag->name . '</a>';
                        }
                     }
                     ?>
                  </div>
                  <div class="social-share">
                     <span>Share:</span>
                     <!-- Facebook -->
                     <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                        <i class="fa fa-facebook"></i>
                     </a>

                     <!-- Twitter -->
                     <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank">
                        <i class="fa fa-twitter"></i>
                     </a>

                     <!-- Pinterest -->
                     <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" target="_blank">
                        <i class="fa fa-pinterest"></i>
                     </a>

                     <!-- Copy Link -->
                     <?php $permalink = esc_url(get_permalink()); ?>
                     <a onclick="copyToClipboard('<?php echo $permalink; ?>')">
                        <i class="fa fa-copy"></i> Copy Link
                     </a>

                     <!-- JavaScript function to copy link to clipboard -->
                     <script>
                        function copyToClipboard(text) {
                           var tempInput = document.createElement("input");
                           tempInput.style = "position: absolute; left: -1000px; top: -1000px";
                           tempInput.value = text;
                           document.body.appendChild(tempInput);
                           tempInput.select();
                           document.execCommand("copy");
                           document.body.removeChild(tempInput);
                           alert("Link copied to clipboard: " + text);
                        }
                     </script>

                     <!-- <a href="#"><i class="fa fa-facebook"></i></a>
                     <a href="#"><i class="fa fa-twitter"></i></a>
                     <a href="#"><i class="fa fa-google-plus"></i></a>
                     <a href="#"><i class="fa fa-instagram"></i></a>
                     <a href="#"><i class="fa fa-youtube-play"></i></a> -->
                  </div>
               </div>
               <div class="blog-author">
                  <?php
                  global $post;
                  $url = get_avatar_url($post, "size=150&default=monsterid");
                  $img = '<img alt="" src="' . $url . '">';
                  echo $img;
                  ?>
                  <h5><?php the_author() ?></h5>
                  <p><?php the_author_meta('description') ?></p>
                  <div class="bt-social">
                     <?php
                     while (have_posts()) :
                        the_post();
                        $post_id = get_the_ID(); // Assuming you're inside the loop
                        $author_id = 'user_' . get_post_field('post_author', $post_id);
                        if (have_rows('single_repeater-socials', $author_id)) :
                           while (have_rows('single_repeater-socials', $author_id)) : the_row();
                     ?>
                              <a href="<?php the_sub_field('link') ?>"><i class="fa fa-<?php the_sub_field('selection') ?>"></i></a>
                     <?php
                           endwhile;
                        else :
                           echo 'ERROR! Fields not found...';
                        endif;

                     endwhile;
                     ?>
                  </div>
               </div>
               <div class="leave-comment">
                  <h2>Contact Us</h2>
                  <?php echo do_shortcode('[contact-form-7 id="b264d81" title="Форма в открытом посту" html_class="comment-form"]') ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Blog Details Section End -->

<!-- Recommend Section Begin -->
<section class="recommend-section spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="section-title">
               <h2>Recommended</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <?php
         // задаем нужные нам критерии выборки данных из БД
         $args = array(
            'posts_per_page' => 2,
            'post_type' => 'post',
            'orderby' => 'rand',
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
         <!-- <div class="col-md-6">
            <div class="blog-item">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="bi-pic set-bg" data-setbg="<?php echo get_template_directory_uri() ?>/img/blog/blog-1.jpg"></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="bi-text">
                        <ul>
                           <li><i class="fa fa-calendar-o"></i> August 9, 2019</li>
                           <li><i class="fa fa-commenting-o"></i> 0</li>
                        </ul>
                        <h4><a href="#">Every Single Way You Can Wear Pastel Makeup This Spring</a></h4>
                        <p>Never ever think of giving up. Winners never quit and</p>
                        <div class="bt-author">
                           <div class="ba-pic">
                              <img src="<?php echo get_template_directory_uri() ?>/img/blog/author-1.jpg" alt="">
                           </div>
                           <div class="ba-text">
                              <h5>Jeff Rodriguez</h5>
                              <span>Designer</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="blog-item">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="bi-pic set-bg" data-setbg="<?php echo get_template_directory_uri() ?>/img/blog/blog-2.jpg"></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="bi-text">
                        <ul>
                           <li><i class="fa fa-calendar-o"></i> August 9, 2019</li>
                           <li><i class="fa fa-commenting-o"></i> 0</li>
                        </ul>
                        <h4><a href="#">Everything Coming to Netflix Canada in May 2019</a></h4>
                        <p>Never ever think of giving up. Winners never quit and</p>
                        <div class="bt-author">
                           <div class="ba-pic">
                              <img src="<?php echo get_template_directory_uri() ?>/img/blog/author-1.jpg" alt="">
                           </div>
                           <div class="ba-text">
                              <h5>Aaron Russell</h5>
                              <span>Content</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div> -->
      </div>
   </div>
</section>
<!-- Recommend Section End -->

<?php
// while (have_posts()) :
//    the_post();
//    the_content();
// endwhile;
?>
<?php
get_footer();
