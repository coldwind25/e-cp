
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<?php 
$queryorder = "
SELECT SUM(pay_amount) AS total, 
DATE_FORMAT(order_date, '%M-%Y') AS datesave
FROM tbl_order
WHERE order_status > 1
GROUP BY DATE_FORMAT(order_date, '%m-%Y')" 
or die ("Error : ".mysqli_error($queryorder));
$rsorder = mysqli_query($condb, $queryorder);

//echo $queryorder;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
 รายงานแยกตามเดือน
  <button class="btn btn-primary" onclick="window.print();">พิมพ์รายงาน</button>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-5">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">รายการสั่งซื้อแยกตามเดือน</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr class="danger">
                <th width="50%">ด/ป</th>
                <th width="50%">ยอดขาย</th>
              </tr>
            </thead>
            <tbody>
              <?php

               foreach ($rsorder as $row) { ?>
              <tr>
                <td><?php echo $row['datesave'];?></td>
                <td><?php echo number_format($row['total'],2);?> บาท </td>
              </tr>  
              <?php @$ototal += $row['total']; } ?> 
              <tr class="danger">
                <td>รวมยอดขาย</td>
                <td>
                  <b>
                    <font color="red">
                  <?php echo number_format(@$ototal,2);?> บาท
                </font>
              </b>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->