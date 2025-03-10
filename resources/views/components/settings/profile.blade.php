  <!-- Profile Update modal -->
  <div id="profile-update-modal" tabindex="-1" aria-hidden="true"
      class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] w-full items-center justify-center overflow-hidden md:inset-0">
      <div class="relative max-h-full w-full max-w-md p-4">
          <!-- Modal content -->
          <div class="relative rounded-lg bg-white dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between rounded-t border-b p-4 md:p-5 dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Profile
                  </h3>
                  <button type="button"
                      class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                      data-modal-toggle="profile-update-modal">
                      <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                      </svg>
                      <span class="sr-only">Close</span>
                  </button>

              </div>
              <!-- Modal body -->
              <form class="max-h-[65vh] w-full overflow-y-scroll p-4 md:p-5" method="POST"
                  action="{{ route('profile.update') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-4 grid grid-cols-2 gap-4">
                      <div class="col-span-2">
                          <label
                              class="group relative mb-2 flex cursor-pointer flex-col items-center justify-center text-sm font-medium text-gray-900 dark:text-white"
                              for="avatar">
                              @if (Auth()->user()->avatar != null)
                                  <picture class="h-[6rem] w-[6rem] overflow-hidden rounded-full">
                                      <img id="avatar_preview"
                                          src="{{ route('profile.avatar', Auth()->user()->avatar) }}"
                                          alt="Profile Image">
                                  </picture>
                              @else
                                  <svg width="72" height="72" viewBox="0 0 24 24" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M12 20C10.107 20 8.36763 19.3425 6.99768 18.2435C6.99845 18.2441 6.99923 18.2448 7 18.2454V17.5625C7 15.7676 8.49238 14.3125 10.3333 14.3125H13.6667C15.5076 14.3125 17 15.7676 17 17.5625V18.2454C15.6304 19.3433 13.8919 20 12 20ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5003 17.5593 21.9635 12.0675 21.9998C12.045 21.9999 12.0225 22 12 22C11.9763 22 11.9527 21.9999 11.9291 21.9998C6.43889 21.9616 2 17.4992 2 12ZM12 7C10.1591 7 8.66667 8.45507 8.66667 10.25C8.66667 12.0449 10.1591 13.5 12 13.5C13.8409 13.5 15.3333 12.0449 15.3333 10.25C15.3333 8.45507 13.8409 7 12 7Z"
                                          fill="currentColor" />
                                  </svg>
                              @endif
                              <div
                                  class="absolute flex h-full w-fit flex-col items-center justify-center rounded-full opacity-0 transition-all ease-in group-hover:opacity-100">
                                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                      <path
                                          d="M4 15L4 17C4 18.6569 5.34315 20 7 20L17 20C18.6569 20 20 18.6569 20 17V15M12 4L12 16M12 4L16 8M12 4L8 8"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                  </svg>
                                  <span>
                                      Upload Image
                                  </span>
                              </div>
                          </label>
                          <input class="hidden" id="avatar" name="avatar_file" type="file"
                              accept="image/png, image/jpeg, image/jpg" />
                      </div>
                      <div class="col-span-2">
                          <label for="first_name"
                              class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                          <input required type="text" name="first_name" id="first_name"
                              class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                              placeholder="First name"
                              value="{{ Auth()->user()->first_name != null ? Auth()->user()->first_name : '' }}">
                      </div>
                      <div class="col-span-2">
                          <label for="last_name"
                              class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                          <input required type="text" name="last_name" id="last_name"
                              class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                              placeholder="Last name"
                              value="{{ Auth()->user()->last_name != null ? Auth()->user()->last_name : '' }}">
                      </div>
                      <div class="col-span-2">
                          <label for="email"
                              class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                          <input required type="email" name="email" id="email"
                              class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                              placeholder="Email"
                              value="{{ Auth()->user()->email != null ? Auth()->user()->email : '' }}">
                      </div>
                  </div>
                  <button type="submit"
                      class="inline-flex items-center gap-2 rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                              d="M4 15L4 17C4 18.6569 5.34315 20 7 20L17 20C18.6569 20 20 18.6569 20 17V15M12 4L12 16M12 4L16 8M12 4L8 8"
                              stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                      Save
                  </button>
              </form>
          </div>
      </div>
  </div>
