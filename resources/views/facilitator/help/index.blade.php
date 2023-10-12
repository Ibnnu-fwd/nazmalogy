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
                                            href="https://scribehow.com/shared/Fasilitator_or_Profile__Rfbk1WZ7QgSi8tMTtQZLkA">
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
                                                                    Fasilitator | Profile</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    10 Steps</li>
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
                                    <div class="group relative flex h-full w-fit flex-1 flex-col overflow-hidden rounded-[7px] bg-slate-50 ring-1 ring-inset ring-slate-400/15 hover:ring-slate-600/20 sm:rounded-lg md:w-full"
                                        style="background-image: linear-gradient(180deg, rgba(248, 250, 252, 0) 0%, #F8FAFC 100%), linear-gradient(to right, var(--tw-gradient-stops));"
                                        draggable="true"><a
                                            class="group flex-1 focus:rounded-[7px] focus:ring-2 focus:ring-inset focus:ring-indigo-700 sm:focus:rounded-lg"
                                            target="_blank"
                                            href="https://scribehow.com/shared/Fasilitator_or_Riwayat_Belajar_Member__D3zsZX5oQ6mTcUBxG2eoOw">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="chart-mixed"
                                                                class="svg-inline--fa fa-chart-mixed fill-current text-pink-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M192 224c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-17.7-14.3-32-32-32zM64 320c-17.7 0-32 14.3-32 32v96c0 17.7 14.3 32 32 32s32-14.3 32-32V352c0-17.7-14.3-32-32-32zm224 0V448c0 17.7 14.3 32 32 32s32-14.3 32-32V320c0-17.7-14.3-32-32-32s-32 14.3-32 32zm160-96c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-17.7-14.3-32-32-32z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M505 44c11 13.8 8.8 33.9-5 45L340 217c-11.4 9.1-27.5 9.4-39.2 .6L192.6 136.5 52 249c-13.8 11-33.9 8.8-45-5s-8.8-33.9 5-45L172 71c11.4-9.1 27.5-9.4 39.2-.6l108.2 81.1L460 39c13.8-11 33.9-8.8 45 5z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="chart-mixed"
                                                            class="svg-inline--fa fa-chart-mixed absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-pink-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M192 224c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-17.7-14.3-32-32-32zM64 320c-17.7 0-32 14.3-32 32v96c0 17.7 14.3 32 32 32s32-14.3 32-32V352c0-17.7-14.3-32-32-32zm224 0V448c0 17.7 14.3 32 32 32s32-14.3 32-32V320c0-17.7-14.3-32-32-32s-32 14.3-32 32zm160-96c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-17.7-14.3-32-32-32z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M505 44c11 13.8 8.8 33.9-5 45L340 217c-11.4 9.1-27.5 9.4-39.2 .6L192.6 136.5 52 249c-13.8 11-33.9 8.8-45-5s-8.8-33.9 5-45L172 71c11.4-9.1 27.5-9.4 39.2-.6l108.2 81.1L460 39c13.8-11 33.9-8.8 45 5z">
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
                                                                    Fasilitator | Riwayat Belajar Member</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    5 Steps</li>
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
                                    <div class="group relative flex h-full w-fit flex-1 flex-col overflow-hidden rounded-[7px] bg-slate-50 ring-1 ring-inset ring-slate-400/15 hover:ring-slate-600/20 sm:rounded-lg md:w-full"
                                        style="background-image: linear-gradient(180deg, rgba(248, 250, 252, 0) 0%, #F8FAFC 100%), linear-gradient(to right, var(--tw-gradient-stops));"
                                        draggable="true"><a
                                            class="group flex-1 focus:rounded-[7px] focus:ring-2 focus:ring-inset focus:ring-indigo-700 sm:focus:rounded-lg"
                                            target="_blank"
                                            href="https://scribehow.com/shared/Fasilitator_or_Riwayat_Belajar__S9D4tDowQVCnOesiTeNXUg">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="link-horizontal"
                                                                class="svg-inline--fa fa-link-horizontal fill-current text-pink-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M640 303.4C640 383.3 575.3 448 495.4 448H336.6C256.7 448 192 383.3 192 303.4c0-70.7 51.1-131 120.8-142.6l1.9-.3c17.4-2.9 33.9 8.9 36.8 26.3s-8.9 33.9-26.3 36.8l-1.9 .3C284.5 230.4 256 264 256 303.4c0 44.5 36.1 80.6 80.6 80.6H495.4c44.5 0 80.6-36.1 80.6-80.6c0-39.4-28.5-73-67.4-79.5l-1.9-.3c-17.4-2.9-29.2-19.4-26.3-36.8s19.4-29.2 36.8-26.3l1.9 .3c69.7 11.6 120.8 72 120.8 142.6z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M0 208.6C0 128.7 64.7 64 144.6 64H303.4C383.3 64 448 128.7 448 208.6c0 70.7-51.1 131-120.8 142.6l-1.9 .3c-17.4 2.9-33.9-8.9-36.8-26.3s8.9-33.9 26.3-36.8l1.9-.3c38.9-6.5 67.4-40.1 67.4-79.5c0-44.5-36.1-80.6-80.6-80.6H144.6C100.1 128 64 164.1 64 208.6c0 39.4 28.5 73 67.4 79.5l1.9 .3c17.4 2.9 29.2 19.4 26.3 36.8s-19.4 29.2-36.8 26.3l-1.9-.3C51.1 339.6 0 279.3 0 208.6z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="link-horizontal"
                                                            class="svg-inline--fa fa-link-horizontal absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-pink-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 640 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M640 303.4C640 383.3 575.3 448 495.4 448H336.6C256.7 448 192 383.3 192 303.4c0-70.7 51.1-131 120.8-142.6l1.9-.3c17.4-2.9 33.9 8.9 36.8 26.3s-8.9 33.9-26.3 36.8l-1.9 .3C284.5 230.4 256 264 256 303.4c0 44.5 36.1 80.6 80.6 80.6H495.4c44.5 0 80.6-36.1 80.6-80.6c0-39.4-28.5-73-67.4-79.5l-1.9-.3c-17.4-2.9-29.2-19.4-26.3-36.8s19.4-29.2 36.8-26.3l1.9 .3c69.7 11.6 120.8 72 120.8 142.6z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M0 208.6C0 128.7 64.7 64 144.6 64H303.4C383.3 64 448 128.7 448 208.6c0 70.7-51.1 131-120.8 142.6l-1.9 .3c-17.4 2.9-33.9-8.9-36.8-26.3s8.9-33.9 26.3-36.8l1.9-.3c38.9-6.5 67.4-40.1 67.4-79.5c0-44.5-36.1-80.6-80.6-80.6H144.6C100.1 128 64 164.1 64 208.6c0 39.4 28.5 73 67.4 79.5l1.9 .3c17.4 2.9 29.2 19.4 26.3 36.8s-19.4 29.2-36.8 26.3l-1.9-.3C51.1 339.6 0 279.3 0 208.6z">
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
                                                                    Fasilitator | Riwayat Belajar</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    2 Steps</li>
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
                                    <div class="group relative flex h-full w-fit flex-1 flex-col overflow-hidden rounded-[7px] bg-slate-50 ring-1 ring-inset ring-slate-400/15 hover:ring-slate-600/20 sm:rounded-lg md:w-full"
                                        style="background-image: linear-gradient(180deg, rgba(248, 250, 252, 0) 0%, #F8FAFC 100%), linear-gradient(to right, var(--tw-gradient-stops));"
                                        draggable="true"><a
                                            class="group flex-1 focus:rounded-[7px] focus:ring-2 focus:ring-inset focus:ring-indigo-700 sm:focus:rounded-lg"
                                            target="_blank"
                                            href="https://scribehow.com/shared/Fasilitator_or_Pengumpulan_Tugas__y2lNeI5qTyeTCLjk8itgqw">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="window"
                                                                class="svg-inline--fa fa-window fill-current text-purple-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M160 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM512 416c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64V224l512 0V416zM288 96a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M64 32C28.7 32 0 60.7 0 96V224H512V96c0-35.3-28.7-64-64-64H64zM96 96a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm64 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM288 96a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="window"
                                                            class="svg-inline--fa fa-window absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-purple-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M160 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM512 416c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64V224l512 0V416zM288 96a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M64 32C28.7 32 0 60.7 0 96V224H512V96c0-35.3-28.7-64-64-64H64zM96 96a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm64 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM288 96a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
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
                                                                    Fasilitator | Pengumpulan Tugas</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    8 Steps</li>
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
                                    <div>
                                        <div class="group relative flex h-full w-fit flex-1 flex-col overflow-hidden rounded-[7px] bg-slate-50 ring-1 ring-inset ring-slate-400/15 hover:ring-slate-600/20 sm:rounded-lg md:w-full"
                                            style="background-image: linear-gradient(180deg, rgba(248, 250, 252, 0) 0%, #F8FAFC 100%), linear-gradient(to right, var(--tw-gradient-stops));"
                                            draggable="true"><a
                                                class="group flex-1 focus:rounded-[7px] focus:ring-2 focus:ring-inset focus:ring-indigo-700 sm:focus:rounded-lg"
                                                target="_blank"
                                                href="https://scribehow.com/shared/Fasilitator_or_Member__ff3nTSodR8mb3wUhMUVupw">
                                                <div class="mx-6 mt-5 mb-3 flex items-center">
                                                    <div>
                                                        <div class="relative">
                                                            <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                                data-testid="document-icon"><svg aria-hidden="true"
                                                                    focusable="false" data-prefix="fad"
                                                                    data-icon="watch"
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
                                                                        Fasilitator | Member</h4>
                                                                </div>
                                                            </div>
                                                            <ul class="m-0 list-none p-0">
                                                                <div
                                                                    class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                    <li
                                                                        class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                        2 Steps</li>
                                                                    <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                        data-testid="doc-age"><span>9 days ago</span>
                                                                    </li>
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
                                        <div></div>
                                    </div>
                                    <div class="group relative flex h-full w-fit flex-1 flex-col overflow-hidden rounded-[7px] bg-slate-50 ring-1 ring-inset ring-slate-400/15 hover:ring-slate-600/20 sm:rounded-lg md:w-full"
                                        style="background-image: linear-gradient(180deg, rgba(248, 250, 252, 0) 0%, #F8FAFC 100%), linear-gradient(to right, var(--tw-gradient-stops));"
                                        draggable="true"><a
                                            class="group flex-1 focus:rounded-[7px] focus:ring-2 focus:ring-inset focus:ring-indigo-700 sm:focus:rounded-lg"
                                            target="_blank"
                                            href="https://scribehow.com/shared/Fasilitator_or_Transaksi_Member__LPto0o20Q7yEysvw2NXEtw">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="wrench"
                                                                class="svg-inline--fa fa-wrench fill-current text-cyan-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M201.5 214.5L19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L297.5 310.5c-44.5-16.1-79.9-51.5-96-96zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M352 320c88.4 0 160-71.6 160-160c0-15.3-2.2-30.1-6.2-44.2c-3.1-10.8-16.4-13.2-24.3-5.3l-76.8 76.8c-3 3-7.1 4.7-11.3 4.7H336c-8.8 0-16-7.2-16-16V118.6c0-4.2 1.7-8.3 4.7-11.3l76.8-76.8c7.9-7.9 5.4-21.2-5.3-24.3C382.1 2.2 367.3 0 352 0C263.6 0 192 71.6 192 160s71.6 160 160 160z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="wrench"
                                                            class="svg-inline--fa fa-wrench absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-cyan-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M201.5 214.5L19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L297.5 310.5c-44.5-16.1-79.9-51.5-96-96zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M352 320c88.4 0 160-71.6 160-160c0-15.3-2.2-30.1-6.2-44.2c-3.1-10.8-16.4-13.2-24.3-5.3l-76.8 76.8c-3 3-7.1 4.7-11.3 4.7H336c-8.8 0-16-7.2-16-16V118.6c0-4.2 1.7-8.3 4.7-11.3l76.8-76.8c7.9-7.9 5.4-21.2-5.3-24.3C382.1 2.2 367.3 0 352 0C263.6 0 192 71.6 192 160s71.6 160 160 160z">
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
                                                                    Fasilitator | Transaksi Member</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    2 Steps</li>
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
                                    <div class="group relative flex h-full w-fit flex-1 flex-col overflow-hidden rounded-[7px] bg-slate-50 ring-1 ring-inset ring-slate-400/15 hover:ring-slate-600/20 sm:rounded-lg md:w-full"
                                        style="background-image: linear-gradient(180deg, rgba(248, 250, 252, 0) 0%, #F8FAFC 100%), linear-gradient(to right, var(--tw-gradient-stops));"
                                        draggable="true"><a
                                            class="group flex-1 focus:rounded-[7px] focus:ring-2 focus:ring-inset focus:ring-indigo-700 sm:focus:rounded-lg"
                                            target="_blank"
                                            href="https://scribehow.com/shared/Fasilitator_or_Referal__oZqJzzqDTQSFW0qnGQp1lQ">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="plane-up"
                                                                class="svg-inline--fa fa-plane-up fill-current text-slate-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M192 160L14.2 278.5C5.3 284.4 0 294.4 0 305.1v56.7c0 10.9 10.7 18.6 21.1 15.2L192 320V160zm128 0V320l170.9 57c10.4 3.5 21.1-4.3 21.1-15.2V305.1c0-10.7-5.3-20.7-14.2-26.6L320 160z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M192 93.7C192 59.5 221 0 256 0c36 0 64 59.5 64 93.7L320 400l57.6 43.2c4 3 6.4 7.8 6.4 12.8v42c0 7.8-6.3 14-14 14c-1.3 0-2.6-.2-3.9-.5L256 480 145.9 511.5c-1.3 .4-2.6 .5-3.9 .5c-7.8 0-14-6.3-14-14V456c0-5 2.4-9.8 6.4-12.8L192 400V93.7z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="plane-up"
                                                            class="svg-inline--fa fa-plane-up absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-slate-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M192 160L14.2 278.5C5.3 284.4 0 294.4 0 305.1v56.7c0 10.9 10.7 18.6 21.1 15.2L192 320V160zm128 0V320l170.9 57c10.4 3.5 21.1-4.3 21.1-15.2V305.1c0-10.7-5.3-20.7-14.2-26.6L320 160z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M192 93.7C192 59.5 221 0 256 0c36 0 64 59.5 64 93.7L320 400l57.6 43.2c4 3 6.4 7.8 6.4 12.8v42c0 7.8-6.3 14-14 14c-1.3 0-2.6-.2-3.9-.5L256 480 145.9 511.5c-1.3 .4-2.6 .5-3.9 .5c-7.8 0-14-6.3-14-14V456c0-5 2.4-9.8 6.4-12.8L192 400V93.7z">
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
                                                                    Fasilitator | Referal</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    13 Steps</li>
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
                                    <div class="group relative flex h-full w-fit flex-1 flex-col overflow-hidden rounded-[7px] bg-slate-50 ring-1 ring-inset ring-slate-400/15 hover:ring-slate-600/20 sm:rounded-lg md:w-full"
                                        style="background-image: linear-gradient(180deg, rgba(248, 250, 252, 0) 0%, #F8FAFC 100%), linear-gradient(to right, var(--tw-gradient-stops));"
                                        draggable="true"><a
                                            class="group flex-1 focus:rounded-[7px] focus:ring-2 focus:ring-inset focus:ring-indigo-700 sm:focus:rounded-lg"
                                            target="_blank"
                                            href="https://scribehow.com/shared/Fasilitator_or_Poin__3bTOSaNLSp6LlgFav2DbAA">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="glasses"
                                                                class="svg-inline--fa fa-glasses fill-current text-blue-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M223.4 314l-3.2 57.5c-1.9 33.9-29.9 60.5-63.9 60.5H112c-35.3 0-64-28.7-64-64V314.2c27.2-11.8 58.2-18.2 87.7-18.2c29.4 0 60.4 6.3 87.7 18zm129.2 0c27.3-11.7 58.3-18 87.7-18c29.5 0 60.5 6.4 87.7 18.2V368c0 35.3-28.7 64-64 64H419.7c-34 0-62-26.5-63.9-60.5L352.6 314z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M118.6 80c-11.5 0-21.4 7.9-24 19.1L57.1 259.8c25.6-7.8 52.6-11.8 78.6-11.8c40.1 0 82.2 9.6 118.5 27.3c5.8 2.9 10.4 7.3 13.5 12.7h40.6c3.1-5.4 7.7-9.8 13.5-12.7c36.2-17.8 78.4-27.3 118.5-27.3c26 0 53 4.1 78.6 11.8L481.4 99.1c-2.6-11.2-12.6-19.1-24-19.1c-3.1 0-6.2 .6-9.2 1.8L416.9 94.3c-12.3 4.9-26.3-1.1-31.2-13.4s1.1-26.3 13.4-31.2l31.3-12.5c8.6-3.4 17.7-5.2 27-5.2c33.8 0 63.1 23.3 70.8 56.2l43.9 188c1.7 7.3 2.9 14.7 3.5 22.2c.3 1.8 .5 3.7 .5 5.6v5.2c0 .5 0 1 0 1.5V352c0 .2 0 .4 0 .6V368c0 61.9-50.1 112-112 112H419.7c-59.4 0-108.5-46.4-111.8-105.8L306.6 352H269.4l-1.2 22.2C264.9 433.6 215.8 480 156.3 480H112C50.1 480 0 429.9 0 368V352 310.7 304c0-1.9 .2-3.8 .5-5.7c.6-7.4 1.8-14.8 3.5-22.1l43.9-188C55.5 55.3 84.8 32 118.6 32c9.2 0 18.4 1.8 27 5.2l31.3 12.5c12.3 4.9 18.3 18.9 13.4 31.2s-18.9 18.3-31.2 13.4L127.8 81.8c-2.9-1.2-6-1.8-9.2-1.8zM48 352v16c0 35.3 28.7 64 64 64h44.3c34 0 62-26.5 63.9-60.5l3.2-57.5c-27.3-11.7-58.3-18-87.7-18c-29.5 0-60.5 6.4-87.7 18.2V352zm392.3-56c-29.4 0-60.4 6.3-87.7 18l3.2 57.5c1.9 33.9 29.9 60.5 63.9 60.5H464c35.3 0 64-28.7 64-64V314.2c-27.2-11.8-58.2-18.2-87.7-18.2z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="glasses"
                                                            class="svg-inline--fa fa-glasses absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-blue-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 576 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M223.4 314l-3.2 57.5c-1.9 33.9-29.9 60.5-63.9 60.5H112c-35.3 0-64-28.7-64-64V314.2c27.2-11.8 58.2-18.2 87.7-18.2c29.4 0 60.4 6.3 87.7 18zm129.2 0c27.3-11.7 58.3-18 87.7-18c29.5 0 60.5 6.4 87.7 18.2V368c0 35.3-28.7 64-64 64H419.7c-34 0-62-26.5-63.9-60.5L352.6 314z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M118.6 80c-11.5 0-21.4 7.9-24 19.1L57.1 259.8c25.6-7.8 52.6-11.8 78.6-11.8c40.1 0 82.2 9.6 118.5 27.3c5.8 2.9 10.4 7.3 13.5 12.7h40.6c3.1-5.4 7.7-9.8 13.5-12.7c36.2-17.8 78.4-27.3 118.5-27.3c26 0 53 4.1 78.6 11.8L481.4 99.1c-2.6-11.2-12.6-19.1-24-19.1c-3.1 0-6.2 .6-9.2 1.8L416.9 94.3c-12.3 4.9-26.3-1.1-31.2-13.4s1.1-26.3 13.4-31.2l31.3-12.5c8.6-3.4 17.7-5.2 27-5.2c33.8 0 63.1 23.3 70.8 56.2l43.9 188c1.7 7.3 2.9 14.7 3.5 22.2c.3 1.8 .5 3.7 .5 5.6v5.2c0 .5 0 1 0 1.5V352c0 .2 0 .4 0 .6V368c0 61.9-50.1 112-112 112H419.7c-59.4 0-108.5-46.4-111.8-105.8L306.6 352H269.4l-1.2 22.2C264.9 433.6 215.8 480 156.3 480H112C50.1 480 0 429.9 0 368V352 310.7 304c0-1.9 .2-3.8 .5-5.7c.6-7.4 1.8-14.8 3.5-22.1l43.9-188C55.5 55.3 84.8 32 118.6 32c9.2 0 18.4 1.8 27 5.2l31.3 12.5c12.3 4.9 18.3 18.9 13.4 31.2s-18.9 18.3-31.2 13.4L127.8 81.8c-2.9-1.2-6-1.8-9.2-1.8zM48 352v16c0 35.3 28.7 64 64 64h44.3c34 0 62-26.5 63.9-60.5l3.2-57.5c-27.3-11.7-58.3-18-87.7-18c-29.5 0-60.5 6.4-87.7 18.2V352zm392.3-56c-29.4 0-60.4 6.3-87.7 18l3.2 57.5c1.9 33.9 29.9 60.5 63.9 60.5H464c35.3 0 64-28.7 64-64V314.2c-27.2-11.8-58.2-18.2-87.7-18.2z">
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
                                                                    Fasilitator | Poin</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    3 Steps</li>
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
                                    <div class="group relative flex h-full w-fit flex-1 flex-col overflow-hidden rounded-[7px] bg-slate-50 ring-1 ring-inset ring-slate-400/15 hover:ring-slate-600/20 sm:rounded-lg md:w-full"
                                        style="background-image: linear-gradient(180deg, rgba(248, 250, 252, 0) 0%, #F8FAFC 100%), linear-gradient(to right, var(--tw-gradient-stops));"
                                        draggable="true"><a
                                            class="group flex-1 focus:rounded-[7px] focus:ring-2 focus:ring-inset focus:ring-indigo-700 sm:focus:rounded-lg"
                                            target="_blank"
                                            href="https://scribehow.com/shared/Fasilitator_or_Kursus__86G0T_C8Q7KSah7KbzDJhg">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="scale-balanced"
                                                                class="svg-inline--fa fa-scale-balanced fill-current text-blue-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M384 32H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H398.4c-5.2 25.8-22.9 47.1-46.4 57.3V448H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H320 128c-17.7 0-32-14.3-32-32s14.3-32 32-32H288V153.3c-23.5-10.3-41.2-31.6-46.4-57.3H128c-17.7 0-32-14.3-32-32s14.3-32 32-32H256c14.6-19.4 37.8-32 64-32s49.4 12.6 64 32z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M126.8 195.8L199.3 320H54.4l72.4-124.2zM.9 337.1C11.7 382 64 416 126.8 416s115.2-34 126-78.9c2.6-11-1-22.3-6.7-32.1L150.9 141.8c-5-8.6-14.2-13.8-24.1-13.8s-19.1 5.3-24.1 13.8L7.6 305.1c-5.7 9.8-9.3 21.1-6.7 32.1zM512 195.8L584.4 320H439.6L512 195.8zM386 337.1C396.8 382 449.1 416 512 416s115.2-34 126-78.9c2.6-11-1-22.3-6.7-32.1L536.1 141.8c-5-8.6-14.2-13.8-24.1-13.8s-19.1 5.3-24.1 13.8L392.7 305.1c-5.7 9.8-9.3 21.1-6.7 32.1z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="scale-balanced"
                                                            class="svg-inline--fa fa-scale-balanced absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-blue-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 640 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M384 32H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H398.4c-5.2 25.8-22.9 47.1-46.4 57.3V448H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H320 128c-17.7 0-32-14.3-32-32s14.3-32 32-32H288V153.3c-23.5-10.3-41.2-31.6-46.4-57.3H128c-17.7 0-32-14.3-32-32s14.3-32 32-32H256c14.6-19.4 37.8-32 64-32s49.4 12.6 64 32z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M126.8 195.8L199.3 320H54.4l72.4-124.2zM.9 337.1C11.7 382 64 416 126.8 416s115.2-34 126-78.9c2.6-11-1-22.3-6.7-32.1L150.9 141.8c-5-8.6-14.2-13.8-24.1-13.8s-19.1 5.3-24.1 13.8L7.6 305.1c-5.7 9.8-9.3 21.1-6.7 32.1zM512 195.8L584.4 320H439.6L512 195.8zM386 337.1C396.8 382 449.1 416 512 416s115.2-34 126-78.9c2.6-11-1-22.3-6.7-32.1L536.1 141.8c-5-8.6-14.2-13.8-24.1-13.8s-19.1 5.3-24.1 13.8L392.7 305.1c-5.7 9.8-9.3 21.1-6.7 32.1z">
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
                                                                    Fasilitator | Kursus</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    65 Steps</li>
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
                                    <div class="group relative flex h-full w-fit flex-1 flex-col overflow-hidden rounded-[7px] bg-slate-50 ring-1 ring-inset ring-slate-400/15 hover:ring-slate-600/20 sm:rounded-lg md:w-full"
                                        style="background-image: linear-gradient(180deg, rgba(248, 250, 252, 0) 0%, #F8FAFC 100%), linear-gradient(to right, var(--tw-gradient-stops));"
                                        draggable="true"><a
                                            class="group flex-1 focus:rounded-[7px] focus:ring-2 focus:ring-inset focus:ring-indigo-700 sm:focus:rounded-lg"
                                            target="_blank"
                                            href="https://scribehow.com/shared/Facilitator_or_Dashboard__AIP8TP1uSJaeVVgtRToE0g">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad" data-icon="watch"
                                                                class="svg-inline--fa fa-watch fill-current text-yellow-500"
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
                                                            class="svg-inline--fa fa-watch absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-yellow-500"
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
                                                                    Facilitator | Dashboard </h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    5 Steps</li>
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
