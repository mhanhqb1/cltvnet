<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ !empty($pageTitle) ? __($pageTitle) : __('Dashboard') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ !empty($pageTitle) ? __($pageTitle) : __('Dashboard') }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
