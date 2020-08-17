<div class="container">
  <div class="row">
    <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3><?php echo $page['name']; ?></h3>
        <hr>
        <?php if (session()->get('success')): ?>
          <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
          </div>
        <?php endif; ?>
        <form class="" action="/pages/edit" method="post">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="name">Page Name</label>
               <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name', $page['name']) ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="title">Title</label>
               <input type="text" class="form-control" name="title" id="title" value="<?= set_value('title', $page['title']) ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
              <?php
                    if(!empty($page['featured_image'])) {
                        echo
                        '<img class="image-preview" src="/assets/images/'.$page['featured_image'].'" />';
                    }
               ?>
               <label for="featured-image">Featured Banner Image</label>
               <input type="file" class="form-control" name="featured_image" id="featured_image">
             </div>
           </div>
            <div class="col-12">
              <div class="form-group">
               <label for="content">Content</label>
               <textarea class="ckeditor" cols="80" id="content" name="content" rows="10"><?= set_value('content', $page['content']) ?></textarea>
              </div>
            </div>
           <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="meta_title">Meta Title (SEO)</label>
              <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?= set_value('meta_title', $page['meta_title']) ?>">
            </div>
          </div>
          <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="meta_title">Meta Description (SEO)</label>
              <textarea class="form-control" name="meta_description" id="meta_description"><?= set_value('meta_description', $page['meta_description']) ?></textarea>
            </div>
          </div>
          <div class="col-12 col-sm-6">
             <div class="form-group">
                <?php
                    if(!empty($page['featured_image'])) {
                        echo
                        '<img class="image-preview" src="/assets/images/'.$page['meta_image'].'" />';
                    }
               ?>
              <label for="meta_image">Meta Image (SEO)</label>
              <input type="file" class="form-control" name="meta_image" id="meta_image">
            </div>
          </div>
          <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="seo_url">Meta URL (SEO)</label>
              <input type="text" class="form-control" name="seo_url" id="seo_url" value="<?= set_value('seo_url', $page['seo_url']) ?>">
            </div>
          </div>
          <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          </div>

          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
