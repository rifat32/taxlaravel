<!DOCTYPE html>
<html>
<head>
<title>Tax print5</title>
</head>
<body style="background: #00000047;">
<center>
	<div class="half-col">
		<div class="logo">
            <img src="{{asset('/invoice/logo.png')}}" height="100" width="100"><span class="union_name">{{$result->noncitizen->union->name}}</span>
		</div>
		<div class="name">
			<p style="font-size: 15px;">উপজেলাঃ {{$result->noncitizen->upazila->name}}, জেলাঃ {{$result->noncitizen->district->name}}</p>
			<p class="u_web">http://euptax.com</p>
			<p style="color: #000000;font-size: 15px;">অফিস কপি</p>
		</div>
		<hr style="background-color: black;padding: 1px 0;">
		<p class="title">নন-হোল্ডিং কর আদায়ের রশিদ</p>
		<div class="main-content">
			<div class="subtitle2">
				<div class="sub3">
					<p>নন-হোল্ডিং নং - {{$result->noncitizen->license_no}}</p>
				</div>
				<div class="sub4">
    				<p>তারিখ - {{$result->created_at ? \App\Http\Utils\BanglaDate::banglaNumber($result->created_at) : '' }}</p>
    			</div>
			</div>

			<div class="details">
				<div class="liname">
					<p>নামঃ {{$result->noncitizen->license_user_name}} </p>
				</div>
			    <div class="idname">
					<p>পিতা/স্বামীর নামঃ {{$result->noncitizen->guardian}} </p>
				</div>
				<div class="liname">
					<p>মাতার নামঃ {{$result->noncitizen->mother_name}}<p>
				</div>

				<div class="idname">
				    <p>এনআইডি নংঃ  {{$result->noncitizen->nid}}</p>
				</div>

				<div class="liname">
					<p>মোবাইল : {{$result->noncitizen->mobile}}</p>
				</div>

				<div class="liname">
					<p>ওয়াড নং :  {{$result->noncitizen->ward->ward_no}}</p>
				</div>

				<div class="liname">
					<p>গ্রামঃ {{$result->noncitizen->village->name}}</p>
				</div>
				<div class="idname">
					<p>ডাকঘরঃ {{$result->noncitizen->postoffice->name}}</p>
				</div>
				<div class="liname">
					<p>থানা /উপজেলাঃ পবা</p>
				</div>
				<div class="idname">
					<p>জেলাঃ {{$result->noncitizen->district->name}}</p>
				</div>

				<table class="customers">
				  <tr>
				    <th>বিবরণ</th>
				    <th>টাকার পরিমাণ</th>
				    <th>মন্তব্য</th>
				  </tr>
				  <tr>
				    <td>{{$result->payment_for}}</td>
				    <td>{{$result->amount - $result->due}}</td>
				    <td>{{$result->note}}</td>
				  </tr>
				  <tr>
				    <td>পূর্বের বকেয়া</td>
				    <td>{{$result->due}}</td>
				    <td></td>
				  </tr>
				  <tr>
				    <td>মোট আদায় যোগ্য টাকা</td>
			    	<td>{{$result->amount}}</td>
			    	<td></td>
				  </tr>
				</table>
				<div style="margin: 0 30px;">
					<div class="tname" style="margin-top: 20px;">
						<p>কথায়ঃ</p>
					</div>
					<div class="new1">
						<table class="table" style="width: 100%;">
					        <tr>
					            <td style="text-align:left;width: 30%;";>আদায়কারী</td>
					            <td style="text-align:center;width: 40%;">{!! DNS2D::getBarcodeHTML('নামঃ '.$result->noncitizen->license_user_name.' লাইসেন্স নংঃ '.$result->noncitizen->license_no.'   এনআইডি নংঃ'.$result->noncitizen->nid.'  পিতা/স্বামী নামঃ'.$result->noncitizen->guardian, 'QRCODE',4,2) !!}</td>
					            <td style="text-align:right;width: 30%;">চেয়ারম্যান</td>
					        </tr>
					    </table>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="half-col">
		<div class="logo">
            <img src="{{asset('/invoice/logo.png')}}" height="100" width="100"><span class="union_name">{{$result->noncitizen->union->name}}</span>
		</div>
		<div class="name">
			<p style="font-size: 15px;">উপজেলাঃ {{$result->noncitizen->upazila->name}}, জেলাঃ {{$result->noncitizen->district->name}}</p>
			<p class="u_web">http://euptax.com</p>
			<p style="color: #0097ff;font-size: 15px;">গ্রাহক কপি</p>
		</div>
		<hr style="background-color: black;padding: 1px 0;">
		<p class="title">নন-হোল্ডিং কর আদায়ের রশিদ</p>
		<div class="main-content">
			<div class="subtitle2">
				<div class="sub3">
					<p>নন-হোল্ডিং নং - {{$result->noncitizen->license_no}}</p>
				</div>
				<div class="sub4">
    				<p>তারিখ - {{$result->created_at ? \App\Http\Utils\BanglaDate::banglaNumber($result->created_at) : '' }}</p>
    			</div>
			</div>

			<div class="details">
				<div class="liname">
					<p>নামঃ {{$result->noncitizen->license_user_name}} </p>
				</div>
			    <div class="idname">
					<p>পিতা/স্বামীর নামঃ {{$result->noncitizen->guardian}} </p>
				</div>
				<div class="liname">
					<p>মাতার নামঃ {{$result->noncitizen->mother_name}}<p>
				</div>

				<div class="idname">
				    <p>এনআইডি নংঃ  {{$result->noncitizen->nid}}</p>
				</div>

				<div class="liname">
					<p>মোবাইল : {{$result->noncitizen->mobile}}</p>
				</div>

				<div class="liname">
					<p>ওয়াড নং :  {{$result->noncitizen->ward->ward_no}}</p>
				</div>

				<div class="liname">
					<p>গ্রামঃ {{$result->noncitizen->village->name}}</p>
				</div>
				<div class="idname">
					<p>ডাকঘরঃ {{$result->noncitizen->postoffice->name}}</p>
				</div>
				<div class="liname">
					<p>থানা /উপজেলাঃ {{$result->noncitizen->upazila->name}}</p>
				</div>
				<div class="idname">
					<p>জেলাঃ {{$result->noncitizen->district->name}}</p>
				</div>

				<table class="customers">
				  <tr>
				    <th>বিবরণ</th>
				    <th>টাকার পরিমাণ</th>
				    <th>মন্তব্য</th>
				  </tr>
				  <tr>
				    <td>{{$result->payment_for}}</td>
				    <td>{{$result->amount - $result->due}}</td>
				    <td>{{$result->note}}</td>
				  </tr>
				  <tr>
				    <td>পূর্বের বকেয়া</td>
				    <td>{{$result->due}}</td>
				    <td></td>
				  </tr>
				  <tr>
				    <td>মোট আদায় যোগ্য টাকা</td>
			    	<td>{{$result->amount}}</td>
			    	<td></td>
				  </tr>
				</table>
				<div style="margin: 0 30px;">
					<div class="tname" style="margin-top: 20px;">
						<p>কথায়ঃ</p>
					</div>
					<div class="new1">
						<table class="table" style="width: 100%;">
					        <tr>
					            <td style="text-align:left;width: 30%;">আদায়কারী</td>
					            <td style="text-align:center;width: 40%;">{!! DNS2D::getBarcodeHTML('নামঃ '.$result->noncitizen->license_user_name.' লাইসেন্স নংঃ '.$result->noncitizen->license_no.'   এনআইডি নংঃ'.$result->noncitizen->nid.'  পিতা/স্বামী নামঃ'.$result->noncitizen->guardian, 'QRCODE',4,2) !!}</td>
					            <td style="text-align:right;width: 30%;">চেয়ারম্যান</td>
					        </tr>
					    </table>

					</div>
				</div>
			</div>
		</div>
	</div>
