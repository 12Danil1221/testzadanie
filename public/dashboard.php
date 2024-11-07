<?php 
require_once "../blocks/header.php" ; 
require_once "../db/connect.php";
?>
<style>
body {
    position: absolute;
    align-items: center;
}

table {
    border: 1px solid #dddddd;
}

thead th {
    padding: 1%;
    border: 1px solid #dddddd;
}

tbody td {
    padding: 1%;
    border: 1px solid #dddddd;
}
</style>
<hr>

<body>
    <table class="table">
        <thead style="padding:5%;">
            <tr>
                <th>
                    <h3>Name</h3>
                </th>
                <th>
                    <h4>Email</h4>
                </th>
                <th>
                    <h4>Number phone</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php 
                /*Выборка всех строк в таблице users*/
                $sql = 'SELECT * FROM users ';
                $query = $pdo->prepare($sql);
                $query->execute();
                /*Преобразуем результат в объекты*/
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $user)
                echo '<h3>'.$user->name.'<h3>';
                ?>
                </td>
                <td>
                    <?php 
                $sql = 'SELECT * FROM users ';
                $query = $pdo->prepare($sql);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $user)
                echo '<h4>'.$user->email.'<h4>';
                ?>
                </td>
                <td>
                    <?php 
                $sql = 'SELECT * FROM users ';
                $query = $pdo->prepare($sql);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $user)
                echo '<h4>'.$user->tel.'<h4>';
                ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>
<hr>
<?php  
require_once "../blocks/footer.php";
?>