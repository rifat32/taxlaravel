<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>চারিত্রিক সনদপত্র</title>
    <link rel="stylesheet" href="./CSS/characteristicLetter.css">
    <link href="{{asset('css/prottoyonSonodPotro/CSS/characteristicLetter.css')}}" rel="stylesheet" type="text/css"/>
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
    <section class="character-certificate-section bg-img">
        <div class="character-certificate-header">

            <h2>{{$services->union_name}}</h2>
            <h3>উপজেলা-{{$services->upazila_name}}, জেলা-{{$services->district_name}} ।</h3>
            <p>হরিপুর ইউপি/হরিপুর/পবা/রাজ/প্রত্যয়ন/{{$year}} {{$date}}খ্রিঃ</p>
        </div>

        <div class="character-certificate-title">
            <h3>চারিত্রিক সনদপত্র</h3>
            <h3>সনদ নম্বর - {{$services->id}}</h3>
        </div>

        <div class="character-certificate-address">
            <p>আমি এই মর্মে প্রত্যয়ন করিতেছি যে, <span>{{$services->applicant_name}}</span> পিতাঃ <span>{{$services->applicant_f_name}}</span> মাতাঃ <span>{{$services->applicant_m_name}}</span> গ্রাম/মহল্লাঃ <span>{{$services->village_name}}</span> ওয়ার্ড নংঃ <span>{{$services->ward_no}}</span> ডাকঘরঃ <span>{{$services->post_office}}</span>                উপজেলা/থানাঃ
                <span>{{$services->upazila_name}}</span> জেলাঃ {{$services->district_name}}।</p>
        </div>

        <div class="character-certificate-details">
            <p>সে আমার পরিচিত এবং জন্ম সূত্রে বাংলাদেশের নাগরিক। সে সৎ ও উত্তম চরিত্রের অধিকারী। আমার জানা মতে সে রাষ্ট্র বা আইন শৃঙ্খলা বিরোধী কাজে জড়িত নয়।</p>
            <p>আমি তার জীবনের সর্বাঙ্গীন সাফল্য কামনা করছি।</p>
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
