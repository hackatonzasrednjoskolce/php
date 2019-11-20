<html>
<head>
    <title>Car Brands</title>
    <?php include 'templates/includes/css.php'; ?></head>
<body>

    <div class="container">
        <?php include 'templates/includes/menu.php'; ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($brands as $brand) { ?>
                <tr>
                    <td><?php echo $brand['id']; ?></td>
                    <td><?php echo $brand['title']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="/brands/add" class="btn btn-primary btn-lg btn-block">Add new brand</a>
    </div>
    <?php include 'templates/includes/js.php'; ?></body>
</html>
