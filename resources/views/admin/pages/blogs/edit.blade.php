@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <h1>Edit Blog</h1>
        <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
            </div>
            <div class="form-group mt-4">
                <label for="image">Avatar</label>
                <input class="form-control" type="file" id="formFile" name="avatar" accept="image/*"
                    onchange="previewImage(event)">
                <img id="preview" src="{{ Storage::url($blog->image) }}" alt="Image Preview"
                    style="max-width: 100%; height: auto; margin-top: 10px;">
            </div>
            <div class="form-group mt-4">
                <label for="content">Content</label>
                <textarea class="form-control" id="mytextarea" name="content" rows="10">{{ $blog->content }}</textarea>
            </div>
            <button id="submit-bt" type="submit" class="btn btn-primary">Update Blog</button>
        </form>
    </div>
@endsection
@push('css')
    <script src="https://cdn.jsdelivr.net/npm/tinymce@7/tinymce.min.js"></script>
@endpush

@push('js')
    <script>
        tinymce.init({
            selector: '#mytextarea',
            apiKey: 'nfcus8nkckrcqltyty6p7gyngcqq5qr4kcloj5z15u7abdz1',
            plugins: 'anchor autolink charmap codesample emoticons image imagetools link lists media searchreplace table visualblocks wordcount linkchecker code lineheight',
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image media link | lineheight | code',
            height: 1200,
            content_style: `
            body { font-family:Helvetica,Arial,sans-serif; font-size:14px; }
          `,
            image_caption: true,
            image_advtab: true,
            media_live_embeds: true,
            automatic_uploads: false,
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype === 'image') {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function() {
                        var file = this.files[0];

                        // Đọc ảnh để xem trước
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            callback(e.target.result, {
                                alt: file.name
                            });

                            // Lưu ảnh vào FormData để submit
                            var formData = new FormData();
                            formData.append('blog_images[]', file);
                            window.imageFiles = window.imageFiles ||
                        []; // Lưu ảnh tạm vào biến toàn cục
                            window.imageFiles.push(formData);
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                }
            },
            relative_urls: false,
            remove_script_host: false,
            document_base_url: '{{ url('/') }}/',
        });

        // gửi form
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault(); // Chặn submit mặc định

            var form = this;
            var formData = new FormData(form);

            // Nếu có ảnh đã chọn trong TinyMCE, gửi lên server
            if (window.imageFiles && window.imageFiles.length > 0) {
                window.imageFiles.forEach((imageFormData, index) => {
                    formData.append(`blog_images[${index}]`, imageFormData.get('blog_images[]'));
                });
            }

            fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = data.redirect; // Chuyển hướng sau khi lưu thành công
                    } else {
                        alert("Có lỗi xảy ra!");
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        // Hàm hiển thị ảnh xem trước
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('preview');
                output.src = dataURL;
                output.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endpush
