  <!-- component -->
  <header>
      <nav class="relative select-none bg-black lg:flex lg:items-stretch w-full">
          <div class="flex flex-no-shrink items-stretch h-12">
              <a href="#"
                  class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Find
                  The Cars Of Your Choice</a>

              <button class="block lg:hidden cursor-pointer ml-auto relative w-12 h-12 p-4">
                  <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                  </svg>
                  <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path
                          d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z" />
                  </svg>
              </button>
          </div>
          <div class="lg:flex lg:items-stretch lg:flex-no-shrink lg:flex-grow">
              <div class="lg:flex lg:items-stretch lg:justify-end ml-auto">
                  @if (Auth::user()))
                      <a
                          class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Hii
                          {{Auth::user()->username}}</a>
                      <a href="{{ url('logout') }}"
                          class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">logout</a>
                  @else
                      <a href="{{ url('login') }}"
                          class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">login</a>
                  @endif
              </div>
          </div>

      </nav>
      <nav class="relative select-none bg-gray-100 lg:flex lg:items-stretch w-full">
          <div class="flex flex-no-shrink items-stretch h-12 text1">


              <button class="block lg:hidden cursor-pointer ml-auto relative w-12 h-12 p-4">
                  <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                  </svg>
                  <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path
                          d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z" />
                  </svg>
              </button>
          </div>
          <div class="px-5 xl:px-12 py-6 flex w-full items-center">
              <img src="http://localhost/projects/cardetails/resources/images/CarwaleLogo.jpeg" height="80px"
                  width="150px" class="text-3xl font-bold font-heading" />
              <!-- Nav Links -->
              <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                  <li><a class="hover:text-gray-200" href="{{ url('index') }}">Home</a></li>
                  <li><a class="hover:text-gray-200" href="{{ url('addcar') }}">Add
                          Cars</a></li>
                  <li><a class="hover:text-gray-200" href="#">New Cars</a></li>
                  <li><a class="hover:text-gray-200" href="#">Reviews</a></li>
              </ul>
          </div>
          <div class="lg:flex lg:items-stretch lg:flex-no-shrink lg:flex-grow">
              <div class="lg:flex lg:items-stretch lg:justify-end ml-auto">
                  <form action="search-submit" method="POST">
                      @csrf
                      <div class="pt-2 relative mx-auto text-gray-600">
                          <input
                              class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                              type="search" name="search" placeholder="Search">
                          <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                              <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                  xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                  x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                  style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px"
                                  height="512px">
                                  <path
                                      d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                              </svg>
                          </button>
                      </div>
                  </form>
                  <a href="#"
                      class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-black no-underline flex items-center hover:bg-grey-dark"></a>

              </div>
          </div>
      </nav>
  </header>
