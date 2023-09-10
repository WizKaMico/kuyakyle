<div class="row" style="margin-top: 20px;">
    <div class="col-md-12">
        <div class="content-with-shadow">
            <h1>HI! <?php echo strtoupper($userSession[0]["email"]); ?></h1>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 20px;">
    <?php
    // Instantiate your StoreCart class if it's not already done

    $codes = isset($_GET['code']) ? $_GET['code'] : array();

    if (!is_array($codes)) {
        $codes = array($codes); // Ensure $codes is always an array
    }

    $stat = $portCont->getProductStat($codes);

    if (!empty($stat)) {
        foreach ($stat as $key => $value) {
            // Your code to display product information here
    ?>

    <div class="col-md-3">
        <div class="content-with-shadow">
            <h5><?php echo $stat[$key]["code"]; ?> | PROFIT :
                <?php
                if ($stat[$key]["profit"] != null) {
                    echo $stat[$key]["profit"];
                } else {
                    echo 'NO PROFIT';
                };
                ?> | SOLD UNIT <?php if ($stat[$key]["total"] != null) {
                    echo $stat[$key]["total"];
                } else {
                    echo 'NO PROFIT';
                }; ?></h5>
            <hr />

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date Ordered</th>
                            <th>Quantity</th>
                            <th>Profit Order</th>
                            <th>Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rcode = $stat[$key]["code"];
                        $spstat = $portCont->getProductSpecificStat($rcode);
                        if (!empty($spstat)) {
                            foreach ($spstat as $key => $value) {
                                $perAccum = $spstat[$key]["quantity"] * $spstat[$key]["item_price"];
                        ?>
                        <tr>
                            <td><?php echo $spstat[$key]["order_at"]; ?></td>
                            <td><?php echo $spstat[$key]["quantity"]; ?></td>
                            <td><?php echo $perAccum; ?></td>
                            <td><?php echo $spstat[$key]["purpose"]; ?></td>
                        </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php }
    } ?>
</div>

<style>
.table {
    width: 100%;
    max-width: 100%;
}

.table th,
.table td {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.table-responsive {
    overflow-x: auto;
}
</style>
