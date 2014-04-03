        <a href="">
            Create New Product
        </a>
        <table>
            <thead>
            <td>Name</td>
            <td>Description</td>
            <td>Enabled</td>
            <td>Created</td>
            <td>Updated</td>
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
                        <?php echo $product->created; ?>
                    </td>
                    <td>
                        <?php echo $product->updated; ?>
                    </td>
                    <td>
                        <button class="btn btn-success">Save Row</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>