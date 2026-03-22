<?= $this->include('backend/include/header'); ?>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <?= $this->include('backend/include/leftmenu'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="row">
      <div class="col-3"></div>
      <div class="col-6">
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Masa Takip</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
               <div class=row >
                 <div class="col-lg-3"></div>
  
                 <div class="col-12 col-xl-6">
            <section class="content pb-3">
             <div class="container-fluid h-100">
          <div class="card card-row card-info ">
          <div class="card-header">
            <h3 class="card-title">
              Garson Bekleyen Masalar
            </h3>
          </div>
          <div class="card-body">

          <?php foreach($veriler as $row ): ?>
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">Masa no:<b style="color:green;"><?php echo $row['table_no'] ?></b></h5>
               
                <div class="card-tools">
                  <?php
                  $siparis_saat=strtotime($row['time']);
                  $aktif_saat=strtotime(date('H:i'));
                  $islem=($aktif_saat-$siparis_saat)/60;
                  ?>
                <h5 class="card-title">Süre:<b style="color:purple;"><?php  echo $islem  ?>dk</b></h5>
       
                <a href="<?= base_url('panel/callDelete/'.$row['id']) ?>" onclick="return confirm('Silmek istediğinize eminmisiniz?')" class="btn btn-tool btn-link"><i class="fa fa-trash" aria-hidden="true" style="color:#cd5c5c"></i></a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>         
          <!-- Card bitişi -->
          </div>

      </div>
    </section>
          </div>



            <div class="col-lg-3"></div>
           </div>

              





              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Footer
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 let lastId = 0; // En son okunan çağrının ID'sini tutar
let isFirstLoad = true; // İlk yükleme durumu kontrolü

// Çağrıları kontrol eden fonksiyon
function checkCalls() {
    $.ajax({
        url: 'get-calls', // API endpoint
        method: 'GET',
        success: function(data) {
            const callList = $('#calls'); // Çağrıların listelendiği HTML öğesi

            // Listeyi temizle (önceki verileri kaldır)
            callList.empty();

            let isNewCall = false; // Yeni çağrı kontrolü

            // Gelen verileri kontrol et
            data.forEach(function(call) {
                const listItem = $('<li>').text(`Masa: ${call.table_no}, Saat: ${call.time}`);
                callList.append(listItem); // Listeye ekle

                // Yeni çağrı kontrolü
                if (call.id > lastId) {
                    isNewCall = true;
                }
            });

            // Eğer yeni bir çağrı varsa ve ilk yükleme değilse işlemleri gerçekleştir
            if (isNewCall && !isFirstLoad) {
                playNotificationAndReload(); // Bildirim sesini çal ve sayfayı yenile
            }

            // En yüksek ID'yi güncelle
            lastId = Math.max(lastId, ...data.map(call => call.id));

            // İlk yükleme tamamlandıktan sonra bayrağı kapat
            if (isFirstLoad) {
                isFirstLoad = false;
            }
        },
        error: function(err) {
            console.error('Çağrılar kontrol edilirken hata oluştu:', err);
        }
    });
}

// Bildirim sesini çalma ve sayfayı yenileme fonksiyonu
function playNotificationAndReload() {
    const audio = new Audio("http://localhost/qrmenu/audio/notification.mp3"); // Ses dosyasının tam yolu
    audio.play().then(() => {
        // Ses çaldıktan sonra 1.5 saniye bekleyip sayfayı yenile
        setTimeout(function() {
            location.reload();
        }, 1000); // 1.5 saniye (3000 milisaniye) bekleme
    }).catch(function(error) {
        console.error("Ses çalma hatası: ", error);
    });
}

// Her 5 saniyede bir çağrıları kontrol et
setInterval(checkCalls, 5000);



</script>





  <?= $this->include('backend/include/footer'); ?>