
    @extends("crudbooster::admin_template")



    @section('content')
    <!DOCTYPE html>
    <html>
    <head>
    <title>সেবাসমূহের আবেদন</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="{{asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert.css')}}">

    <link href="{{asset('vendor/crudbooster/assets/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('vendor/crudbooster/assets/jquery-ui/আলমগীরjquery-ui.theme.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap 3.4.1 -->
    <link href="{{ asset("vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="{{asset("vendor/crudbooster/assets/adminlte/font-awesome/css")}}/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="{{asset("vendor/crudbooster/ionic/css/ionicons.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{ asset("vendor/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("vendor/crudbooster/assets/adminlte/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
      <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
              <div class="col-md-6">
                <h1>সেবাসমূহের আবেদন ফরম</h1>
              </div>
              <div class="col-md-3">
                <a href="{{ route('citizen_check') }}"> <button class="btn btn-danger" style="margin-top: 10px;float:right;">নিবন্ধন চেক করুন </button></a>

                {{-- <a href="{{ route('citizen-create') }}"> <button class="btn btn-danger" style="margin-top: 10px;float:right;">নাগরিক নিবন্ধন তৈরি</button></a> --}}
              </div>
              <div class="col-md-3">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <button class="btn btn-danger" style="margin-top: 10px;float:right;">{{ __('লগআউট') }}</button>
                 </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>


            </div>
        </div>
      </div>
      <!-- Your html goes here -->

    <form  action="/admin/serviceapps/update" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$services->id}}">
      <input type="hidden" name="apply_types" value="{{$type}}">
      <div class='panel panel-default'>
        <div class='panel-heading'></div>
        <div class='panel-body p-9'>
         <h4 class="text-center">ইউনিয়ন তথ্য</h4>
         <hr>
         <div class="form-group row">
            <div class="form-group col-md-3 {{ $errors->has('district_id') ? 'has-error' : ''}}">
                <label>জেলা</label>
                  <select class="form-control" name="district_id" id="district_id">
                    <option value="" hidden>নির্বাচন করুন</option>
                    @foreach($districts as $item)
                    <option value="{{$item->id}}"
                        {{ old('district_id') == $item->id ?'selected' :''}}
                        @if ($item->id == $services->district_id)
                            selected
                        @endif
                        >{{$item->name}}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('district_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group col-md-3 {{ $errors->has('upazila_id') ? 'has-error' : ''}}">
                <label>থানা/ উপজেলা</label>
                    <select class="form-control" name="upazila_id" id="upazila_id">
                      <option value="" hidden>নির্বাচন করুন</option>
                      @foreach($upazilas as $item)
                      <option value="{{$item->id}}" {{ old('upazila_id') == $item->id ?'selected' :''}}
                        @if ($item->id == $services->upazila_id)
                        selected
                    @endif
                        >{{$item->name}}</option>
                      @endforeach
                    </select>
                  {!! $errors->first('upazila_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group col-md-3 {{ $errors->has('union_id') ? 'has-error' : ''}}">
              <label>ইউনিয়ন</label>
              <select class="form-control" name="union_id" >
                <option value="" hidden>ইউনিয়ন নির্বাচন করুন
                    </option>
                @foreach($unions as $union)
                <option value="{{$union->id}}" {{ old('union_id') == $union->id ?'selected' :''}}
                    @if ($union->id == $services->union_id)
                    selected
                    @endif
                    >{{$union->name}}</option>
                @endforeach
              </select>
                {!! $errors->first('union_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group col-md-3 {{ $errors->has('ward_id') ? 'has-error' : ''}}">
              <label>ওয়ার্ড নং</label>
              <select class="form-control" name="ward_id" >
                <option value="" hidden>ওয়ার্ড নির্বাচন করুন</option>
                @foreach($wards as $ward)
                <option value="{{$ward->id}}" {{ old('ward_id') == $ward->id ?'selected' :''}}
                    @if ($ward->id == $services->ward_id)
                    selected
                    @endif
                    >{{$ward->ward_no}}</option>
                @endforeach
              </select>
                {!! $errors->first('ward_id', '<p class="help-block">:message</p>') !!}
            </div>
         </div>
         <div class="form-group row">
          <div class="form-group col-md-3 {{ $errors->has('village_id') ? 'has-error' : ''}}">
            <label>গ্রামের নাম</label>
            <select class="form-control" name="village_id" >
              <option value="" hidden>গ্রাম নির্বাচন করুন</option>
              @foreach($villages as $village)
              <option value="{{$village->id}}" {{ old('village_id') == $village->id ?'selected' :''}}
                @if ($village->id == $services->village_id)
                selected
                @endif
                >{{$village->name}}</option>
              @endforeach
            </select>
              {!! $errors->first('village_id', '<p class="help-block">:message</p>') !!}
          </div>
            <div class="form-group col-md-3 {{ $errors->has('extra1') ? 'has-error' : ''}}">
                <label>পোস্ট অফিস*</label>
                <select class="form-control" name="extra1" >
                  <option value="" hidden>পোস্ট অফিস নির্বাচন করুন</option>
                  @foreach($postoffices as $postoffice)
                  <option value="{{$postoffice->id}}" {{ old('extra1') == $postoffice->id ?'selected' :''}}
                    @if ($postoffice->id == $services->extra1)
                    selected
                    @endif

                    >{{$postoffice->name}}</option>
                  @endforeach
                </select>
                  {!! $errors->first('extra1', '<p class="help-block">:message</p>') !!}

            </div>
        </div>
          <h4 class="text-center">আবেদনকারীর তথ্য
               {{-- {{$type}} --}}
        </h4>
          <hr>
          <div class="form-group row">
            <div class="form-group col-md-3 {{ $errors->has('applicant_name') ? 'has-error' : ''}}">
                <label>আবেদনকারীর পূর্ণ নাম*</label>
                <input class="form-control" type='text' name='applicant_name' placeholder="আবেদনকারীর পূর্ণ নাম*"  value="{{$services->applicant_name}}"/>
                {!! $errors->first('applicant_name', '<p class="help-block">:message</p>') !!}

            </div>
            <div class="form-group col-md-3 {{ $errors->has('applicant_name_en') ? 'has-error' : ''}}">
                <label>আবেদনকারীর পূর্ণ নাম ইংরেজিতে*</label>
                <input class="form-control" type='text' name='applicant_name_en' placeholder="আবেদনকারীর পূর্ণ নাম ইংরেজিতে"  value="{{$services->applicant_name_en}}"/>
                {!! $errors->first('applicant_name_en', '<p class="help-block">:message</p>') !!}

            </div>
            <div class="form-group col-md-3 {{ $errors->has('applicant_phone') ? 'has-error' : ''}}">
                <label>মোবাইল</label>
                <input class="form-control" type='text' name='applicant_phone' placeholder="মোবাইল"  value="{{$services->applicant_phone}}"/>
                {!! $errors->first('applicant_phone', '<p class="help-block">:message</p>') !!}

            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-3 {{ $errors->has('applicant_nid') ? 'has-error' : ''}}">
                <label>জাতীয় পরিচয় পত্র নাম্বার</label>
                <input class="form-control" type='text' name='applicant_nid' placeholder="জাতীয় পরিচয় পত্র নাম্বার লিখুন"  value="{{$services->applicant_nid}}"/>
                {!! $errors->first('applicant_nid', '<p class="help-block">:message</p>') !!}

            </div>
            <div class="form-group col-md-3 {{ $errors->has('applicant_email') ? 'has-error' : ''}}">
                <label>ইমেইল</label>
                <input class="form-control" type='email' name='applicant_email' placeholder="ইমেইল লিখুন"  value="{{$services->applicant_email}}"/>
                {!! $errors->first('applicant_email', '<p class="help-block">:message</p>') !!}

            </div>
            <div class="form-group col-md-3 {{ $errors->has('applicant_img') ? 'has-error' : ''}}">
                <label>জন্ম সনদ/ভোটার আইডির স্ক্যান কপি</label>
                <img src="{{asset($services->applicant_img)}}" alt="" style="width:60px; height:60px">
                <input type="hidden" name="image" value="{{$services->applicant_img}}"/>
                <input class="form-control" type='file' name='applicant_img' placeholder="জন্ম সনদ/ভোটার আইডির স্ক্যান কপি"
                value="{{$services->applicant_img}}"/>
                {!! $errors->first('applicant_img', '<p class="help-block">:message</p>') !!}

            </div>
        </div>
        <div class="form-group row">
          <div class="form-group col-md-3 {{ $errors->has('applicant_f_name') ? 'has-error' : ''}}">
              <label>পিতা/স্বামীর নাম</label>
              <input class="form-control" type='text' name='applicant_f_name' placeholder="পিতা/স্বামীর নাম লিখুন"  value="{{$services->applicant_f_name}}"/>
              {!! $errors->first('applicant_f_name', '<p class="help-block">:message</p>') !!}

          </div>
          <div class="form-group col-md-3 {{ $errors->has('applicant_m_name') ? 'has-error' : ''}}">
              <label>মাতার নাম</label>
              <input class="form-control" type='text' name='applicant_m_name' placeholder="মাতার নাম লিখুন"  value="{{$services->applicant_m_name}}"/>
              {!! $errors->first('applicant_m_name', '<p class="help-block">:message</p>') !!}

          </div>
          <div class="form-group col-md-3 {{ $errors->has('applicant_holding_no') ? 'has-error' : ''}}">
              <label>হোল্ডিং নং</label>
              <input class="form-control" type='text' name='applicant_holding_no' placeholder="হোল্ডিং নং লিখুন"  value="{{$services->applicant_holding_no}}"/>
              {!! $errors->first('applicant_holding_no', '<p class="help-block">:message</p>') !!}

          </div>
      </div>


            {{-- <div class="form-group row {{ $errors->has('apply_types') ? 'has-error' : ''}}">
              <label class="col-md-2 control-label">সেবাসমূহ</label>
              <div class="col-md-9">
                @foreach( \Helper::applicationTypes() as $key =>$value)
                <label>
                  <input type="radio" name="apply_types" value="{{$value}}"

                  @if(($value==1 || $value==2 || $value==4 || $value==8 || $value==10 || $value==13 || $value==14 || $value==15 || $value==16 || $value==18 || $value==19|| $value==20)){ onclick="myFunctionshow({{'val'. $value}})" }
                  @else{
                    onclick="myFunctionhide()" }
                  }

                  @endif



                  {{ (old('apply_types') == $value) ?  'checked' : ''}}>{{$key}} &nbsp;
                </label>
                @endforeach

                {!! $errors->first('apply_types', '<p class="help-block">:message</p>') !!}
              </div>
            </div> --}}
     @if ($type == '1')
     <div class="allVal" id="val1">
        <div>
            <input type="hidden" name="trade_id" value="{{$services->trade_id}}"
          <div class="form-group col-md-3">
              <label>প্রতিষ্ঠান</label>
                <input  class="form-control" type='text' name='institute'
                value="{{$services->institute_name}}"
                placeholder="প্রতিষ্ঠান"/>
            </div>
            <div class="form-group col-md-3">
              <label>স্বত্বাধিকারী</label>
                <input  class="form-control" type='text' name='owner'
                value="{{$services->owner}}"
                placeholder="স্বত্বাধিকারী"/>
            </div>
            <div class="form-group col-md-3">
              <label>অবিভাবক</label>
                <input  class="form-control" type='text' name='guadian'
                value="{{$services->guadian}}"
                placeholder="অবিভাবক"/>
            </div>
            <div class="form-group col-md-3">
              <label>বর্তমান ঠিকানা</label>
                <input  class="form-control" type='text' name='present_addess'
                value="{{$services->trade_present_addess}}"
                placeholder="বর্তমান ঠিকানা"/>
            </div>
            <div class="form-group col-md-3">
              <label>লাইসেন্স নাম্বার</label>
                <input  class="form-control" type='text' name='license_no'
                value="{{$services->trade_license_no}}"
                placeholder="লাইসেন্স নাম্বার"/>
            </div>
            <div class="form-group col-md-3">
              <label>ব্যবসার ধরন</label>
                <input  class="form-control" type='text' name='business_type'
                value="{{$services->business_type}}"
                placeholder="ব্যবসার ধরন"/>
            </div>
            <div class="form-group col-md-3">
              <label>স্থায়ী ঠিকানা</label>
                <input  class="form-control" type='text' name='permanent_addess'
                value="{{$services->trade_permanent_addess}}"
                placeholder="স্থায়ী ঠিকানা"/>
            </div>
            <div class="form-group col-md-3">
              <label>ফী</label>
                <input  class="form-control" type='text' name='fee'
                value="{{$services->trade_fee}}"
                placeholder="ফী"/>
            </div>
            <div class="form-group col-md-3">
              <label>ফী কথায়</label>
                <input  class="form-control" type='text' name='fee_des'
                value="{{$services->trade_fee_des}}"
                placeholder="ফী কথায়"/>
            </div>

            {{-- <div class="form-group col-md-3">
              <label>ভ্যাট%</label>
                <input  class="form-control" type='text' name='vat' placeholder="ভ্যাট"/>
            </div>
            <div class="form-group col-md-3">
              <label>ভ্যাট কথায়</label>
                <input  class="form-control" type='text' name='vat_des' placeholder="ভ্যাট"/>
            </div> --}}
            {{-- <div class="form-group col-md-3">
              <label>মোট</label>
                <input  class="form-control" type='text' name='total' placeholder="মোট"/>
            </div> --}}
            <div class="form-group col-md-3">
              <label>মেয়াদোত্তীর্ণ দিন</label>
                <input  class="form-control" type='date' name='expire_date'
                value="{{$services->expire_date}}"
                placeholder="মেয়াদোত্তীর্ণ দিন"/>
            </div>
            <div class="form-group col-md-3">
              <label>অর্থ বছর</label>
                <input  class="form-control" type='text' name='current_year'
                value="{{$services->trade_current_year}}"
                placeholder="অর্থ বছর"/>
            </div>

        </div>
        </div>
     @endif

     @if ($type == "2")
     <div  class="allVal" id="val2">
        <h3>মৃতের তথ্য</h3>
        <div class="row">
           <div class="form-group col-md-3">
               <label>মৃতের নাম</label>
                 <input  class="form-control" type='text' name='died_name' placeholder="মৃতের নাম" id="died_name"
                 value="{{$services->died_name}}"
                 />
             </div>
             <div class="form-group col-md-3">
               <label>পিতা
               </label>
                 <input  class="form-control" type='text' name='died_father' placeholder="পিতা
                 " id="died_father"
                 value="{{$services->died_father}}" />
             </div>
             <div class="form-group col-md-3">
               <label>মাতা </label>
                 <input  class="form-control" type='text' name='died_mother' placeholder="মাতা " id="died_mother"
                 value="{{$services->died_mother}}"
                 />
             </div>
             <div class="form-group col-md-3">
                <label>জেলা </label>
                <select class="form-control" name="died_zilla" id="died_zilla">
                    <option value="" hidden>নির্বাচন করুন</option>
                    @foreach($districts as $item)
                    <option value="{{$item->name}}" {{ old('district_id') == $item->id ?'selected' :''}}
                     @if ($item->name == $services->died_zilla)
                     selected
                    @endif

                     >{{$item->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group col-md-3">
                <label>উপজেলা </label>
                <select class="form-control" name="died_upozilla" id="died_upozilla">
                    <option value="" hidden>নির্বাচন করুন</option>
                    @foreach($upazilas as $item)
                    <option value="{{$item->name}}" {{ old('upazila_id') == $item->id ?'selected' :''}}
                     @if ($item->name == $services->died_upozilla)
                     selected
                 @endif

                     >{{$item->name}}</option>
                    @endforeach
                  </select>
              </div>

             <div class="form-group col-md-3">
               <label>ওয়ার্ড নং</label>
               <select class="form-control" name="died_ward" >
                   <option value="" hidden>ওয়ার্ড নির্বাচন করুন</option>
                   @foreach($wards as $ward)
                   <option value="{{$ward->ward_no}}" {{ old('ward_id') == $ward->id ?'selected' :''}}
                    @if ($ward->ward_no == $services->died_ward)
                        selected
                    @endif
                    >{{$ward->ward_no}}</option>
                   @endforeach
                 </select>
             </div>
             <div class="form-group col-md-3">
                <label>গ্রাম </label>
                <select class="form-control" name="died_village" >
                    <option value="" hidden>গ্রাম নির্বাচন করুন</option>
                    @foreach($villages as $village)
                    <option value="{{$village->name}}" {{ old('village_id') == $village->id ?'selected' :''}}
                     @if ($village->name == $services->died_village)
                         selected
                     @endif

                     >{{$village->name}}</option>
                    @endforeach
                  </select>
              </div>
             <div class="form-group col-md-3">
               <label>পোস্ট অফিস</label>
               <select class="form-control" name="died_post_office" >
                   <option value="" hidden>পোস্ট অফিস নির্বাচন করুন</option>
                   @foreach($postoffices as $postoffice)
                   <option value="{{$postoffice->name}}" {{ old('extra1') == $postoffice->id ?'selected' :''}}
                    @if ($postoffice->name == $services->died_post_office)
                        selected
                    @endif
                    >{{$postoffice->name}}</option>
                   @endforeach
                 </select>
             </div>



        </div>

             <br>
             <h3>ওয়ারিশগণের তথ্য</h3>
          <div class="warish_list well">
          @foreach ($warishes as $warish)


            <div class="form-group row">

              <div class="form-group col-md-3">
                <label>ওয়ারিশগণ</label>
                  <input  class="form-control" type='text' name='name[]' placeholder="ওয়ারিশগণের নাম" id="name" value="{{$warish->name}}" />
              </div>
              <div class="form-group col-md-3">
                <label>সম্পর্ক</label>
                  <input  class="form-control" type='text' name='relation[]' placeholder="সম্পর্ক"
                  value="{{$warish->relation}}"
                  />
              </div>
              <div class="form-group col-md-3">
                <label>বয়স</label>
                  <input  class="form-control" type='text' name='age[]' placeholder="বয়স"
                  value="{{$warish->age}}"
                  />
              </div>
              <div class="form-group col-md-3">
                <label>মন্তব্য</label>
                  <input  class="form-control" type='text' name='comment[]' placeholder="মন্তব্য" id="village"
                  value="{{$warish->comment}}"
                  />
              </div>

            </div>
          @endforeach
        </div>
        <div class="add_data1">
        </div>
        <div class="form-group col-md-12 text-right">
            <a class="btn btn-danger btn-sm" id="remove1"><i class="fa fa-trash"></i></a>
            <a class="btn btn-primary btn-sm" id="add1"><i class="fa fa-plus-circle"></i></a>
          </div>
        </div>
        {{-- aaaaaaaaaaaaaa commented out --}}
        {{-- <div class="form-group row">
          <div class="form-group col-md-12">
            <label>বিবরণঃ</label>
              <textarea name="extra2" maxlength="250" rows="3" placeholder="বিবরণঃ"  class="form-control"></textarea>
          </div>

        --}}

        <hr>


    </div>
     @endif
         @if($type == '4')
         <div class="allVal" id="val4">
            <div class="form-group row">
              <div class="form-group col-md-3">
                <label>মৃত্যুর তারিখ</label>
                  <input  class="form-control" type='date' name='death' placeholder="মৃত্যুর তারিখ" id="death"
                  value="{{$services->death_day}}"
                  />
              </div>

          </div>
          <div class="form-group row">
              <div class="form-group col-md-3">
                <label>মৃত্যুর স্থান</label>
                  <input  class="form-control" type='string' name='death_place' placeholder="মৃত্যুর স্থান" id="death_place"
                  value="{{$services->death_place}}" />
              </div>

          </div>
      </div>
         @endif
         @if ($type == '8')
         <div  class="allVal" id="val8">

            <div class="form-group row">
                <div class="form-group col-md-3">
                  <label>স্ত্রীর নাম</label>
                    <input
                     class="form-control"
                     type='string'
                     name='wife_name'
                     placeholder="স্ত্রীর নাম "
                     id="wife_name"
                     value="{{$services->wife_name}}"


                    />
                </div>

            </div>

        </div>
         @endif

        @if($type == '10')
        <div  class="allVal" id="val10">

            <div class="form-group row">
                <div class="form-group col-md-3">
                  <label>প্রতিবন্ধীর কারণ</label>
                    <input  class="form-control" type='string' name='disability' placeholder="প্রতিবন্ধীর কারণ" id="disability"
                    value="{{$services->disability}}"
                    />
                </div>

            </div>

        </div>
        @endif

      @if ($type == '13')
      <div  class="allVal" id="val13">

        <div class="form-group row">
            <div class="form-group col-md-3">
              <label>পূর্বের গ্রাম </label>
                <input  class="form-control" type='string' name='previous_village' placeholder="পূর্বের গ্রাম " id="previous_village"
                value="{{$services->previous_village}}"
                 />
            </div>
            <div class="form-group col-md-3">
                <label>পূর্বের ডাকঘর </label>
                  <input  class="form-control" type='string' name='previous_post_office' placeholder="পূর্বের ডাকঘর" id="previous_post_office"
                  value="{{$services->previous_post_office}}"
                  />
              </div>
              <div class="form-group col-md-3">
                <label>পূর্বের জেলা </label>
                  <input  class="form-control" type='string' name='privious_zilla' placeholder="পূর্বের জেলা " id="privious_zilla"
                  value="{{$services->privious_zilla}}"
                   />
              </div>
              <div class="form-group col-md-3">
                <label>পূর্বের উপজেলা </label>
                  <input  class="form-control" type='string' name='previous_opozilla' placeholder="পূর্বের উপজেলা " id="previous_opozilla"
                  value="{{$services->previous_opozilla}}" />
              </div>


        </div>

    </div>
      @endif
      @if ($type == '14')
      <div  class="allVal" id="val14">

        <div class="form-group row">
            <div class="form-group col-md-3">
              <label>অবিভাবকের আয় </label>
                <input  class="form-control" type='string' name='gardian_income' placeholder="অবিভাবকের আয় " id="gardian_income"
                value="{{$services->gardian_income}}"
                />
            </div>
            <div class="form-group col-md-3">
                <label>অবিভাবকের পেশা </label>
                  <input  class="form-control" type='string' name='gardian_occupaion' placeholder="অবিভাবকের পেশা " id="gardian_occupaion"
                  value="{{$services->gardian_occupaion}}"
                  />
              </div>
        </div>
    </div>
      @endif
      @if ($type == '15')
      <div  class="allVal" id="val15">

        <div class="form-group row">
            <div class="form-group col-md-3">
              <label>গ্যাজেট নম্বর </label>
                <input  class="form-control" type='string' name='fighter_gadget_number' placeholder="গ্যাজেট নম্বর " id="fighter_gadget_number"
                value="{{$services->fighter_gadget_number}}" />
            </div>
            <div class="form-group col-md-3">
                <label>তারিখ </label>
                  <input  class="form-control" type='date' name='fighter_date' placeholder="তারিখ " id="fighter_date"
                  value="{{$services->fighter_date}}"
                  />
              </div>
              <div class="form-group col-md-3">
                <label>সনদ নাম্বার </label>
                  <input  class="form-control" type='string' name='fighter_certificat_number' placeholder="সনদ নাম্বার" id="fighter_certificat_number"
                  value="{{$services->fighter_certificat_number}}" />
              </div>
        </div>
    </div>
      @endif
      @if ($type == '16')
      <div  class="allVal" id="val16">

        <div class="form-group row">
            <div class="form-group col-md-3">
                <label>মুক্তিযোদ্ধার নাম</label>
                  <input  class="form-control" type='string' name='fighter_name' placeholder="মুক্তিযোদ্ধার নাম " id="fighter_name"
                  value="{{$services->fighter_name}}"
                  />
              </div>
              <div class="form-group col-md-3">
                <label>মুক্তিযোদ্ধার স্ত্রী </label>
                  <input  class="form-control" type='string' name='fighter_wife' placeholder="মুক্তিযোদ্ধার স্ত্রী " id="fighter_wife"
                  value="{{$services->fighter_wife}}"
                  />
              </div>
            <div class="form-group col-md-3">
              <label>গ্যাজেট নম্বর</label>
                <input  class="form-control" type='string' name='fighter_gadget_number2' placeholder="গ্যাজেট নম্বর " id="fighter_gadget_number2"
                value="{{$services->fighter_gadget_number}}"
                />
            </div>
            <div class="form-group col-md-3">
                <label>তারিখ </label>
                  <input  class="form-control" type='date' name='fighter_date2' placeholder="তারিখ " id="fighter_date2"
                  value="{{$services->fighter_date}}"
                  />
              </div>
              <div class="form-group col-md-3">
                <label>সনদ নাম্বার </label>
                  <input  class="form-control" type='string' name='fighter_certificat_number2' placeholder="সনদ নাম্বার" id="fighter_certificat_number2"
                  value="{{$services->fighter_certificat_number}}"
                  />
              </div>
        </div>
    </div>
      @endif
      @if ($type == '18')
      <div  class="allVal" id="val18">
        <div class="form-group row">
            <div class="form-group col-md-3">
                <label>ক্ষুদ্র-নৃ-গোষ্ঠী সম্প্রদায়</label>
                  <input  class="form-control" type='string' name='tribal_community' placeholder="ক্ষুদ্র-নৃ-গোষ্ঠী সম্প্রদায়" id="tribal_community"
                  value="{{$services->tribal_community}}"
                  />
              </div>

        </div>
    </div>
      @endif
      @if ($type == '19')
      <div  class="allVal" id="val19">
        <div class="form-group row">
            <div class="form-group col-md-3">
                <label>পেশা</label>
                  <input  class="form-control" type='string' name='occupation' placeholder="পেশা" id="occupation"
                  value="{{$services->occupation}}"
                  />
              </div>
        </div>
    </div>
      @endif
      @if ($type == '20')
      <div  class="allVal" id="val20">
        <div class="form-group row">
            <div class="form-group col-md-3">
                <label>বাদী</label>
                  <input  class="form-control" type='string' name='badi_name' placeholder="বাদী" id="badi_name"
                  value="{{$badiProtibadi->badi_name}}"
                  />
              </div>
              <div class="form-group col-md-3">
                <label>প্রতিবাদী</label>
                  <input  class="form-control" type='string' name='protibadi_name' placeholder="প্রতিবাদী" id="protibadi_name"
                  value="{{$badiProtibadi->protibadi_name}}"/>
              </div>
              <div class="form-group col-md-3">
                <label>তারিখ</label>
                  <input  class="form-control" type='date' name='badi_protibadi_date' placeholder="তারিখ" id="badi_protibadi_date"
                  value="{{$badiProtibadi->badi_protibadi_date}}"
                  />
              </div>
              <div class="form-group col-md-3">
                <label>সময়</label>
                  <input  class="form-control" type='string' name='badi_protibadi_time' placeholder="সময়" id="badi_protibadi_time"
                  value="{{$badiProtibadi->badi_protibadi_time}}"
                  />
              </div>
              <div class="form-group col-md-3">
                <label>স্থান</label>
                  <input  class="form-control" type='string' name='badi_protibadi_place' placeholder="স্থান" id="protibadi_name"
                  value="{{$badiProtibadi->badi_protibadi_place}}"
                  />
              </div>
        </div>
    </div>
      @endif











        </div>
        <div class='panel-footer'>
          <input type='submit' class='btn btn-primary' value='জমা দিন'/>
        </div>
      </div>
    </form>



    <script type="text/javascript">

    function myFunctionshow(divv) {
     let allVal =   document.querySelectorAll(".allVal")
     allVal.forEach(el => {
         el.style.display = "none";
     })


         divv.style.display = "block";

      }
      function myFunctionhide() {
        let allVal =   document.querySelectorAll(".allVal")
     allVal.forEach(el => {
         el.style.display = "none";
     })

      }




    </script>



    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

    <!-- Bootstrap 3.4.1 JS -->
    <script src="{{ asset ('vendor/crudbooster/assets/adminlte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ('vendor/crudbooster/assets/adminlte/dist/js/app.js') }}" type="text/javascript"></script>

    <!--BOOTSTRAP DATEPICKER-->
    <script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datepicker/datepicker3.css') }}">

    <!--BOOTSTRAP DATERANGEPICKER 2.1.27 AND MOMENT 2.13.0 -->
    <script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/daterangepicker/daterangepicker-bs3.css') }}">

    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>



    <!--SWEET ALERT-->
    <script src="{{asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert.css')}}">

    <!--MONEY FORMAT-->
    <script src="{{asset('vendor/crudbooster/jquery.price_format.2.0.min.js')}}"></script>

    <!--DATATABLE-->
    <link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.css')}}">
    <script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script>
        var ASSET_URL = "{{asset('/')}}";
        var APP_NAME = "{{Session::get('appname')}}";
        var ADMIN_PATH = '{{url(config("crudbooster.ADMIN_PATH")) }}';
        var NOTIFICATION_JSON = "{{route('NotificationsControllerGetLatestJson')}}";
        var NOTIFICATION_INDEX = "{{route('NotificationsControllerGetIndex')}}";

        var NOTIFICATION_YOU_HAVE = "{{cbLang('notification_you_have')}}";
        var NOTIFICATION_NOTIFICATIONS = "{{cbLang('notification_notification')}}";
        var NOTIFICATION_NEW = "{{cbLang('notification_new')}}";

        $(function () {
            $('.datatables-simple').DataTable();
        })
    </script>
    <script src="{{asset('vendor/crudbooster/assets/js/main.js').'?r='.time()}}"></script>





    </body>
    </html>



    @stop