</center>

<style type="text/css">

    .half-col{
        width: 50%;
        float: left;
    }
    .u_web{
        color: rgb(0, 0, 0);
        margin-top: -5px;
        font-size: 25px;
    }
    .union_name{
        font-size: 30px;
        color: #000000;
        margin-right: 30px
    }
    .title{
        font-weight: bold;
        font-size: 20px;
        margin-left: 55px;
        margin-top: 5px
    }
	.bank_statement{
		width: 50%;
		float: left;
	}

	.bank_statement p{
		text-align: left;
	}

	.bank_statement span{
		float: right;
		margin-right: 15%;
	}

	.barcode{
		width: 30%;
		float: left;
	}

	.kat .bank{
		text-align: center;
	}

	hr{
		width: 90%;
	}
	.customers {
	  font-family: Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	.customers td, .customers th {
	  border: 1px solid #ddd;
	  padding: 8px;
	  text-align: left;
	}

	.main-content{
		margin: 0 30px;
	}

	.new1{
		text-align: left;
		display: flex;
		width: 100%
	}
	.new1 p{
		width: 100%;
		float: left;
		margin-top: 20px;
		flex-grow: 3;
	}

	.new1 span{
		float: right;
	}

	.foottitle{
		position: fixed;
		left: 0;
		bottom: 10px;
		width: 100%;
	    float: left;
	    background: rgb(0, 0, 0);
	    height: 28px;
	}
	.foottitle p{
		padding: 4px;
    	margin: 0;
    	color: #fff;
	}
	.details {
		float: left;
		margin-top: 20px;
	}
	.tname {
		width: 100%;
	}
	.tname p{
		float: left;
		width: 100%;
		text-align: left;
	}

	.liname{
		width: 50%;
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
		margin-bottom: -10px
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
		width: 33%;
		float: left;
	}
	.sub1 p{
		float: left;
	}
	.sub2{
		width: 33%;
		float: left;
	}
	.sub3{
		width: 33%;
		float: left;
	}
	.sub3{
		width: 50%;
		float: left;
		border-bottom: 7px solid rgb(73, 71, 71);
	}
	.sub3 p{
		float: left;
	}
	.sub4{
		width: 50%;
		float: left;
		border-bottom: 7px solid rgb(0, 0, 0);
	}
	p{
		margin-top: -5px;
		font-size: 14px;
	}

</style>
<script type="text/javascript">
  window.onload = function() { window.print(); }
</script>
</body>
</html>


