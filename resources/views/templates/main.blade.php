@include('templates.head')
@include('templates.seddibar')
@include('templates.navbar')
    	<div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
          </div>
        </div>
        <div class="row">
          
@yield('content')
@include('templates.footer')