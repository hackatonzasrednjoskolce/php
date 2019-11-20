<html>
<head>
    <title>Add new brand</title>
    <?php include 'templates/includes/css.php'; ?>
</head>
<body>
    <div class="container">
        <?php include 'templates/includes/menu.php'; ?>

        <form action="/brands/add" method="post">
            <div class="form-group">
                <label for="brandName">Brand name</label>
                <input placeholder="Enter brand name" id="brandName" type="text" name="title" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Add</button>
        </form>
    </div>
    <?php include 'templates/includes/js.php'; ?>
</body>
</html>
