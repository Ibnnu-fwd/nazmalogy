<x-app-layout>
    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => route('admin.dashboard.index')],
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
                                            href="https://scribehow.com/shared/Kursus__Z1bP5V71TKCJfKQr1Ndyyg">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="ruler-triangle"
                                                                class="svg-inline--fa fa-ruler-triangle fill-current text-slate-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M54.6 9.4C45.5 .2 31.7-2.5 19.8 2.4S0 19.1 0 32V448c0 35.3 28.7 64 64 64H480c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-52.7-52.7-22.6 22.6c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l22.6-22.6-57.4-57.4-22.6 22.6c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l22.6-22.6-57.4-57.4-22.6 22.6c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l22.6-22.6-57.4-57.4-22.6 22.6c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l22.6-22.6L129.9 84.7l-22.6 22.6c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l22.6-22.6L54.6 9.4zM128 256L256 384H128V256z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M107.3 62.1L84.7 84.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l22.6-22.6L107.3 62.1zm80 80l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l22.6-22.6-22.6-22.6zm80 80l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l22.6-22.6-22.6-22.6zm80 80l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l22.6-22.6-22.6-22.6zm80 80l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l22.6-22.6-22.6-22.6z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="ruler-triangle"
                                                            class="svg-inline--fa fa-ruler-triangle absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-slate-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M54.6 9.4C45.5 .2 31.7-2.5 19.8 2.4S0 19.1 0 32V448c0 35.3 28.7 64 64 64H480c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-52.7-52.7-22.6 22.6c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l22.6-22.6-57.4-57.4-22.6 22.6c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l22.6-22.6-57.4-57.4-22.6 22.6c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l22.6-22.6-57.4-57.4-22.6 22.6c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l22.6-22.6L129.9 84.7l-22.6 22.6c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l22.6-22.6L54.6 9.4zM128 256L256 384H128V256z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M107.3 62.1L84.7 84.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l22.6-22.6L107.3 62.1zm80 80l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l22.6-22.6-22.6-22.6zm80 80l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l22.6-22.6-22.6-22.6zm80 80l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l22.6-22.6-22.6-22.6zm80 80l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l22.6-22.6-22.6-22.6z">
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
                                                                    Kursus</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    52 Steps</li>
                                                                <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                    data-testid="doc-age"><span>10 days ago</span></li>
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
                                            href="https://scribehow.com/shared/Poin__xgF3kdFQQh2APouxn6_ZgQ">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="message-dots"
                                                                class="svg-inline--fa fa-message-dots fill-current text-cyan-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M0 64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L185.6 508.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V416H64c-35.3 0-64-28.7-64-64V64zM128 240a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm128 0a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm160-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M96 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm160-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="message-dots"
                                                            class="svg-inline--fa fa-message-dots absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-cyan-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M0 64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L185.6 508.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V416H64c-35.3 0-64-28.7-64-64V64zM128 240a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm128 0a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm160-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M96 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm160-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
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
                                                                    Poin</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    4 Steps</li>
                                                                <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                    data-testid="doc-age"><span>10 days ago</span></li>
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
                                            href="https://scribehow.com/shared/Pengguna__4oHevG7eT3m5Fd9cGmdkAg">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="database"
                                                                class="svg-inline--fa fa-database fill-current text-yellow-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M448 80v48c0 44.2-100.3 80-224 80S0 172.2 0 128V80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6V288c0 44.2-100.3 80-224 80S0 332.2 0 288V186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6V432c0 44.2-100.3 80-224 80S0 476.2 0 432V346.1z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M0 186.1V128c0 44.2 100.3 80 224 80s224-35.8 224-80v58.1c-14.9 11.8-34 21.2-54.8 28.6C348.3 230.7 288.5 240 224 240s-124.3-9.3-169.2-25.3C34 207.3 14.9 197.8 0 186.1zm0 160V288c0 44.2 100.3 80 224 80s224-35.8 224-80v58.1c-14.9 11.8-34 21.2-54.8 28.6C348.3 390.7 288.5 400 224 400s-124.3-9.3-169.2-25.3C34 367.3 14.9 357.8 0 346.1z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="database"
                                                            class="svg-inline--fa fa-database absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-yellow-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 448 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M448 80v48c0 44.2-100.3 80-224 80S0 172.2 0 128V80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6V288c0 44.2-100.3 80-224 80S0 332.2 0 288V186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6V432c0 44.2-100.3 80-224 80S0 476.2 0 432V346.1z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M0 186.1V128c0 44.2 100.3 80 224 80s224-35.8 224-80v58.1c-14.9 11.8-34 21.2-54.8 28.6C348.3 230.7 288.5 240 224 240s-124.3-9.3-169.2-25.3C34 207.3 14.9 197.8 0 186.1zm0 160V288c0 44.2 100.3 80 224 80s224-35.8 224-80v58.1c-14.9 11.8-34 21.2-54.8 28.6C348.3 390.7 288.5 400 224 400s-124.3-9.3-169.2-25.3C34 367.3 14.9 357.8 0 346.1z">
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
                                                                    Pengguna</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    7 Steps</li>
                                                                <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                    data-testid="doc-age"><span>10 days ago</span></li>
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
                                                href="https://scribehow.com/shared/Fasilitator__2HrpAElrS3eBobXorwI22A">
                                                <div class="mx-6 mt-5 mb-3 flex items-center">
                                                    <div>
                                                        <div class="relative">
                                                            <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                                data-testid="document-icon"><svg aria-hidden="true"
                                                                    focusable="false" data-prefix="fad"
                                                                    data-icon="lock"
                                                                    class="svg-inline--fa fa-lock fill-current text-slate-500"
                                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 448 512"
                                                                    style="height: 24px; width: 24px;">
                                                                    <g class="fa-duotone-group">
                                                                        <path class="fa-secondary" fill="currentColor"
                                                                            d="M224 64c-44.2 0-80 35.8-80 80v48H80V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48H304V144c0-44.2-35.8-80-80-80z">
                                                                        </path>
                                                                        <path class="fa-primary" fill="currentColor"
                                                                            d="M0 256c0-35.3 28.7-64 64-64H384c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256z">
                                                                        </path>
                                                                    </g>
                                                                </svg></div><svg aria-hidden="true" focusable="false"
                                                                data-prefix="fad" data-icon="lock"
                                                                class="svg-inline--fa fa-lock absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-slate-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M224 64c-44.2 0-80 35.8-80 80v48H80V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48H304V144c0-44.2-35.8-80-80-80z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M0 256c0-35.3 28.7-64 64-64H384c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256z">
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
                                                                        Fasilitator</h4>
                                                                </div>
                                                            </div>
                                                            <ul class="m-0 list-none p-0">
                                                                <div
                                                                    class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                    <li
                                                                        class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                        17 Steps</li>
                                                                    <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                        data-testid="doc-age"><span>10 days ago</span>
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
                                            href="https://scribehow.com/shared/Testimonial__Izos2kruSDCH12quuGQErg">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="camera-retro"
                                                                class="svg-inline--fa fa-camera-retro fill-current text-blue-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M0 128v32H256 512V96c0-35.3-28.7-64-64-64H271.1c-9.9 0-19.7 2.3-28.6 6.8L192 64H64C28.7 64 0 92.7 0 128z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M64 48c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16V64H64V48zM0 416V160H512V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64zm256-16a96 96 0 1 0 0-192 96 96 0 1 0 0 192z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="camera-retro"
                                                            class="svg-inline--fa fa-camera-retro absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-blue-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M0 128v32H256 512V96c0-35.3-28.7-64-64-64H271.1c-9.9 0-19.7 2.3-28.6 6.8L192 64H64C28.7 64 0 92.7 0 128z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M64 48c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16V64H64V48zM0 416V160H512V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64zm256-16a96 96 0 1 0 0-192 96 96 0 1 0 0 192z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div><span
                                                    class="mx-3 truncate text-ellipsis font-sans text-xs capitalize text-slate-500">Scribe</span>
                                            </div>
                                            <div class="">
                                                <div class="flex flex-col mx-6">
                                                    <div
                                                        class="align-center relative flex w-full flex-col justify-center">
                                                        <div class="flex flex-col">
                                                            <div class="flex items-center">
                                                                <h4
                                                                    class="m-0 mb-3 text-sm font-semibold leading-5 text-slate-900 line-clamp-2 3xl:text-base">
                                                                    Testimonial</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    2 Steps</li>
                                                                <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                    data-testid="doc-age"><span>10 days ago</span></li>
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
                                            href="https://scribehow.com/shared/Transaksi__2uDzb6vaROC_rBgoeiqunQ">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad"
                                                                data-icon="link-horizontal"
                                                                class="svg-inline--fa fa-link-horizontal fill-current text-cyan-500"
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
                                                            class="svg-inline--fa fa-link-horizontal absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-cyan-500"
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
                                                                    Transaksi</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    2 Steps</li>
                                                                <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                    data-testid="doc-age"><span>10 days ago</span></li>
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
                                            href="https://scribehow.com/shared/Pengumpulan_Tugas__yYDziEn4Rj204nBVWUWDUQ">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad" data-icon="watch"
                                                                class="svg-inline--fa fa-watch fill-current text-cyan-500"
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
                                                            class="svg-inline--fa fa-watch absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-cyan-500"
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
                                                                    Pengumpulan Tugas</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    8 Steps</li>
                                                                <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                    data-testid="doc-age"><span>10 days ago</span></li>
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
                                            href="https://scribehow.com/shared/Tipe_Poin__EnXKb3kNS8yXHT7tKOYMHw">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad" data-icon="lock"
                                                                class="svg-inline--fa fa-lock fill-current text-purple-500"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512"
                                                                style="height: 24px; width: 24px;">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor"
                                                                        d="M224 64c-44.2 0-80 35.8-80 80v48H80V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48H304V144c0-44.2-35.8-80-80-80z">
                                                                    </path>
                                                                    <path class="fa-primary" fill="currentColor"
                                                                        d="M0 256c0-35.3 28.7-64 64-64H384c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256z">
                                                                    </path>
                                                                </g>
                                                            </svg></div><svg aria-hidden="true" focusable="false"
                                                            data-prefix="fad" data-icon="lock"
                                                            class="svg-inline--fa fa-lock absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-purple-500"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 448 512" style="height: 24px; width: 24px;">
                                                            <g class="fa-duotone-group">
                                                                <path class="fa-secondary" fill="currentColor"
                                                                    d="M224 64c-44.2 0-80 35.8-80 80v48H80V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48H304V144c0-44.2-35.8-80-80-80z">
                                                                </path>
                                                                <path class="fa-primary" fill="currentColor"
                                                                    d="M0 256c0-35.3 28.7-64 64-64H384c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256z">
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
                                                                    Tipe Poin</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    56 Steps</li>
                                                                <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                    data-testid="doc-age"><span>10 days ago</span></li>
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
                                            href="https://scribehow.com/shared/Kursus_Kategori__pmPh84sNSzWsGSsl_BNHAA">
                                            <div class="mx-6 mt-5 mb-3 flex items-center">
                                                <div>
                                                    <div class="relative">
                                                        <div class="relative z-[1] flex flex-shrink-0 items-center justify-center overflow-hidden transition duration-300 bg-gradient-to-b from-white to-white/80 shadow-[0px_2px_6px_rgba(30,41,59,0.04),_0px_1px_2px_rgba(30,41,59,0.06)] rounded-full h-10 w-10"
                                                            data-testid="document-icon"><svg aria-hidden="true"
                                                                focusable="false" data-prefix="fad" data-icon="watch"
                                                                class="svg-inline--fa fa-watch fill-current text-pink-500"
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
                                                            class="svg-inline--fa fa-watch absolute left-0 right-0 bottom-0 z-0 mx-auto fill-current mix-blend-multiply blur text-pink-500"
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
                                                                    Kursus Kategori</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="m-0 list-none p-0">
                                                            <div
                                                                class="mb-6 flex items-center text-xs font-normal text-slate-500">
                                                                <li
                                                                    class="whitespace-nowrap rounded bg-slate-100 py-0.5 px-1.5 text-center">
                                                                    22 Steps</li>
                                                                <li class="ml-2 truncate text-ellipsis border-l border-slate-200 pl-2"
                                                                    data-testid="doc-age"><span>10 days ago</span></li>
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
