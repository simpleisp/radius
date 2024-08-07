
<!DOCTYPE html>
<html lang="en">


<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">
    <title>Receipt Invoice</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&amp;display=swap');

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    body {
        color: #666;
        font-size: 12px;
        font-weight: 400;
        line-height: 1.4em;
        margin: 0;
        font-family: 'Inter', sans-serif;
        background-color: #f5f6fa;
    }

    .tm_pos_invoice_wrap {
        max-width: 340px;
        margin: auto;
        margin-top: 0px;
        padding: 30px 20px;
        background-color: #fff;
    }

    .tm_pos_company_logo {
        display: flex;
        justify-content: center;
        margin-bottom: 7px;
    }

    .tm_pos_company_logo img {
        vertical-align: middle;
        border: 0;
        max-width: 100%;
        height: auto;
        max-height: 45px;
    }

    .tm_pos_invoice_top {
        text-align: center;
        margin-bottom: 18px;
    }

    .tm_pos_invoice_heading {
        display: flex;
        justify-content: center;
        position: relative;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: 500;
        margin: 10px 0;
    }

    .tm_pos_invoice_heading:before {
        content: '';
        position: absolute;
        height: 0;
        width: 100%;
        left: 0;
        top: 46%;
        border-top: 1px dashed #666;
    }

    .tm_pos_invoice_heading span {
        display: inline-flex;
        padding: 0 5px;
        background-color: #fff;
        z-index: 1;
        font-weight: 500;
        position: relative;
    }

    .tm_list.tm_style1 {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-wrap: wrap;
    }

    .tm_list.tm_style1 li {
        display: flex;
        width: 50%;
        font-size: 12px;
        line-height: 1.2em;
        margin-bottom: 7px;
    }

    .text-right {
        text-align: right;
        justify-content: flex-end;
    }

    .tm_list_title {
        color: #111;
        margin-right: 4px;
        font-weight: 500;
    }

    .tm_invoice_seperator {
        width: 150px;
        border-top: 1px dashed #666;
        margin: 9px 0;
        margin-left: auto;
    }

    .tm_pos_invoice_table {
        width: 100%;
        margin-top: 10px;
        line-height: 1.3em;
    }

    .tm_pos_invoice_table thead th {
        font-weight: 500;
        color: #111;
        text-align: left;
        padding: 8px 3px;
        border-top: 1px dashed #666;
        border-bottom: 1px dashed #666;
    }

    .tm_pos_invoice_table td {
        padding: 4px;
    }

    .tm_pos_invoice_table tbody tr:first-child td {
        padding-top: 10px;
    }

    .tm_pos_invoice_table tbody tr:last-child td {
        padding-bottom: 10px;
        border-bottom: 1px dashed #666;
    }

    .tm_pos_invoice_table th:last-child,
    .tm_pos_invoice_table td:last-child {
        text-align: right;
        padding-right: 0;
    }

    .tm_pos_invoice_table th:first-child,
    .tm_pos_invoice_table td:first-child {
        padding-left: 0;
    }

    .tm_pos_invoice_table tr {
        vertical-align: baseline;
    }

    .tm_bill_list {
        list-style: none;
        margin: 0;
        padding: 12px 0;
        border-bottom: 1px dashed #666;
    }

    .tm_bill_list_in {
        display: flex;
        text-align: right;
        justify-content: flex-end;
        padding: 3px 0;
    }

    .tm_bill_title {
        padding-right: 20px;
    }

    .tm_bill_value {
        width: 90px;
    }

    .tm_bill_value.tm_bill_focus,
    .tm_bill_title.tm_bill_focus {
        font-weight: 500;
        color: #111;
    }

    .tm_pos_invoice_footer {
        text-align: center;
        margin-top: 20px;
    }

    .tm_pos_sample_text {
        text-align: center;
        padding: 12px 0;
        border-bottom: 1px dashed #666;
        line-height: 1.6em;
        color: #9c9c9c;
    }

    .tm_pos_company_name {
        font-weight: 500;
        color: #111;
        font-size: 13px;
        line-height: 1.4em;
    }
    /* Start Receipt Section */
    .tm_container {
        max-width: 480px;
        padding: 30px 15px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
    }
    @media (min-width: 575px) {
        .tm_invoice_btns {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-top: 0px;
            margin-left: 0;
            position: absolute;
            right: 0px;
            top: 30px;
            -webkit-box-shadow: -2px 0 24px -2px rgba(43, 55, 72, 0.05);
            box-shadow: -2px 0 24px -2px rgba(43, 55, 72, 0.05);
            border: 3px solid #fff;
            border-radius: 6px;
            background-color: #fff;
        }
        .tm_invoice_btn {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border: none;
            font-weight: 600;
            cursor: pointer;
            padding: 0;
            background-color: transparent;
            position: relative;
        }
        .tm_invoice_btn svg {
            width: 24px;
        }
        .tm_invoice_btn .tm_btn_icon {
            padding: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            height: 42px;
            width: 42px;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
        .tm_invoice_btn .tm_btn_text {
            position: absolute;
            left: 100%;
            background-color: #111;
            color: #fff;
            padding: 3px 12px;
            display: inline-block;
            margin-left: 10px;
            border-radius: 5px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            font-weight: 500;
            min-height: 28px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            opacity: 0;
            visibility: hidden;
        }
        .tm_invoice_btn .tm_btn_text:before {
            content: "";
            height: 10px;
            width: 10px;
            position: absolute;
            background-color: #111;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            left: -3px;
            top: 50%;
            margin-top: -6px;
            border-radius: 2px;
        }
        .tm_invoice_btn:hover .tm_btn_text {
            opacity: 1;
            visibility: visible;
        }
        .tm_invoice_btn:not(:last-child) {
            margin-bottom: 3px;
        }
        .tm_invoice_btn.tm_color1 {
            background-color: rgba(0, 122, 255, 0.1);
            color: #007aff;
            border-radius: 5px 5px 0 0;
        }
        .tm_invoice_btn.tm_color1:hover {
            background-color: rgba(0, 122, 255, 0.2);
        }
        .tm_invoice_btn.tm_color2 {
            background-color: rgba(52, 199, 89, 0.1);
            color: #34c759;
            border-radius: 0 0 5px 5px;
        }
        .tm_invoice_btn.tm_color2:hover {
            background-color: rgba(52, 199, 89, 0.2);
        }
    }
    @media (max-width: 574px) {
        .tm_invoice_btns {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-top: 0px;
            margin-top: 20px;
            -webkit-box-shadow: -2px 0 24px -2px rgba(43, 55, 72, 0.05);
            box-shadow: -2px 0 24px -2px rgba(43, 55, 72, 0.05);
            border: 3px solid #fff;
            border-radius: 6px;
            background-color: #fff;
            position: relative;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
        }
        .tm_invoice_btn {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border: none;
            font-weight: 600;
            cursor: pointer;
            padding: 0;
            background-color: transparent;
            position: relative;
            border-radius: 5px;
            padding: 6px 15px;
            text-decoration: none;
        }
        .tm_invoice_btn svg {
            width: 24px;
        }
        .tm_invoice_btn .tm_btn_icon {
            padding: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-right: 8px;
        }
        .tm_invoice_btn:not(:last-child) {
            margin-right: 3px;
        }
        .tm_invoice_btn.tm_color1 {
            background-color: rgba(0, 122, 255, 0.1);
            color: #007aff;
        }
        .tm_invoice_btn.tm_color1:hover {
            background-color: rgba(0, 122, 255, 0.2);
        }
        .tm_invoice_btn.tm_color2 {
            background-color: rgba(52, 199, 89, 0.1);
            color: #34c759;
        }
        .tm_invoice_btn.tm_color2:hover {
            background-color: rgba(52, 199, 89, 0.2);
        }
    }
    @media print {
        .tm_hide_print {
            display: none !important;
        }
    }
    /* End Receipt Section */
    </style>
</head>

<body>
    <div class="tm_container">
        <div class="tm_pos_invoice_wrap" id="tm_download_section">
            <div class="tm_pos_invoice_top">
                <div class="tm_pos_company_logo">
                    @if(setting('logo') && file_exists(public_path(setting('logo'))))
                    <img src="{{ asset(setting('logo')) }}" alt="Logo" style="max-height: 50px; max-width: 100%;">
                @endif                  
                </div>
                <div class="tm_pos_company_name">{{ setting('company') }}</div>
                <div class="tm_pos_company_address">{{ setting('city') }}</div>
                <div class="tm_pos_company_mobile">{{ setting('company_email') }}</div>
                <div class="tm_pos_company_mobile">{{ setting('company_phone') }}</div>
            </div>
            <div class="tm_pos_invoice_body">
                <div class="tm_pos_invoice_heading"><span>Transaction Receipt</span></div>
                <ul class="tm_list tm_style1">
                    <li>
                        <div class="tm_list_title">Name:</div>
                        <div class="tm_list_desc">{{ $customer->firstname }} {{ $customer->lastname }}</div>
                    </li>
                    <li class="text-right">
                        <div class="tm_list_title">Receipt No:</div>
                        <div class="tm_list_desc">{{ $transaction->id }}</div>
                    </li>
                    <li>
                        <div class="tm_list_title">Account:</div>
                        <div class="tm_list_desc">{{ $customer->username }}</div>
                    </li>
                    <li class="text-right">
                        <div class="tm_list_title">Date:</div>
                        <div class="tm_list_desc">{{ $transaction->created_at->format('d.m.Y') }}</div>
                    </li>
                </ul>
                <table class="tm_pos_invoice_table">
                    <thead>
                        <tr>
                            <th>Ref</th>
                            <th>Description</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ isset($transaction->meta) ? json_decode($transaction->meta)->title : 'N/A' }}</td>
                            <td>{{ isset($transaction->meta) ? json_decode($transaction->meta)->description : 'N/A' }}</td>
                            <td>KES {{ abs($transaction->amount) }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="tm_bill_list">
                    <div class="tm_bill_list_in">
                        <div class="tm_bill_title">total:</div>
                        <div class="tm_bill_value">KES {{ abs($transaction->amount) }}</div>
                    </div>
                </div>
                <div class="tm_pos_sample_text">**This is auto generated receipt based on the transaction. incase of any query, talk to us.</div>
                <div class="tm_pos_invoice_footer">Powered by {{setting('company')}}</div>
            </div>
        </div>
        <div class="tm_invoice_btns tm_hide_print">
            <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
              <span class="tm_btn_icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
              </span>
              <span class="tm_btn_text">Print</span>
            </a>
            <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
              <span class="tm_btn_icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
              </span>
              <span class="tm_btn_text">Download</span>
            </button>
        </div>
    </div>
    <script src="{{URL::asset('assets/receipt/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/receipt/jspdf.min.js')}}"></script>
    <script src="{{URL::asset('assets/receipt/html2canvas.min.js')}}"></script>
    <script>
        $('#tm_download_btn').on('click', function () {
        var downloadSection = $('#tm_download_section');
        var cWidth = downloadSection.width();
        var cHeight = downloadSection.height();
        var topLeftMargin = 0;
        var pdfWidth = cWidth + topLeftMargin * 2;
        var pdfHeight = cHeight;
        var canvasImageWidth = cWidth;
        var canvasImageHeight = cHeight;
        var totalPDFPages = Math.ceil(cHeight / pdfHeight) - 1;

        html2canvas(downloadSection[0], { allowTaint: true }).then(function (
        canvas
        ) {
        canvas.getContext('2d');
        var imgData = canvas.toDataURL('image/png', 1.0);
        var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
        pdf.addImage(
            imgData,
            'PNG',
            topLeftMargin,
            topLeftMargin,
            canvasImageWidth,
            canvasImageHeight
        );
        for (var i = 1; i <= totalPDFPages; i++) {
            pdf.addPage(pdfWidth, pdfHeight);
            pdf.addImage(
            imgData,
            'PNG',
            topLeftMargin,
            -(pdfHeight * i) + topLeftMargin * 0,
            canvasImageWidth,
            canvasImageHeight
            );
        }
        pdf.save('download.html');
        });
    });
    </script>
  </body>
</html>