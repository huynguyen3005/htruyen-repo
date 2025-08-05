<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Đọc truyện - ' . APP_NAME)</title>
    <style>
        @charset "UTF-8";

        @font-face {
            font-family: "Font Awesome 5 Pro";
            font-style: normal;
            font-weight: 300;
            font-display: auto;
            src: url('https://htruyen.net/assets/css/fonts/fa-light-300.eot');
            src: url('https://htruyen.net/assets/css/fonts/fa-light-300d41d.eot?#iefix') format("embedded-opentype"), url('https://htruyen.net/assets/css/fonts/fa-light-300.woff2') format("woff2"), url('https://htruyen.net/assets/css/fonts/fa-light-300.woff') format("woff"), url('https://htruyen.net/assets/css/fonts/fa-light-300.ttf') format("truetype"), url('https://htruyen.net/assets/css/fonts/fa-light-300.html#fontawesome') format("svg")
        }

        @font-face {
            font-family: "Font Awesome 5 Pro";
            font-style: normal;
            font-weight: 400;
            font-display: auto;
            src: url('https://htruyen.net/assets/css/fonts/fa-regular-400.eot');
            src: url('https://htruyen.net/assets/css/fonts/fa-regular-400d41d.eot?#iefix') format("embedded-opentype"), url('https://htruyen.net/assets/css/fonts/fa-regular-400.woff2') format("woff2"), url('https://htruyen.net/assets/css/fonts/fa-regular-400.woff') format("woff"), url('https://htruyen.net/assets/css/fonts/fa-regular-400.ttf') format("truetype"), url('https://htruyen.net/assets/css/fonts/fa-regular-400.svg#fontawesome') format("svg")
        }

        @font-face {
            font-family: "Font Awesome 5 Pro";
            font-style: normal;
            font-weight: 900;
            font-display: auto;
            src: url('https://htruyen.net/assets/css/fonts/fa-solid-900.eot');
            src: url('https://htruyen.net/assets/css/fonts/fa-solid-900d41d.eot?#iefix') format("embedded-opentype"), url('https://htruyen.net/assets/css/fonts/fa-solid-900.woff2') format("woff2"), url('https://htruyen.net/assets/css/fonts/fa-solid-900.woff') format("woff"), url('https://htruyen.net/assets/css/fonts/fa-solid-900.ttf') format("truetype"), url('https://htruyen.net/assets/css/fonts/fa-solid-900.svg#fontawesome') format("svg")
        }

        :root {
            --bs-blue: #0d6efd;
            --bs-indigo: #6610f2;
            --bs-purple: #6f42c1;
            --bs-pink: #d63384;
            --bs-red: #dc3545;
            --bs-orange: #fd7e14;
            --bs-yellow: #ffc107;
            --bs-green: #198754;
            --bs-teal: #20c997;
            --bs-cyan: #0dcaf0;
            --bs-white: #fff;
            --bs-gray: #6c757d;
            --bs-gray-dark: #343a40;
            --bs-gray-100: #f8f9fa;
            --bs-gray-200: #e9ecef;
            --bs-gray-300: #dee2e6;
            --bs-gray-400: #ced4da;
            --bs-gray-500: #adb5bd;
            --bs-gray-600: #6c757d;
            --bs-gray-700: #495057;
            --bs-gray-800: #343a40;
            --bs-gray-900: #212529;
            --bs-primary: #0d6efd;
            --bs-secondary: #6c757d;
            --bs-success: #198754;
            --bs-info: #0dcaf0;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
            --bs-primary-rgb: 13, 110, 253;
            --bs-secondary-rgb: 108, 117, 125;
            --bs-success-rgb: 25, 135, 84;
            --bs-info-rgb: 13, 202, 240;
            --bs-warning-rgb: 255, 193, 7;
            --bs-danger-rgb: 220, 53, 69;
            --bs-light-rgb: 248, 249, 250;
            --bs-dark-rgb: 33, 37, 41;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-body-color-rgb: 33, 37, 41;
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-font-size: 1rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #212529;
            --bs-body-bg: #fff
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box
        }

        @media (prefers-reduced-motion:no-preference) {
            :root {
                scroll-behavior: smooth
            }
        }

        body {
            margin: 0;
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%
        }

        h2 {
            margin-top: 0;
            margin-bottom: .5rem;
            font-weight: 500;
            line-height: 1.2
        }

        h2 {
            font-size: calc(1.325rem + .9vw)
        }

        @media (min-width:1200px) {
            h2 {
                font-size: 2rem
            }
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        ul {
            padding-left: 2rem
        }

        ul {
            margin-top: 0;
            margin-bottom: 1rem
        }

        ul ul {
            margin-bottom: 0
        }

        a {
            color: #0d6efd;
            text-decoration: underline
        }

        img,
        svg {
            vertical-align: middle
        }

        button {
            border-radius: 0
        }

        button,
        input {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit
        }

        button {
            text-transform: none
        }

        [type=button],
        [type=submit],
        button {
            -webkit-appearance: button
        }

        ::-moz-focus-inner {
            padding: 0;
            border-style: none
        }

        ::-webkit-datetime-edit-day-field,
        ::-webkit-datetime-edit-fields-wrapper,
        ::-webkit-datetime-edit-hour-field,
        ::-webkit-datetime-edit-minute,
        ::-webkit-datetime-edit-month-field,
        ::-webkit-datetime-edit-text,
        ::-webkit-datetime-edit-year-field {
            padding: 0
        }

        ::-webkit-inner-spin-button {
            height: auto
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-color-swatch-wrapper {
            padding: 0
        }

        ::-webkit-file-upload-button {
            font: inherit
        }

        ::file-selector-button {
            font: inherit
        }

        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button
        }

        .container {
            width: 100%;
            padding-right: var(--bs-gutter-x, .75rem);
            padding-left: var(--bs-gutter-x, .75rem);
            margin-right: auto;
            margin-left: auto
        }

        @media (min-width:576px) {
            .container {
                max-width: 540px
            }
        }

        @media (min-width:768px) {
            .container {
                max-width: 720px
            }
        }

        @media (min-width:992px) {
            .container {
                max-width: 960px
            }
        }

        @media (min-width:1200px) {
            .container {
                max-width: 1140px
            }
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-.5 * var(--bs-gutter-x));
            margin-left: calc(-.5 * var(--bs-gutter-x))
        }

        .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-top: var(--bs-gutter-y)
        }

        .col-6 {
            flex: 0 0 auto;
            width: 50%
        }

        @media (min-width:576px) {
            .col-sm-3 {
                flex: 0 0 auto;
                width: 25%
            }
        }

        @media (min-width:992px) {
            .col-lg-4 {
                flex: 0 0 auto;
                width: 33.33333333%
            }
        }

        @media (min-width:1200px) {
            .col-xl-2 {
                flex: 0 0 auto;
                width: 16.66666667%
            }
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: .25rem
        }

        .form-control::-webkit-date-and-time-value {
            height: 1.5em
        }

        .form-control::-moz-placeholder {
            color: #6c757d;
            opacity: 1
        }

        .form-control::-webkit-file-upload-button {
            padding: .375rem .75rem;
            margin: -.375rem -.75rem;
            -webkit-margin-end: .75rem;
            margin-inline-end: .75rem;
            color: #212529;
            background-color: #e9ecef;
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            border-inline-end-width: 1px;
            border-radius: 0
        }

        .input-group {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%
        }

        .input-group>.form-control {
            position: relative;
            flex: 1 1 auto;
            width: 1%;
            min-width: 0
        }

        .input-group-text {
            display: flex;
            align-items: center;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: .25rem
        }

        .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
            margin-left: -1px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .collapse:not(.show) {
            display: none
        }

        .dropdown-toggle {
            white-space: nowrap
        }

        .dropdown-toggle::after {
            display: inline-block;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent
        }

        .dropdown-menu {
            position: absolute;
            z-index: 1000;
            display: none;
            min-width: 10rem;
            padding: .5rem 0;
            margin: 0;
            font-size: 1rem;
            color: #212529;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: .25rem
        }

        .navbar {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding-top: .5rem;
            padding-bottom: .5rem
        }

        .navbar>.container {
            display: flex;
            flex-wrap: inherit;
            align-items: center;
            justify-content: space-between
        }

        .navbar-brand {
            padding-top: .3125rem;
            padding-bottom: .3125rem;
            margin-right: 1rem;
            font-size: 1.25rem;
            text-decoration: none;
            white-space: nowrap
        }

        .navbar-nav {
            display: flex;
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none
        }

        .navbar-nav .dropdown-menu {
            position: static
        }

        .navbar-collapse {
            flex-basis: 100%;
            flex-grow: 1;
            align-items: center
        }

        .navbar-toggler {
            padding: .25rem .75rem;
            font-size: 1.25rem;
            line-height: 1;
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: .25rem
        }

        .d-inline-block {
            display: inline-block !important
        }

        .d-block {
            display: block !important
        }

        .d-none {
            display: none !important
        }

        .w-18 {
            width: 18% !important
        }

        .my-2 {
            margin-top: .5rem !important;
            margin-bottom: .5rem !important
        }

        .me-3 {
            margin-right: 1rem !important
        }

        .mb-5 {
            margin-bottom: 3rem !important
        }

        .ms-auto {
            margin-left: auto !important
        }

        .fs-5 {
            font-size: 1.25rem !important
        }

        @media (min-width:992px) {
            .navbar-expand-lg {
                flex-wrap: nowrap;
                justify-content: flex-start
            }

            .navbar-expand-lg .navbar-nav {
                flex-direction: row
            }

            .navbar-expand-lg .navbar-nav .dropdown-menu {
                position: absolute
            }

            .navbar-expand-lg .navbar-collapse {
                display: flex !important;
                flex-basis: auto;
                justify-content: end
            }

            .navbar-expand-lg .navbar-toggler {
                display: none
            }

            .d-lg-block {
                display: block !important
            }

            .d-lg-none {
                display: none !important
            }
        }

        .fal,
        .fas {
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1
        }

        .fa-bars:before {
            content: "\f0c9"
        }

        .fa-search:before {
            content: "\f002"
        }

        .fal {
            font-weight: 300
        }

        .fal {
            font-family: "Font Awesome 5 Pro"
        }

        .fas {
            font-family: "Font Awesome 5 Pro";
            font-weight: 900
        }

        :root {
            --color-primary: #F5CF49;
            --color-purple: #A958A5;
            --color-white: #ffffff;
            --color-black: #111111;
            --color-black-light: #242424;
            --color-semi-grey: #9F9F9F;
            --color-grey: #A4A4A4;
            --color-medium-grey: #b4b4b4;
            --color-dark-grey: #616161;
            --color-darker-grey: #808080;
            --color-grey-normal: #868686;
            --color-grey-light: #d4d4d4;
            --font-primary: "Smooch Sans";
            --font-sec: "Poppins", sans-serif;
            --font-Noir-Pro-Bold: "Noir Pro Bold";
            --font-Noir-Pro-semiBold: "Noir Pro Semi Bold";
            --font-Noir-Pro-Light: "Noir Pro Light";
            --font-body-1: 18px;
            --font-body-2: 16px;
            --font-body-3: 14px;
            --font-body-4: 12px;
            --line-height-b1: 1.5;
            --line-height-b3: 1.1;
            --h1: 80px;
            --h2: 64px;
            --h3: 48px;
            --h4: 32px;
            --h5: 24px;
            --h6: 20px
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: unset;
            letter-spacing: .5px
        }

        span {
            letter-spacing: 1.5px
        }

        img {
            max-width: 100%;
            height: auto;
            vertical-align: middle
        }

        section:after {
            content: '';
            display: block;
            clear: both
        }

        body {
            font-family: var(--font-primary);
            font-size: var(--font-body-2);
            line-height: var(--line-height-b1);
            color: var(--color-dark);
            font-weight: 400;
            letter-spacing: .5px;
            height: 100%;
            background-color: var(--color-black-light)
        }

        h2,
        p {
            margin: 0 0 10px
        }

        h2 {
            font-family: var(--font-primary);
            font-weight: 500;
            letter-spacing: 1.5px;
            color: var(--color-text-dark);
            line-height: var(--line-height-b3)
        }

        p {
            font-size: var(--font-body-2);
            line-height: var(--line-height-b1);
            margin: 0 0 10px;
            letter-spacing: .5px;
            color: var(--color-white)
        }

        .form-control,
        input {
            border: none;
            border-radius: 0;
            background-color: var(--color-black-light);
            color: var(--color-text-dark);
            padding: 5px 20px;
            font-weight: 400;
            font-weight: 18px;
            width: 100%;
            color: var(--color-grey-light);
            border: 1px solid var(--color-grey-light)
        }

        .form-control::-webkit-input-placeholder,
        input::-webkit-input-placeholder {
            color: var(--color-gray-2);
            opacity: 1
        }

        .input-group-text {
            border-color: var(--color-grey-light)
        }

        .input-group input {
            border-radius: 0 10px 10px 0
        }

        .form-control::-moz-placeholder,
        input::-moz-placeholder {
            color: var(--color-gray-2);
            opacity: 1
        }

        .form-control:-ms-input-placeholder,
        input:-ms-input-placeholder {
            color: var(--color-gray-2);
            opacity: 1
        }

        .form-control::-ms-input-placeholder,
        input::-ms-input-placeholder {
            color: var(--color-gray-2);
            opacity: 1
        }

        .form-control:-ms-input-placeholder,
        input:-ms-input-placeholder {
            color: var(--color-gray-2)
        }

        .form-control::-ms-input-placeholder,
        input::-ms-input-placeholder {
            color: var(--color-gray-2)
        }

        .input-group .anime-btn {
            border-color: var(--color-grey-light)
        }

        .input-group .anime-btn i {
            color: var(--color-grey-light)
        }

        input {
            height: 40px
        }

        .form-group {
            margin-bottom: 24px
        }

        .sec-mar {
            margin: 80px 0
        }

        .bg-color-xam {
            background-color: #3c3c3c
        }

        .dropdown-toggle::after {
            display: none
        }

        .dropdown-menu {
            -webkit-animation: .6s cubic-bezier(.39, .575, .565, 1) both fade-in-bottom;
            animation: .6s cubic-bezier(.39, .575, .565, 1) both fade-in-bottom
        }

        a.text-box {
            display: inline-block;
            padding: 0 10px;
            color: var(--color-primary);
            border: 2px solid var(--color-medium-grey);
            border-radius: 5px;
            font-weight: 400;
            font-size: 12px;
            margin-right: 10px;
            margin-bottom: 20px
        }

        @media only screen and (max-width:1250px) {
            a.text-box {
                margin-right: 5px
            }
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--color-black-light);
            z-index: 9999;
            width: 100%;
            display: grid;
            align-items: center;
            justify-content: center;
            height: 100vh
        }

        #preloader img {
            width: clamp(250px, 52.083vw, 1550px)
        }

        .anime-btn {
            border-radius: 10px;
            font-weight: 500;
            height: auto;
            text-align: center;
            position: relative;
            z-index: 1;
            border-right: none;
            background: var(--color-black-light)
        }

        .anime-btn2 {
            border-radius: 10px;
            background-color: transparent;
            padding: 8px;
            overflow: hidden;
            position: relative;
            font-size: 18px;
            line-height: 100%;
            font-weight: 400
        }

        .anime-btn2::before {
            content: "";
            position: absolute;
            z-index: -1;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            top: 100%;
            left: 0
        }

        .anime-btn2.light {
            border: 2px solid var(--color-primary);
            color: var(--color-white)
        }

        .anime-btn2.light::before {
            background: var(--color-primary)
        }

        .anime-btn2.dark {
            border: 2px solid var(--color-purple);
            color: var(--color-white)
        }

        .anime-btn2.dark::before {
            background: var(--color-purple)
        }

        .heading.style-1 {
            margin-bottom: 40px
        }

        .heading.style-1 h2 {
            width: 100%;
            font-weight: 700;
            font-size: 40px;
            color: var(--color-white);
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0
        }

        .heading.style-1 h2 span {
            color: var(--color-grey-light);
            font-weight: 400;
            font-size: 20px;
            text-transform: uppercase
        }

        .heading.style-1 span {
            font-weight: 400;
            font-size: 20px;
            color: var(--color-grey-light)
        }

        @media only screen and (max-width:1199px) {
            .heading.style-1 {
                margin-bottom: 30px
            }
        }

        @media only screen and (max-width:767px) {
            .heading.style-1 h2 {
                justify-content: center;
                flex-direction: column;
                font-size: 30px
            }

            .heading.style-1 h2 span {
                font-size: 14px;
                padding-top: 10px
            }
        }

        @media only screen and (max-width:492px) {
            .heading.style-1 {
                margin-bottom: 20px;
                text-align: center
            }

            .heading.style-1 span {
                font-size: 12px
            }

            .heading.style-1 h2 {
                font-size: 30px
            }

            .heading.style-1 h2 span {
                padding-top: 5px;
                font-size: 16px;
                text-align: center
            }
        }

        .header.style-1 {
            background: var(--color-black);
            height: 100px
        }

        .header.style-1 nav {
            padding: 30px 0;
            z-index: 999
        }

        .header .navbar-toggler {
            padding-left: 0;
            padding-right: 0;
            float: right
        }

        .header .navbar-toggler {
            color: var(--color-white)
        }

        .header nav .navbar-brand {
            padding: 0;
            width: 200px
        }

        .header nav i {
            color: var(--color-grey-light);
            font-size: 20px
        }

        .mainmenu>li {
            margin: 0 22px 0 0
        }

        .mainmenu>li>a {
            color: var(--color-grey-light);
            font-weight: 400;
            font-size: 18px;
            line-height: 30px;
            height: 30px;
            display: block;
            position: relative
        }

        .mainmenu>li>a.active {
            color: var(--color-primary)
        }

        .mainmenu>li>a.active::before {
            width: 100%;
            opacity: 1
        }

        .mainmenu>.menu-item-has-children {
            position: relative
        }

        .mainmenu>.menu-item-has-children>a {
            position: relative;
            font-weight: 700;
            font-size: larger
        }

        .header.style-1 .header-search-box {
            width: 300px;
            margin: 0 15px
        }

        @media only screen and (max-width:1399px) {
            .header.style-1 .header-search-box {
                width: 250px
            }

            .anime-blog p {
                font-size: 18px
            }
        }

        @media only screen and (max-width:992px) {
            .sec-mar {
                margin: 50px 0
            }

            .header.style-1 {
                height: 80px
            }

            .header.style-1 nav {
                padding: 25px 0 0
            }

            .header.style-1 .header-search-box {
                width: 350px;
                margin: 10px 0 24px 5px
            }

            .header.style-1 .navbar-collapse {
                background: rgba(17, 17, 17, .9);
                padding: 20px;
                border-radius: 0 0 15px 15px;
                margin-top: 15px
            }

            .mainmenu>li>a {
                font-size: 28px
            }

            .header input {
                height: 50px
            }

            .mainmenu>li {
                margin: 10px
            }
        }

        @media only screen and (max-width:492px) {
            .header.style-1 .header-search-box {
                width: 100%;
                margin: 10px 0 24px 5px
            }

            .header input {
                height: 40px
            }

            .mainmenu>li {
                margin: 5px
            }

            .mainmenu>li>a {
                font-size: 18px
            }

            .form-control,
            .header input {
                padding: 5px
            }
        }

        .anime-blog {
            margin-bottom: 32px;
            position: relative
        }

        .anime-blog .img-block {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 12px
        }

        .anime-blog .img-block img {
            width: 100%;
            border-radius: 10px;
            object-fit: fill
        }

        .h-image {
            height: 32vh
        }

        .anime-blog .detail {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0
        }

        .anime-blog .tags {
            display: -webkit-box
        }

        .anime-blog .text-box {
            font-weight: 400;
            font-size: 16px;
            margin-bottom: 0
        }

        .anime-blog a p {
            font-weight: 500;
            font-size: 24px;
            margin: 4px 0 0
        }

        @media only screen and (max-width:1250px) {
            .anime-blog .text-box {
                font-size: 13px
            }
        }

        @media only screen and (max-width:992px) {
            .anime-blog .text-box {
                font-size: 16px;
                margin-bottom: 5px
            }

            .anime-blog p {
                font-size: 16px
            }
        }

        @media only screen and (max-width:492px) {
            .anime-blog .text-box {
                font-size: 18px;
                margin-bottom: 5px
            }

            .anime-blog p {
                font-size: 20px
            }
        }

        @-webkit-keyframes fade-in-bottom {
            0% {
                -webkit-transform: translateY(50px);
                transform: translateY(50px);
                opacity: 0
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }
        }

        @keyframes fade-in-bottom {
            0% {
                -webkit-transform: translateY(50px);
                transform: translateY(50px);
                opacity: 0
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }
        }

        .fs-5 {
            font-size: 1.125rem !important
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('meta_description', 'Đọc truyện tranh online - Htruyen')">
    <meta name="keywords"
        content="@yield('meta_keywords', 'Htruyen, truyện tranh, đọc truyện tranh online - Htruyen, truyện manga')">
    {{-- Open Graph --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title')">
    <meta property="og:description" content="@yield('og_description')">
    <meta property="og:image" content="@yield('og_image')">
    <meta property="og:url" content="@yield('og_url')">

    {{-- web icon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/media/favicon.png') }}">
    <!-- Site Stylesheet -->
    @include('client.layouts.css')
    @yield('schema')

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6878376305810359"
        crossorigin="anonymous">
    </script>

    {{-- clickadu --}}
    <meta name="clckd" content="0475c08e9813c5d821ef1964efb01f89" />
    
</head>

<body class="sticky-header">
    {{-- ads --}}
    <script type="text/javascript">!function(){"use strict";for(var t=window,e=t.Math,n=t.Error,r=t.RegExp,s=t.Promise,o=t.document,i=t.Uint8Array,c=t.localStorage,l=t.Date.now,u=e.floor,a=e.random,h=t.JSON.stringify,d=t.String.fromCharCode,p='cmeccZYhfZb^W^TR^]S_UYZJOLRTEGGESBPFLO;;76P;;CAAE?H33.9--+2(02%*$"*~|$}{$ &}wqt|nookook}neympgeol_fjZYk[cUTUUU_WUUQQ`YXSRGFEMLKFDUE=<MAIN:=KJ78G6A5743>A94++555$\'-~& |-},$w({!~>=LO`_NKp5+mg?0em;%W\\\'s($/#!P|yu.{P[XxLTHHIJUUURHLDHJ=:D*JDF4968CB=?dXWdN")NKI3H]I20!FP}w"(xvr%p;hiLKW[M&6230670+pp'.replace(/((\x40){2})/g,"$2").split("").map(((t,e)=>{const n=t.charCodeAt(0)-32;return n>=0&&n<95?d(32+(n+e)%95):t})).join(""),f=[0,7,14,20,26,32,38,42,45,50,57,59,65,71,77,90,94,100,102,103,109,114,115,117,119,121,124,127,131,135,140,146,153,161,161,167,175,177,178,183,184,185,186,189,192,208,213,220,226,238,246,256,257,262,267,272,273,274,280,290],g=0;g<f.length-1;g++)f[g]=p.substring(f[g],f[g+1]);var m=[f[0],f[1],f[2],f[3],f[4],f[5]];m.push(m[0]+f[6]);const v=f[7]+m[4],w={2:v+f[8],15:v+f[8],9:v+m[2],16:v+m[2],10:v+m[3],17:v+m[3]},b=f[9]+m[4],y={2:m[1],15:m[1],9:m[2],16:m[2],10:m[3],17:m[3],5:f[10],7:f[10]},A={15:f[11],16:f[12],17:f[13]},x=f[14],E=x+f[15],U=x+f[16],$=f[17]+m[0]+f[18],j=f[19],D=j+f[20],I=j+(m[0]+f[21]),N=j+m[6],S=j+(m[6]+f[22]),k=[f[23],f[24],f[25],f[26],f[27],f[28],f[29],f[30],f[31],f[32]],C=36e5,O=(t,e)=>u(a()*(e-t+1))+t;function _(t,e,n){return function(t,e){try{return f[34],t()}catch(t){if(e)return e(t)}}(t,typeof handleException===f[35]?t=>{null===handleException||void 0===handleException||handleException(t)}:e)}const W=t=>{const[e]=t.split(f[36]);let[s,o,i]=((t,e)=>{let[n,r,...s]=t.split(e);return r=[r,...s].join(e),[n,r,!!s.length]})(t,f[37]);i&&_((()=>{throw new n(f[38])}));const c=new r(`^(${e})?//`,f[39]),[l,...u]=s.replace(c,f[33]).split(f[40]);return{protocol:e,origin:s,domain:l,path:u.join(f[40]),search:o}},H=()=>`${k[O(0,k.length-1)]}=${!O(0,1)?(t=>{let e=f[33];for(let n=0;n<t;n++)e+=d(O(97,122));return e})(O(2,6)):O(1,999999)}`,J=(t,e,n)=>{const r=((t,e)=>(e+t).split(f[33]).reduce(((t,e)=>31*t+e.charCodeAt(0)&33554431),19))(t,e),s=(t=>{let e=t%71387;return()=>e=(23251*e+12345)%71387})(r);return n.split(f[33]).map((t=>((t,e)=>{const n=t.charCodeAt(0),r=n<97||n>122?n:97+(n-97+e())%26,s=d(r);return s===f[39]?s+f[39]:s})(t,s))).join(f[33])},L=(t,e)=>{let{domain:n,search:r,origin:s}=W(t),o=r?r.split(f[41]):[];const i=o.length>4?[0,2]:[5,9];o.push(...((t,e)=>{const n=[],r=O(t,e);for(let t=0;t<r;t++)n.push(H());return n})(...i)),o=(t=>{const e=[...t];let n=e.length;for(;0!==n;){const t=u(a()*n);n--,[e[n],e[t]]=[e[t],e[n]]}return e})(o);const[c,l]=((t,e)=>{const n=[],r=[];return t.forEach((t=>{t.indexOf(e)>-1?r.push(t):n.push(t)})),[n,r]})(o,x);o=c.filter((t=>!(t===`id=${e}`)));const h=J(e,n,o.join(f[41])).split(f[41]);return l.length>0&&h.push(...l),h.splice(O(0,o.length),0,f[42]+e),s.replace(n,n+f[43])+f[37]+h.join(f[41])};function F(t,e){const n=function(t){const e=new r(U+f[44]).exec(t.location.href);return e&&e[1]?e[1]:null}(t);return n?e.replace(f[45],`-${n}/`):e}const P=f[46];function T(){if(((e,n=t)=>{const[r]=((t,e)=>{const n=e[t];try{if(!n)return[!1,n];const t="__storage_test__";return n.setItem(t,t),n.getItem(t),n.removeItem(t),[!0]}catch(t){return[!1,n,t]}})(e,n);return r})(f[48]))try{const e=c.getItem(P);return[e?t.JSON.parse(e):null,!1]}catch(t){return[null,!0]}return[null,!0]}function K(e){if(!e)return null;const n={};return t.Object.keys(e).forEach((r=>{const s=e[r];(function(e){const n=null==e?void 0:e[0],r=null==e?void 0:e[1];return typeof n===f[47]&&t.Number.isFinite(r)&&r>l()})(s)&&(n[r]=s)})),n}function R(t,e,n){let r=(/https?:\/\//.test(t)?f[33]:f[49])+t;return e&&(r+=f[40]+e),n&&(r+=f[37]+n),r}const B=(()=>{var t;const[e,n]=T();if(!n){const n=null!==(t=K(e))&&void 0!==t?t:{};c.setItem(P,h(n))}return{get:t=>{const[e]=T();return null==e?void 0:e[t]},set:(t,e,r)=>{const s=[e,l()+1e3*r],[o]=T(),i=null!=o?o:{};i[t]=s,n||c.setItem(P,h(i))}}})(),G=(M=B,(t,e)=>{const{domain:n,path:r,search:s}=W(t),o=M.get(n);if(o)return[R(o[0],r,s),!1];if((null==e?void 0:e.replaceDomain)&&(null==e?void 0:e.ttl)){const{domain:t}=W(null==e?void 0:e.replaceDomain);return t!==n&&M.set(n,e.replaceDomain,e.ttl),[R(e.replaceDomain,r,s),!0]}return[t,!1]});var M;const Y=t=>O(t-C,t+C),Z=e=>{const n=new r(E+f[50]).exec(e.location.href),s=n&&n[1]&&+n[1];return s&&!t.isNaN(s)?(null==n?void 0:n[2])?Y(s):s:Y(l())},X=[1,3,6,5,8,9,10,11,12,13,14,18];class q{constructor(e,n,r){this.b6d=e,this.ver=n,this.fbv=r,this.gd=t=>this.wu.then((e=>e.url(this.gfco(t)))),this.b6ab=e=>i.from(t.atob(e),(t=>t.charCodeAt(0))),this.sast=t=>0!=+t,this.el=o.currentScript,this.wu=this.iwa()}ins(){t[this.gcdk()]={};const e=X.map((e=>this.gd(e).then((n=>{const r=n?F(t,n):void 0;return t[this.gcdk()][e]=r,r}))));return s.all(e).then((e=>(t[this.gcuk()]=e,!0)))}gfco(e){const n=t.navigator?t.navigator.userAgent:f[33],r=t.location.hostname||f[33];return[t.innerHeight,t.innerWidth,t.sessionStorage?1:0,Z(t),0,e,r.slice(0,100),n.slice(0,15)].join(f[51])}iwa(){const e=t.WebAssembly&&t.WebAssembly.instantiate;return e?e(this.b6ab(this.b6d),{}).then((({instance:{exports:e}})=>{const n=e.memory,r=e.url,s=new t.TextEncoder,o=new t.TextDecoder(f[52]);return{url:t=>{const e=s.encode(t),c=new i(n.buffer,0,e.length);c.set(e);const l=c.byteOffset+e.length,u=r(c,e.length,l),a=new i(n.buffer,l,u);return o.decode(a)}}})):s.resolve(void 0)}cst(){const e=o.createElement(m[5]);return t.Object.assign(e.dataset,{cfasync:f[53]},this.el?this.el.dataset:{}),e.async=!0,e}}class Q extends q{constructor(e,n,r){super(e,n,r),this.gcuk=()=>D,this.gcdk=()=>I,this.gfu=e=>F(t,e),t[$]=this.ins(),t[S]=L}in(e){!this.sast(e)||t[b+y[e]]||t[w[e]]||this.ast(e)}ast(e){this.gd(e).then((r=>{var s;t[N+y[e]]=this.ver;const i=this.cst(),c=A[e],[l]=G(this.gfu(r));let u=l;if(c){const t=f[54]+c,r=o.querySelector(m[5]+f[55]+t+f[56]);if(!r)throw new n(f[57]+e);const l=(null!==(s=r.getAttribute(t))&&void 0!==s?s:f[33]).trim();r.removeAttribute(t),i.setAttribute(t,l)}else{const[t]=u.replace(/^https?:\/\//,f[33]).split(f[40]);u=u.replace(t,t+f[43])}i.src=u,o.head.appendChild(i)}))}}!function(e,n,r,s){const o=new Q("AGFzbQEAAAABHAVgAAF/YAN/f38Bf2ADf39/AX5gAX8AYAF/AX8DCQgAAQIBAAMEAAQFAXABAQEFBgEBgAKAAgYJAX8BQcCIwAILB2cHBm1lbW9yeQIAA3VybAADGV9faW5kaXJlY3RfZnVuY3Rpb25fdGFibGUBABBfX2Vycm5vX2xvY2F0aW9uAAcJc3RhY2tTYXZlAAQMc3RhY2tSZXN0b3JlAAUKc3RhY2tBbGxvYwAGCp8GCCEBAX9BuAhBuAgoAgBBE2xBoRxqQYfC1y9wIgA2AgAgAAuTAQEFfxAAIAEgAGtBAWpwIABqIgQEQEEAIQBBAyEBA0AgAUEDIABBA3AiBxshARAAIgZBFHBBkAhqLQAAIQMCfyAFQQAgBxtFBEBBACAGIAFwDQEaIAZBBnBBgAhqLQAAIQMLQQELIQUgACACaiADQawILQAAazoAACABQQFrIQEgAEEBaiIAIARJDQALCyACIARqC3ECA38CfgJAIAFBAEwNAANAIARBAWohAyACIAUgACAEai0AAEEsRmoiBUYEQCABIANMDQIDQCAAIANqMAAAIgdCLFENAyAGQgp+IAd8QjB9IQYgA0EBaiIDIAFHDQALDAILIAMhBCABIANKDQALCyAGC9ADAgN+B38gACABQQMQAiEDIAAgAUEFEAIhBUG4CCADQbAIKQMAIgQgAyAEVBtBqAgoAgAiAEEyaiIBIAFsQegHbK2AIgQgAEEOaiIKIABBBGsgA0KAgPHtxzBUIgsbrYCnIANC/4/Mp/YxVkEWdHI2AgAQABoQABogAkLo6NGDt87Oly83AABBB0EKQQggA0KA0MWXgzJUGyADQoCWop3lMFQiBhtBC0EMIAYbIAJBCGoQASEAEAAaIwBBEGsiASQAIABBLjoAACABQePetQM2AgwgAEEBaiEHQQAhACABQQxqIgwtAAAiCARAA0AgACAHaiAIOgAAIAwgAEEBaiIAai0AACIIDQALCyABQRBqJAAgACAHaiEBQbgIIAQgCq2AIAVCG4ZCAEKAgIAgQoCAgDBCgICACEKAgIAYIAVCCFEbQoCAgBJCgIDADSADQoCIl9qsMlQbIANCgJDMp/YxVBsgA0KAmMauzzFUGyAGGyALG4SEPgIAQQVBCCADQoCQ6oDTMlQiABshBhAAGkECQQRBBSAAGxAAQQNwIgAbIQcDQCABQS86AAAgACAJRiEIIAcgBiABQQFqEAEhASAJQQFqIQkgCEUNAAsgASACawsEACMACwYAIAAkAAsQACMAIABrQXBxIgAkACAACwUAQbwICws7AwBBgAgLBp6ipqyytgBBkAgLFJ+goaOkpaeoqaqrra6vsLGztLW3AEGoCAsOCgAAAD0AAAD/IzcJmgE=","10",s);t["mfknut"]=t=>o.in(t)}(0,0,0,f[58])}();</script>
<script data-cfasync="false" data-clipid="2079291" async src="//earmuffpostnasalrisotto.com/in.js" onerror="mfknut(17)" onload="mfknut(17)"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KPKR0RHDC5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-KPKR0RHDC5');
    </script>

    <!-- Preloader -->
    @include('client.layouts.preloader')
    <!-- Back To Top Start -->
    @include('client.layouts.back-to-top')
    <!-- Back To Top End -->

    <!-- Main Wrapper Start -->
    <div class="main-wrapper" id="main-wrapper">

        {{-- Toast Notification --}}
        @include('components.status-bar')
        <!--=        Header Area Start       	=-->

        @include('client.layouts.header')

        <p style="text-align: center; margin-top: 5px;">
            ❤️ Nếu bạn thấy trang web hữu ích, hãy click <a class="link-active"  href="https://shorten.asia/453admWS"
                target="_blank" rel="noopener noreferrer"><strong>Shopee.vn </strong></a> để ủng hộ chúng mình. Mỗi lượt click giúp
            duy trì website hoạt động!
        </p>

        <!--=        Breadcrumb Area Start       =-->
        @include('client.layouts.breadcrumb')
        <!--=        Main Content Start          =-->
        @yield('content')
        <!--=           Footer Area Start       =-->
        {!! Cache::remember('cached_footer_html', 3600 * 6, function () {
    return view('client.layouts.footer')->render();
}) !!}

    </div>
    <!-- Jquery Js -->
    @include('client.layouts.js')
</body>

</html>