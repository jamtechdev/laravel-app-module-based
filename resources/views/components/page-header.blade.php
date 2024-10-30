<style>
  .james h3{
    position: absolute !important;
  }
</style>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="card-header card-no-border james">
                    <h3>@yield('title', '')</h3>
                    <div class="breadcrumb d-flex align-items-center  ">
                        <a href="{{ route('home.index') }}" class="au-btn--green me-2">Home</a>
                        <span>/</span>
                        <span href="" class="au-btn--green mx-2">@yield('page1', '')</span>
                        <span>/</span>
                        <span class="au-btn--green mx-2">@yield('page2', '')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>