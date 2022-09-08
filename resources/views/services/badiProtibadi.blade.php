<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বাদি প্রতিবাদীর প্রতি সমন</title>

    <link href="{{asset('css/badiProtibadi.css')}}" rel="stylesheet" type="text/css"/>
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
    <section class="badiProtibadi-section bg-img">
        <div class="badiProtibadi-section-left">
            <div class="badiProtibadi-header">

                <h2>{{$services->union_name}}</h2>
                <p>উপজেলাঃ {{$services->upazila_name}}, জেলাঃ {{$services->district_name}} ।</p>
                <h2>বাদী প্রতিবাদীর প্রতি সমন</h2>
                <h3>সনদ নম্বর - {{$services->id}}</h3>
            </div>

            <div class="badiProtibadi-title">
                <p class="badiProtibadi-title-col">
                    কেস নং-
                    <span>{{$badiProtibadi->id}}</span>
                </p>
                <p class="badiProtibadi-title-col">
                    তারিখ-
                    <span>{{$date}} খ্রিঃ</span>
                </p>
            </div>

            <div class="badiProtibadi-title">
                <p class="badiProtibadi-title-col">বাদীঃ- {{$badiProtibadi->badi_name}}</p>
                <p class="badiProtibadi-title-col">প্রতিবাদীঃ- {{$badiProtibadi->protibadi_name}}</p>
            </div>


            <div id="badiProtibadi-details">
                <div class="badiProtibadi-details">
                    <p>
                        <s class="badiProtibadi-space"></s>এতদ্বারা বাদী / প্রতিবাদীকে জানানো যাচ্ছে যে, বাদীর দাখিলকৃত অভিযোগের প্রেক্ষিতে আগামী <span>{{$badiProtibadi->badi_protibadi_date}}</span>খ্রিঃ তারিখে
                         {{-- রোজ<span>বুধবার</span> --}}
                         সকাল/বিকাল <span>{{$badiProtibadi->badi_protibadi_time}}</span>টার সময় <span>{{$badiProtibadi->badi_protibadi_place}}</span>স্থানে
                        গ্রাম আদালতের দিন ধার্য্য করা হয়েছে।</p>
                </div>

                <div class="badiProtibadi-details">
                    <p>
                        <s class="badiProtibadi-space"></s>সুতরাং ধার্য্য তারিখে উভয় পক্ষকে সাক্ষী ও মামলার স্বপক্ষের প্রমানাদীসহ যথা সময়ে উপস্থিত থাকার জন্য বলা হল।</p>
                </div>
            </div>

            <div class="badiProtibadi-signature">
                <p>চেয়ারম্যান</p>
            </div>
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
