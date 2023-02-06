<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>full Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="http://localhost/projects/cardetails/resources/css/style.css" type="text/css">

</head>

<body>
    @include('common/header')


    <!-- component -->
    @foreach ($data as $row)
        <div class="bg-white mt-5 ml-10">
            <nav class="flex flex-col sm:flex-row">
                <button class="text-gray-600 py-4 px-2 block  focus:outline-none text-gray-600 font-medium text-3xl">
                    {{ $row->carname }}
                </button><button class="text-gray-600 py-2 px-1 block focus:outline-none text-3xl">
                    ({{ $row->brand }})
                </button><button class="text-gray-600 py-4 px-2 block  focus:outline-none text-3xl">
                    ₹{{ $row->price }}
                </button>
            </nav>
        </div>
        <!-- show image with details-->
        <div class="full-car-show">
            <div class="full-center-car-show">

                <img class="p-8 rounded-t-lg ml-40"
                    src="http://localhost/projects/cardetails/storage/app/public/{{ $row->image }}" width="1000px"
                    height="800px" />
            </div>
        </div>
        <!-- component -->
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center">
                            <thead class="bg-white border-b">
                                <tr>
                                    <th scope="col" colspan="4"
                                        class="text-lg font-large text-gray-900 px-6 py-4 text-left pl-20">
                                        <h2>Key Specifications :-</h2>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-gray-100 border-b">

                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Price - {{ $row->price }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Average - {{ $row->average }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Transmission - {{ $row->transmission }}
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">

                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Engine - {{ $row->engine }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Seating Capacity - {{ $row->seatingcapacity }} seats
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Color - {{ $row->color }}
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">

                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Fuel Type - {{ $row->fueltype }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Fuel Tank Capacity - {{ $row->fuelcapacity }}
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Release Date - {{ $row->releasedate }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="heading-bar">
            <div class="center-heading-bar  ">
                <p>Reviews</p>
            </div>
        </div>
        <!-- component -->
        <!-- comment form -->
        <div class="review-section">
            <div class="review-section-center  ">
                <div class="flex mx-auto w-full m-auto items-center justify-center shadow-lg pt-5">

                    <form class="w-full max-w-5xl bg-white rounded-lg px-4 pt-2" method="post"
                        action="http://localhost/projects/cardetails/public/review-submit">

                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <h2 class="px-4 pb-2 text-gray-800 text-lg">Add a Review</h2>
                            <div class="w-full md:w-full px-3 mb-2  ">
                                <textarea type="text"
                                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-15 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                    name="review" placeholder='Type Your Review' required></textarea>
                                    @if (Auth::user())
                                <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                                @endif
                                <input type="hidden" name="carid" value="{{ $row->id }}">
                                <div class="w-full md:w-full flex items-start md:w-full px-2">
                                    <div class="-mr-1">
                                        @if (Auth::user())
                                            <input type='submit'
                                                class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide  hover:bg-gray-100"
                                                value='Post Review'>
                                        @else
                                            <a href="http://localhost/projects/cardetails/public/login"> <input
                                                    type='button'
                                                    class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide  hover:bg-gray-100"
                                                    value='First login your account'></a>
                                        @endif
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <div class="review-section1">
        <div class="review-section-center1  ">
            <!-- component -->
            @foreach ($reviews as $row)
                <!-- post card -->
                <div
                    class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-5 max-w-md md:max-w-7xl border border-gray-300">
                    <!--horizantil margin is just for display-->
                    <div class="flex items-start px-4 py-6">

                        <div class="">
                            <div class="flex items-center justify-between">
                                <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ $row->users->username }}</h2>
                                {{--  <small class="text-sm text-gray-700">22h ago</small>  --}}
                            </div>
                            <p class="text-gray-700">{{ $row->created_at }}</p>
                            <p class="mt-3 text-gray-700 text-sm bold">{{ $row->review }}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</body>

</html>
