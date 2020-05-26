@extends('admin_template.master')
@section('content')

<div class="masonry row">
    <div class="col s12">
    <h2>Status Confirmation</h2>
    </div>
</div>
<div class="row">
    <div class="col m12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title" style="text-transform:uppercase"  >
            {{$confirm->lname.', '.$confirm->mname.' '.$confirm->fname}}
          </span>
          
        </div>
        <div class="card-action">
          <p style="text-transform:uppercase" > STATUS: {{$confirm->scheds['status']}}</p>
        </div>
      </div>
    </div>
  </div>
<div class="row equal-height-grid">



  <div class="col l4 s12">

    <div class="card">
      <div class="card-content">
        <span class="card-title">Transaction no: {{$confirm->scheds['title']}}</span>
        <p>{{$confirm->EntryStatus}}</p>
      </div>
      <ul class="collection flush ">
        <li class="collection-item avatar ">
       
          <span class="title">Gender</span>
          <p class="truncate">{{$confirm->gender}}</p>
        </li>

        <li class="collection-item avatar">
        
          <span class="title">Birth date</span>
          <p class="truncate">{{$confirm->dob}}</p>
        </li>

        <li class="collection-item avatar">
         
          <span class="title">Nationality</span>
          <p class="truncate">{{$confirm->Nationality}}</p>
        </li>

        <li class="collection-item avatar">
          
          <span class="title">Contact Number</span>
          <p class="truncate">{{$confirm->contactnum}}</p>
        </li>

        <li class="collection-item avatar">
          {{-- <div class="badged-circle">
            <img class="circle" src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/portrait1.jpg?v=1218798423999129079" alt="avatar">
          </div> --}}
          <span class="title">Date registered</span>
          <p class="truncate">{{$confirm->created_at->diffForHumans()}}</p>
        </li>
      </ul>
     
    </div>

  </div> 

  <div class="col l8 s12">

    <div class="card">
      <div class="card-content">
        <span class="card-title">Activity</span>
        <ul class="collection flush ">
        @foreach ($files as $item)
          @if($confirm->Created_by == $item->Created_by)
        
          <li class="collection-item avatar ">
            <label for="">Uploads</label>
            <a href="{{url('/upload/'.$item->id)}}"> {{$item->file}} </a>
          </li>
          @endif
        @endforeach

        <li class="collection-item avatar" >
         
          <a target="_blank" href="{{url('/student_register/'.$confirm->enrollID)}}" >Print Student Form</a>
        </li>
        <li class="collection-item avatar">
          <a  target="_blank" href="{{url('/student_register/temp_id/'.$confirm->enrollID)}}">GENERATE TEMP ID</a>
        </li>
        <li class="collection-item avatar" >
          <form action="{{ route('update.status',$confirm->enrollID) }}" method="post">
            @method('PATCH')
            @csrf
                @can('isAdmin')
                <div class="col l2" >
                
                  <input type="text" name="status" value="ACCEPT" class="form-control" readonly >
                </div>
                @endcan
                @can('isAdmin')
                @if( $confirm->scheds['status'] == "accept" )
                  <button  class="btn disabled" type="submit">Confirmed</button>
                @else
                 <button class="btn waves-effect btn-block pulse" type="submit">Confirm</button>
                @endif
                 
                @endcan
          </form>
        </li>
        </ul>
      </div>
    </div>
  </div> 
</div>
@endsection
