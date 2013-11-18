<?php include 'header.php'; ?>
<div class="row">
    <form class="form-inline" role="form" method="post" action="<?php _e(BASE_URL); ?>">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">All</option>
                        <option value="M" <?php if(isset($data) && $data['gender'] == 'M') { echo "selected"; } ?>>Male</option>
                        <option value="F" <?php if(isset($data) && $data['gender'] == 'F') { echo "selected"; } ?>>Female</option>
                      </select>
                  </div>
                </div>
            <div class="col-md-3">
                <div class="form-group">
                <label for="age">Age Bracket</label>
                <select name="age" class="form-control">
                    <option value="0">All</option>
                    <option value="5" <?php if(isset($data) && $data['age'] == '5') { echo "selected"; } ?>>1 to 5 yrs</option>
                    <option value="10" <?php if(isset($data) && $data['age'] == '10') { echo "selected"; } ?>>6 to 10 yrs</option>
                    <option value="15" <?php if(isset($data) && $data['age'] == '15') { echo "selected"; } ?>>11 to 15 yrs</option>                    
                    <option value="20" <?php if(isset($data) && $data['age'] == '20') { echo "selected"; } ?>>16 to 20 yrs</option>
                    <option value="25" <?php if(isset($data) && $data['age'] == '25') { echo "selected"; } ?>>21 to 25 yrs</option>
                    <option value="30" <?php if(isset($data) && $data['age'] == '30') { echo "selected"; } ?>>26 to 30 yrs</option>
                    <option value="35" <?php if(isset($data) && $data['age'] == '35') { echo "selected"; } ?>>31 to 35 yrs</option>
                    <option value="40" <?php if(isset($data) && $data['age'] == '40') { echo "selected"; } ?>>36 to 40 yrs</option>
                    <option value="45" <?php if(isset($data) && $data['age'] == '45') { echo "selected"; } ?>>41 to 45 yrs</option>
                    <option value="50" <?php if(isset($data) && $data['age'] == '50') { echo "selected"; } ?>>46 to 50 yrs</option>
                    <option value="55" <?php if(isset($data) && $data['age'] == '55') { echo "selected"; } ?>>51 to 55 yrs</option>
                    <option value="60" <?php if(isset($data) && $data['age'] == '60') { echo "selected"; } ?>>56 to 60 yrs</option>
                    <option value="65" <?php if(isset($data) && $data['age'] == '65') { echo "selected"; } ?>>61 to 65 yrs</option>
                    <option value="100" <?php if(isset($data) && $data['age'] == '100') { echo "selected"; } ?>>66 and above</option>
                  </select>
             </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label for="salary">Salary (Annual)</label>
                <select name="salary" class="form-control">
                    <option value="0">All</option>
                    <?php for($i=0; $i<=1500000; $i=$i+10000): ?>
                    <?php if ($i-10000 >= 0): ?>
                    <option value=<?php _e($i); ?> <?php if(isset($data['salary']) && $data['salary'] == $i) { echo "selected"; } ?>><?php _e('P'.number_format($i-10000, 0, '', ',')); ?> to <?php _e('P'.number_format($i, 0, '', ',')); ?></option>
                    <?php endif; ?>
                    <?php endfor; ?>
                  </select>
              </div>
            </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="cities">Location</label>
                    <select name="cities" class="form-control">
                        <option value="">All</option>
                        <?php foreach($cities as $city):?>
                        <option value="<?php _e($city->id); ?>" <?php if(isset($data['cities']) && $data['cities'] == $city->id) { echo "selected"; } ?>><?php _e($city->name); ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                </div>
          </div>

        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center">
        <label class="control-label">&nbsp;</label><br />
        <button type="submit" class="btn btn-lg btn-info">Search Budget Allocation By Sector</button>
    </div>
    <div class="col-md-2"></div>
    </div>
    </form>
</div>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
        <h2 class="text-center"><?php _e($respondents . ' Total Respondents')?></h2>
       <!-- <div id="piechart_3d" style="width: 500px; height: 500px;"></div> -->
       <div id="piechart" style="width: 900px; height: 500px;"></div>
  </div>
  <div class="col-md-1"></div>
</div>

<div class="row">
    <div class="text-center">
        <a type="button" class="btn btn-lg btn-success" href="<?php _e(BASE_URL .'survey/new'); ?>">Submit Your Budget</a>
    </div>
</div>

<?php include 'footer.php'; ?>


          