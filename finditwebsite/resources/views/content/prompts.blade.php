@if(Session::has('warning'))
<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Warning</h4>
    {{ Session::get('warning') }}
    <button type="button" class="close btn-primary" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error</h4>
  {{ Session::get('error') }}

  @if(Session::has('error_info'))
    <a class="btn btn-fail" data-toggle="collapse" href="#errorInfoCollapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"> <span>▶</span> </a>
      <!-- <span class="glyphicon glyphicon-chevron-down"></span> -->


    <div class="collapse multi-collapse" id="errorInfoCollapse">
      <div class="container">
          <small>{{ Session::get('error_info') }}</small>
      </div>
    </div>
  @endif
  @if(Session::has('target') !== null)
    <a class="alert-link" data-toggle="modal" data-target="{!! Session::get('target') !!}" href="#">Please try again</a>
  @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('message'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Success</h4>
  {{ Session::get('message') }}

  @if(Session::has('data'))
  {{ Session::get('message') }}
  @endif
  @if(Session::has('eq_id'))
  <a class="btn btn-success" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"> <span class="glyphicon glyphicon-chevron-down"></span></a>
  <br>
   <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="container">
        ID: {{ Session::get('eq_id') }} <br>
        Brand: {{ Session::get('brand') }} <br>
        Model: {{ Session::get('model') }} <br>
        Details: {{ Session::get('details') }} <br>
        Serial Number: {{ Session::get('serial_no') }} <br>
        IMEI or Physical Address: {{ Session::get('imei') }} <br>
        OR: {{ Session::get('or_no') }} <br>
        Warranty Start: {{ Session::get('warranty_start') }} <br>
        Warranty End: {{ Session::get('warranty_end') }} <br>
      </div>
    </div>

  @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
