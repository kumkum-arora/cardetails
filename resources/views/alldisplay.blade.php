<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars Details</title>
    {{--  tailwind cdn  --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{--  jquery  --}}
    <script src="jquery.js"></script>
    <script>
        var i = 100;
        $(function() {
            setInterval('show()', 2000)
        })

        function show() {

            var src = $('.inner li img').attr('src'); //.attr('src') //List -11
            $('.inner li img:first').animate({
                    "margin-left": "-1205px"
                }, 2000,

                function() {
                    $('.inner li:first').remove();
                }
            );
            $('.inner').append("<li> <img src=" + src + "></li>");
        }
    </script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="style.css" type="text/css">

</head>

<body>
    {{--  include header here  --}}
    @include('common/header')

    {{--  showing slider   --}}
    <div class="slider">
        <div class="center-slider">
            <div class="main">
                <ul class="inner">
                    <li> <img src="car1.jpeg"></li>
                    <li> <img src="car2.jpeg"></li>
                    <li> <img src="car3.jpeg"></li>
                    <li> <img src="car4.jpeg"></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="heading-bar">
        <div class="center-heading-bar">
            <p>Featured Cars</p>
        </div>
    </div>
    <div class="heading-bar">
        <div class="center-heading-bar">
            <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                <li><a class="hover:text-gray-400 text-left" href="alldisplay">POPULAR</a></li>
                <li><a class="hover:text-gray-400" href="justlounched">JUST LOUNCHED</a></li>
                <li><a class="hover:text-gray-400" href="upcomings">UPCOMINGS</a></li>

            </ul>
        </div>
    </div>

    <!-- body Part -->
    <div class="car-show">
        <div class="center-car-show">
            <!-- cards -->
            @foreach ($cars as $row)
                <div
                    class="w-full max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 ml-10 mt-12 mb-10 border-solid border-2 border-gray-200">
                    <a href="{{ url('fulldisplay') }}/{{ $row->id }}">
                        <img src="storage/{{ $row->image }}" alt="product image" style="height: 300px; weight:250px;"
                            class="p-4" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $row->carname }} ({{ $row->transmission }}) ({{ $row->fueltype }})</h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ">{{ $row->transmission }}</span>
                        </div>
                        <div class="flex items-center justify-between border-b-2 border-gray-300 mt-4 mb-4">
                            <span
                                class="bg-blue-100 text-gray-500 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded mb-3">{{ $row->average }}</span>
                            <span
                                class="bg-blue-100 text-gray-500 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded mb-3 ">{{ $row->engine }}</span>
                            <span
                                class="bg-blue-100 text-gray-500 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded mb-3">{{ $row->color }}</span>
                            <span
                                class="bg-blue-100 text-gray-500 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded mb-3 ">{{ $row->fuelcapacity }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white"> ₹
                                {{ $row->price }}</span>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    </div>
    {{--  add footer here  --}}
    @include('common/footer')

</html>
</body>
