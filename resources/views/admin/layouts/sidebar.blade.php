<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-24 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 "
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-3 sidebar">
            @if (auth()->user()->role == 'admin')
                <x-sidebar-link label="Dashboard" icon="grid" route="{{ route('admin.dashboard.index') }}" />
                <x-sidebar-link label="Kursus" icon="albums" route="{{ route('admin.course.index') }}" />
                <x-sidebar-link label="Kategori Kursus" icon="folder"
                    route="{{ route('admin.course-category.index') }}" />
                {{-- <x-sidebar-link label="Review Chapter Kursus" icon="albums" route="{{ route('admin.course-chapter-review.index') }}" /> --}}
                <x-sidebar-link label="Tipe Poin" icon="podium" route="{{ route('admin.point-type.index') }}" />
                <x-sidebar-link label="Poin" icon="podium" route="{{ route('admin.point.index') }}" />
                <x-sidebar-link label="Transaksi" icon="wallet" route="{{ route('admin.transaction.index') }}" />
                <x-sidebar-link label="Testimoni" icon="people" route="{{ route('admin.testimonial.index') }}" />
                <x-sidebar-link label="Fasilitator" icon="person-circle"
                    route="{{ route('admin.facilitator.index') }}" />
            @endif

            @if (auth()->user()->role == 'user')
                <x-sidebar-link label="Dashboard" icon="grid" route="{{ route('user.dashboard.index') }}" />
                <x-sidebar-link label="Riwayat Belajar" icon="time" route="{{ route('user.history.index') }}" />
                <x-sidebar-link label="Poin" icon="podium" route="{{ route('user.point.index') }}" />
                <x-sidebar-link label="Transaksi" icon="wallet" route="{{ route('user.transaction.index') }}" />
                <x-sidebar-link label="Profil" icon="person-circle" route="{{ route('user.profile.index') }}" />
            @endif

            @if (auth()->user()->role == 'facilitator')
                <x-sidebar-link label="Dashboard" icon="grid" route="{{ route('facilitator.index') }}" />
                <x-sidebar-link label="Kursus" icon="albums" route="{{ route('facilitator.course.index') }}" />
                <x-sidebar-link label="Poin" icon="podium" route="{{ route('facilitator.point.index') }}" />
                <x-sidebar-link label="Referal" icon="people" route="{{ route('facilitator.referal.index') }}" />
                <x-sidebar-link label="Transaksi Member" icon="wallet"
                    route="{{ route('facilitator.transaction.index') }}" />
                <x-sidebar-link label="Transaksi" icon="wallet"
                    route="{{ route('facilitator.transaction-member.index') }}" />
                <x-sidebar-link label="Pengumpulan Tugas" icon="file-tray-full"
                    route="{{ route('facilitator.submission.index') }}" />
                <x-sidebar-link label="Profil" icon="person-circle" route="{{ route('facilitator.profile.index') }}" />
            @endif

            {{-- logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-sidebar-link label="Logout" icon="log-out"
                    onclick="event.preventDefault();
                                this.closest('form').submit();" />
            </form>
        </ul>
    </div>
</aside>
