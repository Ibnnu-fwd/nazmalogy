<x-app-layout>
    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => null]]" />

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-6">
        @foreach ($courses as $course)
            <div class="w-96 rounded-xl shadow-md p-5 border border-gray-50 bg-white">
                <p class="text-gray-700 text-tiny font-semibold">
                    {{ $course->name }}
                </p>
                <div class="w-full bg-gray-200 rounded-full h-1.5 mt-4">
                    <div class="bg-purple-500 h-1.5 rounded-full" style="width: {{ $course->progressPercentage }}%"></div>
                </div>

                <p class="text-gray-500 text-xs mt-2">
                    {{ $course->progressPercentage }}% Complete
                </p>

                <div class="flex items-center justify-between text-tiny mt-3 text-gray-500">
                    <p>
                        Materi
                    </p>
                    <p>
                        Status
                    </p>
                </div>

                <div class="text-tiny mt-2 text-gray-600">
                    @foreach ($course->playlists as $playlist)
                        @foreach ($playlist->chapters as $chapter)
                            <div class="flex items-center justify-between text-tiny">
                                <span>
                                    {{ $chapter->title }}
                                </span>
                                @if ($chapter->is_finished)
                                    <ion-icon name="checkmark-circle" class="text-green-500"></ion-icon>
                                @else
                                    <ion-icon name="radio-button-off" class="text-gray-400"></ion-icon>
                                @endif
                            </div>
                        @endforeach
                    @endforeach
                </div>

                @if ($course->progressPercentage != 100)
                    <div
                        class="bg-gray-100 text-gray-800 text-tiny font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300 flex items-center w-fit mt-6">
                        Lanjutkan
                        <ion-icon name="arrow-forward-circle" class="text-purple-500 text-xl ml-2"></ion-icon>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
