<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holding</title>
    <link href="{{asset('holding/holding.css')}}" rel="stylesheet" type="text/css"/>

</head>
<style>
    .report_bg{
        background-image: url(/Images/government-bangladesh-logo.png);
        background-repeat: no-repeat !important;
        background-position: center !important;
    }
</style>
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
<body>
    <main class="nonHolding-section bg-img">
        <!-- Office Part -->
        <section class="office-copy report_bg">
            <div class="office-copy-header-details">
                <div class="office-copy-header-image">

                    <img src="{{asset("non-holding/Images/government-bangladesh-logo.png")}}" alt="bangladesh-government-logo" />
                </div>

                <div class="office-copy-header-text">
                   
                    <h2>০৪ নং হরিপুর ইউনিয়ন পরিষদ</h2>
                    <p>উপজেলাঃ , জেলাঃ রাজশাহী </p>
                    <h4>http://euptax.com</h4>
                    <p>অফিস কপি </p>
                </div>
            </div>


            <div class="office-copy-main-details">
                <h3>বাৎসরিক হোল্ডিং কর আদায়ের রশিদ</h3>
                <div class="office-copy-main-details-text">
                    <P>নন-হোল্ডিং নং - ০০০০০১ </P>
                    <P>তারিখ - ২০/০৪/২০২১</P>
                </div>
            </div>

            <div>

            </div>


            <div class="office-copy-info-details">
                <div class="office-copy-info-left">
                    <p>নামঃ মোসাঃ রুমেলা খাতুন</p>
                    <p>মাতার নামঃ মোসাঃ মুনিজা বেগম</p>
                    <p>মোবাইলঃ 01714228400</p>
                    <p>গ্রামঃ চরমাঝাড়দিয়াড়</p>
                    <p>থানা/উপজেলাঃ</p>
                </div>

                <div class="office-copy-info-right">
                    <p>পিতার / স্বামীরনামঃ মোঃ মোত্তালিব</p>
                    <p>এনআইডি নংঃ ৮১১৭২৬০৫৩৮৬১০</p>
                    <p>ওয়ার্ড নংঃ ০১ নং</p>
                    <p>ডাকঘরঃ রাজশাহী কোর্ট</p>
                    <p>জেলাঃ রাজশাহী</p>
                </div>
            </div>


            <table class="office-copy-info-table">
                <thead>
                    <tr>
                        <th>বিবরণ</th>
                        <th>টাকার পরিমাণ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2021-2022</td>
                        <td>275.00</td>
                    </tr>
                    <tr>
                        <td>পূর্বের বকেয়া কর</td>
                        <td>40.00</td>
                    </tr>
                    <tr>
                        <td>মোট আদায় যোগ্য টাকা</td>
                        <td>315</td>
                    </tr>
                    <tbody>
            </table>

            <div class="office-copy-signature">
                <p>কথায়ঃ</p>

                <div class="office-copy-signature-details">
                    <p>আদায়কারী</p>
                    <p id="qrcode"></p>
                    <p>চেয়ারম্যান</p>
                </div>
            </div>
        </section>

        <!-- User Part -->
        <section class="user-copy">
            <div class="user-copy-header-details">
                <div class="user-copy-header-image">

                    <img src="{{asset("non-holding/Images/government-bangladesh-logo.png")}}" alt="bangladesh-government-logo" />
                </div>

                <div class="user-copy-header-text">
                    <h2>০৪ নং হরিপুর ইউনিয়ন পরিষদ</h2>
                    <p>উপজেলাঃ , জেলাঃ রাজশাহী </p>
                    <h4>http://euptax.com</h4>
                    <p>গ্রাহক কপি</p>
                </div>
            </div>


            <div class="user-copy-main-details">
                <h3>বাৎসরিক হোল্ডিং কর আদায়ের রশিদ</h3>
                <div class="user-copy-main-details-text">
                    <P>নন-হোল্ডিং নং - ০০০০০১ </P>
                    <P>তারিখ - ২০/০৪/২০২১</P>
                </div>
            </div>

            <div>

            </div>


            <div class="user-copy-info-details">
                <div class="user-copy-info-left">
                    <p>নামঃ মোসাঃ রুমেলা খাতুন</p>
                    <p>মাতার নামঃ মোসাঃ মুনিজা বেগম</p>
                    <p>মোবাইলঃ 01714228400</p>
                    <p>গ্রামঃ চরমাঝাড়দিয়াড়</p>
                    <p>থানা/উপজেলাঃ</p>
                </div>

                <div class="user-copy-info-right">
                    <p>পিতার / স্বামীরনামঃ মোঃ মোত্তালিব</p>
                    <p>এনআইডি নংঃ ৮১১৭২৬০৫৩৮৬১০</p>
                    <p>ওয়ার্ড নংঃ ০১ নং</p>
                    <p>ডাকঘরঃ রাজশাহী কোর্ট</p>
                    <p>জেলাঃ রাজশাহী</p>
                </div>
            </div>


            <table class="user-copy-info-table">
                <thead>
                    <tr>
                        <th>বিবরণ</th>
                        <th>টাকার পরিমাণ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2021-2022</td>
                        <td>275.00</td>
                    </tr>
                    <tr>
                        <td>পূর্বের বকেয়া কর</td>
                        <td>40.00</td>
                    </tr>
                    <tr>
                        <td>মোট আদায় যোগ্য টাকা</td>
                        <td>315</td>
                    </tr>
                    <tbody>
            </table>

            <div class="user-copy-signature">
                <p>কথায়ঃ</p>

                <div class="user-copy-signature-details">
                    <p>আদায়কারী</p>
                    <p id="qrcod"></p>
                    <p>চেয়ারম্যান</p>
                </div>
            </div>

        </section>
    </main>

    <!-- QR Code Third Party File -->

    <script src= "{{asset('holding/assets/qrcode.min.js')}}"></script>
    <script>
        const qrcode = new QRCode("qrcode");
        const qrcod = new QRCode("qrcod");

        function makeCode() {
            // Please Input the user data for create QR code Generate
            const elText = "811726053610";
            if (!elText) {
                elText.focus();
                return;
            }

            qrcode.makeCode(elText);
            qrcod.makeCode(elText);
        }

        makeCode();

        $("elText").
        on("blur", function() {
            makeCode();
        }).
        on("keydown", function(e) {
            if (e.keyCode == 13) {
                makeCode();
            }
        });
    </script>

</body>

</html>
