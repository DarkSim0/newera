@extends('admin_template.master')
@section('content')
<div class="masonry row">
    <div class="col s12">
    <h2>Dashboard</h2>
    </div>
    {{-- <div class="col l3 m6 s12">

      <div class="card">
        <div class="card-stacked">
          <div class="card-metrics card-metrics-static">
            <div class="card-metric">
              <div class="card-metric-title">Revenue</div>
              <div class="card-metric-value">$12,476.00</div>
              <div class="card-metric-change increase">
                <i class="material-icons left">keyboard_arrow_up</i>
                12%
              </div>
            </div>
          </div>
        </div>
        <div class="card-chart">
          <canvas id="flush-area-chart-blue" height="100px"></canvas>
        </div>
      </div>

    </div> --}}
    {{-- <div class="col l3 m6 s12">

      <div class="card">
        <div class="card-stacked">
          <div class="card-metrics card-metrics-static">
            <div class="card-metric">
              <div class="card-metric-title">Clicks</div>
              <div class="card-metric-value">11,893</div>
              <div class="card-metric-change increase">
                <i class="material-icons left">keyboard_arrow_up</i>
                8%
              </div>
            </div>
          </div>
        </div>
        <div class="card-chart">
          <canvas id="flush-area-chart-yellow" height="100px"></canvas>
        </div>
      </div>

    </div>
    <div class="col l3 m6 s12">

      <div class="card">
        <div class="card-stacked">
          <div class="card-metrics card-metrics-static">
            <div class="card-metric">
              <div class="card-metric-title">Users</div>
              <div class="card-metric-value">230,648</div>
              <div class="card-metric-change decrease">
                <i class="material-icons left">keyboard_arrow_down</i>
                2%
              </div>
            </div>
          </div>
        </div>
        <div class="card-chart">
          <canvas id="flush-area-chart-pink" height="100"></canvas>
        </div>
      </div>

    </div>
    <div class="col l3 m6 s12">

      <div class="card">
        <div class="card-stacked">
          <div class="card-metrics card-metrics-static">
            <div class="card-metric">
              <div class="card-metric-title">Conversion Rate</div>
              <div class="card-metric-value">0.24%</div>
              <div class="card-metric-change decrease">
                <i class="material-icons left">keyboard_arrow_down</i>
                9%
              </div>
            </div>
          </div>
        </div>
        <div class="card-chart">
          <canvas id="flush-area-chart-green" height="100"></canvas>
        </div>
      </div>

    </div>

    <div class="col s12">
      <div class="card">
        <div class="card-metrics card-metrics-toggle card-metrics-centered">
          <div class="card-metric waves-effect active" data-metric="revenue">
            <div class="card-metric-title">Revenue</div>
            <div class="card-metric-value">$12,476.00</div>
            <div class="card-metric-change">
              <i class="material-icons">keyboard_arrow_up</i>
              12%
            </div>
          </div>
          <div class="card-metric waves-effect" data-metric="users">
            <div class="card-metric-title">Users</div>
            <div class="card-metric-value">2024</div>
            <div class="card-metric-change">
              <i class="material-icons">keyboard_arrow_up</i>
              9%
            </div>
          </div>
          <div class="card-metric waves-effect" data-metric="ctr">
            <div class="card-metric-title">CTR</div>
            <div class="card-metric-value">0.20%</div>
            <div class="card-metric-change">
              <i class="material-icons">keyboard_arrow_up</i>
              4%
            </div>
          </div>
        </div>
        <div class="card-content">
          <canvas class="card-chart" id="main-toggle-line-chart" width="400" height="400"></canvas>
        </div>
      </div>

    </div> --}}

    <div class="col  s12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Student List</span>
          <ul class="badge-updates ">
            @foreach($listSched as $ld) 
            <li class="collection" ><a href="{{url('/admin/confirm/'.$ld->enrollID)}}" class="collection-item">
              
              @if($ld->scheds['status']=='pending')
                <span style="text-transform: uppercase;" class="new badge red " data-badge-caption="{{$ld->scheds['status']}}"></span>
              @else
                <span style="text-transform: uppercase;" class="new badge" data-badge-caption="{{$ld->scheds['status']}}"></span>
              @endif
              <span class="time">{{$ld->created_at->diffForHumans()}} </span>
              {{ $ld->lname.', '.$ld->fname.' '.$ld->mname }} 
            </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="col s12">
      <div class="pagination">
      <center> {{$listSched->onEachSide(2)->links()}}</center>
      </div>
    </div>
{{-- 
    <div class="col m6 s12">
      <div id="tab-legend-chart-card" class="card primary-color">
        <div class="card-content">
          <p class="white-text">I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-content">
          <canvas class="card-chart" id="tab-legend-line-chart" width="400" height="400"></canvas>
        </div>
      </div>
    </div>

    <div class="col m6 s12">
      <div class="card">
        <div class="card-content">
          <div class="card-title">Stacked Bar Chart</div>
          <div class="chart-wrapper">
            <canvas id="stacked-bar-chart" width="400" height="400"></canvas>
          </div>
        </div>
      </div>
    </div> --}}

<!--     <div class="col m6 s12">
      <div class="card horizontal">
        <div class="card-stacked">
          <div class="card-metrics">
            <div class="card-metric waves-effect active">
              <div class="card-metric-title">Revenue</div>
              <div class="card-metric-value">$12,476.00</div>
              <div class="card-metric-change">
                <i class="material-icons left">keyboard_arrow_up</i>
                12%
              </div>
            </div>
          </div>
        </div>
        <div class="card-content">
          <canvas id="mini-line-chart" width="100%" height="100%"></canvas>
        </div>
      </div>
    </div>

    <div class="col m6 s12">
      <div class="card horizontal">
        <div class="card-stacked">
          <div class="card-metrics">
            <div class="card-metric waves-effect active">
              <div class="card-metric-title">Revenue</div>
              <div class="card-metric-value">$12,476.00</div>
              <div class="card-metric-change">
                <i class="material-icons left">keyboard_arrow_up</i>
                12%
              </div>
            </div>
          </div>
        </div>
        <div class="card-content">
          <canvas id="mini-stacked-bar-chart" width="100%" height="100%"></canvas>
        </div>
      </div>

    </div> -->

    {{-- <div class="col m6 s12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Devices</span>
          <div class="row row-vertical-center">
            <div class="col s6">
              <canvas id="doughnut-chart" width="50%"></canvas>
            </div>
            <div class="col s6">
              <div class="chart-legend-wrapper"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="masonry row">
    <div class="col s12">
      <h2>Secondary Data</h2>
    </div>

    <div class="col m6 s12">
      <div class="card">
        <div class="card-content">
          <div id="vmap" style="width: 100%; height: 400px;"></div>
        </div>
      </div>
    </div>

    <div class="col m6 s12">
      <div class="card">
        <div id='calendar'></div>
      </div>
    </div> --}}
  </div>
@endsection