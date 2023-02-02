<?php
include("template/header.php");
include("../global/api/conn.php");

?>
<div class="card">
    <h1>Users</h1>
    <hr>

    <table id="table" class="table table-responsive text-center">
        <caption>List of Users</caption>
        <?php
        // filling up the table
        $table = "user";
        $sql = "SELECT * FROM $table ";
        $result = mysqli_query($conn, $sql);
        $output = '<thead>'
            . '<tr>'
            . '<th>ID</th>'
            . '<th>Name</th>'
            . '<th>Email</th>'
            . '<th>Image</th>'
            . '<th>Action</th>'
            . '</tr>'
            . '</thead>'
            . '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '<tr>'
                . '<th scope="row">' . $row['id'] . '</td>'
                . '<td>' . $row['username'] . '</td>'
                . '<td>' . $row['email'] . '</td>'
                . "<td><img style='height:200px; width:200px; object-fit:cover' class='rounded-circle' alt='img' src='../global/assets/images/" . $row['image'] . "'></td>"
                . '<td>'
                . '<a role="button" href="api/delete.php?table=' . $table . '&id=' . $row['id'] . '" style="color: var(--white)"><i class="fa-solid fa-trash"></i></a>'
                . '</td>'
                . '</tr>';
        }
        $output .= "</tbody>";
        echo $output;
        ?>
    </table>
</div>
<script>
    $(document).ready(function () {
        $("#table").DataTable();
    })
</script>
<?php include("../global/html/footer.html") ?>