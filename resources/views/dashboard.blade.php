
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800">

@php
    $student = auth()->user();
@endphp

<div class="min-h-screen md:flex">

    <!-- Dark Blue Sidebar -->
    <aside class="flex w-full flex-col bg-slate-900 text-white md:min-h-screen md:w-64">
        <div class="border-b border-slate-700 px-6 py-7">
            <div class="flex items-center gap-3">
                <div class="rounded-xl bg-indigo-600 p-3 text-xl">🎓</div>
                <div>
                    <h1 class="text-xl font-bold">Student Portal</h1>
                    <p class="text-xs text-slate-400">Learn • Grow • Succeed</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 space-y-2 p-4">
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 rounded-xl bg-indigo-600 px-4 py-3 font-medium text-white">
                <span>⌂</span> Dashboard
            </a>

            <a href="{{ route('student.resources') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white">
                <span>▤</span> Student Resources
            </a>

            <a href="{{ route('profile.edit') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white">
                <span>♙</span> Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-slate-300 hover:bg-red-900/40 hover:text-white">
                    <span>↪</span> Logout
                </button>
            </form>
        </nav>

        <div class="hidden px-6 py-8 text-center text-sm text-slate-400 md:block">
            <div class="mb-3 text-3xl">📚</div>
            <p class="italic">"Small steps make big progress."</p>
            <div class="mx-auto mt-4 h-1 w-10 rounded bg-indigo-500"></div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="min-w-0 flex-1">
        <header class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 bg-white px-6 py-5 md:px-10">
            <div>
                <p class="text-sm text-slate-500">Student Portal / Dashboard</p>
                <h2 class="text-xl font-bold text-slate-900">My Dashboard</h2>
            </div>
            <div class="rounded-full bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-800">
                {{ $student->name }}
            </div>
        </header>

        <div class="space-y-7 p-5 md:p-10">

            <!-- Welcome Banner -->
            <section class="overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-700 to-blue-600 p-7 text-white shadow-lg md:p-9">
                <p class="text-sm font-semibold uppercase tracking-widest text-indigo-200">
                    Welcome back
                </p>
                <h2 class="mt-2 text-3xl font-bold md:text-4xl">
                    {{ $student->name }}!
                </h2>
                <p class="mt-3 max-w-xl text-blue-100">
                    Keep learning, keep growing, and make the most of your student journey.
                </p>
            </section>

            <!-- Student Summary Cards -->
            <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
                <div class="rounded-2xl border border-blue-100 bg-white p-6 shadow-sm">
                    <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-xl">📘</div>
                    <p class="text-sm text-slate-500">Course</p>
                    <p class="mt-1 font-bold text-slate-900">
                        {{ $student->course ?: 'Not yet provided' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm">
                    <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-xl">📅</div>
                    <p class="text-sm text-slate-500">Year Level</p>
                    <p class="mt-1 font-bold text-slate-900">
                        {{ $student->year_level ?: 'Not yet provided' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-violet-100 bg-white p-6 shadow-sm">
                    <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-violet-100 text-xl">👥</div>
                    <p class="text-sm text-slate-500">Section</p>
                    <p class="mt-1 font-bold text-slate-900">
                        {{ $student->section ?: 'Not yet provided' }}
                    </p>
                </div>
            </section>

            <!-- Details and Quick Access -->
            <section class="grid gap-6 xl:grid-cols-3">

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm xl:col-span-2">
                    <h3 class="border-b border-slate-100 pb-4 text-lg font-bold text-slate-900">
                        Student Information
                    </h3>

                    <div class="divide-y divide-slate-100">
                        <div class="flex flex-wrap justify-between gap-2 py-4">
                            <span class="text-slate-500">Full Name</span>
                            <span class="font-semibold">{{ $student->name }}</span>
                        </div>

                        <div class="flex flex-wrap justify-between gap-2 py-4">
                            <span class="text-slate-500">Email Address</span>
                            <span class="break-all font-semibold">{{ $student->email }}</span>
                        </div>

                        <div class="flex flex-wrap justify-between gap-2 py-4">
                            <span class="text-slate-500">Course</span>
                            <span class="font-semibold">{{ $student->course ?: 'Not yet provided' }}</span>
                        </div>

                        <div class="flex flex-wrap justify-between gap-2 py-4">
                            <span class="text-slate-500">Year Level</span>
                            <span class="font-semibold">{{ $student->year_level ?: 'Not yet provided' }}</span>
                        </div>

                        <div class="flex flex-wrap justify-between gap-2 py-4">
                            <span class="text-slate-500">Section</span>
                            <span class="font-semibold">{{ $student->section ?: 'Not yet provided' }}</span>
                        </div>

                        <div class="flex flex-wrap justify-between gap-2 py-4">
                            <span class="text-slate-500">Account Created</span>
                            <span class="font-semibold">{{ $student->created_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="rounded-2xl border border-indigo-100 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-900">Quick Access</h3>
                        <p class="mt-1 text-sm text-slate-500">Go to your important pages.</p>

                        <a href="{{ route('student.resources') }}"
                           class="mt-5 flex items-center justify-between rounded-xl bg-indigo-600 px-4 py-3 font-semibold text-white hover:bg-indigo-700">
                            Student Resources <span>→</span>
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="mt-3 flex items-center justify-between rounded-xl border border-slate-200 px-4 py-3 font-semibold text-slate-700 hover:bg-slate-50">
                            Edit Profile <span>→</span>
                        </a>
                    </div>

                    <div class="rounded-2xl bg-blue-950 p-6 text-white shadow-sm">
                        <p class="text-2xl">✨</p>
                        <h3 class="mt-3 text-lg font-bold">Keep Moving Forward</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-200">
                            Every lesson you learn is another step toward your goals.
                        </p>
                    </div>
                </div>

            </section>

            <footer class="border-t border-slate-200 py-5 text-center text-sm text-slate-500">
                Student Portal · Learn • Grow • Succeed
            </footer>

        </div>
    </main>
</div>

</body>
</html>
