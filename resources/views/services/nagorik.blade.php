<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>নাগরিকত্ব সনদপত্র</title>
    <link href="{{asset('nagorik-certificate/nagorik.css')}}" rel="stylesheet" type="text/css"/>
    <style>
    @media print
{
    * {-webkit-print-color-adjust:exact;}
}
.bg-img {
    background-image: url("{{Request::root()}}/{{$services->union->image}}") !important;
        background-repeat: no-repeat;
        background-position: center;
        background-size:cover;
        min-height: 700px;
        width: 1000px;
}
@media print
{
    * {-webkit-print-color-adjust:exact;}
}

</style>
</head>

<body>
    <section class="nagorik bg-img">
        <section class="nagorik-section">
            {{-- <div class="nagorik-left">
                <div class="nagorik-left-header">
                    <p>গণপ্রজাতন্ত্রী বাংলাদেশ</p>
                    <div class="nagorik-left-header-title">
                        <img src="{{asset('nagorik-certificate/Images/nagorik-logo.jpg')}}" alt="" />

                        <h1>{{$services->union_name}}</h1>
                    </div>
                    <h5>(অফিস {{$services->post_office}})</h5>
                    <p class="dackghor">ডাকঘরঃ {{$services->union_name}}, উপজেলাঃ {{$services->upazila_name}}, জেলাঃ {{$services->district_name}}</p>
                    <h4>নাগরিকত্ব</h4>
                    <h2>সনদ পত্র</h2>
                </div>

                <div class="nagorik-left-discription">
                    <div class="nagorik-left-discription-input">
                        <p>ক্রমিক নং- </p>
                        <p>তারিখঃ<span>{{$date}}</span></p>
                    </div>
                    <p>নামঃ <span>
                        {{$services->applicant_name}}</span><br/> পিতা/স্বামীঃ <span>
                            {{$services->applicant_f_name}}   </span><br/> মাতার নামঃ <span>{{$services->applicant_m_name}}</span><br/> আইডি নম্বর/জন্ম নিবন্ধন নম্বরঃ <span>{{$services->applicant_nid}}</span> হোল্ডিং নং <span>
                                {{$services->applicant_holding_no}}
                            </span> <br/>

                            গ্রামঃ <span>{{$services->village_name}}</span><br/>
                              ওয়ার্ড নংঃ <span>{{$services->ward_no}}</span><br/> ডাকঘরঃ <span>{{$services->post_office}}</span> <br/> থানা/উপজেলাঃ
                              <span>{{$services->upazila_name}}</span><br/> উপজেলাঃ <span>{{$services->upazila_name}}</span> জেলাঃ {{$services->district_name}}</p>
                </div>

                <div class="nagorik-left-footer">
                    <h6>
                        <img src="{{Request::root()}}/{{$services->sign}}" width="60" height="60"/>
                    </h6>
                    <h6>চেয়ারম্যান</h6>
                    <p>{{$services->union_name}}</p>
                    <p>উপজেলাঃ {{$services->upazila_name}}, জেলাঃ {{$services->district_name}}।</p>
                </div>
            </div> --}}

            <div class="nagorik-right">
                <div class="nagorik-right-header">

                    <p>গণপ্রজাতন্ত্রী বাংলাদেশ</p>
                    <div class="nagorik-right-header-title">
                        <img src="{{asset('nagorik-certificate/Images/government-bangladesh-logo.png')}}" alt="" />
                        <h1>{{$services->union_name}}</h1>

                        <img src="{{asset('nagorik-certificate//Images/nagorik-logo.jpg')}}" alt="" />
                    </div>
                    <h5>(অফিস {{$services->post_office}})</h5>
                    <p>ডাকঘরঃ {{$services->union_name}}, উপজেলাঃ {{$services->upazila_name}}, জেলাঃ {{$services->district_name}}</p>
                    <h4>নাগরিকত্ব</h4>
                    <h2>সনদ পত্র</h2>
                    <h3>সনদ নম্বর - {{$services->id}}</h3>
                </div>


                <div class="nagorik-right-discription">
                    <div class="nagorik-right-discription-input">
                        <p> ক্রমিক নং- </p>
                        <p>তারিখঃ<span> {{$date}}</span></p>
                    </div>
                    <p>আমি এই মর্মে প্রত্যয়ন করিতেছি যে, <span> {{$services->applicant_name}}</span> পিতা/স্বামীঃ <span>{{$services->applicant_f_name}} </span> মাতাঃ <span>{{$services->applicant_m_name}}</span> আইডি নম্বর/জন্ম নিবন্ধন নম্বরঃ <span>{{$services->applicant_nid}}</span> হোল্ডিং নং <span>{{$services->applicant_holding_no}}</span> গ্রামঃ <span>{{$services->village_name}}</span>       ডাকঘরঃ <span>{{$services->post_office}}</span> থানা/উপজেলাঃ <span>{{$services->upazila_name}}</span> জেলাঃ {{$services->district_name}}। তিনি আমার বিশেষ পরিচিত/পরিচিতা এবং অত্র ইউনিয়নে <span>{{$services->ward_no}}</span> নং ওয়ার্ডের স্থায়ী বাসিন্দা। তিনি সৎ চরিত্রের অধিকারী/অধিকারিণী। তিনি জন্ম সূত্রে বাংলাদেশী। আমার
                        জানামতে, তিনি রাষ্ট্রের পরিপন্থি কোন প্রকার কার্যকলাপের সহিত জড়িত নহে। </p>
                    <p> আমি তাঁহার জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।</p>
                </div>


                <div class="nagorik-right-footer">
                <h6>
                    <img src="{{Request::root()}}/{{$services->sign}}" width="60" height="60"/>
                </h6>


                    <h6>চেয়ারম্যান</h6>
                    <p>{{$services->union_name}}</p>
                    <p>উপজেলাঃ {{$services->upazila_name}}, জেলাঃ {{$services->district_name}}।</p>
                </div>


                <div  class="instructions" style="margin-top: 5rem">
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

        <section class="nagorik-footer">
            <p>* সময়মত ইউপি কর পরিশোধ করুন জন্ম * নিবন্ধন করুন * বল্য বিবাহ প্রতিরোধ করুন। * গাছ লাগান পরিবেশ বাঁচান।</p>
        </section>
    </section>
</body>

</html>
