<?php include 'header.php'; ?>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
      <h2 class="text-center">It's Your money, You Decide.</h2>
      <p class="lead text-center">Thank you for submitting your budget! See what others with your similar information think about sector budgets.</p>
      <h2 class="text-center"><?php _e($respondents . ' Total Respondents')?></h2>
      <p class="text-center">
        <span class='st_facebook_vcount' displayText='Facebook'></span>
        <span class='st_twitter_vcount' displayText='Tweet'></span>
        <span class='st_plusone_vcount' displayText='Google +1'></span>
      </p>
  </div>
  <div class="col-md-2"></div>
</div>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
      <div id="piechart" style="width: 900px; height: 500px;"></div>
  </div>
  <div class="col-md-1"></div>
</div>
<?php include 'footer.php'; ?>
