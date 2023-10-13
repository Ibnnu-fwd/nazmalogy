<x-app-layout>
    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => route('admin.facilitator.index')],
        ['text' => 'Panduan', 'link' => null],
    ]" />

    <div data-simplebar="init" class="mb-12 mt-8">
        <div class="simplebar-wrapper">
            <div class="simplebar-mask">
                <div class="simplebar-offset">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content">
                        <div class="simplebar-content">
                            <div class="flex w-full items-center justify-start">
                                <div
                                    class="grid w-full grid-cols-1 gap-6 pb-24 lg:grid-cols-2 xl:grid-cols-3 2xl:gap-8 3xl:grid-cols-4">
                                    <div class="group relative flex h-full w-fit flex-1 flex-col overflow-hidden rounded-[7px] bg-slate-50 ring-1 ring-inset ring-slate-400/15 hover:ring-slate-600/20 sm:rounded-lg md:w-full"
                                        style="background-image: linear-gradient(180deg, rgba(248, 250, 252, 0) 0%, #F8FAFC 100%), linear-gradient(to right, var(--tw-gradient-stops));"
                                        draggable="true"><a
                                            class="group flex-1 focus:rounded-[7px] focus:ring-2 focus:ring-inset focus:ring-indigo-700 sm:focus:rounded-lg"
                                            target="_blank"
                                            href="https://scribehow.com/embed/USER_GUIDE__swiIqOcYRcC86p6yBKiBQw">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad" data-icon="watch"
                                                                class="svg-inline--fa fa-watch fill-current text-purple-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 384 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M192 448a192 192 0 1 0 0-384 192 192 0 1 0 0 384zm24-272v67.2L253.3 268c11 7.4 14 22.3 6.7 33.3s-22.3 14-33.3 6.7l-48-32C172 271.5 168 264 168 256V176c0-13.3 10.7-24 24-24s24 10.7 24 24z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M64 48C64 21.5 85.5 0 112 0H272c26.5 0 48 21.5 48 48v64.9C286 82.5 241.2 64 192 64s-94 18.5-128 48.9V48zM192 448c49.2 0 94-18.5 128-48.9V464c0 26.5-21.5 48-48 48H112c-26.5 0-48-21.5-48-48V399.1C98 429.5 142.8 448 192 448zm24-272v67.2L253.3 268c11 7.4 14 22.3 6.7 33.3s-22.3 14-33.3 6.7l-48-32C172 271.5 168 264 168 256V176c0-13.3 10.7-24 24-24s24 10.7 24 24z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="watch"
                                                            class="svg-inline--fa fa-watch absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-purple-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 384 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M192 448a192 192 0 1 0 0-384 192 192 0 1 0 0 384zm24-272v67.2L253.3 268c11 7.4 14 22.3 6.7 33.3s-22.3 14-33.3 6.7l-48-32C172 271.5 168 264 168 256V176c0-13.3 10.7-24 24-24s24 10.7 24 24z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M64 48C64 21.5 85.5 0 112 0H272c26.5 0 48 21.5 48 48v64.9C286 82.5 241.2 64 192 64s-94 18.5-128 48.9V48zM192 448c49.2 0 94-18.5 128-48.9V464c0 26.5-21.5 48-48 48H112c-26.5 0-48-21.5-48-48V399.1C98 429.5 142.8 448 192 448zm24-272v67.2L253.3 268c11 7.4 14 22.3 6.7 33.3s-22.3 14-33.3 6.7l-48-32C172 271.5 168 264 168 256V176c0-13.3 10.7-24 24-24s24 10.7 24 24z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div><span
                                                    class="mx-3 truncate text-ellipsis font-sans text-xs capitalize text-slate-500">NaZMa
                                                    Office</span>
                                            </div>
                                            <div class="">
                                                <div class="flex flex-col mx-6">
                                                    <div
                                                        class="align-center relative flex w-full flex-col justify-center">
                                                        <div class="flex flex-col">
                                                            <div class="flex items-center">
                                                                <h4
                                                                    class="m-0 mb-3 text-sm font-semibold leading-5 text-slate-900 line-clamp-2 3xl:text-base">
                                                                    User Guide</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    27 Steps</li>
                                                                <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                    data-testid="doc-age"><span>9 days ago</span></li>
                                                                <li
                                                                    class="truncate text-ellipsis ml-2 border-l border-slate-200 pl-2">
                                                                    <span>NaZMa Office</span>
                                                                </li>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
