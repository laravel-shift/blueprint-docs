@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8">
            <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

            <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">Code generation for Laravel developers</h2>

            <p class="text-lg"><b>Rapidly develop</b> multiple Laravel components<br>from a <b>single, human readable</b> domain laungage.</p>

            <div class="flex my-10">
                <a href="/docs/getting-started" title="Blueprint documentation" class="bg-blue-500 hover:bg-blue-600 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">Get Started</a>
                <a href="https://laracasts.com/series/guest-spotlight/episodes/9" title="Blueprint spotlight on Laracasts" class="bg-gray-400 hover:bg-gray-600 text-blue-900 font-normal hover:text-white rounded py-2 px-6" rel="external">Watch an Overview</a>
            </div>
        </div>

        <img src="/assets/img/logo-large.svg" alt="{{ $page->siteName }} large logo" class="mx-auto mb-6 lg:mb-0 ">
    </div>

    <hr class="block my-8 border lg:hidden">

    <div class="md:flex -mx-2 -mx-4">
        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <img src="/assets/img/icon-window.svg" class="h-12 w-12" alt="window icon">
            <h3 class="text-2xl text-blue-900 mb-0">Draft your application<br>with a simple syntax</h3>
            <p>Blueprint uses a simple YAML syntax to define your <i>models</i> and <i>controllers</i> offering shorthands and leveraging conventions to maximize the developer experience.</p>
        </div>

        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <img src="/assets/img/icon-terminal.svg" class="h-12 w-12" alt="terminal icon">
            <h3 class="text-2xl text-blue-900 mb-0">Generate code using<br>artisan commands</h3>
            <p>Blueprint comes with artisan commands making it easy and familiar to build new components and reference existing within your Laravel application.</p>
        </div>

        <div class="mx-3 px-2 md:w-1/3">
            <img src="/assets/img/icon-stack.svg" class="h-12 w-12" alt="stack icon">
            <h3 class="text-2xl text-blue-900 mb-0">Output multiple Laravel<br>components at once</h3>
            <p>Blueprint not only generates <i>models</i> and <i>controllers</i>, but factories, migrations, form requests, events, jobs, and mailables. Oh, <b>and tests too</b>.</p>
        </div>
    </div>
</section>
@endsection
