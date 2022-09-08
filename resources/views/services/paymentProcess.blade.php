<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>টাকা জমা দেয়ার প্রক্রিয়া</title>


    <link href="{{asset('paymentProcess/paymentProcess.css')}}" rel="stylesheet" type="text/css"/>
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
    <section class="paymentProcess-section bg-img">
        <div class="paymentProcess-header">
            <h3>সনদ নম্বর - {{$services->id}}</h3>
            <div class="paymentProcess-header-title">

                <img src={{asset('paymentProcess/Images/hujuripara-union.jpg')}} alt="hujuripara_union_logo" />
                <h1>০২ নং হুজুরীপাড়া ইউনিয়ন পরিষদ</h1>
            </div>

            <h4>দারুসা, পবা, রাজশাহী</h4>
        </div>

        <div class="paymentProcess-details">
            <div class="paymentProcess-details-left">
                <h3>হোল্ডিং নং</h3>
                <h2>01245</h2>
                <h3>বাড়ীর তথ্য</h3>
                <div class="paymentProcess-details-left-info">
                    <p>নামঃ মহসিন আলী</p>
                    <p>পিতাঃ আকবর আলী</p>
                    <p>গ্রামঃ দারুসা</p>
                    <p>পোষ্টঃ দারুসা</p>
                    <p>থানাঃ পবা</p>
                    <p>জেলাঃ রাজশাহী</p>
                </div>
            </div>


            <div class="paymentProcess-details-right">
                <h2>বিকাশের মাধ্যমে কর প্রদানের জন্য নিম্নে নিয়ম অনুসরন করুন</h2>
                <div class="paymentProcess-details-right-card">
                    <div class="paymentProcess-details-right-card-row">
                        <h5 class="number-one">1</h5>
                        <div class="card-col">
                            <h6 class="dial">Dial <br/> *247#</h6>
                        </div>

                        <h5 class="number-two">2</h5>
                        <div class="card-col">
                            <p>1. Send Money</p>
                            <p>2. Token</p>
                            <p class="color-change">3. Payment</p>
                            <p>4. Cash Out</p>
                            <p>5. My bKash</p>
                            <p>6. Helpline</p>
                            <button>3</button>
                        </div>

                        <h5 class="number-three">3</h5>
                        <div class="card-col">
                            <p>Enter Merchant <br/> bKash Account<br/> No:</p>
                            <button>01990958206</button>
                        </div>
                        <h5 class="number-four">4</h5>
                        <div class="card-col">
                            <p>Enter <br/> Amount</p>
                            <button>Amount</button>
                        </div>
                    </div>




                    <div class="paymentProcess-details-right-card-row">
                        <h5 class="number-one">5</h5>
                        <div class="card-col">
                            <p>Enter <br/> Reference</p>
                            <button>OneNet ID*</button>
                        </div>

                        <h5 class="number number-two">6</h5>
                        <div class="card-col">
                            <p>Enter Counter <br/> No:</p>
                            <button>1</button>
                        </div>

                        <h5 class="number-three">7</h5>
                        <div class="card-col">
                            <p>Payment</p>
                            <p>To 01990958206</p>
                            <p>Amount TK ###</p>
                            <p>Reference OneNet ID</p>
                            <p>Counter: 1</p>
                            <p>Enter PIN to confirm</p>
                            <button>####</button>
                        </div>

                        <h5 class="number-four">8</h5>
                        <div class="card-col">
                            <p>Payment TK ### to</p>
                            <p>01990958206 <br/>successful</p>
                            <p>Ref ### Counter ###</p>
                            <p>Fee TK 0000</p>
                            <p>Balance TK ###</p>
                            <p>Trx ID ###</p>
                        </div>
                    </div>
                </div>
                <p class="paymentProcess-details-instruction">OneNet ID* হল user name এর @ এর আগের অংশ যেমনঃ Dhaka@P181 হলে Dhaka লিখতে হবে।</p>
                <h3>Our bKash Marchant Account Number Is: <span>01740867669</span></h3>
                <h4>যে কোন প্রয়োজনে যোগাযোগ করুনঃ</h4>
                <p class="paymentProcess-details-chairmen">চেয়ারম্যান সচিব</p>
                <h5>কর সংক্রান্ত তথ্যের জন্য যোগাযোগ করুনঃ ০১৭৩৭-০০০৪০০</h5>
                {!! DNS2D::getBarcodeHTML('id '.$services->id,'QRCODE',4,2) !!}
            </div>
        </div>

        <div class="footer"></div>
    </section>
</body>

</html>
