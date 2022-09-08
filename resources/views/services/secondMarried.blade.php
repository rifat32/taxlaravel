<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>দ্বিতীয় বিবাহ না করার প্রত্যয়ন পত্র</title>
    <link href="{{asset('css/prottoyonSonodPotro/CSS/secondMarried.css')}}" rel="stylesheet" type="text/css"/>
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
    <section class="secondMarried-section bg-img">
        <div class="secondMarried-header">

            <h2>{{$services->union_name}}</h2>
            <h3>উপজেলা-{{$services->upazila_name}}, জেলা-{{$services->district_name}} ।</h3>
            <p><span>হরিপুর ইউপি/হরিপুর/পবা/রাজ/প্রত্যয়ন/{{$year}}</span> <span>{{$date}}খ্রিঃ</span></p>
        </div>

        <div class="secondMarried-title">
            <h3>দ্বিতীয় বিবাহ না করার প্রত্যয়ন পত্র</h3>
            <h3>সনদ নম্বর - {{$services->id}}</h3>
        </div>

        <div class="secondMarried-address">
            <p><span></span>এই মর্মে প্রত্যয়ন করা যাইতেছে যে, {{$services->applicant_name}}, পিতা- {{$services->applicant_f_name}}, মাতা- {{$services->applicant_m_name}} , গ্রাম- {{$services->village_name}}, ডাকঘর- {{$services->post_office}}, থানা- {{$services->upazila_name}}, উপজেলা- {{$services->upazila_name}}, জেলা- {{$services->district_name}}। তাহাকে আমি চিনিতাম ও জানিতাম। তিনি অত্র ইউনিয়ন
                পরিষদের {{$services->ward_no}} ওয়ার্ডের স্থায়ী বাসিন্দা ছিলেন। {{$services->wife_name}} একমাত্র তার বৈধ স্ত্রী। আমার জানা মতে, উপরোক্ত ব্যক্তি মৃত্যুর পূর্বে দ্বিতীয় বিবাহ করেন নাই।</p>
        </div>

        <div class="secondMarried-details">
            <p><span></span>আমি তার বিদেহী আত্মার শান্তি কামনা করিতেছি।</p>
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
