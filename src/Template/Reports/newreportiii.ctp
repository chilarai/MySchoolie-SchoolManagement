<?php


foreach ($studentlist as $key => $value) {
  $student[$value['student_id']]=$value['student_name'];
}

?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Reports</a></li>
	<li class="active">New Report</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">New Report For Class III</h1>
<!-- end page-header -->
<form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >
<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Details</h4>
            </div>
            <div class="panel-body">
			
				<?php if($status == 200): ?>
                <div class="alert alert-success fade in m-b-15">
                    <strong>Success!</strong>
                    <?php echo $message; ?>
                    <span class="close" data-dismiss="alert">&times;</span>
                </div>
                <?php elseif($status == 400): ?>
                <div class="alert alert-danger fade in m-b-15">
                    <strong>Failure! </strong>
                    <?php echo $message; ?>
                    <span class="close" data-dismiss="alert">&times;</span>
                </div>                    
                <?php endif; ?>
				
				

				<div class="form-group">
					<label class="col-md-2 control-label">Student</label>
					<div class="col-md-10">
					<?php echo $this->Form->input('student_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$student, "id"=>"student_id"));?>
					</div>
				</div>
			
				<div class="form-group">
                    <label class="col-md-2 control-label">At Sanskar Jyoti</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" name="atsjs" >
                    </div>
                </div>
				
			</div>
		</div>
		<!-- end panel-->
		
		<!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Scholastics</h4>
            </div>
            <div class="panel-body">
					
					
			<table class="table">
                    <thead>
                        <th></th>
                        <th></th>
                       
                    </thead>
                    <tbody>
                  
                        <tr>
                            <td class="col-md-6">
                            
                        
            <div class="form-group">
				<label class="col-md-2 control-label"><b><u> English </u></b></label>
			</div>   
			<div class="form-group">
				<label class="col-md-4 control-label"><b> Comprehension </b></label>
			</div>
				
                <div class="form-group">
                    <label class="col-md-6 control-label">Is able to grasp the main idea </label>
                    <div class="col-md-2">
						<select class="form-control" name="Is_able_to_grasp_the_main_idea"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Understands the text</label>
                    <div class="col-md-2">
						<select class="form-control" name="Understands_the_text"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Is able to Summarize</label>
                    <div class="col-md-2">
						<select class="form-control" name="Is_able_to_Summarize"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
			
			<div class="form-group">
				<label class="col-md-4 control-label"><b> Listening Skills </b></label>
			</div>
			
				<div class="form-group">
                    <label class="col-md-6 control-label">Is Attentive </label>
                    <div class="col-md-2">
						<select class="form-control" name="Is_Attentive"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Follows Multiple Instructions </label>
                    <div class="col-md-2">
						<select class="form-control" name="Follows_Multiple_Instructions"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b> Speaking Skills </b></label>
				</div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Speaks fluently and confidently </label>
                    <div class="col-md-2">
						<select class="form-control" name="Speaks_fluently_and_confidently"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Has good pronunciation </label>
                    <div class="col-md-2">
						<select class="form-control" name="Has_good_pronunciation"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Contributes to discussions </label>
                    <div class="col-md-2">
						<select class="form-control" name="Contributes_to_discussions"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Has a rich vocabulary </label>
                    <div class="col-md-2">
						<select class="form-control" name="Has_a_rich_vocabulary"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b> Reading Skills </b></label>
				</div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Is interested in reading</label>
                    <div class="col-md-2">
						<select class="form-control" name="Is_interested_in_reading"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Reads with fluency </label>
                    <div class="col-md-2">
						<select class="form-control" name="Reads_with_fluency"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Understands contexts </label>
                    <div class="col-md-2">
						<select class="form-control" name="Understands_contexts"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b> Writing Skills </b></label>
				</div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Writes legibly and neatly </label>
                    <div class="col-md-2">
						<select class="form-control" name="Writes_legibly_and_neatly"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Puts information in vocabulary</label>
                    <div class="col-md-2">
						<select class="form-control" name="Puts_information_in_vocabulary"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Has creative expression </label>
                    <div class="col-md-2">
						<select class="form-control" name="Has_creative_expression"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
				<label class="col-md-2 control-label"><b><u> Science </u></b></label>
			</div>   
			
			
			<div class="form-group">
				<label class="col-md-4 control-label"><b> Awareness </b></label>
			</div>
			
				<div class="form-group">
                    <label class="col-md-6 control-label">Exhibits curiosity</label>
                    <div class="col-md-2">
						<select class="form-control" name="Exhibits_curiosity1"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Relates to his/her personal experience </label>
                    <div class="col-md-2">
						<select class="form-control" name="Relates_to_his_her_personal_experience1"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b> Understanding of Concepts </b></label>
				</div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Can Recall</label>
                    <div class="col-md-2">
						<select class="form-control" name="Can_Recall1"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Understands texts and visuals</label>
                    <div class="col-md-2">
						<select class="form-control" name="Understands_texts_and_visuals1"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Is able to organize and sequence information</label>
                    <div class="col-md-2">
						<select class="form-control" name="Is_able_to_organize_and_sequence_information1"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Applies and Infers </label>
                    <div class="col-md-2">
						<select class="form-control" name="Applies_and_Infers1"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b> Response and Participation </b></label>
				</div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Asks questions</label>
                    <div class="col-md-2">
						<select class="form-control" name="Asks_questions1"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Enjoys group work </label>
                    <div class="col-md-2">
						<select class="form-control" name="Enjoys_group_work1"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Remains focussed </label>
                    <div class="col-md-2">
						<select class="form-control" name="Remains_focussed1"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Does research </label>
                    <div class="col-md-2">
						<select class="form-control" name="Does_research1"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				</td>
				
				
				<td class="col-md-6">
			<div class="form-group">
				<label class="col-md-2 control-label"><b><u> Mathematics </u></b></label>
			</div>   
			
				
                <div class="form-group">
                    <label class="col-md-6 control-label">Has conceptual understanding</label>
                    <div class="col-md-2">
						<select class="form-control" name="Has_conceptual_understanding"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Has operational skills</label>
                    <div class="col-md-2">
						<select class="form-control" name="Has_operational_skills"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Can apply the operation efficiently</label>
                    <div class="col-md-2">
						<select class="form-control" name="Can_apply_the_operation_efficiently"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
			
				<div class="form-group">
                    <label class="col-md-6 control-label">Is able to interpret word problems and apply the correct operation </label>
                    <div class="col-md-2">
						<select class="form-control" name="Is_able_to_interpret_word_problems_and_apply_the_correct_operation"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Is able to apply concepts and operational skills to solve problems </label>
                    <div class="col-md-2">
						<select class="form-control" name="Is_able_to_apply_concepts_and_operational_skills_to_solve_problems"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>	
				
			<div class="form-group">
				<label class="col-md-2 control-label"><b><u> Social Studies </u></b></label>
			</div>   
			
			
			<div class="form-group">
				<label class="col-md-4 control-label"><b> Awareness </b></label>
			</div>
			
				<div class="form-group">
                    <label class="col-md-6 control-label">Exhibits curiosity</label>
                    <div class="col-md-2">
						<select class="form-control" name="Exhibits_curiosity"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Relates to his/her personal experience </label>
                    <div class="col-md-2">
						<select class="form-control" name="Relates_to_his_her_personal_experience"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b> Understanding of Concepts </b></label>
				</div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Can Recall</label>
                    <div class="col-md-2">
						<select class="form-control" name="Can_Recall"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Understands texts and visuals</label>
                    <div class="col-md-2">
						<select class="form-control" name="Understands_texts_and_visuals"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Is able to organize and sequence information</label>
                    <div class="col-md-2">
						<select class="form-control" name="Is_able_to_organize_and_sequence_information"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Applies and Infers </label>
                    <div class="col-md-2">
						<select class="form-control" name="Applies_and_Infers"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b> Response and Participation </b></label>
				</div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Asks questions</label>
                    <div class="col-md-2">
						<select class="form-control" name="Asks_questions"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Enjoys group work </label>
                    <div class="col-md-2">
						<select class="form-control" name="Enjoys_group_work"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Remains focussed </label>
                    <div class="col-md-2">
						<select class="form-control" name="Remains_focussed"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">Does research </label>
                    <div class="col-md-2">
						<select class="form-control" name="Does_research"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
				<label class="col-md-2 control-label"><b><u> हिंदी </u></b></label>
			</div>   
			
			
			<div class="form-group">
				<label class="col-md-4 control-label"><b> समझ बूझ </b></label>
			</div>
			
				<div class="form-group">
                    <label class="col-md-6 control-label">मुख्य विषय को समझने की क्षमता</label>
                    <div class="col-md-2">
						<select class="form-control" name="mukhya"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">पाठ की समझ </label>
                    <div class="col-md-2">
						<select class="form-control" name="paath_ki"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">पाठ का सार समझने की क्षमता</label>
                    <div class="col-md-2">
						<select class="form-control" name="paath_ka"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b> सुनने का कौशल </b></label>
				</div>
				
				
				
				<div class="form-group">
                    <label class="col-md-6 control-label">एकाग्रता</label>
                    <div class="col-md-2">
						<select class="form-control" name="ek"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">अनेक निर्देशों को समझने की क्षमता</label>
                    <div class="col-md-2">
						<select class="form-control" name="anek"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b> वाक कौशल</b></label>
				</div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">आत्मविश्वास के साथ धारा प्रवाह बोलना </label>
                    <div class="col-md-2">
						<select class="form-control" name="aatm"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">सही उच्चारण</label>
                    <div class="col-md-2">
						<select class="form-control" name="sahi"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
			
				<div class="form-group">
                    <label class="col-md-6 control-label">चर्चा में भाग लेना </label>
                    <div class="col-md-2">
						<select class="form-control" name="charcha"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">प्रचुर शब्द भंडार या शब्दों की जानकारी </label>
                    <div class="col-md-2">
						<select class="form-control" name="prachur"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b> पठन कौशल </b></label>
				</div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">पढ़ने में रूचि लेना </label>
                    <div class="col-md-2">
						<select class="form-control" name="padhne"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">धारा प्रवाह पढ़ना </label>
                    <div class="col-md-2">
						<select class="form-control" name="dhara"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">विषय वस्तु समझना </label>
                    <div class="col-md-2">
						<select class="form-control" name="vishya"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
					<label class="col-md-4 control-label"><b>लेखन कौशल</b></label>
				</div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">पढ़ने योग्य साफ लेख</label>
                    <div class="col-md-2">
						<select class="form-control" name="padhneyog"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">क्रम से सही जानकारी देना</label>
                    <div class="col-md-2">
						<select class="form-control" name="kram"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">नवीन शब्दों का प्रयोग </label>
                    <div class="col-md-2">
						<select class="form-control" name="navin"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-6 control-label">रचनात्मक अभिवक्ति </label>
                    <div class="col-md-2">
						<select class="form-control" name="rachnatmk"  placeholder="">
                            <option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
                    </div>
                </div>
				
				
				
				</td>
						</tr>
                   
                    </tbody>
                </table>
				
			</div>
		</div>
		
		<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Co-Scholastics</h4>
            </div>
            <div class="panel-body">
									
									

					
			<table class="table">
				<thead>
					<th></th>
					<th></th>
				   
				</thead>
				<tbody>
			  
					<tr>
						<td class="col-md-6">
			
							<div class="form-group">
								<label class="col-md-3 control-label"><b><u> Physical Education </u></b></label>
							</div>   
				
					
							<div class="form-group">
								<label class="col-md-6 control-label">Is fit and agile</label>
								<div class="col-md-2">
									<select class="form-control" name="Is_fit_and_agile"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Is a team player</label>
								<div class="col-md-2">
									<select class="form-control" name="Is_a_team_player"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Exhibits sportsmanship</label>
								<div class="col-md-2">
									<select class="form-control" name="Exhibits_sportsmanship"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
						
							<div class="form-group">
								<label class="col-md-6 control-label">Is interested in knowing the rules of games </label>
								<div class="col-md-2">
									<select class="form-control" name="Is_interested_in_knowing_the_rules_of_games"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Is disciplined and focussed and enthusiastic </label>
								<div class="col-md-2">
									<select class="form-control" name="Is_disciplined_and_focussed_and_enthusiastic"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-2 control-label"><b><u> Visual Arts </u></b></label>
							</div> 
						
							<div class="form-group">
								<label class="col-md-6 control-label">Participates enthusiastically</label>
								<div class="col-md-2">
									<select class="form-control" name="Participates_enthusiastically"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Observes and responds well to design and colour</label>
								<div class="col-md-2">
									<select class="form-control" name="Observes_and_responds_well_to_design_and_colour"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Is creative and imaginative</label>
								<div class="col-md-2">
									<select class="form-control" name="Is_creative_and_imaginative"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Has well developed motor skills </label>
								<div class="col-md-2">
									<select class="form-control" name="Has_well_developed_motor_skills"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-2 control-label"><b><u> Life Skills </u></b></label>
							</div> 
						
							<div class="form-group">
								<label class="col-md-6 control-label">Respectful and considerate</label>
								<div class="col-md-2">
									<select class="form-control" name="Respectful_and_considerate"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Is a team player</label>
								<div class="col-md-2">
									<select class="form-control" name="Is_team_player"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Is self assured</label>
								<div class="col-md-2">
									<select class="form-control" name="Is_self_assured"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Accepts responsibility </label>
								<div class="col-md-2">
									<select class="form-control" name="Accepts_responsibility"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Is Expressive</label>
								<div class="col-md-2">
									<select class="form-control" name="Is_Expressive"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Accepts challenges and changes</label>
								<div class="col-md-2">
									<select class="form-control" name="Accepts_challenges_and_changes"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-2 control-label"><b><u> Technology </u></b></label>
							</div> 
						
							<div class="form-group">
								<label class="col-md-6 control-label">Uses the available technology enthusiastically</label>
								<div class="col-md-2">
									<select class="form-control" name="Uses_the_available_technology_enthusiastically"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Comfortable in understanding technology</label>
								<div class="col-md-2">
									<select class="form-control" name="Comfortable_in_understanding_technology"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
						</td>
						
						<td class="col-md-6">
							
							<div class="form-group">
								<label class="col-md-2 control-label"><b><u> Work Habits </u></b></label>
							</div> 
						
							<div class="form-group">
								<label class="col-md-6 control-label">Presents work neatly</label>
								<div class="col-md-2">
									<select class="form-control" name="Presents_work_neatly"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Responds to instructions</label>
								<div class="col-md-2">
									<select class="form-control" name="Responds_to_instructions"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Submits work promptly</label>
								<div class="col-md-2">
									<select class="form-control" name="Submits_work_promptly"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Works Independently</label>
								<div class="col-md-2">
									<select class="form-control" name="Works_Independently"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Internalizes concepts</label>
								<div class="col-md-2">
									<select class="form-control" name="Internalizes_concepts"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Is able to analyze, apply and enquire</label>
								<div class="col-md-2">
									<select class="form-control" name="Is_able_to_analyze_apply_and_enquire"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-2 control-label"><b><u> Music </u></b></label>
							</div> 
						
							<div class="form-group">
								<label class="col-md-6 control-label">Has a good sense of melody</label>
								<div class="col-md-2">
									<select class="form-control" name="Has_a_good_sense_of_melody"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Has a good sense of rhythm</label>
								<div class="col-md-2">
									<select class="form-control" name="Has_a_good_sense_of_rhythm"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Shows interests and makes effort</label>
								<div class="col-md-2">
									<select class="form-control" name="Shows_interests_and_makes_effort"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label"> Participates well in a group </label>
								<div class="col-md-2">
									<select class="form-control" name="Participates_well_in_a_group"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							
							
							<div class="form-group">
								<label class="col-md-2 control-label"><b><u> Dance </u></b></label>
							</div> 
						
							<div class="form-group">
								<label class="col-md-6 control-label">Has poise and expression</label>
								<div class="col-md-2">
									<select class="form-control" name="Has_poise_and_expression"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Shows interest and effort</label>
								<div class="col-md-2">
									<select class="form-control" name="Shows_interest_and_effort"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Has sense of rhythm</label>
								<div class="col-md-2">
									<select class="form-control" name="Has_sense_of_rhythm"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-6 control-label">Participates well in group </label>
								<div class="col-md-2">
									<select class="form-control" name="Participates_well_in_group"  placeholder="">
										<option value=""></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>
							
						</td>
					</tr>
				</tbody>
			</table>

					<div class="form-group">
						<label class="col-md-2 control-label">Word Sketch</label>
						<div class="col-md-10">
							<textarea rows="10" name="wordsketch"  class="form-control" placeholder="word sketch" ></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Term<i class="fa fa-asterisk text-danger f-s-8"></i></label>
						<div class="col-md-10">
							<select class="form-control" name="term" data-parsley-required="true" placeholder="">
								<option value=""></option>
								<option value="1">First</option>
								<option value="2">Second</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-2">Date  </label>
						<div class="col-md-10">
							<div class="input-group date" id="datetimepicker1">
								<input type="text" class="form-control" name="date" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					
					<div class="form-group">	
					
						<div class="col-md-2">
							<a class="btn btn-warning" href="#modal-dialog" data-toggle="modal">Save</a>
						</div>
						
					</div>
					<!-- #modal-dialog -->
					<div class="modal fade" id="modal-dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title">New Report</h4>
								</div>
								<div class="modal-body">
									Are you sure you want to proceed?
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
									<input type="submit" class="btn btn-warning" name="Save" value="Proceed"/>
								</div>
							</div>
						</div>
					</div>
					<!-- end #modal-dialog -->
			</div>
		</div>
	</div>
</div>
</form>

<script>
    
    $("#class_id").change(function(){
        var newval = $("#class_id").val();
       /* $.post("<?php echo ALL_STUDENT_LIST; ?>",{"class_id":newval}, function(data,status){
            $("a").text(data);
        });*/

          $.post("<?php echo STUDENT_LIST; ?>",{ class_id: newval}, function(data,status){
            //console.log(data);
            var obj = JSON.parse(data);

            //console.log(newarr);
            //console.log(typeof(newarr.student_list));
            var newoptions = "";
            $.each(obj.details.student_list, function(index, obj2){
                //console.log(obj2.name+"-"+obj2.id);
                newoptions += "<option value='"+obj2.id+"'>"+obj2.name+"</option>";
            });
            console.log(newoptions);
            $("#student_id").empty();
            $("#student_id").append(newoptions);
        });
    });

</script>
