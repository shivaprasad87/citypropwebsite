
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Career</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form  method="post" action="<?= site_url('admin/career/add') ?>" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="title" class="control-label">Job Title</label>

                                <div class="<?= form_error('title') ? 'has-error' : '' ?>">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Job Title" value="<?= set_value('title') ?>">
                                    <span class="<?= form_error('title') ? 'text-danger' : '' ?>"><?= form_error('title') ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="experience" class="control-label">Experience</label>

                                <div class="<?= form_error('experience') ? 'has-error' : '' ?>">
                                    <input type="text" name="experience" class="form-control" id="experience" placeholder="Job Experience" value="<?= set_value('experience') ?>">
                                    <span class="<?= form_error('experience') ? 'text-danger' : '' ?>"><?= form_error('experience') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="title" class="control-label">Vacancy at Bangalore</label>

                                <div class="<?= form_error('bangalore_vacancy') ? 'has-error' : '' ?>">
                                    <input type="text" name="bangalore_vacancy" class="form-control" id="bangalore_vacancy" placeholder="Vacancy at Bangalore" value="<?= set_value('bangalore_vacancy') ?>">
                                    <span class="<?= form_error('bangalore_vacancy') ? 'text-danger' : '' ?>"><?= form_error('bangalore_vacancy') ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="pune_vacancy" class="control-label">Vacancy at Pune</label>

                                <div class="<?= form_error('pune_vacancy') ? 'has-error' : '' ?>">
                                    <input type="text" name="pune_vacancy" class="form-control" id="pune_vacancy" placeholder="Vacancy at Pune" value="<?= set_value('pune_vacancy') ?>">
                                    <span class="<?= form_error('pune_vacancy') ? 'text-danger' : '' ?>"><?= form_error('pune_vacancy') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="role" class="control-label">Role</label>

                                <div class="<?= form_error('role') ? 'has-error' : '' ?>">
                                    <textarea name="role" class="form-control" id="role" placeholder="Role"><?= set_value('role') ?></textarea>
                                    <span class="<?= form_error('role') ? 'text-danger' : '' ?>"><?= form_error('role') ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="qualities" class="control-label">Qualities</label>

                                <div class="<?= form_error('qualities') ? 'has-error' : '' ?>">
                                    <textarea name="qualities" class="form-control" id="qualities" placeholder="Qualities"><?= set_value('qualities') ?></textarea>
                                    <span class="<?= form_error('qualities') ? 'text-danger' : '' ?>"><?= form_error('qualities') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="qualification" class="control-label">Qualification</label>

                                <div class="<?= form_error('qualification') ? 'has-error' : '' ?>">
                                    <textarea name="qualification" class="form-control" id="qualification" placeholder="Job Qualification"><?= set_value('qualification') ?></textarea>
                                    <span class="<?= form_error('qualification') ? 'text-danger' : '' ?>"><?= form_error('qualification') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="type" class="control-label">Job Type <small>(optional)</small></label>

                                <div class="<?= form_error('type') ? 'has-error' : '' ?>">
                                    <textarea name="type" class="form-control" id="type" placeholder="Job Type"><?= set_value('type') ?></textarea>
                                    <span class="<?= form_error('type') ? 'text-danger' : '' ?>"><?= form_error('type') ?></span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" onclick="history.go(-1);">Back</button>
                        <button type="submit" class="btn btn-info pull-right">ADD</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <div class="clearfix"></div><br><br><br>
            <!-- /.box -->
        </div>
    </div>
</section>