

    @extends("crudbooster::admin_template")
    <style>
        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          padding: 12px 16px;
          z-index: 1;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }
        @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
        </style>




    @section('content')
    <div>
        <a class="btn" style="background: #261411; color:#fff" href="/admin/serviceapps">ফিরে যান </a>
    </div>
    <div>
        <h4>{{\Helper::applicationTypesReverse()[$type]}}</h4>
    </div>
    <div >
        <a href="/admin/serviceapps/abdener-dhoron/{{$type}}" class="btn btn-success" style="margin-right: 1rem">
            সকল
        </a>
        @foreach (\Helper::applicationStatus() as $key =>$value)
            <a href="/admin/serviceapps/details-status-by-dhoron/{{$value}}/{{$type}}" style="margin-right: 1rem" class="btn
            @if($value == "পেন্ডিং")
            btn-info
            @elseif ($value == "সম্পন্ন")
            btn-warning
            @elseif ($value == "বাতিল")
            btn-danger
            @else
            btn-primary
            @endif


            ">
            {{$value}}
            </a>
        @endforeach
        <div class="dropdown">
            <span class="btn btn-primary">আবেদনের ধরণ</span>
            <div class="dropdown-content">
                @foreach (\Helper::applicationTypesReverse() as $key =>$value)
                <a style="border-bottom: 0.1rem solid black" href="/admin/serviceapps/abdener-dhoron/{{$key}}" class="btn">{{$value}}</a>
                @endforeach

            </div>
          </div>
    </div>
    <div style="width:80%; margin:2rem auto;">

        <form action="/admin/serviceapps/searchs" method="GET">

            <div class="form-group">
    <label for="search">সার্চ করুন </label>
                <input type="text" class="form-control" id="search" name="search" />
            </div>

        </form>
    </div>



<table class="table table-responsive">
    <thead>
<th>জেলা   </th>
<th>থানা/ উপজেলা</th>
<th>ইউনিয়ন</th>
<th>ওয়ার্ড নং</th>
<th>আবেদনকারীর পূর্ণ নাম</th>
<th>পিতার নাম</th>
<th>গ্রাম</th>
<th>ভোটার আইডি নং</th>
<th>জন্ম সনদ/ভোটার আইডির স্ক্যান কপি </th>
<th>আবেদনের ধরণ </th>
<th>আবেদনের অবস্থা</th>
<th>সনদ প্রদান </th>
<th>Action</th>
    </thead>
    <tbody>

        @foreach ($services as $service)
        <tr id="el{{$service->id}}">
            <td>{{$service->district_name}}  </td>
            <td>{{$service->upazila_name}}</td>
            <td>{{$service->union_name}}</td>
            <td>{{$service->ward_no}}</td>
            <td>{{$service->applicant_name}}</td>
            <td>{{$service->applicant_f_name}}</td>
            <td>{{$service->village_name}}</td>
            <td>{{$service->applicant_nid}}</td>
            <td>
                <img src="{{asset($service->applicant_img)}}" alt="" style="width:60px; height:60px">
             </td>
            <td>{{\Helper::applicationTypesReverse()[$service->apply_types]}}</td>
            <td>
                <select name="status" class="status" onchange="changeStatus(event,{{$service->id}})" >
                    @foreach (\Helper::applicationStatus() as $key =>$value)
                    <option value="{{$value}}"
                    @if ($service->status == $value)
                        selected=true
                    @endif
                    >
                           {{$key}}
                    </option>
                    @endforeach
                </select>
            </td>
            <td></td>
            <td>
                <a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="/admin/serviceapps/detail/{{$service->id}}"><i class="fa fa-eye"></i></a>
                <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="/admin/serviceapps/edit/{{$service->id}}"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-xs btn-warning btn-delete" title="Delete" onclick="deleteThis({{$service->id}})"><i class="fa fa-trash"></i></a>
            </td>
                    @endforeach
        </tr>

    </tbody>
</table>

{{ $services->links() }}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js" integrity="sha512-lTLt+W7MrmDfKam+r3D2LURu0F47a3QaW5nF0c6Hl0JDZ57ruei+ovbg7BrZ+0bjVJ5YgzsAWE+RreERbpPE1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const changeStatus = (e,id) => {
        // console.log(e.target.value,id)
        let value = e.target.value;
if(e.target.value == "সম্পন্ন") {
    document.title=Date.now()
    axios.get(`/admin/serviceapps/detail/${id}`).then(response => {
        // response.data.print()
        var mywindow = window.open('', 'new div', 'height=4000,width=4000');
        mywindow.document.body.innerHTML = response.data

      setTimeout(function(){
          mywindow.print();
          mywindow.close()
          },1000);



    })
    .catch(err => {
        console.log(err.response)
    })
}
        axios.get(`/admin/serviceapps/status/${id}/${value}`)
        .then(response => {
        })
        .catch(err => {
            console.log(err.response)
        })
    }
    const deleteThis = (id) => {
        axios.get(`/admin/serviceapps/delete/${id}`)
        .then(response => {
document.getElementById(`el${id}`).remove()

        })
        .catch(err => {
            console.log(err.response)
        })
    }
    // document.querySelector(".status").addEventListener("change",(e) => {
    //     console.log(e.target.value)
    // })
</script>

@stop
