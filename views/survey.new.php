<?php include 'header.php'; ?>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
      <h2 class="text-center">It's Your money, You Decide.</h2>
      <p class="lead text-center">Time to let our policy makers know what we think is important to us!</p>
      <form class="form-signin" method="post" action="<?php _e(BASE_URL ."survey/submitted"); ?>">
        <div class="row">
           <div class="col-xs-6">
              <div class="form-group">
             <input type="number" class="form-control" name="age" min="1" max="75" placeholder="Your age" required />
             </div>
           </div>
           <div class="col-xs-6">
               <div class="form-group">
               <input type="number" class="form-control" name="salary" min="0" max="150000" step="10000" placeholder="Your salary" required />
               </div>
           </div>
        </div>
        <div class="row">
           <div class="col-xs-6">
               <div class="form-group">
               <select id="gender" class="form-control" name="gender" required />
                    <option disabled selected>Your gender</option>
                    <option value="M">Male</option>
                    <option value="M">Female</option>
                </select>
               </div>
           </div>
           <div class="col-xs-6">
                <select id="cities" class="form-control" name="cities" />
                    <option disabled selected>Your location</option>
                    <?php foreach($cities as $city):?>
                    <option value="<?php _e($city->id); ?>"><?php _e($city->name); ?></option>
                    <?php endforeach; ?>
                </select>
           </div>
        </div>
          
       <!-- Services -->
       
       <div class="panel panel-info">
            <div class="panel-heading text-center"><h4>What's important to you?</h4>
            <p>Least (1) to Highest (10) Priority</p>
            </div>
            
            <ul class="list-group">
        
            <li class="list-group-item">
                <div class="row">
                    <div class="col-xs-12">
                         <div class="form-group">Economic Services</div>
                    </div>   
                  </div> 
                 <div class="row">
                      <div class="col-xs-10">
                           <div class="form-group">
                               <input type="range" class="form-control" name="economic_services" min="1" max="10" required onchange="updateTextInput(this.value, 'economic_services');"" />  
                           </div>
                      </div>   
                      <div class="col-xs-2">
                           <div class="form-group">
                               <input type="text" class="form-control" id="economic_services" value="6" disabled>
                           </div>
                      </div>   
                  </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-xs-12">
                         <div class="form-group">Social Services</div>
                    </div>   
                  </div> 
                 <div class="row">
                      <div class="col-xs-10">
                           <div class="form-group">
                               <input type="range" class="form-control" name="social_services" min="1" max="10" required onchange="updateTextInput(this.value, 'social_services');"" />  
                           </div>
                      </div>   
                      <div class="col-xs-2">
                           <div class="form-group">
                               <input type="text" class="form-control" id="social_services" value="6" disabled>
                           </div>
                      </div>   
                  </div>
            </li>

             <li class="list-group-item">
                <div class="row">
                    <div class="col-xs-12">
                         <div class="form-group">General Public Services</div>
                    </div>   
                  </div> 
                 <div class="row">
                      <div class="col-xs-10">
                           <div class="form-group">
                               <input type="range" class="form-control" name="public_services" min="1" max="10" required onchange="updateTextInput(this.value, 'public_services');"" />  
                           </div>
                      </div>   
                      <div class="col-xs-2">
                           <div class="form-group">
                               <input type="text" class="form-control" id="public_services" value="6" disabled>
                           </div>
                      </div>   
                  </div>
            </li>

             <li class="list-group-item">
                <div class="row">
                    <div class="col-xs-12">
                         <div class="form-group">Debt Services</div>
                    </div>   
                  </div> 
                 <div class="row">
                      <div class="col-xs-10">
                           <div class="form-group">
                               <input type="range" class="form-control" name="debt_services" min="1" max="10" required onchange="updateTextInput(this.value, 'debt_services');"" />  
                           </div>
                      </div>   
                      <div class="col-xs-2">
                           <div class="form-group">
                               <input type="text" class="form-control" id="debt_services" value="6" disabled>
                           </div>
                      </div>   
                  </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-xs-12">
                         <div class="form-group">Defense</div>
                    </div>   
                  </div> 
                 <div class="row">
                      <div class="col-xs-10">
                           <div class="form-group">
                               <input type="range" class="form-control" name="defense" min="1" max="10" required onchange="updateTextInput(this.value, 'defense');"" />  
                           </div>
                      </div>   
                      <div class="col-xs-2">
                           <div class="form-group">
                               <input type="text" class="form-control" id="defense" value="6" disabled>
                           </div>
                      </div>   
                  </div>
            </li>

            </ul>
       </div>
       
        <div class="form-group">
        <textarea class="form-control" rows="5" name="comment" placeholder="How did you come up with these choices? Feel free to speak your mind! Remember that your response is completely anonymous."></textarea>
        </div> 
        <input type="hidden" class="form-control" name="trap" value="">
        <input type="submit" class="btn btn-lg btn-success btn-block" name="submit" value="Submit">

        </form>
  </div>
  <div class="col-md-2"></div>
</div>



<?php include 'footer.php'; ?>