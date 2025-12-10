<div class="content-wrapper bg-light" style="min-height: 100vh;">
  <!-- Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row align-items-center mb-3">
        <div class="col-sm-6">
          <h1 class="font-weight-bold text-dark">{{ isset($title) ? $title : 'Dashboard' }}</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if ($content)
        <div class="card shadow-sm border-0 animate__animated animate__fadeIn">
          <div class="card-body">
            @include($content)
          </div>
        </div>
      @else
        <div class="alert alert-warning">Konten belum tersedia.</div>
      @endif
    </div>
  </section>
</div>

<!-- Tambahan CSS -->
<style>
  .content-wrapper {
    transition: background-color 0.3s ease;
  }

  .breadcrumb .breadcrumb-item a {
    transition: color 0.3s ease;
  }

  .breadcrumb .breadcrumb-item a:hover {
    color: #0056b3;
    text-decoration: underline;
  }

  .card {
    transition: box-shadow 0.3s ease;
  }

  .card:hover {
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
  }
</style>

<!-- Tambahkan animasi jika ingin lebih interaktif -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
