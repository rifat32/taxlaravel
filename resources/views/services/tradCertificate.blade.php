
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ট্রেড লাইসেন্স</title>
    <link href="{{asset('trad-certificate/tradCertificate.css')}}" rel="stylesheet" type="text/css"/>
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

    <section class="trad bg-img">

        <section class="trad-section">



            <div class="trad-section-right">
                <div class="trad-section-right-header">


                    <div class="trad-section-right-header-title">
                        <img src="{{asset('trad-certificate/Images/trad-ogo.jpg')}}" alt="#" />
                        <h1>{{$services->union_name}}</h1>
                    </div>

                    <h3>ডাকঘরঃ {{$services->post_office}}, উপজেলাঃ {{$services->upazila_name}}, জেলাঃ {{$services->district_name}}</h3>
                    <h4>horipurup.rajshahi.gov.bd</h4>
                    <h2>ট্রেড লাইসেন্স (ব্যবসার ছাড়পত্র)</h2>
                    <h3>সনদ নম্বর - {{$services->id}}</h3>
                    <div class="trad-section-right-header-input">
                        {{-- <p>বহি নং- ০৭৮</p> --}}
                        <p>অর্থ বৎসরঃ <span>{{$services->trade_current_year}}</span></p>
                        <p>লাইসেন্স নম্বরঃ <span>{{$services->trade_license_no}}</span></p>
                    </div>

                    <div class="trad-section-right-header-input-input">
                        <p>ক্রমিক নং-{{$services->trade_id}}</p>
                        <p>তারিখ <span>{{$date}}</span></p>
                    </div>
                </div>



                <div class="trad-section-right-discription">
                    <p>ব্যবসা প্রতিষ্ঠানের নাম <span>{{$services->institute_name}}</span> লাইসেন্স ধারীর নাম <span>{{$services->applicant_name}}</span> ভোটার আইডি নং <span>{{$services->applicant_nid}}</span> পিতা/স্বামী নাম <span>{{$services->applicant_f_name}}</span> মাতা <span>{{$services->applicant_m_name}}</span> স্থায়ী ঠিকানাঃ {{$services->trade_permanent_addess}} গ্রাম/মহল্লাঃ <span>{{$services->village_name}}</span>                        ওয়ার্ড নং <span>{{$services->ward_no}}</span> ডাকঘর <span>{{$services->post_office}}</span> থানা/উপজেলা <span>সাতুরিয়া</span> জেলা <span>{{$services->district_name}}</span> ব্যবসার স্থান <span>{{$services->trade_present_addess}}</span>  পেশার ধরন (ব্যবসা) <span>{{$services->business_type}}</span>

                        লাইসেন্স ফি প্রদানের পরিমাণ টাকা <span>{{$services->trade_fee}}</span>
                        (কথায়<span>{{$services->trade_fee_des}}</span>) ১৫% ভ্যাট টাকা <span>{{$services->trade_vat}}</span>

                          মোট <span>{{number_format(($services->trade_vat + $services->trade_fee), 2, '.', '')}}</span> টাকা
                        প্রাপ্ত হয়ে তার


                        ব্যবসা/বৃত্তি/পেশা
                        <span>{{$services->business_type}}</span> চালিয়ে যাবার জন্য লাইসেন্স প্রদান করা হলো। লাইসেন্স এর মেয়াদ {{$services->expire_date}} পর্যন্ত।</p>
                    <div></div>
                </div>


                <div class="trad-section-right-footer">
                    <p>কোষাধ্যক্ষ/সেক্রেটারী</p>

                    <p class="sign-img">
                        <img src="{{Request::root()}}/{{$services->sign}}" width="100" style="display: block"/>

                        চেয়ারম্যান

                    </p>
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

            </div>
        </section>


        <section class="tread-footer">
            <p>* সময়মত ইউপি কর পরিশোধ করুন জন্ম * নিবন্ধন করুন * বল্য বিবাহ প্রতিরোধ করুন। * গাছ লাগান পরিবেশ বাঁচান।</p>
        </section>

    </section>

</body>

</html>
