<section class="filter sec-mar">
    <div class="container">
        <div class="heading style-1">
            <h2>Filter
                <span>
                    <i class="fal fa-th-large"></i>
                    @if ($comics)
                        {{ $comics->total() ?? '0' }} kết quả được tìm thấy
                    @else
                        Không có kết quả hiển thị
                    @endif
                </span>
            </h2>
        </div>
        <form action="{{ route('comic.search') }}" method="get">
            <ul class="filter-block style-2">
                {{-- genre --}}
                <li>
                    <input type="hidden" name="page" value="1">
                    <a href="#" class="anime-btn btn-dark dropdown-toggle" id="genre" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        Thể loại<span><i class="fa fa-chevron-down"></i></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="genre">
                        @foreach (\DB::table('categories')->get() as $category)
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="genre[]"
                                        value="{{ $category->category_id }}" id="genre" @if (isset($_GET['genre']) && in_array($category->category_id, $_GET['genre'])) checked @endif>
                                    <label class="custom-control-label"
                                        for="genre">{{ Str::limit($category->name, 15) }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </li>
                {{-- status --}}
                <li>
                    <a href="#" class="anime-btn btn-dark dropdown-toggle" id="status"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        Trạng thái<span><i class="fa fa-chevron-down"></i></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="status">
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input" name="status" value="ongoing" id="status2" {{ isset($_GET['status']) && $_GET['status'] == 'ongoing' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="status2">Đang tiết hành</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input" name="status" value="completed" id="status3" {{ isset($_GET['status']) && $_GET['status'] == 'completed' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="status3">Hoàn thành</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input" name="status" value="" id="status3" {{ !isset($_GET['status']) || $_GET['status'] == '' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="status3">All</label>
                            </div>
                        </li>
                    </ul>
                </li>
                {{-- sort by --}}
                <li>
                    <a href="#" class="anime-btn btn-dark dropdown-toggle" id="sort-by"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        Sắp xếp theo<span><i class="fa fa-chevron-down"></i></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="sort-by">
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="radio" name="sortby" class="custom-control-input" value="byupdated" id="sort1" {{ isset($_GET['sortby']) && $_GET['sortby'] == 'byupdated' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sort1">Mới cập nhật</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="radio" name="sortby" class="custom-control-input" value="byreleased" id="sort2" {{ isset($_GET['sortby']) && $_GET['sortby'] == 'byreleased' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sort2">Ngày ra mắt</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="radio" name="sortby" class="custom-control-input" value="byviews" id="sort4" {{ isset($_GET['sortby']) && $_GET['sortby'] == 'byviews' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sort6">Most views</label>
                            </div>
                        </li>
                    </ul>
                </li>
                {{-- buttom submit --}}
                <li class="filter-block">
                    <button class="anime-btn btn-dark border-change" type="submit">Lọc truyện</button>
                </li>
            </ul>
        </form>
    </div>
</section>
