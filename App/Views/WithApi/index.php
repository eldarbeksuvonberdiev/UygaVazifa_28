
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    New Product
</button>
<h2><strong>You are in a page that You will work with API's</strong></h2><br>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/apiaddnew" method="post">
                    <div class="mb-3">
                        <label for="product" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" id="product">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="price">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="ok" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($models as $model) { ?>
            <tr>
                <th><?= $model->id ?></th>
                <td><?= $model->name ?></td>
                <td><?= $model->price ?></td>
                <td><?= $model->quantity ?></td>
                <td>
                    <form action="/delete" method="post">
                        <input type="hidden" name="id" value="<?= $model->id ?>">
                        <button type="submit" name="ok" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                    </form>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>