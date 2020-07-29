<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $page;?>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Menampilkan Grafik -->
    <div class="col-lg-12">
      <div class="box">
        <div id="data_grafik"></div>
      </div>
    </div>
    <!-- End Tampil Grafik -->

    <div class="col-lg-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Data Kelembaban Tanah</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed">
            <tr>
              <th style="width: 10px">NO</th>
              <th>Level Tanah</th>
              <th>Waktu</th>
            </tr>
            <?php $i = 1; foreach ($untuktabel as $key) { ?>
             <tr>
              <td><?php echo $i++;?></td>
              <td><?php echo $key->tanah;?></td>
              <td><?php echo $key->date;?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>
  </div>




</section>
</div>
<!-- /.content -->
</div>

<!-- Mengambil query report -->
<?php

foreach($report as $result){
        $tanah[] = (float) $result->tanah; //ambil data suhu
        $date[] = $result->date; //ambil data waktu

      }
      ?>
      <!-- End Query -->

      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script>
      <script src="https://code.highcharts.com/modules/accessibility.js"></script>
      <script type="text/javascript">
        Highcharts.chart('data_grafik', {
          chart: {
            type: 'area'
          },
          title: {
            text: 'Grafik Kelembaban Tanah'
          },
          subtitle: {
            text: '| 0-300 = Basah | 301-700 = Lembab | 701-1023 = Kering |'
          },
          xAxis: {
        categories: <?php echo json_encode($date);?>, //Mengambil isi dari tb_tanah date
        tickmarkPlacement: 'on',
        title: {
          enabled: false
        }
      },
      yAxis: {
        title: {
          text: 'Relative Humidity (RH)'
        },
        labels: {
          formatter: function () {
            return this.value;
          }
        }
      },
      tooltip: {
        split: true,
        valueSuffix: ' RH '
      },
      plotOptions: {
        area: {
          stacking: 'normal',
          lineColor: '#666666',
          lineWidth: 1,
          marker: {
            lineWidth: 1,
            lineColor: '#666666'
          }
        }
      },
      series: [{
        name: 'Level',
        data: <?php echo json_encode($tanah);?> //Mengambil isi dari tb_tanah tanah
      }]
    });
  </script>