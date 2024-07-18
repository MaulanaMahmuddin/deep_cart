<x-layout>
    <style>
        @media (min-width: 1200px){
            .container, .container-lg, .container-md, .container-sm, .container-xl {
                max-width: 1260px;
            }
        }
    </style>
    @slot('title')
        @yield('title')
    @endslot
    <x-menu/>
    <x-navbar>
        @slot('title')
            @yield('title')
        @endslot
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </x-navbar>
</x-layout>
