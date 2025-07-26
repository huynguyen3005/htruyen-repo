<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dòng thông báo xác thực
    |--------------------------------------------------------------------------
    |
    | Các dòng thông báo sau chứa các thông báo lỗi mặc định của lớp validator.
    | Một số quy tắc có nhiều phiên bản, chẳng hạn như quy tắc kích thước.
    | Bạn có thể tự do chỉnh sửa các thông báo này theo nhu cầu ứng dụng.
    |
    */

    'accepted' => 'Trường :attribute phải được chấp nhận.',
    'accepted_if' => 'Trường :attribute phải được chấp nhận khi :other là :value.',
    'active_url' => 'Trường :attribute phải là một URL hợp lệ.',
    'after' => 'Trường :attribute phải là một ngày sau :date.',
    'after_or_equal' => 'Trường :attribute phải là một ngày sau hoặc bằng :date.',
    'alpha' => 'Trường :attribute chỉ được chứa chữ cái.',
    'alpha_dash' => 'Trường :attribute chỉ được chứa chữ cái, số, dấu gạch ngang và gạch dưới.',
    'alpha_num' => 'Trường :attribute chỉ được chứa chữ cái và số.',
    'array' => 'Trường :attribute phải là một mảng.',
    'ascii' => 'Trường :attribute chỉ được chứa ký tự ASCII.',
    'before' => 'Trường :attribute phải là một ngày trước :date.',
    'before_or_equal' => 'Trường :attribute phải là một ngày trước hoặc bằng :date.',
    'between' => [
        'array' => 'Trường :attribute phải có từ :min đến :max phần tử.',
        'file' => 'Trường :attribute phải có dung lượng từ :min đến :max kilobytes.',
        'numeric' => 'Trường :attribute phải nằm trong khoảng :min đến :max.',
        'string' => 'Trường :attribute phải có từ :min đến :max ký tự.',
    ],
    'boolean' => 'Trường :attribute phải là true hoặc false.',
    'confirmed' => 'Trường :attribute không khớp với xác nhận.',
    'current_password' => 'Mật khẩu không chính xác.',
    'date' => 'Trường :attribute phải là ngày hợp lệ.',
    'date_equals' => 'Trường :attribute phải là ngày bằng :date.',
    'date_format' => 'Trường :attribute phải đúng định dạng :format.',
    'different' => 'Trường :attribute và :other phải khác nhau.',
    'digits' => 'Trường :attribute phải có :digits chữ số.',
    'digits_between' => 'Trường :attribute phải có từ :min đến :max chữ số.',
    'email' => 'Trường :attribute phải là địa chỉ email hợp lệ.',
    'exists' => 'Trường :attribute đã chọn không hợp lệ.',
    'file' => 'Trường :attribute phải là một tệp tin.',
    'filled' => 'Trường :attribute phải có giá trị.',
    'gt' => [
        'array' => 'Trường :attribute phải có nhiều hơn :value phần tử.',
        'file' => 'Trường :attribute phải lớn hơn :value kilobytes.',
        'numeric' => 'Trường :attribute phải lớn hơn :value.',
        'string' => 'Trường :attribute phải có nhiều hơn :value ký tự.',
    ],
    'gte' => [
        'array' => 'Trường :attribute phải có ít nhất :value phần tử.',
        'file' => 'Trường :attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'numeric' => 'Trường :attribute phải lớn hơn hoặc bằng :value.',
        'string' => 'Trường :attribute phải có ít nhất :value ký tự.',
    ],
    'image' => 'Trường :attribute phải là một hình ảnh.',
    'integer' => 'Trường :attribute phải là số nguyên.',
    'ip' => 'Trường :attribute phải là địa chỉ IP hợp lệ.',
    'json' => 'Trường :attribute phải là chuỗi JSON hợp lệ.',
    'lt' => [
        'array' => 'Trường :attribute phải có ít hơn :value phần tử.',
        'file' => 'Trường :attribute phải nhỏ hơn :value kilobytes.',
        'numeric' => 'Trường :attribute phải nhỏ hơn :value.',
        'string' => 'Trường :attribute phải có ít hơn :value ký tự.',
    ],
    'lte' => [
        'array' => 'Trường :attribute không được có nhiều hơn :value phần tử.',
        'file' => 'Trường :attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'numeric' => 'Trường :attribute phải nhỏ hơn hoặc bằng :value.',
        'string' => 'Trường :attribute phải có tối đa :value ký tự.',
    ],
    'max' => [
        'array' => 'Trường :attribute không được có nhiều hơn :max phần tử.',
        'file' => 'Trường :attribute không được lớn hơn :max kilobytes.',
        'numeric' => 'Trường :attribute không được lớn hơn :max.',
        'string' => 'Trường :attribute không được lớn hơn :max ký tự.',
    ],
    'mimes' => 'Trường :attribute phải là tệp tin có định dạng: :values.',
    'min' => [
        'array' => 'Trường :attribute phải có ít nhất :min phần tử.',
        'file' => 'Trường :attribute phải có ít nhất :min kilobytes.',
        'numeric' => 'Trường :attribute phải ít nhất là :min.',
        'string' => 'Trường :attribute phải có ít nhất :min ký tự.',
    ],
    'not_in' => 'Trường :attribute đã chọn không hợp lệ.',
    'numeric' => 'Trường :attribute phải là một số.',
    'regex' => 'Trường :attribute có định dạng không hợp lệ.',
    'required' => 'Trường :attribute không được bỏ trống.',
    'required_if' => 'Trường :attribute là bắt buộc khi :other là :value.',
    'required_with' => 'Trường :attribute là bắt buộc khi :values có mặt.',
    'required_without' => 'Trường :attribute là bắt buộc khi :values không có mặt.',
    'same' => 'Trường :attribute và :other phải trùng khớp.',
    'size' => [
        'array' => 'Trường :attribute phải chứa :size phần tử.',
        'file' => 'Trường :attribute phải có kích thước :size kilobytes.',
        'numeric' => 'Trường :attribute phải có giá trị :size.',
        'string' => 'Trường :attribute phải có :size ký tự.',
    ],
    'string' => 'Trường :attribute phải là một chuỗi ký tự.',
    'unique' => ':attribute đã được sử dụng.',
    'url' => 'Trường :attribute phải là URL hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Tùy chỉnh thông báo xác thực
    |--------------------------------------------------------------------------
    |
    | Bạn có thể chỉ định thông báo xác thực tùy chỉnh bằng cách sử dụng quy ước
    | "attribute.rule" để đặt tên cho dòng. Điều này giúp bạn chỉ định thông báo
    | cụ thể cho một quy tắc xác thực cụ thể của một thuộc tính nào đó.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'Thông báo tùy chỉnh',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tùy chỉnh tên thuộc tính
    |--------------------------------------------------------------------------
    |
    | Các dòng này được sử dụng để thay thế tên thuộc tính bằng một cái tên
    | dễ hiểu hơn, giúp hiển thị thông báo lỗi dễ hiểu hơn cho người dùng.
    |
    */

    'attributes' => [],

];
