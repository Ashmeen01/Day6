
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple</title>
    <link rel="stylesheet" href="../../Tools/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Tools/fontawesome-free/css/all.min.css">
</head>
<body>
    <div class="container">
        <h3 class="text-center text-light mt-4 p-2 text-success bg-success">Simple Project</h3>
        <div class="row">
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="Product">Product</label>
                    <input name="product" type="text" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="price">Amount</label>
                    <input type="text" name="amount" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <button name="btn" class="btn btn-success form-control">Add</button>
                </div>
            </form>
        </div>
        <?php
            include "../process.php";
            $qry = "SELECT SUM(amount) as total  FROM sched ";
            $result = $conn->query($qry);
            $total = $result->fetch_assoc()['total'];
        ?>
        <h2 class=" text-danger">Total <span><span>&#8358;</span><?=number_format($total); ?></span></h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  $sql2 = "SELECT * FROM `sched`";
                  $ress = $conn->query($sql2);
                  $sn = 1;
                  while ($data = $ress->fetch_assoc()):
                    ?>
                    <tr>
                    <td><?=$sn++; ?></td>
                    <td><?=$data['product']; ?></td>
                    <td><?=$data['amount']; ?></td>
                    <td><?=$data['date']; ?></td>
                    <td>
                        <a href=""><button class="btn btn-warning">Edit</button></a>
                        <a href="index.php?delete=<?=$data['id']; ?>"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>