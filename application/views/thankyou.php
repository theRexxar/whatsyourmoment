<?php
    /** 
     *      @author     : Jepri Torang Sinaga
     *      @access     : whatsyourmoments.com
     *      @copyright  : whatsyourmoments.com
     *      @version    : 1.0 Beta
     *
     */
?>

<?php 
  $ses_user = $this->session->userdata('User');
?>

<?php
    $title = 'whatsyourmoments.me ~ Home';
?>

<?php
    include('include/html_head.php');   // include file head html
?> 
<div class="row left-icon">
  <div class="columns ten offset-by-six">
    <h1><a href="<?php echo base_url()?>"><img src="<?php echo base_url();?>assets/images/logo.png" alt="Best Moments in Life"></a></h1>
    <article>
      <p>We all have our own best moment in life: Meeting your love for the first time, touching the fingers of your newly born child, graduating from school or simply going to the music concert you’ve been dreaming of. </p>
    </article>
  </div>
</div>

<div class="row right-icon">
  <div class="columns six text-right ">
    <div class="countdown">
      <div class="time-text">
        <span class="day">DAYS</span>
        <span class="hour">HOUR</span>
        <span class="minutes">MINUTE</span>
        <span class="second">SECOND</span>
      </div>
      <span data-time="1368835200" class="count-down"></span>
    </div>
  </div>
  <div class="columns ten">
    <article>
      <p>Do you still remember yours? Share it here and let it take you back to that moment and the thrill that comes with it! </p>
    </article>
  </div>  
</div>

<div class="row top-icon">
  <div class="columns ten offset-by-one">
    <article>
      <p class="text-center">Best Moment in Life is a fun-seeking website that compiles a true expression of <br> <span>life from love, friendship, hobby, trends, work, family, and many more.</span></p>
    </article>
    <section class="user text-center">
      <p>Thank you very much for sharing your best moment in life. </p>
      <p><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/images/back.png" alt=""> </a></p>
    </section>
  </div>
</div>

<div id="fb-root"></div>

<?php
    include('include/html_footer.php');   // include file head html
?> 