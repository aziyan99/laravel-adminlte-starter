<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('storage') . "/" . auth()->user()->image }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="{{ route('backend.profile.index') }}" class="d-block">{{ auth()->user()->name }}</a>
    </div>
</div>
