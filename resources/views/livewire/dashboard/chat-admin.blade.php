{{-- <div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Chat
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2">Start New Chat</button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="users" class="w-4 h-4 mr-2"></i> Create Group </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Chat Side Menu -->
        <div class="col-span-12 lg:col-span-4 xxl:col-span-3">
            
            <div class="tab-content">
                <div id="chats" class="tab-pane active" role="tabpanel" aria-labelledby="chats-tab">
                    
                    <div class="chat__chat-list overflow-y-auto scrollbar-hidden pr-1 pt-1 mt-4">
                        <div class="intro-x cursor-pointer box relative flex items-center p-5 ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="" class="rounded-full" src="/dist/images/profile-8.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium">Al Pacino</a> 
                                    <div class="text-xs text-gray-500 ml-auto">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                            </div>
                        </div>
                        <div class="intro-x cursor-pointer box relative flex items-center p-5 mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="" class="rounded-full" src="/dist/images/profile-2.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium">Morgan Freeman</a> 
                                    <div class="text-xs text-gray-500 ml-auto">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                            </div>
                            <div class="w-5 h-5 flex items-center justify-center absolute top-0 right-0 text-xs text-white rounded-full bg-theme-1 font-medium -mt-1 -mr-1">3</div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Chat Side Menu -->
        <!-- BEGIN: Chat Content -->
        <div class="intro-y col-span-12 lg:col-span-8 xxl:col-span-9">
            <div class="chat__box box">
                <!-- BEGIN: Chat Active -->
                <div class="hidden h-full flex flex-col">
                    <div class="flex flex-col sm:flex-row border-b border-gray-200 dark:border-dark-5 px-5 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit relative">
                                <img alt="" class="rounded-full" src="/dist/images/profile-8.jpg">
                            </div>
                            <div class="ml-3 mr-auto">
                                <div class="font-medium text-base">Al Pacino</div></div>
                        </div>
                    </div>
                    <div class="overflow-y-scroll scrollbar-hidden px-5 pt-5 flex-1">
                        <div class="chat__box__text-box flex items-end float-left mb-4">
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                            </div>
                            <div class="bg-gray-200 dark:bg-dark-5 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-r-md rounded-t-md">
                                Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor 
                                <div class="mt-1 text-xs text-gray-600">2 mins ago</div>
                            </div>
                            <div class="hidden sm:block dropdown ml-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-600" aria-expanded="false"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <div class="chat__box__text-box flex items-end float-right mb-4">
                            <div class="hidden sm:block dropdown mr-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-600" aria-expanded="false"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                                Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor 
                                <div class="mt-1 text-xs text-theme-21">1 mins ago</div>
                            </div>
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <div class="chat__box__text-box flex items-end float-right mb-4">
                            <div class="hidden sm:block dropdown mr-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-600" aria-expanded="false"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                                Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor 
                                <div class="mt-1 text-xs text-theme-21">59 secs ago</div>
                            </div>
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <div class="text-gray-500 dark:text-gray-600 text-xs text-center mb-10 mt-5">12 June 2020</div>
                        <div class="chat__box__text-box flex items-end float-left mb-4">
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                            </div>
                            <div class="bg-gray-200 dark:bg-dark-5 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-r-md rounded-t-md">
                                Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor 
                                <div class="mt-1 text-xs text-gray-600">10 secs ago</div>
                            </div>
                            <div class="hidden sm:block dropdown ml-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-600" aria-expanded="false"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <div class="chat__box__text-box flex items-end float-right mb-4">
                            <div class="hidden sm:block dropdown mr-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-600" aria-expanded="false"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                                Lorem ipsum 
                                <div class="mt-1 text-xs text-theme-21">1 secs ago</div>
                            </div>
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <div class="chat__box__text-box flex items-end float-left mb-4">
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                            </div>
                            <div class="bg-gray-200 dark:bg-dark-5 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-r-md rounded-t-md">
                                Al Pacino is typing 
                                <span class="typing-dots ml-1"> <span>.</span> <span>.</span> <span>.</span> </span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 pb-10 sm:py-4 flex items-center border-t border-gray-200 dark:border-dark-5">
                        <textarea class="chat__box__input form-control dark:bg-dark-3 h-16 resize-none border-transparent px-5 py-3 shadow-none focus:ring-0" rows="1" placeholder="Type your message..."></textarea>
                        
                        <a href="javascript:;" class="w-8 h-8 sm:w-10 sm:h-10 block bg-theme-1 text-white rounded-full flex-none flex items-center justify-center mr-5"> <i data-feather="send" class="w-4 h-4"></i> </a>
                    </div>
                </div>
                <!-- END: Chat Active -->
                <!-- BEGIN: Chat Default -->
                <div class="h-full flex items-center">
                    <div class="mx-auto text-center">
                        <div class="w-16 h-16 flex-none image-fit rounded-full overflow-hidden mx-auto">
                            <img alt="" src="/dist/images/profile-8.jpg">
                        </div>
                        <div class="mt-3">
                            <div class="font-medium">Hey, Al Pacino!</div>
                            <div class="text-gray-600 mt-1">Please select a chat to start messaging.</div>
                        </div>
                    </div>
                </div>
                <!-- END: Chat Default -->
            </div>
        </div>
        <!-- END: Chat Content -->
    </div>
</div> --}}

<div class="w-auto">
    <iframe src="https://dashboard.tawk.to/" frameborder="0" style="width: 100%; height: 100vh;">

    </iframe>
</div>