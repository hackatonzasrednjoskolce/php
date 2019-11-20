<html>
<head>
    <title>Add new brand</title>
    <?php include 'templates/includes/css.php'; ?></head>
<body>
    <div class="container">
        <?php include 'templates/includes/menu.php'; ?>

        <form action="/cars/add" method="post">
            <div class="form-group">
                <label for="brand">Brand</label>
                <select name="brand" id="brand" class="form-control">
                    <?php foreach ($brands as $brand) { ?>
                        <option value="<?php echo $brand['id']; ?>"><?php echo $brand['title']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="model">Model name</label>
                <input placeholder="Enter model name" id="model" type="text" name="model" class="form-control" />
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input placeholder="Enter year" id="year" type="number" name="year" class="form-control" />
            </div>
            <div class="form-group">
                <label for="doors">Number of doors</label>
                <input placeholder="Enter number of doors" id="doors" type="number" name="doors" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Add</button>
        </form>
    </div>
    <?php include 'templates/includes/js.php'; ?>
</body>
</html>
