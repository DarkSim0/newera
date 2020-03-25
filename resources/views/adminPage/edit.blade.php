@extends('admin_template.master')
@section('content')
<div class="masonry row">
    <div class="col s12">
    <h2>Status confirmation</h2>
    </div>
</div>
<div class="row equal-height-grid">

  <div class="col l3 s12">

    <div class="card">
      <div class="card-content">
        <span class="card-title">Student Status</span>
        <p>{{$confirm->scheds['status']}}</p>
        <div class="divider"></div>
        <form action="{{ route('update.status',$confirm->enrollID) }}" method="post">.
          @method('PATCH')
          @csrf
          <div class="card-content">
            <div class="chat-wrapper">
              <select name="status" id="">
                <option value="accept">Accept</option>
                <option value="reject">Reject</option>
              </select> &nbsp;
              <button class="btn waves-effect btn-block pulse" type="submit">Confirm</button>
            </div>
            <div class="input-form chat-wrapper col l6 s12">
            </div>
          </div>
        </form>
      </div>
    </div>
    
  </div> 

  <div class="col l9 s12">

    <div class="card">
      <div class="card-content">
        <span class="card-title">{{$confirm->lname.', '.$confirm->mname.' '.$confirm->fname}}</span>
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
</div>


@endsection
