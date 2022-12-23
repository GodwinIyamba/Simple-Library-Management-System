<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
            <form class="w-100" action="{{ route('admin.logout') }}" method="POST" style="margin-left: 95%;">
                @csrf
                    <button type="submit" class="btn btn-sm btn-alt-secondary" >
                        LOGOUT
                    </button>
            </form>
    </div>
    <!-- END Header Content -->

</header>
