<?php
/*
   Template Name: Шаблон Contact
   */
get_header();
?>

<!-- Map Section Begin -->
<div class="map" id="contact-map-ID">
   <?php echo get_field('contact_map') ?>
   <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.8272009794478!2d-73.92245562454669!3d40.72182033701522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25eb95b03849f%3A0x5ffecc60fa578b05!2s60%2049th%20Pl%2C%20Maspeth%2C%20NY%2011378%2C%20USA!5e0!3m2!1sen!2sbd!4v1717942247793!5m2!1sen!2sbd" width="auto" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer"></iframe> -->
</div>
<!-- Map Section End -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-5">
            <div class="contact-text">
               <h4>Contacts Us</h4>
               <div class="ct-item">
                  <div class="ci-icon">
                     <span class="ti-location-pin"></span>
                  </div>
                  <div class="ci-text">
                     <ul>
                        <li>
                           <span>Our Location</span>
                           60-49 Road 11378 New York
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="ct-item">
                  <div class="ci-icon">
                     <span class="ti-mobile"></span>
                  </div>
                  <div class="ci-text">
                     <ul>
                        <li>
                           <span>Phone:</span>
                           +65 11.188.888
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="ct-item">
                  <div class="ci-icon">
                     <span class="ti-email"></span>
                  </div>
                  <div class="ci-text">
                     <ul>
                        <li>
                           <span>Mail</span>
                           hellocolorlib@gmail.com
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-7">
            <div class="contact-option">
               <h4>Leave Us A Message</h4>
               <?php echo do_shortcode('[contact-form-7 id="05f1d68" title="Контактная форма на странице Contact" html_class="comment-form contact-form"]') ?>
               <!-- <form action="#" class="comment-form contact-form">
                  <div class="row">
                     <div class="col-lg-6">
                        <input type="text" placeholder="Name">
                     </div>
                     <div class="col-lg-6">
                        <input type="text" placeholder="Email">
                     </div>
                     <div class="col-lg-12">
                        <textarea placeholder="Messages"></textarea>
                        <button type="submit" class="site-btn">Send Message</button>
                     </div>
                  </div>
               </form> -->
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Contact Section End -->

<?php get_footer(); ?>