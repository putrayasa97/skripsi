@if (session('success'))
    <div class="alert alert-success alert-dismissible fade in" style=" height: 50px; position: absolute; width: 81%;" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif
@if (session('info'))
    <div class="alert alert-warning alert-dismissible fade in" style=" height: 50px; position: absolute; width: 81%;" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>{{ session('info') }}</strong>
    </div>
@endif
@if (session('danger'))
    <div class="alert alert-danger alert-dismissible fade in" style=" height: 50px; position: absolute; width: 81%;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong> {{ session('danger') }}</strong>
  </div>
@endif



