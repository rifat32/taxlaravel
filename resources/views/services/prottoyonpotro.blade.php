<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>প্রত্যয়ন পত্র</title>

    <link href="{{asset('css/prottoyonSonodPotro/CSS/prottoyonpotro.css')}}" rel="stylesheet" type="text/css"/>
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
    <section class="prottoyonpotro-section bg-img">
        <div class="prottoyonpotro-header">

            <h2>{{$services->union_name}}</h2>
            <h3>উপজেলা-{{$services->upazila_name}}, জেলা-{{$services->district_name}} ।</h3>
            <p>হরিপুর ইউপি/হরিপুর/পবা/রাজ/প্রত্যয়ন/{{$year}} {{$date}}খ্রিঃ</p>
        </div>

        <div class="prottoyonpotro-title">
            <h3>প্রত্যয়ন পত্র</h3>
            <h3>সনদ নম্বর - {{$services->id}}</h3>
        </div>

        <div class="prottoyonpotro-address">
            <p><span></span>এই মর্মে প্রত্যয়ন করা যাচ্ছে যে,  {{$services->applicant_name}}, পিতা- {{$services->applicant_f_name}}, মাতা- {{$services->applicant_m_name}}, গ্রাম- {{$services->village_name}}, ডাকঘর- {{$services->post_office}},
                {{-- থানা- দামকুড়া,  --}}
                উপজেলা- {{$services->upazila_name}}, জেলা- {{$services->district_name}}। তাকে আমি ব্যক্তিগত ভাবে চিনি ও জানি। তিনি অত্র ইউনিয়ন
                পরিষদের {{$services->ward_no}} ওয়ার্ডের স্থায়ী বাসিন্দা। আমার জানা মতে, তার বাড়ি আধা পাকা ও তার বাড়িতে কোন বিদ্যুৎ সংযোগ নেই। তাকে বিদ্যুৎ সংযোগ দেওয়া যেতে পারে।</p>
        </div>

        <div class="prottoyonpotro-details">
            <p><span></span>আমি তার সর্বাঙ্গীন মঙ্গল কামনা করছি।</p>
        </div>
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
