<body onload="listnya();"></body>

<!-- Content Header (Page header) -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript">
function load_nya()
        {
            // var hasil =$('#hasil').val();
            var tanggal1     = $("#tanggal1").val();
            var tanggal2    = $("#tanggal2").val();
            
               
            if(tanggal2 == '' || tanggal1 == '' ){
                alert("Data Belum Lengkap");
                die;
            }else{
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_fiskal/proses')?>",
                data:"tanggal1="+tanggal1+"&tanggal2="+tanggal2,
                success:function(hasilajax){
                    $('#listnya').html(hasilajax);
                }
            });
            }
        } 
</script>
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Surat fiskal </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Surat fiskal </a></div>
    </div>
  </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  
                    <!-- 0 -->
                    <div class="col-md-4">
                    <h3>Pencarian Arsip</h3>
                    </div>
                    <div class="col-md-3">
                   
                    </div>


                  <div class="col-md-8 text-right">
                     <form action="<?php echo site_url('surat_fiskal/proses'); ?>" class="form-inline" method="get">
                          <div class="input-group" >
                            <input type="date" style="width:200px !important;" class="form-control" name="tanggal1" id="tanggal1" placeholder="Start date">
                          </div>
                          <div class="input-group">
                          <input type="date" class="form-control" style="width:200px !important;" name="tanggal2" id="tanggal2" placeholder="End date">
                          <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" onclick="load_nya();"><span class="fa fa-search"> </span> Search</button>
                          </span>
                          </div>
                      </form>
                  </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                     <div id="listnya"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      