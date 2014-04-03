<div id="productCreateContainer">
    <form action="/index.php/product/create" method="post">
        <table class="table table-striped table-bordered">
            <tr>
                <td>Name</td>
            </tr>
            <tr>
                <td>
                    <input name="name" type="name" value="" placeholder="Product Name" />
                </td>
            </tr>
            <tr>
                <td>Description</td>
            </tr>
            <tr>
                <td>
                    <textarea id="description" name="description" placeholder="Product Description"></textarea>
                </td>
            </tr>
            <tr>
                <td>Enabled</td>
            </tr>
            <tr>
                <td>
                    <select name="enabled">
                        <?php foreach ($enabledOptions as $value => $key) { ?>
                            <option value="<?php echo (int) $key; ?>">
                                <?php echo $value; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            <tr>
                <td>
                    <button class="btn btn-success">Create Product</button>
                </td>
            </tr>
        </table>
    </form>
</div>