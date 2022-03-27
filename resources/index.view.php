<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .todo-item {
            display: flex !important;
            margin: .5rem 0;
            border-radius: 0;
            background: #f7f7f7;
        }
        .todo-item.completed div {
            text-decoration: line-through;
            color: red;
        }
        .todo-item-remove {
            display: none;
        }
        .todo-item:hover .todo-item-remove{
            display: block;
        }
    </style>
    <title>Taskes</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mt-3">
                <div class="card-header p-3">
                    <form action="task/create" method="POST">
                        <div class="input-group">
                            <input type="text" name="description" class="form-control" placeholder="new Task" required>
                            <button class="btn btn-success" type="submit">add</button>
                        </div>
                    </form>
                </div>
                <div class="card-body p-3">
                    <ul class="nav nav-pills justify-content-center mb-4">
                        <li class="nav-item">
                            <a href="<?= home() ?>" class="nav-link">all</a>
                        </li>
                        <li class="nav-item">
                            <a href="?completed=0" class="nav-link">active</a>
                        </li>
                        <li class="nav-item">
                            <a href="?completed=1" class="nav-link">finished</a>
                        </li>
                    </ul>
                    <?php foreach ($tasks as $task) : ?>
                        <div class="todo-item p-2 <?= !$task->completed ? : 'completed' ?>">
                            <div class="p-1">
                                <a href="task/update?id=<?=$task->id?>&completed=<?=$task->completed ? '0' : '1' ?>">
                                    <i class="bi fs-5 <?= $task->completed ? 'bi-check-square':'bi-clock text-secondary'?>">
                                    </i>
                                </a>
                            </div>
                            <div class="flex-fill m-auto p-2">
                                <?= $task->description ?>
                            </div>
                            <div class="mb-2">
                                <a href="task/delete?id=<?= $task->id ?>" class="todo-item-remove">
                                    <i class="bi bi-trash text-danger fs-5"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>