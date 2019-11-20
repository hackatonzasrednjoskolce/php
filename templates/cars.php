<html>
<head>
    <title>Car Brands</title>
    <?php include 'templates/includes/css.php'; ?></head>
<body>
    <div class="container">
        <?php include 'templates/includes/menu.php'; ?>

        <form class="form-inline" method="get" action="">

            <select name="brand" class="custom-select my-1 mr-sm-2">
                <option value="">Select brand</option>
                <?php foreach ($brandNames as $key => $value) { ?>
                    <option value="<?php echo $key; ?>" <?php if ($key == $selectedBrand) echo 'selected'; ?> >
                        <?php echo $value; ?>
                    </option>
                <?php } ?>
            </select>

            <button type="submit" class="btn btn-primary my-1">Filter</button>
        </form>

        <table class="table table-striped">

            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Year</th>
                <th scope="col">Number of doors</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($cars as $car) { ?>
                <tr>
                    <th scope="row"><?php echo $car['id']; ?></th>
                    <td><?php echo $brandNames[$car['brand_id']]; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['year_made']; ?></td>
                    <td><?php echo $car['num_of_door']; ?></td>
                    <td>
                        <a href="/cars/edit?car=<?php echo $car['id']; ?>" class="btn btn-warning float-left">edit</a>
                        <form class="form-inline float-left" style="margin-left: 5px; margin-bottom: 0;" method="post" action="/cars/delete">
                            <input type="hidden" name="car" value="<?php echo $car['id']; ?>" />
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>

        <a href="/cars/add" class="btn btn-primary btn-lg btn-block">Add new car</a>
    </div>
    <?php include 'templates/includes/js.php'; ?></body>
</html>
