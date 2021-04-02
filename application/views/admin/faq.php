<?php
$prop = json_decode(json_encode($this->properties_model->testmonial_properties()),true);
?><link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Update Details</h3>
                    </div><!-- /.box-header -->
                    <div class="box box-primary"></div>
                    <!-- form start -->
                    
                    <form role="form" action="" method="post" role="form">

                        <div class="form-group">
                            <label for="prop" class="col-sm-2 control-label">Project Name</label>
                            <div class="col-sm-10 <?= form_error('project') ? 'has-error' : '' ?>">
                            <select name="prop" class="form-control">
                                <option value="null"></option>
                                <?php
                                foreach ($prop as $p) {
                                   echo "<option value=".$p['id'].">".$p['title']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group <?= form_error('q_faq') ? 'has-error' : '' ?>">
                                        <label for="content">Question</label>
                                        <textarea name="q_faq" class="form-control" id="q_faq"><?= $faq->content ?></textarea> 
                                        <span class="<?= form_error('q_faq') ? 'text-danger' : '' ?>"><?= form_error('q_faq') ?></span>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group <?= form_error('a_faq') ? 'has-error' : '' ?>">
                                        <label for="content">Answer</label>
                                        <textarea name="a_faq" class="form-control" id="a_faq"><?= $faq->q_ans ?></textarea> 
                                        <span class="<?= form_error('a_faq') ? 'text-danger' : '' ?>"><?= form_error('a_faq') ?></span>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group <?= form_error('content') ? 'has-error' : '' ?>">
                                        <label for="content">Content</label>
                                        <textarea name="content" class="form-control" id="aboutUsContent"><?= $faq->content ?></textarea> 
                                        <span class="<?= form_error('content') ? 'text-danger' : '' ?>"><?= form_error('content') ?></span>  
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" id="submit2" value="Submit" />
                            <input type="button" onclick="history.go(-1);" class="btn btn-default" value="Back" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
<div class="clearfix"></div><br><br>