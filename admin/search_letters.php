<?php include "includes-admin/admin_header.php"; ?>

<!-- Navigation -->
<?php include "includes-admin/admin_nav.php"; ?>


<div id="page-wrapper">
    <div class="container-fluid">

        <?php

        $query = "SELECT * FROM letters";

        $select_all_letters_qry = mysqli_query($conn, $query);

        ?>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Search Letters
                    <small>PS Office</small>
                </h1>
                <!-- <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form> -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Letter Tags</th>
                            <th>Footnote</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($row = mysqli_fetch_assoc($select_all_letters_qry)) {
                            $letter_id = $row["letter_id"];
                            $letter_ref = $row["letter_ref"];
                            $letter_date = $row["letter_date"];
                            $letter_name_prefix = $row["letter_name_prefix"];
                            $letter_full_name = $row["letter_full_name"];
                            $letter_pre_text = $row["letter_pre_text"];
                            $letter_content = $row["letter_content"];
                            $letter_footnote = $row["letter_footnote"];
                            $letter_print_head = $row["letter_print_head"];
                            $letter_tags = $row["letter_tags"];

                            echo "<tr>";
                            echo "<td>{$letter_id}</td>";
                            echo "<td>{$letter_date}</td>";
                            echo "<td>{$letter_full_name}</td>";
                            echo "<td>{$letter_tags}</td>";
                            echo "<td style='white-space:pre;'>{$letter_footnote}</td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include "includes-admin/admin_footer.php"; ?>