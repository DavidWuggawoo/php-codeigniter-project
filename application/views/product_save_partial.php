<?php if ($success) { ?>
    <p class="bg bg-success">
    <?php
    switch ($message) {
        case 'create':
            echo 'Product created successfully!';
            break;
        case 'update': default:
        echo 'Product updated successfully!';
        break;
        case 'delete':
            echo 'Product deleted successfully!';
        break;
    }
    ?>
<?php } else { ?>
    <p class="bg bg-danger">
    <?php
    switch ($message) {
        case 'create':
            echo 'There was an error creating your product, please retry.';
            break;
        case 'update': default:
        echo 'There was an error updating your product, please retry.';
        break;
        case 'delete': default:
        echo 'There was an error deleting your product, please retry.';
        break;
    }
    ?>

<?php } ?>
    </p>
    <p class="bg bg-info"> You will be redirected in 5 seconds</p>
<?php header( "refresh:5;url=/index.php/product" );