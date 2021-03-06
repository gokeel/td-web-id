    <!--BANNER START-->
    <div class="page-heading"> 
    	<div class="container">
            <h2><?php echo $sub_page_title; ?></h2>
            <p><?php if(isset($course_cat)) echo $course_cat; ?></p>
        </div>
    </div>
    <!--BANNER END-->
    <!--CONTANT START-->
    <div class="contant">
    	<div class="container">
        <div class="row">
          <div class="col-md-9">
            <?php 
            if(empty($teachers)){
            ?>
            <div class="col-md-12">
              <p><?php echo $this->lang->line('teacher_not_found_info_1') ?></p>
              <p><?php echo $this->lang->line('teacher_not_found_info_2') ?></p>
              <a href="<?php echo base_url()?>" class="btn-style"><i class="fa fa-angle-double-left"></i> Back</a>
            </div>
            <?php } ?>
            <?php 
              foreach($teachers as $key => $progs){
                // get the program name
                $program_info = $this->Course_m->get_programs(array('program_id' => $key));
                $program_string = $program_info->row()->program_name;
            ?>
            <div class="row program-row">
              <div class="col-md-12">
                <h3>Program <?php echo $program_string ?></h3>
              </div>
              
              <?php
              if(sizeof($progs) > 0) 
                foreach($progs as $teacher){
                  if(!empty($teacher))
                  {
                    // get latest education
                    $get_latest_edu = $this->User_m->get_education_history_by_userid($teacher['user_id']);
                    $latest_edu = $get_latest_edu<>false ? $get_latest_edu->row()->degree.' '.$get_latest_edu->row()->major.' - '.$get_latest_edu->row()->institution : '';
              ?>
              <div class="col-md-4" style="margin-top: 10px;">
                <div class="profile teacher-list-box" style="text-align:center">
                  <a href="<?php echo base_url('teacher/profile/'.$teacher['user_id']);?>">
                    <!--<div class="label-price">
                      <span>IDR <?php //echo number_format($teacher['salary'], 0, ',', '.')?><!--</span>
                    </div>-->
                    <div class="thumb">
                      <img src="<?php echo UPLOAD_IMAGE_DIR.'/'.$teacher['file_name'];?>" alt="">
                    </div>
                    <div class="title">
                      <h4><?php echo $teacher['first_name'].' '.$teacher['last_name'];?></h4>
                      <p><i><?php echo $latest_edu; ?></i></p>
                      <p><?php echo $teacher['about_me']; ?></p>
                      <br>
                    </div>
                    <div class="footer">
                      <p><?php echo $this->lang->line('competence') ?>:</p>
                      <p><?php echo str_replace(',', ', ', $teacher['courses']); ?></p>
                      <br>
                    </div>
                  </a>
                </div>
              </div>
              <?php }
                  }
              ?>
            </div>
            <?php } ?>
          </div>
          <div class="col-md-3">
            <?php include('sidebar_right.php'); ?>
          </div>
        </div>
            
        	
        </div>
        <br>
        <?php //include('follow_social_media.php'); ?>
    </div>
    <!--CONTANT END-->