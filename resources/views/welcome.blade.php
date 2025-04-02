@extends('layouts.public')
@section('content')
    <section class="relative w-full h-screen bg-cover bg-center rounded-lg overflow-hidden text-white"
        style="background-image: url('{{ asset('images/landingbg.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
            <h1 class="text-5xl font-bold">Donate</h1>
            <p class="text-2xl mt-4">Help people around the World.</p>
            <a href="{{ route('donate') }}"
                class="mt-6 bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-6 py-3 rounded-lg shadow-lg transition duration-300">Donate
            </a>
        </div>
    </section>

    <section class="container mx-auto py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Why We need your contribution?</h2>
        <div x-data="{
            active: 0,
            items: [
                { img: '{{ asset('images/society.jpg') }}', title: 'Empowering Rural Communities', desc: 'Your support helps provide education, skill development, and employment opportunities to uplift rural communities.' },
                { img: '{{ asset('images/water.jpg') }}', title: 'Access to Clean Water', desc: 'We aim to build wells and water purification systems, ensuring safe drinking water for rural families.' },
                { img: '{{ asset('images/health.jpg') }}', title: 'Better Healthcare Facilities', desc: 'With your contribution, we can provide medical camps, medicines, and essential healthcare services to underserved areas.' },
                { img: '{{ asset('images/agriculture.jpg') }}', title: 'Sustainable Agriculture', desc: 'Supporting local farmers with modern techniques and resources to improve food security and economic stability.' },
                { img: '{{ asset('images/education.jpg') }}', title: 'Building a Stronger Future', desc: 'Investing in infrastructure, education, and community projects to create a self-sufficient and thriving rural society.' },
            ]
        }">
            <div class="relative  w-full mx-auto overflow-hidden">
                <div class="flex transition-transform duration-500"
                    :style="'transform: translateX(-' + active * 100 + '%);'">
                    <template x-for="(item, index) in items" :key="index">
                        <div class="w-full flex-shrink-0 p-4">
                            <div class="bg-white rounded-lg shadow-lg p-6">
                                <img :src="item.img" alt="Service Image"
                                    class="w-full h-48 object-cover rounded-md mb-4">
                                <h3 class="text-lg font-semibold" x-text="item.title"></h3>
                                <p class="text-gray-600 mt-2" x-text="item.desc"></p>
                            </div>
                        </div>
                    </template>
                </div>
                <!-- Navigation Buttons -->
                <button @click="active = active > 0 ? active - 1 : items.length - 1"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">&#10094;</button>
                <button @click="active = active < items.length - 1 ? active + 1 : 0"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">&#10095;</button>

            </div>
        </div>
    </section>
@endsection
