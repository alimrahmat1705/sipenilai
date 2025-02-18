@extends('layouts.main')

@section('container')
    <div class="w-11/12 mt-6 ml-10">
        <div class="mb-2 flex justify-between">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Table User
            </p>
            <a href="/user-create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah
                data</a>


        </div>

        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Username</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">email</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Role</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Password</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($users as $user)
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">{{ $user->username }}</td>
                            <td class="w-1/3 text-left py-3 px-4">{{ $user->email }}</td>
                            <td class="w-1/3 text-left py-3 px-4">
                               
                                {{ $user->roles->pluck('name')->implode(', ') }}
                                </td>
                            <td class="w-1/3 text-left py-3 px-4">{{ $user->password }}</td>
                            {{-- <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">
                                    {{ $user->roles->name }}</a></td> --}}
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>


    </div>
@endsection
