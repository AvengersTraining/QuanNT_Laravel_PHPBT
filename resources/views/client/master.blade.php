<html lang="en">
@extends('client.header')

<body>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="main-navigation">
            <span class="brand-name pull-left">
                <a href="https://stackcoder.in/posts">StackCoder</a>
            </span>
                <div class="toggle-navigation">
                    <svg class="pull-right" viewBox="0 0 100 80" width="30" height="40">
                        <rect width="100" height="10" rx="8"></rect>
                        <rect y="30" width="100" height="10" rx="8"></rect>
                        <rect y="60" width="100" height="10" rx="8"></rect>
                    </svg>
                </div>
                <ul class="navbar pull-right">
                    <li><a href="{{ route('client.index') }}">Articles</a></li>

                    <li><a href="#">About Me</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row content_wrapper">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row search-wrapper">
                <div class="col-md-12">
                    <form action="#" method="GET">
                        <div class="row">
                            <div class="col-md-10 col-xs-8">
                                <input type="text" name="search" placeholder="Search Articles..." id="search"
                                       class="form-control border50px">
                            </div>
                            <div class="col-md-2 col-xs-4">
                                <input type="submit" value="Search" class="btn btn-md btn-orange border50px">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br><br>

            @yield('content')

        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@extends('client.footer')
</body>
</html>
