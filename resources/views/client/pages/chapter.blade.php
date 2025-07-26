@extends('client.layouts.main')

@section('title', $comic['name'] . ' - Chapter ' . $chapter['chapter_name'] . '-' . APP_NAME)
@section('meta_description', 'Đọc ' . $comic['name'] . ' - Chapter ' . $chapter['chapter_name'])
@section('meta_keywords', $comic['meta_keywords'] ?? 'Htruyen, đọc truyện online')

@section('content')
    <!--=====================================-->
    <!--=        Chapter Area Start       	=-->
    <!--=====================================-->
    <section class="chapter sec-mar">
        <div class="container">

            {{-- Ads banner --}}
            <div style="width:100%;overflow:hidden;text-align:center;">
                <div class="ad-scale" data-width="728"  style="width:728px; height:90px; transform-origin:top left; margin: 0 auto; display: block;">
                    <script type="text/javascript">
                        atOptions = {
                            'key': 'c841a903853526cad06bbc9e73ba6ed4',
                            'format': 'iframe',
                            'height': 90,
                            'width': 728,
                            'params': {}
                        };
                    </script>
                    <script type="text/javascript"
                        src="//www.highperformanceformat.com/c841a903853526cad06bbc9e73ba6ed4/invoke.js">
                        </script>
                </div>
            </div>

            <script async="async" data-cfasync="false" src="//pl27246233.profitableratecpm.com/47a4116ca99c6421b3cef0d0c7bc8818/invoke.js"></script>
            <div id="container-47a4116ca99c6421b3cef0d0c7bc8818"></div>

            {{-- content area --}}
            <div class="heading style-1">
                <h2>{{ $comic['name'] }}</h2>
                <span>Chapter {{ $chapter['chapter_name'] }}</span>
            </div>
            {{-- top drop menu start --}}
            <div class="d-flex justify-content-between mb-4 top-sticky">
                <div class="left position-relative">
                    <a href="#" class="anime-btn btn-dark border-change dropdown-toggle" id="country1"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">CHAPTER
                        {{ $chapter['chapter_name'] }}
                        <span><i class="fa fa-chevron-down"></i></span></a>
                    <ul class="dropdown-menu" aria-labelledby="country" style="max-height: 600px;overflow-y: auto;">
                        @foreach (array_reverse($comic['chapters']) as $item)
                            @php
                                $chapterNumber = floatval($item['chapter_name']);
                                $currentChapterNumber = floatval($chapter['chapter_name']);
                                $isActive = ($chapterNumber == $currentChapterNumber);
                                $chapterId = 'dropdown1-chapter-' . str_replace('.', '-', $chapterNumber);
                            @endphp
                            <li id="{{ $chapterId }}">
                                <a href="{{ route('chapter', ['comic' => $comic['slug'], 'name' => $chapterNumber]) }}"
                                    class="{{ $isActive ? 'active' : '' }}">
                                    chapter {{ $chapterNumber }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="right">
                    <a href="{{ $previousChapter ? route('chapter', ['comic' => $comic['slug'], 'name' => floatval($previousChapter['chapter_name'])]) : '' }}"
                        class="anime-btn btn-dark px-4">Chapter trước</a>
                    <a href="{{ $nextChapter ? route('chapter', ['comic' => $comic['slug'], 'name' => floatval($nextChapter['chapter_name'])]) : '' }}"
                        class="anime-btn btn-dark border-change ms-1 px-4">Chapter sau</a>
                </div>
            </div>
            {{-- top drop menu end --}}

            {{-- chapter image content --}}
            <div id="chapter-content" class="row pt-3">
                <p class="mx-4 text-warning">Đang tải....</p>
            </div>

            {{-- footer drop menu --}}
            <div class="d-flex justify-content-between mb-4 mt-4">
                <div class="left position-relative">
                    <a href="#" class="anime-btn btn-dark border-change dropdown-toggle" id="country2"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">CHAPTER
                        {{ $chapter['chapter_name'] }}
                        <span><i class="fa fa-chevron-down"></i></span></a>
                    <ul class="dropdown-menu" aria-labelledby="country" style="max-height: 600px;overflow-y: auto;">
                        @foreach (array_reverse($comic['chapters']) as $item)
                            @php
                                $chapterNumber = floatval($item['chapter_name']);
                                $currentChapterNumber = floatval($chapter['chapter_name']);
                                $isActive = ($chapterNumber == $currentChapterNumber);
                                $chapterId = 'dropdown2-chapter-' . str_replace('.', '-', $chapterNumber);
                            @endphp
                            <li id="{{ $chapterId }}">
                                <a href="{{ route('chapter', ['comic' => $comic['slug'], 'name' => $chapterNumber]) }}"
                                    class="{{ $isActive ? 'active' : '' }}">
                                    chapter {{ $chapterNumber }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="right">
                    <a href="{{ $previousChapter ? route('chapter', ['comic' => $comic['slug'], 'name' => floatval($previousChapter['chapter_name'])]) : '' }}"
                        class="anime-btn btn-dark">Chapter trước</a>
                    <a href="{{ $nextChapter ? route('chapter', ['comic' => $comic['slug'], 'name' => floatval($nextChapter['chapter_name'])]) : '' }}"
                        class="anime-btn btn-dark border-change ms-1">Chapter sau</a>
                </div>
            </div>
            {{-- footer drop menu end --}}

            {{-- Ads banner --}}
            <div style="width:100%;overflow:hidden;text-align:center;">
                <div class="ad-scale" data-width="468"  style="width:468px; height:60px; transform-origin:top left; margin: 0 auto; display: block;">
                    <script type="text/javascript">
                        atOptions = {
                            'key': '4cc7a839ce2c22e36d117678d870c4b7',
                            'format': 'iframe',
                            'height': 60,
                            'width': 468,
                            'params': {}
                        };
                    </script>
                    <script type="text/javascript"
                        src="//www.highperformanceformat.com/4cc7a839ce2c22e36d117678d870c4b7/invoke.js">
                        </script>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================-->
    <!--=         Comment Area Start        =-->
    <!--=====================================-->
    <section class="comment sec-mar">

    </section>
    <script>
        // Lưu thông tin truyện vào LocalStorage
        document.addEventListener('DOMContentLoaded', function () {
            // Lấy thông tin truyện hiện tại
            var comic = {
                id: '{{ $comic['comic_id'] }}',
                name: '{{ $comic['name'] }}',
                slug: '{{ $comic['slug'] }}',
                chapters: ['{{ $chapter['chapter_name'] }}'],
                lastRead: new Date().toISOString()
            };

            // Lấy lịch sử đọc từ LocalStorage
            var history = JSON.parse(localStorage.getItem('readingHistory')) || [];

            // Kiểm tra xem truyện đã có trong lịch sử chưa
            var existingComicIndex = history.findIndex(function (item) {
                return item.id === comic.id;
            });

            if (existingComicIndex !== -1) {
                // Nếu truyện đã có trong lịch sử, cập nhật thời gian đọc cuối cùng
                history[existingComicIndex].lastRead = comic.lastRead;
                // thêm chương mới vào danh sách các chương đã đọc
                if (!history[existingComicIndex].chapters.includes('{{ $chapter['chapter_name'] }}')) {
                    history[existingComicIndex].chapters.push('{{ $chapter['chapter_name'] }}');
                }
            } else {
                // Nếu truyện chưa có trong lịch sử, thêm vào lịch sử
                history.push(comic);
            }

            // Lưu lại lịch sử vào LocalStorage
            localStorage.setItem('readingHistory', JSON.stringify(history));
        });
    </script>

    {{-- js to update views of comic --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let hasUpdatedView = false;
            window.addEventListener('DOMContentLoaded', function () {
                if (!hasUpdatedView) {
                    hasUpdatedView = true;
                    fetch('{{ route('comic.update-view') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            comic_id: '{{ $comic['comic_id'] }}'
                        })
                    }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('View updated successfully');
                            }
                        });
                }
            });
        });
    </script>

    <script>
        document.addEventListener('keydown', function (event) {
            if (event.key === 'ArrowLeft') {
                // Navigate to previous chapter
                var previousChapterUrl =
                    "{{ $previousChapter ? route('chapter', ['comic' => $comic['slug'], 'name' => floatval($previousChapter['chapter_name'])]) : '' }}";
                if (previousChapterUrl) {
                    window.location.href = previousChapterUrl;
                }
            } else if (event.key === 'ArrowRight') {
                // Navigate to next chapter
                var nextChapterUrl =
                    "{{ $nextChapter ? route('chapter', ['comic' => $comic['slug'], 'name' => floatval($nextChapter['chapter_name'])]) : '' }}";
                if (nextChapterUrl) {
                    window.location.href = nextChapterUrl;
                }
            }
        });
    </script>

    {{-- js dispay chapter content --}}
    <script>
        $(document).ready(function () {
            // Gửi yêu cầu AJAX để fetch dữ liệu
            $.ajax({
                url: '{{ route('api.chapter', ['comic' => $comic['slug'], 'name' => $chapter['chapter_name']]) }}',
                method: 'GET',
                success: function (data) {
                    // Cập nhật nội dung của phần tử HTML khi dữ liệu được trả về
                    var chapterContent = '';
                    $.each(data.data.data.item.chapter_image, function (index, item) {
                        chapterContent += '<div class="chapter-image col-12 d-flex justify-content-center">';
                        chapterContent += '<img src="' + data.data.data.domain_cdn + '/' + data.data.data.item.chapter_path + '/' + item.image_file + '"';
                        chapterContent += ' alt="' + data.data.data.item.comic_name + ' - Trang ' + item.image_page + '" loading="lazy">';
                        chapterContent += '</div>';
                    });

                    $('#chapter-content').html(chapterContent);
                },
                error: function () {
                    $('#chapter-content').html('<p>Tải ảnh chapter lỗi</p>');
                }
            });
        });
    </script>

    {{-- scroll chapter dropdown menu --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Danh sách các toggle id
            const dropdownToggles = ['country1', 'country2'];

            dropdownToggles.forEach(function (toggleId, index) {
                var dropdownToggle = document.getElementById(toggleId);
                if (dropdownToggle) {
                    dropdownToggle.addEventListener('shown.bs.dropdown', function () {
                        var currentChapterNumber = '{{ floatval($chapter["chapter_name"]) }}';
                        var currentChapterId = 'dropdown' + (index + 1) + '-chapter-' + currentChapterNumber.toString().replace('.', '-');
                        var currentElement = document.getElementById(currentChapterId);
                        if (currentElement) {
                            currentElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    });
                }
            });
        });
    </script>

    {{-- ads banner justify --}}
    <script>
        function scaleAd() {
            const ads = document.querySelectorAll('.ad-scale');
            ads.forEach(ad => {
                const width = ad.dataset.width ? parseInt(ad.dataset.width) : 728;
                const screenWidth = window.innerWidth;
                const scale = screenWidth < width ? screenWidth / width : 1;
                ad.style.transform = `scale(${scale})`;
            });
        }

        window.addEventListener('load', scaleAd);
        window.addEventListener('resize', scaleAd);
    </script>
@endsection