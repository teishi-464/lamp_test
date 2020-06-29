<?php
    $dsn = 'mysql:dbname=test_db;host=localhost;';
    $user = 'koizumi';
    $password = 'syutyu4647';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "select * from user;";
        $result = $dbh->query($sql);
        $result2 = $dbh->query($sql);
    } catch (PDOException $e) {
        print "Failed: " . $e->getMessage() . "\n";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamp sample page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-dark navbar-dark">
        <div class="container-fruir">
            <div class="nav-header">
                <a href="" class="nabvar-class" href="index.html">Lamp sample page</a>
            </div>
        </div>
    </nav>

    <div class="jambotrom jumbotrom-fruir">
        <div class="container">
            <h1 class="display-4">DB Manager -sample-</h1>
            <p class="read">LAMP環境実験用のサイトです。<br>そうですね。</p>
        </div>
    </div>

    <div class="container">
        <?php if($_GET['fg'] == 1){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } else if ($_GET['fg'] == 2){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
    </div>
    

    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#select" class="nav-link active" data-toggle="tab">Select</a>
            </li>
            <li class="nav-item">
                <a href="#insert" class="nav-link" data-toggle="tab">Insert</a>
            </li>
            <li class="nav-item">
                <a href="#update" class="nav-link" data-toggle="tab">Update</a>
            </li>
            <li class="nav-item">
                <a href="#delete" class="nav-link" data-toggle="tab">Delete</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="select">
                <table class="table table-striped mt-3">
                    <caption>Show User Table</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $value) { ?>
                            <tr>
                                <th><?php echo "$value[id]"; ?></th>
                                <td><?php echo "$value[name]"; ?></td>
                                <td><?php echo "$value[age]"; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="insert">
                <form class="mt-3" action="./insert.php" method="post">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="age" name="age">
                        </div>
                    </div>
                    <div class="form-group row">
                            <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="update">
                <form class="mt-3" action="./update.php" method="post">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="age" name="age">
                        </div>
                    </div>
                    <div class="form-group row">
                            <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="delete">
                <table class="table table-striped mt-3">
                    <caption>Show User Table</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result2 as $value) { ?>
                            <tr>
                                <th><?php echo "$value[id]"; ?></th>
                                <td><?php echo "$value[name]"; ?></td>
                                <td><?php echo "$value[age]"; ?></td>
                                <td>
                                    <form action="./delete.php" method="get">
                                        <input class="d-none" type="text" name="id" value="<?php echo "$value[id]"; ?>">
                                        <button class="btn btn-danger" type="submit">delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
