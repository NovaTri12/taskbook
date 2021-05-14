<div class="container mt-5">
    <h1>Tasks List</h1>

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary buttonAddData" data-toggle="modal" data-target="#formModal">
                Add Task
            </button>
        </div>
    </div>

    <table id="taskData" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['tasks'] as $task) : ?>
                <tr>
                    <td><?= $task['username'] ?></td>
                    <td><?= $task['email'] ?></td>
                    <td><?= $task['description'] ?></td>
                    <td>
                        <?php echo $task['is_complete'] == 1 ? '<span class="badge badge-success">Done</span>' : '<span class="badge badge-warning">On Progress</span>' ?>
                        <?php echo $task['updated_by'] != '' ? '<span class="badge badge-success">edited by ' . $task['updated_by'] . '</span>' : '' ?>
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ...
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= BASEURL; ?>/Home/detail/<?= $task['id'] ?>">Detail</a>
                                <?php if (!empty($_SESSION)) {
                                    echo '<a class="dropdown-item showUpdateModal" href="' . BASEURL . '/Home/update/" data-toggle="modal" data-target="#formModal" data-id="' . $task['id'] . '">Edit</a>';
                                    echo '<a class="dropdown-item" href="'. BASEURL .'/Home/delete/'.$task['id'].'" onclick="confirm("Are you sure want to delete this data?")">Delete</a>';
                                } ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/Home/add" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_complete" id="is_complete">
                        <label class="form-check-label" for="is_complete">
                            Done
                        </label>
                    </div>

                    <input class="form-check" type="hidden" name="updated_by" value="<?= $_SESSION['user']?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Data</button>
                </form>
            </div>
        </div>
    </div>
</div>