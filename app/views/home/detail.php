<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['tasks']['username'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['tasks']['email'];?></h6>
            <p class="card-text"><?= $data['tasks']['description'];?></p>
            <p class="card-text"><?= $data['tasks']['is_complete'] == 1 ? '<span class="badge badge-success">Done</span>' : '<span class="badge badge-warning">On Progress</span>'?></p>
            <a href="<?= BASEURL; ?>" class="card-link">Back</a>
        </div>
    </div>
</div>