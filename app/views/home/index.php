<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
    <link rel="stylesheet" href="app/public/css/style.css">
    <link rel="stylesheet" href="app/public/css/button.css">
    <link rel="stylesheet" href="app/public/css/table.css">
    <link rel="stylesheet" href="app/public/css/modal.css">
    <link rel="stylesheet" href="app/public/css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <div class="container">
        <div class="topnav" style="display: flex; justify-content:space-between; width: 100%">
            <button type="button" class="button" id="add-btn">
                <span class="button__text">Add an employee</span>
                <span class="button__icon">
                    <ion-icon name="add"></ion-icon>
                </span>
            </button>
            <button type="button" class="button" id="logout-btn" onclick="window.location.href='logout/clear';">
                <span class="button__text">Logout</span>
                <span class="button__icon">
                    <ion-icon name="log-out"></ion-icon>
                </span>
            </button>
        </div>
        <!--Add modal -->
        <div id="add-modal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="modal-title">Add a new employee</h2>
                <div class="modal-form">
                    <form id="add-form">
                        <label for="name">
                            <span>Name</span>
                            <input type="text" name="name" class="name-input" required>
                        </label>
                        <label for="address">
                            <span>Address</span>
                            <input type="text" name="address" class="address-input" required>
                        </label>
                        <label for="salary">
                            <span>Salary</span>
                            <input type="number" name="salary" class="salary-input" required>
                        </label>
                        <div class="actions">
                            <button id="submit-add-btn" class="submit-btn" type="button" form="add-form" value="Add">
                                Add
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Edit modal -->
        <div id="edit-modal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="modal-title">Edit</h2>
                <div class="modal-form">
                    <form id="edit-form">
                        <input type="text" name="id" class="id-input" id="id_u" style="display: none;">
                        <label for="name">
                            <span>Name</span>
                            <input type="text" name="name" class="name-input" id="name_u" required>
                        </label>
                        <label for="address">
                            <span>Address</span>
                            <input type="text" name="address" class="address-input" id="address_u" required>
                        </label>
                        <label for="salary">
                            <span>Salary</span>
                            <input type="number" name="salary" class="salary-input" id="salary_u" required>
                        </label>
                    </form>
                    <div class="actions">
                        <button id="submit-edit-btn" class="submit-btn" type="button" form="edit-form" value="Edit">
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <table class="content-table">
            <thead>
                <tr>
                    <th class="cl-id">ID</th>
                    <th class="cl-name">Name</th>
                    <th class="cl-address">Address</th>
                    <th class="cl-salary">Salary</th>
                    <th class="cl-actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($employeeList as $employee) {
                ?>
                    <tr>
                        <td><?= $employee['id'] ?></td>
                        <td><?= $employee['name'] ?></td>
                        <td><?= $employee['address'] ?></td>
                        <td><?= $employee['salary'] ?></td>
                        <td>
                            <div class="actions">
                                <button class="edit-btn" data-id="<?php echo $employee["id"]; ?>" data-name="<?php echo $employee["name"]; ?>" data-address="<?php echo $employee["address"]; ?>" data-salary="<?php echo $employee["salary"]; ?>">
                                    Edit
                                </button>
                                <button class="delete-btn" value=<?= $employee['id'] ?>>Delete</button>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
    <script src="app/public/js/script.js"></script>
</body>

</html>