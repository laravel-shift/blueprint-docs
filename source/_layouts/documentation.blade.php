@extends('_layouts.master')

@section('nav-toggle')
    @include('_nav.menu-toggle')
@endsection

@section('body')
<section class="w-full max-w-screen-xl mx-auto px-6 md:px-8 py-4">
    <div class="flex flex-col lg:flex-row justify-center">
        <nav id="js-nav-menu" class="nav-menu hidden flex-1 lg:block md:border-b lg:border-b-0 pt-8 md:pt-1 pl-6 md:pl-0 pr-6 pb-2 mb-4 md:mb-6">
            @include('_nav.menu', ['items' => $page->navigation])
        </nav>

        <div class="DocSearch-content w-full lg:w-3/5 break-words py-4 px-6 md:py-6 md:px-8 lg:p-8 bg-white sm:shadow md:rounded-lg" v-pre>
            @yield('content')
        </div>

        <div class="flex-1 hidden lg:flex pl-6">
{{--            <nav role="aside" class="flex flex-col pl-2">--}}
{{--                <p class="mb-6 text-sm uppercase font-light tracking-wide text-blue">On this page</p>--}}
{{--                <a href="#system-requirements" class="mb-4 text-blue-darker hover:text-purple text-sm font-normal leading-normal">System Requirements</a>--}}
{{--                <a href="#1.-create-the-project-directory" class="mb-4 text-blue-darker hover:text-purple text-sm font-normal leading-normal">1. Create the Project Directory</a>--}}
{{--                <a href="#2.-install-jigsaw-via-composer" class="mb-4 text-blue-darker hover:text-purple text-sm font-normal leading-normal">2. Install Jigsaw via Composer</a>--}}
{{--                <a href="#directory-structure" class="mb-4 text-blue-darker hover:text-purple text-sm font-normal leading-normal">Directory Structure</a>--}}
{{--            </nav>--}}
        </div>
    </div>
</section>
@endsection
