@extends('client.layouts.main')
@push('title')
    <title>Lịch sử - {{ APP_NAME }}</title>
@endpush
@section('content')
<!--=====================================-->
<!--=      schedule Area Start        =-->
<!--=====================================-->
<section class="schedule style-3 sec-mar ">
    <div class="container">
        <div class="heading style-1">
            <h2>Truyện đã đọc</h2>
        </div>
        <div class="row">
            <div class="col-xl-9 col-sm-12 col-12 mb-3">
                <div class="schedule-box">
                    <div class="card">
                        <div class="card-body style-1 h-auto tab-content">
                            <div class="row justify-content-between ps-3 pe-3 pb-4">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <h4 class="d-inline">Thông tin truyện</h4>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-0 text-end">s
                                    <h4 class="d-inline">Chapter mới</h4>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="history-list">
                                <!-- Lịch sử đọc sẽ được hiển thị ở đây -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12 order mb-3">
                <div class="row align-items-end">
                    <div class="col-lg-12 col-sm-6">
                        <div class="img-box">
                            <img src="assets/media/profile/profile.png" alt="" class="w-100">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6">
                        <p class="small-text">@username</p>
                        <a href="profile.html" class="d-inline"><h3>Aki Hibikawa</h3></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagination-wrape">
            <ul class="pagination">
                {{-- phân trang --}}
            </ul>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy lịch sử đọc từ LocalStorage
        var history = JSON.parse(localStorage.getItem('readingHistory')) || [];
        // Sắp xếp lịch sử đọc theo thời gian đọc gần nhất
        history.sort(function(a, b) {
            return new Date(b.lastRead) - new Date(a.lastRead);
        });
        console.log(history);
        

        // Hiển thị lịch sử đọc
        var historyList = document.getElementById('history-list');
        
        if (history.length === 0) {
            historyList.innerHTML = '<h1>Chưa có lịch sử đọc truyện.</h1>';
        } else {
            var ids = history.map(function(comic) {
                return comic.id;
            });

            // Lấy số trang hiện tại từ URL hoặc mặc định là trang 1
            var urlParams = new URLSearchParams(window.location.search);
            var currentPage = urlParams.get('page') || 1;
            
            // sent request
            fetch('/api/comics/listComicIDs', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ ids: ids, page: currentPage })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.data);
                
                data.data.forEach(comic => {
                    var updatedAt = new Date(comic.updated_at);
                    var formattedDate = updatedAt.toLocaleDateString();

                    historyList.innerHTML += `
                         <a href="/danh-sach/${comic.slug}">s
                            <div class="row ps-3 pe-3">
                                <div class="col-xl-7 col-lg-8 col-12 col-md-7 col-sm-8">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-3 col-3 ps-0 space-left pe-0 text-end">
                                            <img src="${ comic.avatar_image }" alt="">
                                        </div>
                                        <div class="col-lg-10 col-sm-9 col-9">
                                            <div class="schedule-content align-middle align-middle">
                                                <p class="small-title">${comic.name}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-xl-5 col-lg-4 col-md-5 col-sm-4 col-0 space-top text-end">
                                    <p class="space-right d-inline">${ formattedDate }</p>
                                    <p class="d-inline mr-4">${ comic.latest_chapter.chapter_name }</p>
                                </div>
                            </div>
                        </a>
                        <hr>
                    `;    
                });
               

                // Hiển thị phân trang tùy chỉnh
                var pagination = document.querySelector('.pagination');
                pagination.innerHTML = '';

                if (data.current_page > 1) {
                    pagination.innerHTML += `
                        <li class="page-item">
                            <a href="?page=${data.current_page - 1}" class="page-link arrow" aria-label="Previous">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </li>
                    `;
                }

                for (var i = 1; i <= data.last_page; i++) {
                    pagination.innerHTML += `
                        <li class="page-item">
                            <a href="?page=${i}" class="page-link ${i == data.current_page ? 'current' : ''}">${i}</a>
                        </li>
                    `;
                }

                if (data.current_page < data.last_page) {
                    pagination.innerHTML += `
                        <li class="page-item">
                            <a href="?page=${data.current_page + 1}" class="page-link arrow" aria-label="Next">
                                <i class="fa fa-chevron-right"></i>
                            </a>
                        </li>
                    `;
                }
               
            })
            .catch(error => console.error('Error:', error));
        }
    });
</script>
@endsection
