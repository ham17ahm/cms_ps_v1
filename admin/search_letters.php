<?php include "includes-admin/admin_header.php"; ?>

<!-- Navigation -->
<?php include "includes-admin/admin_nav.php"; ?>


<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">
                    Search Letters
                    <small>PS Office</small>
                </h1>

                <form action="" method="get">
                    <div class="input-group form-group">
                        <input type="text" class="form-control" name="search" placeholder="Search..." value="<?php if (isset($_GET['search'])) {
                                                                                                                    echo $_GET['search'];
                                                                                                                } ?>">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default btn-primary" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>

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

                        if (isset($_GET["search"])) {
                            $filter_values = $_GET["search"];

                            $query = "SELECT * FROM letters WHERE CONCAT(letter_full_name, letter_footnote, letter_tags) LIKE '%{$filter_values}%'";

                            $letter_search_qry = mysqli_query($conn, $query);

                            if (mysqli_num_rows($letter_search_qry) > 0) {
                                foreach ($letter_search_qry as $row) {
                        ?>

                                    <tr>
                                        <td><?php echo $row["letter_id"]; ?></td>
                                        <td><?php echo $row["letter_date"]; ?></td>
                                        <td><?php echo $row["letter_full_name"]; ?></td>
                                        <td style='white-space:pre;'><?php echo $row["letter_footnote"]; ?></td>
                                        <td><?php echo $row["letter_tags"]; ?></td>
                                    </tr>

                                <?php
                                }
                            } else {
                                ?>

                                <tr>
                                    <td colspan="5">Sorry. No Data Found!</td>
                                </tr>

                        <?php
                            }
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