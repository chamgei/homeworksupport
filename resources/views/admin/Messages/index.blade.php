<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
        <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div>
                <br>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            {{--                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">--}}
                            <table class="table-auto min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{$loop->iteration}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{$post->orderId}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{!! html_entity_decode(Str::limit($post->body,100)) !!}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{route('show_adminMessage', $post->id)}}"><button class="text-indigo-600 hover:text-indigo-900">Read</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
