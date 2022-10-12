<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Invoice</title>

    <style>
        /* =================================== */
        /*  Basic Style
/* =================================== */

        body {
            color: #535b61;
            font-family: sans-serif;
            font-size: 14.5px;
            line-height: 22px;
        }

        form {
            padding: 0;
            margin: 0;
            display: inline;
        }

        img {
            vertical-align: inherit;
        }

        a,
        a:focus {
            color: #0071cc;
            text-decoration: none;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }

        a:hover,
        a:active {
            color: #005da8;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }

        a:focus,
        a:active,
        .btn.active.focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn:active:focus,
        .btn:focus,
        button:focus,
        button:active {
            outline: none;
        }

        p {
            line-height: 1.9;
        }

        blockquote {
            border-left: 5px solid #eee;
            padding: 10px 20px;
        }

        iframe {
            border: 0 !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #0c2f54;
        }

        .table {
            color: #535b61;
        }

        .table-hover tbody tr:hover {
            background-color: #f6f7f8;
        }

        /* =================================== */
        /*  Helpers Classes
/* =================================== */
        /* Border Radius */
        .rounded-top-0 {
            border-top-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
        }

        .rounded-bottom-0 {
            border-bottom-left-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
        }

        .rounded-left-0 {
            border-top-left-radius: 0px !important;
            border-bottom-left-radius: 0px !important;
        }

        .rounded-right-0 {
            border-top-right-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
        }

        /* Text Size */
        .text-0 {
            font-size: 11px !important;
            font-size: 0.6875rem !important;
        }

        .text-1 {
            font-size: 12px !important;
            font-size: 0.75rem !important;
        }

        .text-2 {
            font-size: 14px !important;
            font-size: 0.875rem !important;
        }

        .text-3 {
            font-size: 16px !important;
            font-size: 1rem !important;
        }

        .text-4 {
            font-size: 18px !important;
            font-size: 1.125rem !important;
        }

        .text-5 {
            font-size: 21px !important;
            font-size: 1.3125rem !important;
        }

        .text-6 {
            font-size: 24px !important;
            font-size: 1.50rem !important;
        }

        .text-7 {
            font-size: 28px !important;
            font-size: 1.75rem !important;
        }

        .text-8 {
            font-size: 32px !important;
            font-size: 2rem !important;
        }

        .text-9 {
            font-size: 36px !important;
            font-size: 2.25rem !important;
        }

        .text-10 {
            font-size: 40px !important;
            font-size: 2.50rem !important;
        }

        .text-11 {
            font-size: calc(1.4rem + 1.8vw) !important;
        }

        @media (min-width: 1200px) {
            .text-11 {
                font-size: 2.75rem !important;
            }
        }

        .text-12 {
            font-size: calc(1.425rem + 2.1vw) !important;
        }

        @media (min-width: 1200px) {
            .text-12 {
                font-size: 3rem !important;
            }
        }

        .text-13 {
            font-size: calc(1.45rem + 2.4vw) !important;
        }

        @media (min-width: 1200px) {
            .text-13 {
                font-size: 3.25rem !important;
            }
        }

        .text-14 {
            font-size: calc(1.475rem + 2.7vw) !important;
        }

        @media (min-width: 1200px) {
            .text-14 {
                font-size: 3.5rem !important;
            }
        }

        .text-15 {
            font-size: calc(1.5rem + 3vw) !important;
        }

        @media (min-width: 1200px) {
            .text-15 {
                font-size: 3.75rem !important;
            }
        }

        .text-16 {
            font-size: calc(1.525rem + 3.3vw) !important;
        }

        @media (min-width: 1200px) {
            .text-16 {
                font-size: 4rem !important;
            }
        }

        .text-17 {
            font-size: calc(1.575rem + 3.9vw) !important;
        }

        @media (min-width: 1200px) {
            .text-17 {
                font-size: 4.5rem !important;
            }
        }

        .text-18 {
            font-size: calc(1.625rem + 4.5vw) !important;
        }

        @media (min-width: 1200px) {
            .text-18 {
                font-size: 5rem !important;
            }
        }

        .text-19 {
            font-size: calc(1.65rem + 4.8vw) !important;
        }

        @media (min-width: 1200px) {
            .text-19 {
                font-size: 5.25rem !important;
            }
        }

        .text-20 {
            font-size: calc(1.7rem + 5.4vw) !important;
        }

        @media (min-width: 1200px) {
            .text-20 {
                font-size: 5.75rem !important;
            }
        }

        .text-21 {
            font-size: calc(1.775rem + 6.3vw) !important;
        }

        @media (min-width: 1200px) {
            .text-21 {
                font-size: 6.5rem !important;
            }
        }

        .text-22 {
            font-size: calc(1.825rem + 6.9vw) !important;
        }

        @media (min-width: 1200px) {
            .text-22 {
                font-size: 7rem !important;
            }
        }

        .text-23 {
            font-size: calc(1.9rem + 7.8vw) !important;
        }

        @media (min-width: 1200px) {
            .text-23 {
                font-size: 7.75rem !important;
            }
        }

        .text-24 {
            font-size: calc(1.95rem + 8.4vw) !important;
        }

        @media (min-width: 1200px) {
            .text-24 {
                font-size: 8.25rem !important;
            }
        }

        .text-25 {
            font-size: calc(2.025rem + 9.3vw) !important;
        }

        @media (min-width: 1200px) {
            .text-25 {
                font-size: 9rem !important;
            }
        }

        /* Line height */
        .line-height-07 {
            line-height: 0.7 !important;
        }

        .line-height-1 {
            line-height: 1 !important;
        }

        .line-height-2 {
            line-height: 1.2 !important;
        }

        .line-height-3 {
            line-height: 1.4 !important;
        }

        .line-height-4 {
            line-height: 1.6 !important;
        }

        .line-height-5 {
            line-height: 1.8 !important;
        }

        /* Font Weight */
        .fw-100 {
            font-weight: 100 !important;
        }

        .fw-200 {
            font-weight: 200 !important;
        }

        .fw-300 {
            font-weight: 300 !important;
        }

        .fw-400 {
            font-weight: 400 !important;
        }

        .fw-500 {
            font-weight: 500 !important;
        }

        .fw-600 {
            font-weight: 600 !important;
        }

        .fw-700 {
            font-weight: 700 !important;
        }

        .fw-800 {
            font-weight: 800 !important;
        }

        .fw-900 {
            font-weight: 900 !important;
        }

        /* Opacity */
        .opacity-0 {
            opacity: 0;
        }

        .opacity-1 {
            opacity: 0.1;
        }

        .opacity-2 {
            opacity: 0.2;
        }

        .opacity-3 {
            opacity: 0.3;
        }

        .opacity-4 {
            opacity: 0.4;
        }

        .opacity-5 {
            opacity: 0.5;
        }

        .opacity-6 {
            opacity: 0.6;
        }

        .opacity-7 {
            opacity: 0.7;
        }

        .opacity-8 {
            opacity: 0.8;
        }

        .opacity-9 {
            opacity: 0.9;
        }

        .opacity-10 {
            opacity: 1;
        }

        /* Background light */
        .bg-light {
            background-color: #FFF !important;
        }

        .bg-light-1 {
            background-color: #f9f9fb !important;
        }

        .bg-light-2 {
            background-color: #f8f8fa !important;
        }

        .bg-light-3 {
            background-color: #f5f5f5 !important;
        }

        .bg-light-4 {
            background-color: #eff0f2 !important;
        }

        .bg-light-5 {
            background-color: #ececec !important;
        }

        hr {
            opacity: 0.15;
        }

        .card-header {
            padding-top: .75rem;
            padding-bottom: .75rem;
        }

        /* Table */
        .table> :not(:last-child)> :last-child>* {
            border-bottom-color: inherit;
        }

        .table tr td {
            padding: 0.75rem;
        }


        .table-sm> :not(caption)>*>* {
            padding: 0.3rem;
        }

        @media print {

            .table td,
            .table th {
                background-color: transparent !important;
            }

            .table td.bg-light,
            .table th.bg-light {
                background-color: #FFF !important;
            }

            .table td.bg-light-1,
            .table th.bg-light-1 {
                background-color: #f9f9fb !important;
            }

            .table td.bg-light-2,
            .table th.bg-light-2 {
                background-color: #f8f8fa !important;
            }

            .table td.bg-light-3,
            .table th.bg-light-3 {
                background-color: #f5f5f5 !important;
            }

            .table td.bg-light-4,
            .table th.bg-light-4 {
                background-color: #eff0f2 !important;
            }

            .table td.bg-light-5,
            .table th.bg-light-5 {
                background-color: #ececec !important;
            }
        }

        /* =================================== */
        /*  Layouts
/* =================================== */
        .invoice-container {
            margin: 15px auto;
            padding: 70px;
            max-width: 850px;
            background-color: #fff;
            border: 1px solid #ccc;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            -o-border-radius: 6px;
            border-radius: 6px;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 35px 20px 70px 20px;
                margin-top: 0px;
                border: none;
                border-radius: 0px;
            }
        }

        /* =================================== */
        /*  Extras
/* =================================== */
        .bg-primary,
        .badge-primary {
            background-color: #0071cc !important;
        }

        .bg-secondary {
            background-color: #0c2f55 !important;
        }

        .text-secondary {
            color: #0c2f55 !important;
        }

        .text-primary {
            color: #0071cc !important;
        }

        .btn-link {
            color: #0071cc;
        }

        .btn-link:hover {
            color: #005da8 !important;
        }

        .border-primary {
            border-color: #0071cc !important;
        }

        .border-secondary {
            border-color: #0c2f55 !important;
        }

        .btn-primary {
            background-color: #0071cc;
            border-color: #0071cc;
        }

        .btn-primary:hover {
            background-color: #005da8;
            border-color: #005da8;
        }

        .btn-secondary {
            background-color: #0c2f55;
            border-color: #0c2f55;
        }

        .btn-outline-primary {
            color: #0071cc;
            border-color: #0071cc;
        }

        .btn-outline-primary:hover {
            background-color: #0071cc;
            border-color: #0071cc;
            color: #fff;
        }

        .btn-outline-secondary {
            color: #0c2f55;
            border-color: #0c2f55;
        }

        .btn-outline-secondary:hover {
            background-color: #0c2f55;
            border-color: #0c2f55;
            color: #fff;
        }

        .progress-bar,
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #0071cc;
        }

        .page-item.active .page-link,
        .custom-radio .custom-control-input:checked~.custom-control-label:before,
        .custom-control-input:checked~.custom-control-label::before,
        .custom-checkbox .custom-control-input:checked~.custom-control-label:before,
        .custom-control-input:checked~.custom-control-label:before {
            background-color: #0071cc;
            border-color: #0071cc;
        }

        .list-group-item.active {
            background-color: #0071cc;
            border-color: #0071cc;
        }

        .page-link {
            color: #0071cc;
        }

        .page-link:hover {
            color: #005da8;
        }

        /* Pagination */
        .page-link {
            border-color: #f4f4f4;
            border-radius: 0.25rem;
            margin: 0 0.3rem;
        }

        .page-item.disabled .page-link {
            border-color: #f4f4f4;
        }


        /* my custom css */
        * {
            box-sizing: border-box;
        }


        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-header {
            padding: .5rem 1rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, .03);
            border-bottom: 1px solid rgba(0, 0, 0, .125);
        }

        .card-body {
            flex: 1 1 auto;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .card-footer {
            padding: .5rem 1rem;
            background-color: rgba(0, 0, 0, .03);
            border-top: 1px solid rgba(0, 0, 0, .125);
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: #212529;
            --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
            --bs-table-active-color: #212529;
            --bs-table-active-bg: rgba(0, 0, 0, 0.1);
            --bs-table-hover-color: #212529;
            --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
            width: 100%;
            vertical-align: top;
            border-color: #dee2e6;
        }

        table {
            border-collapse: collapse;
        }

        .table tr {
            border-bottom: 1px solid #ddd;
        }

        .border-bottom-0 {
            border-bottom: 0 !important;
        }

        .table-bordered,
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd;
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        .mb-15 {
            margin-bottom: 15px;
        }

        .mb-10 {
            margin-bottom: 10px;
        }

        .mb-5 {
            margin-bottom: 5px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-15 {
            margin-top: 15px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mt-5 {
            margin-top: 5px;
        }

        .fw-500 {
            font-weight: 600 !important;
        }

        .mb-0 {
            margin: 0;
        }


        .text-center {
            text-align: center !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-end {
            text-align: right !important;
        }

        .align-items-center {
            align-items: center;
        }

        .table-border-none {
            border-collapse: collapse;
        }

    </style>
</head>

<body>
    <!-- Container -->
    <div class="invoice-container">
        <header>
            <table style="width: 100%;" class="table-border-none">
                
            </table>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <table class="mb-20 mt-20 table-border-none" style="width: 100%;">
                <tr>
                    <td>
                        <div>
                            <strong>Admission To:</strong>
                            <div>
                                {{ $name }}<br />
                                {{ $email }}<br />
                                {{ $address }}
                            </div>
                        </div>
                    </td>
                  
                </tr>


            </table>
            <br>
            
        </main>

    </div>
</body>

</html>
