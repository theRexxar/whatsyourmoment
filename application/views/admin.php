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
    $title = 'whatsyourmoments.me ~ Admin';
?>

<?php
    include('include/html_head.php');   // include file head html
?> 
<div class="row">
  <div class="columns six">
    <form action="<?php echo base_url();?>" class="change-url">
      <select name="category" class="category-url">
          <option value="">-- select category --</option>
          <option value="all">all</option>
          <option value="love">Love</option>
          <option value="friendship">Friendship</option>
          <option value="hobby">Hobby</option>
          <option value="trends">Trends</option>
          <option value="work">Work</option>
          <option value="family">Family</option>
          <option value="etc">Etc</option>
      </select>
   </form>
  </div>
</div>

<table class="twelve">
  <thead>
    <tr>
      <th>Facebook User</th>
      <th>Category</th>
      <th>Quote</th>
      <th>Photo</th>
      <th>Video</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($detail_member as $key => $value) : ?>
    <tr>
      <td>
        <img src="<?php echo 'http://graph.facebook.com/'.$value['username'].'/picture?type=normal'; ?>" alt="<?php echo $value['name']; ?>"> <br>
        <?php echo $value['name']; ?>
      </td>
      <td><?php echo $value['category']; ?></td>
      <td><?php echo $value['quote']; ?></td>
      <td>
        <?php if(!empty($value['photo'])): ?>
          <img src="<?php echo base_url();?>uploads/<?php echo $value['photo']; ?>" alt="">
        <?php endif; ?>
      </td>
      <td>
        <?php if(!empty($value['url'])): ?>
          <?php 

            if (strpos($value['url'],'youtube') !== false) {
              $parsed_url = parse_url($value['url']);
              parse_str($parsed_url['query'], $parsed_query_string);
              $v = $parsed_query_string['v'];
              echo '<iframe width="400" height="200" src="http://www.youtube.com/embed/'. $v .'" frameborder="0" allowfullscreen></iframe>';
            }
          ?>
          
        <?php endif; ?>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>


<div id="fb-root"></div>

<?php
    include('include/html_footer.php');   // include file head html
?> 