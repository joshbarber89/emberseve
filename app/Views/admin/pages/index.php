<div class="container">
    <div class="title-button">
        <h1>Pages</h1>
        <button class="btn lg-btn">
            Create Page
        </button>
    </div>
    <div class="table">
        <div class="tr tr-header">
            <div class="td">ID</div>
            <div class="td">Name</div>
            <div class="td">URL</div>
            <div class="td">Title</div>
            <div class="td">Update At</div>
            <div class="td">Actions</div>
        </div>
        <?php
            if(!empty($pages)) {
                foreach($pages as $page) {
                    echo
                    '<div class="tr tr-data">
                        <div class="td">'.$page['id'].'</div>
                        <div class="td">'.$page['name'].'</div>
                        <div class="td">'.$page['seo_url'].'</div>
                        <div class="td">'.$page['title'].'</div>
                        <div class="td">'.date('Y-m-d',strtotime($page['updated_at'])).'</div>
                        <div class="td actions"> <a class="edit" href="pages/edit/'.$page['id'].'">Edit</a> <a class="delete" href="pages/delete/'.$page['id'].'">Delete</a></div>
                    </div>';

                }
            }
        ?>
    </div>
</div>