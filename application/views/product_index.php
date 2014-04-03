<div id="productListContainer">
    <table class="table table-striped table-bordered" id="productList">
        <thead>
        <td>Name</td>
        <td>Description</td>
        <td>Enabled</td>
        <td>Created</td>
        <td>Updated</td>
        <td></td>
        </thead>
        <tbody>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td><form action="/index.php/product/update/<?php echo $product->id; ?>" method="post">
                        <input type="hidden" value="<?php echo $product->id; ?>" />
                        <input name="name" type="name" value="<?php echo $product->name; ?>" />
                </td>
                <td>
                    <textarea id="description" name="description"><?php echo $product->description; ?></textarea>
                </td>
                <td>
                    <select name="enabled">
                        <?php foreach ($enabledOptions as $value => $key) { ?>
                            <option value="<?php echo (int) $key; ?>" <?php if ($product->enabled == $key) { ?>selected<?php } ?>>
                                <?php echo $value; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <?php echo date('r', $product->created); ?>
                </td>
                <td>
                    <?php echo $product->updated; ?>
                </td>
                <td>
                    <button class="btn btn-info">Update</button>
                    <a class="btn btn-danger" href="/index.php/product/delete/<?php echo $product->id; ?>">Delete</a>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>