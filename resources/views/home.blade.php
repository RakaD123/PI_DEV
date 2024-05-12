<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="piarea.">
    <link rel="icon" href="{{ asset('images/piarea.png') }}" type="image/x-icon">
    <meta name="description" content="piarea apps.">
    <meta name="description" content="piarea mockup.">
    <title>PI-DEV | Application developed by PIAREA</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kodchasan:400">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"> </script>
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css" rel="stylesheet">
</head>


  <header class="header">
    <div style="text-align:left">

      <span class="dot"></span>



        <span class="dot2"></span>



        <a href="#default" class="logo">
          <img src="{{ asset('images/piarea.png') }}" alt="Company Logo">
      </a>

      <form action="home" method="get" >
    <p class="logo-text">PI-DEV</p>

    <div class="header-content">
      <p class="app-developed">Application Developed by PIAREA</p>
      <div class="search-wrapper">
        <input name="name" id="nameInput" class="myInput" type="text" class="form-control"  placeholder="Search for Product" value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
        </button>
          <i class="fas fa-search" onclick="handleSearchClick()"></i>

        </div>
    </div>


    </div>

    </div>

    </div>
  </header>
  <body>

    <div class="mb-4">
        <select id="sort1" class="selectpicker"  data-live-search="false">
            <option value="name_asc" >A-Z</option>
            <option value="name_desc">Z-A</option>
            <option value="date_asc">Oldest-Newest</option>
            <option value="date_desc">Newest-Oldest</option>
        </select>
    </div>

      <div class="mb-5">
        <select name="category" id="categorySelect" class="selectpicker" multiple aria-label="Default select example" data-live-search="false" title="Filters">

            <option value="MockUp" {{ isset($_GET['category']) && $_GET['category'] == 'MockUp' ? 'selected' : '' }}>MockUp</option>
            <option value="Apps" {{ isset($_GET['category']) && $_GET['category'] == 'Apps' ? 'selected' : '' }}>Apps</option>
        </select>
    </div>

</form>





    <div class="clear-fix"></div>


    <div class="row-1 row-cols-1 row-cols-md-3 g-4 py-5-1 ">


        @foreach ($products as $product)
        <div class="col" data-category="{{ $product->category }}">
            <div class="card1">
                <a href="{{ $product->url }}">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top-1">
                </a>
                <div class="card-body">
                    <div>
                        <b>
                            <h7 class="card-title" style="font-size: 24px; font-family: Abril Fatface;" title="{{ $product->name }}">
                                {{ substr($product->name, 0, 15) }}{{ strlen($product->name) > 15 ? '...' : '' }}
                                <span class="badge rounded-pill bg-dark" style="font-size: 15px;">{{ $product->category }}</span>
                            </h7>
                        </b>

                    </div>
                    <p class="card-text" style="font-family: abel;" title="{{ $product->detail }}">{{ substr($product->detail, 0, 60) }}{{ strlen($product->detail) > 60 ? '...' : '' }}</p>
                </div>
            </div>
        </div>
    @endforeach


      @unless ($products->count())
      <div class="no-results-message">
        No Products Found.
      </div>
    @endunless
    </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="script.js"></script>
   <!-- Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
   <!-- Bootstrap Select JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

   <script>
    document.getElementById('sort1').addEventListener('change', function() {
        var sortBy = this.value.split('_')[0];
        var sortOrder = this.value.split('_')[1];

        // Ambil semua kartu produk
        var productCards = document.querySelectorAll('.col[data-category]');

        // Ubah NodeList menjadi array agar dapat diurutkan
        var productArray = Array.from(productCards);

        // Urutkan kartu produk berdasarkan kriteria yang dipilih
        productArray.sort(function(a, b) {
            var aValue, bValue;

            if (sortBy === 'name') {
                aValue = a.querySelector('.card-title').innerText.trim();
                bValue = b.querySelector('.card-title').innerText.trim();
            } else if (sortBy === 'date') {
                aValue = new Date(a.getAttribute('data-date'));
                bValue = new Date(b.getAttribute('data-date'));
            }

            // Sesuaikan pengurutan berdasarkan sortOrder
            if (sortOrder === 'asc') {
                return aValue > bValue ? 1 : -1;
            } else {
                return aValue < bValue ? 1 : -1;
            }
        });

        // Hapus semua kartu produk dari tampilan
        productCards.forEach(card => {
            card.remove();
        });

        // Masukkan kembali kartu produk yang sudah diurutkan
        productArray.forEach(card => {
            document.querySelector('.row-1').appendChild(card);
        });
    });
</script>








<script>
    document.getElementById('categorySelect').addEventListener('change', function() {
        // Mengambil nilai kategori yang dipilih
        var selectedCategories = Array.from(this.selectedOptions).map(option => option.value);

        // Mengambil semua kartu produk
        var productCards = document.querySelectorAll('.col[data-category]');

        // Menampilkan kartu produk yang sesuai dengan kategori yang dipilih dan menyembunyikan yang lainnya
        productCards.forEach(card => {
            var category = card.getAttribute('data-category');
            if (selectedCategories.includes(category) || selectedCategories.length === 0) {
                card.style.display = 'block'; // Menampilkan kartu produk
            } else {
                card.style.display = 'none'; // Menyembunyikan kartu produk
            }
        });
    });
    </script>










  </body>

  <footer class="sticky-footer">
    2024  &copy; PIAREA
  </footer>
