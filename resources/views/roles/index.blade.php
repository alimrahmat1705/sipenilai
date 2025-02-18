@extends('layouts.main')

@section('container')

<div class="w-11/12 mt-6 ml-10">
    <div class="mb-2 flex justify-between">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Table Role
        </p>
        <button id="openModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Data</button>



    </div>

    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Role</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">

                @foreach ($roles as $role )

                <tr>
                    <td class="w-1/3 text-left py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $role->name }}</td>           
                    <td class="w-1/3 text-left py-3 px-4"><button id="openModalEdit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit mr-3"></i>  </button></td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div

     <!-- Modal Create -->
     <div id="modal" class="fixed inset-0 bg-opacity-50 backdrop-blur-sm flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold mb-4">Formulir</h2>

            <!-- Form -->
            <form action="{{ route('role.post') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="id">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">name:</label>
                    <input type="text" id="name" name="name" class="w-full border rounded-md p-2" value="" required>
                </div>



                <div class="flex justify-end space-x-2">
                    <button type="button" id="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>


     <div id="modalEdit" class="fixed inset-0 bg-opacity-50 backdrop-blur-sm flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold mb-4">Formulir</h2>

            <!-- Form -->
            <form action="{{ route('role.update',['id' => $role->id ?? '']) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">name:</label>
                    <input type="text" id="name" name="name" value="{{ $roles->name }}" class="w-full border rounded-md p-2" required>
                </div>



                <div class="flex justify-end space-x-2">
                    <button type="button" id="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>


</div>

<script>
//Modal
document.addEventListener("DOMContentLoaded", function () {
    const modalEdit = document.getElementById("modalEdit");
    const openModalBtnEdit = document.getElementById("openModalEdit");
    const closeModalBtn = document.getElementById("closeModal");

    // Buka modal saat tombol diklik
    openModalBtnEdit.addEventListener("click", function () {
        modal.classList.remove("hidden");
    });

    // Tutup modal saat tombol "Batal" diklik
    closeModalBtn.addEventListener("click", function () {
        modal.classList.add("hidden");
    });

    // Tutup modal saat klik di luar area modal
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });

    // Tutup modal dengan tombol Escape
    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            modal.classList.add("hidden");
        }
    });
});



//modal update

</script>



@endsection
