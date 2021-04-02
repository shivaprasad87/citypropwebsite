
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Blog</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?= site_url('admin/blogs/add_blog') ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="category" class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category">
                                    <?php
                                    foreach ($blog_categories as $category) {
                                        ?>
                                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-sm-2 control-label">Blog Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="blog_type">
                                  <?php
                                    foreach ($blog_types as $types) {
                                        ?>
                                        <option value="<?= $types->id ?>"><?= $types->blog_type ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>

                            <div class="col-sm-10 <?= form_error('title') ? 'has-error' : '' ?>">
                                <textarea name="title" class="form-control admin-blog-title " id="admin-blog-title" placeholder="Type the title here"><?= set_value('title') ?></textarea>
                                <span class="<?= form_error('title') ? 'text-danger' : '' ?>"><?= form_error('title') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_title" class="col-sm-2 control-label">Meta Title</label>

                            <div class="col-sm-10 <?= form_error('meta_title') ? 'has-error' : '' ?>">
                                <input type="text" name="meta_title" class="form-control" id="inputEmail3" placeholder="Type the meta title here" value="<?= set_value('meta_title') ?>">
                                <span class="<?= form_error('meta_title') ? 'text-danger' : '' ?>"><?= form_error('meta_title') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords" class="col-sm-2 control-label">Meta Keywords</label>

                            <div class="col-sm-10 <?= form_error('meta_keywords') ? 'has-error' : '' ?>">
                                <input type="text" name="meta_keywords" class="form-control" id="inputEmail3" placeholder="Type the meta keywords here" value="<?= set_value('meta_keywords') ?>">
                                <span class="<?= form_error('meta_keywords') ? 'text-danger' : '' ?>"><?= form_error('meta_keywords') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_desc" class="col-sm-2 control-label">Meta Description</label>
                            <div class="col-sm-10 <?= form_error('meta_desc') ? 'has-error' : '' ?>">
                                <textarea class="form-control" name="meta_desc" id="editor2" placeholder="Type the Meta Description Here" rows="5"><?= set_value('meta_desc'); ?></textarea>
                                <span class="<?= form_error('meta_desc') ? 'text-danger' : '' ?>"><?= form_error('meta_desc') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-sm-2 control-label">Author</label>

                            <div class="col-sm-10 <?= form_error('author') ? 'has-error' : '' ?>">
                                <input type="text" name="author" class="form-control" id="inputEmail3" placeholder="Type the author name here" value="<?= set_value('author') ?>">
                                <span class="<?= form_error('author') ? 'text-danger' : '' ?>"><?= form_error('author') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label">Content</label>
                            <div class="col-sm-10 <?= form_error('content') ? 'has-error' : '' ?>">
                                <textarea class="form-control" name="content" id="editor1" placeholder="Type the Content Here" rows="5"><?= set_value('content'); ?></textarea>
                                <span class="<?= form_error('content') ? 'text-danger' : '' ?>"><?= form_error('content') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tags" class="col-sm-2 control-label">Tags</label>
                            <div class="col-sm-10 <?= form_error('tags') ? 'has-error' : '' ?>">
                                <input name="tags" type="text" class="form-control" id="tags" data-role="tagsinput" placeholder="Add Tags" />
                                <span class="<?= form_error('tags') ? 'text-danger' : '' ?>"><?= form_error('tags') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Display Image</label>
                            <div class="col-sm-10 <?= form_error('uploadImage') ? 'has-error' : '' ?>">
                                <input type="file" name="uploadfile">(Image size 1920 * 550)
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="alt_title" class="col-sm-2 control-label">Alt Title</label>
                            <div class="col-sm-10 <?= form_error('alt_title') ? 'has-error' : '' ?>">
                                <input name="alt_title" type="text" class="form-control" id="tags" placeholder="add title" />
                                <span class="<?= form_error('alt_title') ? 'text-danger' : '' ?>"><?= form_error('alt_title') ?></span>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="image_description" class="col-sm-2 control-label">Image Description</label>
                            <div class="col-sm-10 <?= form_error('image_description') ? 'has-error' : '' ?>">
                                <input name="image_description" type="text" class="form-control" id="image_description"  placeholder="Add description" />
                                <span class="<?= form_error('image_description') ? 'text-danger' : '' ?>"><?= form_error('image_description') ?></span>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="date" class="col-sm-2 control-label">Date</label>

                            <div class="col-sm-10 <?= form_error('date') ? 'has-error' : '' ?>">
                                <input type="text" name="date" class="form-control" id="date" placeholder="Choose date" value="<?= set_value('date',date('Y-m-d')) ?>">
                                <span class="<?= form_error('date') ? 'text-danger' : '' ?>"><?= form_error('date') ?></span>
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