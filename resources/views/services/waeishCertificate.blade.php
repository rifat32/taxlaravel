<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ওয়ারিশন সার্টিফিকেট</title>
    <link rel="stylesheet" href="./warishCertificate.css">
    <link href="{{asset('css/warishCertificate.css')}}" rel="stylesheet" type="text/css"/>
<style>
.bg-img {
    background-image: url("{{Request::root()}}/{{$services->union->image}}") !important;
        background-repeat: no-repeat;
        background-position: center;
        background-size:cover;
        min-height: 700px;
        width: 1000px;
}

</style>
</head>

<body>

    <section class="warish-section bg-img">
        <div class="warish-section-header">
            <h1></h1>
            <div class="warish-section-header-title">
                <div class="col-3"></div>
                <div class="col-2">

                    <h3 style="font-size: 1.5rem">{{$services->union_name}}</h3>
                    <h3>উপজেলাঃ {{$services->upazila_name}}, জেলাঃ {{$services->district_name}} ।</h3>
                    <h5>https: horipurup.rajshahi.gov.bd</h5>
                    <h2>ওয়ারিশন সার্টিফিকেট</h2>
                    <h3>সনদ নম্বর - {{$services->id}}</h3>
                </div>

                <div class="col-3">
                    <p>হোল্ডিং নংঃ <span>{{$services->applicant_holding_no}}</span></p>
                    <p>তারিখঃ <span>{{$date}}</span></p>
                </div>
            </div>
        </div>


        <div class="warish-section-description">
            <p> <s class="space"></s>এই মর্মে ওয়ারিশ সার্টিফিকেট প্রদান করা যাচ্ছে যে, মরহুম/মরহুমা <span>{{$services->died_name}}</span> পিতা/স্বামী <span>{{$services->died_father}}</span> মাতা <span>{{$services->died_mother}}</span> গ্রাম <span>{{$services->died_village}}</span> ওয়ার্ড নং <span>{{$services->died_ward}}</span> ডাকঘর
                <span>{{$services->died_post_office}}</span> থানা/উপজেলা <span>{{$services->died_upozilla}}</span> জেলাঃ {{$services->died_zilla}}। আমি তাকে চিনি ও জানি। তিনি অত্র ইউনিয়নের স্থায়ী বাসিন্দা। তিনি নিম্নলিখিত ওয়ারিশগণ রেখে ইন্ততেকাল করেন।
            </p>
        </div>

        <div class="warish-section-table">
            @if ($count > 8)
            <table>
                <tr>
                    <th>ক্রঃনং</th>
                    <th>ওয়ারিশগণের নাম</th>
                    <th>বয়স</th>
                    <th>সম্পর্ক</th>

                </tr>

                @foreach ($warishes as $warish)
                @if (($loop->index + 1) <= 8)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$warish->name}}</td>
                    <td>{{$warish->age}}</td>
                    <td>{{$warish->relation}}</td>
                </tr>
                @endif

                @endforeach
            </table>
            <table>
                <tr>
                    <th>ক্রঃনং</th>
                    <th>ওয়ারিশগণের নাম</th>
                    <th>বয়স</th>
                    <th>সম্পর্ক</th>

                </tr>

                @foreach ($warishes as $warish)
                @if (($loop->index + 1) > 8)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$warish->name}}</td>
                    <td>{{$warish->age}}</td>
                    <td>{{$warish->relation}}</td>
                </tr>
                @endif

                @endforeach
            </table>
   @else
   <table>
    <tr>
        <th>ক্রঃনং</th>
        <th>ওয়ারিশগণের নাম</th>
        <th>বয়স</th>
        <th>সম্পর্ক</th>

    </tr>

    @foreach ($warishes as $warish)
    <tr>
        <td>{{$loop->index + 1}}</td>
        <td>{{$warish->name}}</td>
        <td>{{$warish->age}}</td>
        <td>{{$warish->relation}}</td>
    </tr>


    @endforeach
</table>
            @endif


        </div>


        <div class="warish-section-description-footer-update">
            <p>আমার জানা মতে উল্লেখিত ওয়ারিশ ছাড়া তার অন্য কোন ওয়ারিশ নেই।</p>
            <p style="text-align: end;">
                <img src="{{Request::root()}}/{{$services->sign}}" width="100"/><br>
                <span style="padding-right: 1.2rem">
                    চেয়ারম্যান
                </span>


            </p>
            <p>* নিয়মিত ট্যাক্স পরিশোধ করুন * ০-৪৫ দিনের মধ্যে জন্ম-মৃত্যু নিবন্ধন করুন *</p>
            <p>* ইউপি তথ্যকেন্দ্র হতে সুবিধা গ্রহণ করুন *</p>
        </div>
        {{-- <div>
            <img src="/{{$services->sign}}"/>

        </div> --}}
        <div  class="instructions">
            <h3>নির্দেশনাবলী:</h3>

            <p>
                ১)
                সার্টিফিকেট টি online  এ verification এর জন্য পেজ https//euptax.com এ আসুন এবং সনদ নং ও মোবাইল নাম্বার দিয়ে অনুসন্ধান করুন | অথবা আপনার smart  phone  থেকে QR code টি Scan করুন |
            </p>
            <p>
                ২)
                যেকোনো ধরণের তথ্য নেয়ার জন্য ফোন করুন অথবা ইমেইল করুন |
            </p>
            {!! DNS2D::getBarcodeHTML('id '.$services->id,'QRCODE',4,2) !!}
        </div>

    </section>

</body>

</html>
