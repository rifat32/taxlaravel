<!DOCTYPE html>
<html>
<head>
<title>Tax Trade License</title>
</head>
<body style="background: url(logo3.png) no-repeat center hsl(0, 0%, 100%);background-size: 350px 320px;">
<center>
	<div class="main-content">
		<div class="logo">
			{{--<p style="margin-bottom: 10px;text-align: left;">ইউপি ফরম নং - ১<span style="float: right;">পরিশিষ্ট - ১</span></p>--}}
			<span style="font-size: 35px;color: #000000;">{{$result->union->name}}</span>
		</div>
		<div class="name">
			<p style="font-size: 18px;">উপজেলাঃ পবা , জেলাঃ রাজশাহী</p>
			<p style="color: rgb(2, 2, 2);margin-top: -7px;font-size: 18px;">http://euptax.com</p>
			<p style="font-weight: bold;font-size: 27px; color: #000000;">ট্রেড লাইসেন্স (ব্যবসার ছাড়পত্র)</p>
		</div>
		<div class="subtitle">
			<div class="sub1">
				<p>অর্থ বৎসর: <b>{{$result->current_year}}</b></p>
			</div>
			<div class="sub2">
				<p>লাইসেন্স নম্বর: {{$result->license_no}}</p>
			</div>
		</div>
		<div class="subtitle2">
			<div class="sub3">
				<p>ক্রমিক নং- {{$result->id}}</p>
			</div>
			<div class="sub4">
				<p>তারিখ - {{$result->created_at ? \App\Http\Utils\BanglaDate::banglaNumber($result->created_at) : '' }}</p>
			</div>
		</div>

		<div class="details">
			<div class="tname">
				<p>ব্যবসা প্রতিষ্ঠানের নামঃ <b>{{$result->institute}}</b></p>
			</div>
			<div class="liname">
				<p>লাইসেন্স ধারীর নামঃ <b>{{$result->owner}}</b></p>
			</div>
			<div class="idname">
				<p>ভোটার আই ডি নংঃ<b> {{$result->nid}}</b></p>
			</div>
			<div class="liname">
				<p>পিতা/স্বামী নামঃ <b>{{$result->guadian}}</b></p>
			</div>
            <div class="idname">
				<p>মাতার নামঃ <b>{{$result->mother_name}}</b></p>
			</div>
			<div class="tname">
				<p>স্থায়ী ঠিকানাঃ <span style="margin-right: 20px;"><b>{{$result->permanent_addess}}</b></span></p>
			</div>
			<div class="tname">
				<p>ব্যবসার স্থানঃ <span style="margin-right: 20px;"><b>{{$result->present_addess}}</b></span></p>
			</div>
			<div class="contain">
				<p>পেশার ধরণ : <b>{{$result->business_type}} ।</b></p>
			</div>
			<div class="contain">
				<p>লাইসেন্স ফি প্রদানের পরিমাণ
                    {{\App\Http\Utils\BanglaDate::en2bn($result->fee)}}
                     টাকা ( {{$result->fee_des}} ) ১৫% ভ্যাট {{\App\Http\Utils\BanglaDate::en2bn($result->vat)}} টাকা ( {{$result->vat_des}} ) মোট {{\App\Http\Utils\BanglaDate::en2bn($result->total)}} টাকা প্রাপ্ত হয়ে তার ব্যবসা/বৃত্তি/পেশা চালিয়ে যাবার জন্য লাইসেন্স প্রদান করা হলো ।</p>
			</div>
			<div class="tname">
				<p>লাইসেন্স এর মেয়াদ {{ date('Y', strtotime($result->expire_date))}} সনের {{ date('d', strtotime($result->expire_date))}} {{ date('M', strtotime($result->expire_date))}} পর্যন্ত।</p>
			</div>

			<div class="new1">
				<table class="table" style="width: 100%;">
			        <tr>
			            <td style="text-align:left;width: 30%;">কোষাধ্যক্ষ/সেক্রেটারী</td>
			            <td style="text-align:center;width: 40%;">{!! DNS2D::getBarcodeHTML('ব্যবসা প্রতিষ্ঠানের নামঃ'.$result->institute.' এনআইডি নংঃ'.$result->nid.'  লাইসেন্স ধারীর নামঃ '.$result->owner.'  পিতা/স্বামী নামঃ'.$result->guadian, 'QRCODE',4,2) !!}</td>
			            <td style="text-align:right;width: 30%;">চেয়ারম্যান</td>
			        </tr>
			    </table>

			</div>

			<div class="">
				<p>* সময়মত ইউ.পি কর পরিশোধ করুন *জন্ম নিবন্ধন করুন *বাল্য বিবাহ প্রতিরোধ করুন *গাছ লাগান পরিবেশ বাঁচান</p>
			</div>
		</div>
	</div>


</center>

<style type="text/css">
	.main-content{
		margin: 0 30px;
	}
	.new1{
		text-align: left;
	}
	.new1 p{
		width: 100%;
		float: left;
		margin-top: 40px;
	}

	.new1 span{
		float: right;
	}
	p.alltest {
	    margin-left: -19px;
	    width: 100%;
	    font-size: 14px;
	}
	.foottitle{
		position: fixed;
		left: 0;
		bottom: 10px;
		width: 100%;
	    float: left;
	    background: brown;
	    height: 28px;
	}
	.foottitle p{
		padding: 4px;
    	margin: 0;
    	color: #fff;
	}
	.details {
		float: left;
	}
	.tname {
		width: 100%;
	}
	.tname p{
		float: left;
		width: 100%;
		text-align: left;
	}
	.contain {
		width: 100%;
	}
	.contain p{
		text-align: left;
		float: left;
	    /*margin-left: -3%;*/
	    /*margin-top: 3%;*/
	    line-height: 2;
	    width: 100%;
	}
	.liname{
		width: 100%;
		float: left;
	}
	.liname p{
		float: left;
	}
	.idname {
		width: 50%;
		float: left;
	}
	.idname p{
		float: left;
	}
	.top1{
		float: left;
		width: 50%
	}
	.top1 p{
		float: left;
	}
	.top2{
		float: right;
		width: 50%
	}
	.logo{
		width: 100%;
		float: left;
		margin-bottom: 10px
	}
	.name{
		width: 100%;
		text-align: center;
		margin-left: 30px;
	}
	.name h2{
		width: 100%;
		line-height: 0;
	}
	.name p{
		width: 100%;
		line-height: .5;
	}
	.logo img{
		float: left;
		margin-left: 20px;
	}
	.sub1{
		width: 50%;
		float: left;
	}
	.sub1 p{
		float: left;
	}
	.sub2{
		width: 50%;
		float: left;
	}
	.sub3{
		width: 50%;
		float: left;
		border-bottom: 7px solid black;
	}
	.sub3 p{
		float: left;
	}
	.sub4{
		width: 50%;
		float: left;
		border-bottom: 7px solid rgb(68, 68, 85);
	}
	p{
		margin-top: 5px;
		font-size: 18px;
	}

</style>

<script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>
</body>
</html>
