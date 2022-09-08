
<!DOCTYPE html>
<html>
<head>
<title>Tax print1</title>
<meta charset="UTF-8">
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
</head>

<style>
    .holding_bg{
        background-image: url("{{Request::root()}}/{{$result->union->image}}");
        background-repeat: no-repeat;
        background-position: center;
        background-size:cover;
        min-height: 700px;
        width: 1000px;
        /* padding: 150px; */

    }
    .holding_content{
        padding: 100px !important;
    }
    .holding_title{
        font-size: 50px;
        text-align: center;
    }
    .content_text{
        font-size: 15px !important;
    }
    .holding_table {
    margin-left: 44px !important;
    color: #0a69a1 !important;
    text-shadow: 0 0 2px #333;
}
.right {
 margin-left: 3rem;
}
.watermark {
 margin: auto;
}
@media print {
  body {-webkit-print-color-adjust: exact;}
}
@page {
    size:A4 landscape;
    margin-left: 0px;
    margin-right: 0px;
    margin-top: 0px;
    margin-bottom: 0px;
    margin: 0;
    -webkit-print-color-adjust: exact;
}
</style>
<body>
    @php
    $holding_no_str = (string) $result->holding_no;

    $holding_no_length = strlen($holding_no_str);

    if($holding_no_length < 8) {
    $num_iteration = 8 - $holding_no_length ;
    $holding_no = "";
    for($i=0;$i< $num_iteration;$i++) {
    $holding_no .= "0";
    }
    $holding_no .= $holding_no_str;

    } else {
    $holding_no = $holding_no_str;
    }

    @endphp
<div class="watermark holding_bg" style="font-family: font_family, sans-serif;">
    <div class="row">
        <div class="container">
            <div class="col-md-12 holding_content">
                <h1 class="holding_title">{{$result->union->name}}</h1>
              <table class="table content_text holding_table">
                      <tr>
                        <td style="width:50%">ইউনিয়নের নাম</td>
                        <td>{{ $holding_no}}</td>
                    </tr>
                    <tr>
                        <td style="width:50%">হোল্ডিং নাম্বার</td>
                        <td>{{ $holding_no}}</td>
                    </tr>
                    <tr>
                        <td>থানা প্রধানের নাম : </td>
                        <td>{{$result->thana_head_name}}</td>
                    </tr>


                    <tr>
                        <td>পিতা/স্বামীর নাম : </td>
                        <td>{{$result->guardian}}</td>
                    </tr>
                    <tr>
                        <td>গ্রাম :</td>
                        <td> {{ $result->village->name}}</td>
                    </tr>
                    <tr>
                        <td>ডাকঘর :</td>
                        <td> {{$result->postoffice->name}}</td>
                    </tr>
                    <tr>
                        <td>থানা : </td>
                        <td>{{$result->upazila->name}}</td>
                    </tr>
                    <tr>
                        <td>জেলা : </td>
                        <td>{{$result->district->name}}</td>
                    </tr>
                    <tr>
                        <td>চেয়ারম্যান এর স্বাক্ষর : </td>
                        <td> <p class="right">
                            <img src="{{Request::root()}}/{{$result->union->chairman->sign_image}}" width="100" style="display: block"/>



                        </p></td>
                    </tr>
                    <tr>
                        <td>চেয়ারম্যান এর নাম : </td>
                        <td>{{$result->union->chairman->name}}</td>
                    </tr>
                    <tr>
                        <td>জেলা : </td>
                        <td>{{$result->district->name}}</td>
                    </tr>


                </table>
              বিস্তারিত  তথ্যের জন্য ভিজিট করুন  https:/euptax.com
            </div>
        </div>
    </div>

</div>



<style type="text/css">

	 @font-face {
	  font-family: "Dojo Sans Serif";
	  font-style: normal;
	  font-weight: normal;
	  src: url(http://example.com/fonts/dojosans.ttf) format('truetype');
	}
	* {
	  font-family: "Dojo Sans Serif", "DejaVu Sans", sans-serif;
	}
	.common{

		background-color: #CCFCD2;
		height:40px;
		margin-bottom:6px;
		line-height: 40px;
		font-size:20px
	}

	.common2{
		background-color: #CCFCD2;
		margin-bottom:6px;
		font-size:17px;
		padding:10px;
		font-weight: bold;
	}
</style>

<script type="text/javascript">
      window.onload = function() { window.print(); }
</script>
</body>
</html>
