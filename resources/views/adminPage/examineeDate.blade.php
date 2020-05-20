@extends('admin_template.master')
@section('content')
<div class="masonry row">
  @if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div><br />
@endif
    <div class="col s12">
      <h2 >Examinees for exam</h2>
    </div>

    
    <div class="col  s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Reserve Students</span>
            <form action="{{url('/admin/filter')}}" method="get">
              <div class="input-field col s12">
                <div class="col s10">
                  <i class="material-icons prefix">textsms</i>
                  <input type="text" name="filter" id="studsearch"  autocomplete="off">
                  <label for="autocomplete-input" >Choose date</label>
                  
                </div>
              
                <div class="col s2">
                    <button type="submit" class="btn waves-effect" >GO</button>
                </div>
                
              </div>
        
            </form>
  
            <ul class="badge-updates ">
              @foreach($listSched as $ld) 
              <li class="collection" >
                @if($ld->scheds['id'] > 0)
                  <a href="{{url('/admin/confirm/'.$ld->enrollID)}}" class="collection-item">
                  
                  @if($ld->scheds['status']=='pending')
                    <span style="text-transform: uppercase;" class="new badge red " data-badge-caption="{{$ld->scheds['status']}}"></span>
                  @elseif($ld->scheds['status']=='accept')
                    <span style="text-transform: uppercase;" class="new badge" data-badge-caption="Accepted"></span>
                  @elseif($ld->scheds['status'] == 'reject')
                  <span style="text-transform: uppercase;" class="new badge red" data-badge-caption="Rejected"></span>
                  @else
                  <span style="text-transform: uppercase;" class="new badge " data-badge-caption="None"></span>
                  @endif
                  <span class="time">{{$ld->created_at->diffForHumans()}} </span>
                  {{ $ld->lname.', '.$ld->fname.' '.$ld->mname.' - Tracking number: '.$ld->scheds['title'] }} 
                  </a>
                @else
               
                  <a href="#" style="pointer-events: none;"  class="collection-item" > 
                    <span style="text-transform: uppercase;" class="new badge amber" data-badge-caption="no date of exam"></span>
                    <span class="time">{{$ld->created_at->diffForHumans()}} </span>
                    {{ $ld->lname.', '.$ld->fname.' '.$ld->mname }} </a>
                @endif
             
              </li>
              @endforeach
            </ul>
            {{-- @if($listSched->enrollID > '')
            <ul class="badge-updates ">
            
              <li class="collection" ><a href="#" class="collection-item">
                
               <center><p>sorry no data available</p></center>
              </a>
              </li>
              
            </ul>
            @endif --}}
          </div>
        </div>
      </div>
      <div class="col s12">
        <div class="pagination">
        <center> {{$listSched->onEachSide(2)->links()}}</center>
        </div>
      </div>
    
@endsection
