@extends('layouts.chief-layouts')
@section('title', 'Example Page')

@section('content')
    <div class="flex justify-between pb-5 pr-5">
        <h1 class="font-extralight text-2xl">เมนูภายในร้านทั้งหมด</h1>
        <button onclick="adderMenu()" class="w-fit rounded-md px-3 py-2 cursor-pointer bg-[#d1ccf8] text-[#6E62E5] hover:bg-[#6E62E5] hover:text-[#ffffff]">
            เพิ่มเมนูใหม่
        </button>
    </div>


    <section class="flex flex-col gap-3">
        @foreach ($menus as $menu)
        <!-- <hr class="border-t border-[#817e7e9d] "> -->
        <section class="py-2 bg-[#F3F4F6] rounded-xl px-1.5">
            <div class="grid grid-cols-9 items-center">
                <div class="col-span-5 flex flex-row gap-5 items-center">
                    <div class="bg-[#bebebe] w-16 h-16 rounded-xl">
                        <img class="object-cover object-center h-full rounded-xl" src="{{ 'data:image/png;base64,' . base64_encode($menu->menu_img) }}">
                    </div>
                    <div>
                        <h3 class="text-lg font-medium">{{ $menu->menu_name }}</h3>
                        <p class="text-sm text-[#817e7e]">{{ $menu->description }}</p>
                    </div>
                </div>

                
                <div class="col-auto w-16 flex flex-col">
                    <p class="text-xs font-light">หมวดหมู่</p>
                    <p class="text-sm text-[#817e7e]">{{ $menu->category->category_name }}</p>
                </div>

                <div class="col-auto w-16 flex flex-col">
                    <p class="text-xs font-light">ราคา</p>
                    <p class="text-sm text-[#817e7e]">{{ $menu->price }}</p>
                </div>

                <div class="col-auto w-16 flex flex-col">
                    <p class="text-xs font-light">ราคา</p>
                    <p class="text-sm text-[#817e7e]">{{ $menu->price }}</p>
                </div>

                <div id="edit" class="col-start-9 w-full flex justify-center">
                    <div id="edit" class="col-start-9 w-full flex justify-center">
                        <button onclick="editMenu('{{ $menu->menu_id }}', '{{ $menu->menu_name }}', '{{ $menu->description }}', '{{ $menu->price }}', '{{ $menu->category_id }}', `{{ 'data:image/png;base64,' . base64_encode($menu->menu_img) }}`)" class="cursor-pointer w-5 h-5 text-center invert-[70%] hover:invert-0">
                            <img src="https://cdn-icons-png.flaticon.com/512/1159/1159633.png" alt="Edit">
                        </button>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
    </section>    


    <div id="menuEditor" class="hidden fixed inset-0 z-10 w-screen overflow-y-auto bg-[#e2dee49e]">
        <div class="flex min-h-full">
            <div class="relative bg-white w-1/3 ml-auto rounded-s-3xl px-9 py-5 flex flex-col">
                    <h1 class="py-6 font-extralight text-2xl">แก้ไขรายละเอียดเมนู</h1>
                    <form id="menuEditForm" action="{{ url('/menumanagement/update', ['menuId' => $menu->menu_id]) }}" method="post" class="relative flex flex-col h-full" enctype="multipart/form-data">
                        @csrf

                        <label for="menuName" class="block mb-2 text-sm font-normal text-[#75639C]">ชื่อเมนู</label>
                        <input required type="text" id="menuName" name="menuName" class="mb-6 bg-gray-50 border border-gray-300 text-[#321A6D] text-sm rounded-xl focus:ring-[#75639C] focus:border-[#75639C] block w-full p-2.5"/>
                    
                        <label for="menuDescription" class="block mb-2 text-sm font-normal text-[#75639C]">คำอธิบายเมนู</label>
                        <textarea id="menuDescription" name="menuDescription" class="resize-none mb-6 bg-gray-50 border border-gray-300 text-[#321A6D] text-sm rounded-xl focus:ring-[#75639C] focus:border-[#75639C] w-full p-2.5"></textarea>

                        <div class="flex flex-row gap-4">
                            <div class="flex-1 ">
                                <label for="menuPrice" class="block mb-2 text-sm font-normal text-[#75639C]">ราคา</label>
                                <input required type="number" step="0.01" id="menuPrice" name="menuPrice" class="mb-6 bg-gray-50 border border-gray-300 text-[#321A6D] text-sm rounded-xl focus:ring-[#75639C] focus:border-[#75639C] block w-full p-2.5"/>
                            </div>
                        
                            <div class="flex-1">
                                <label for="menuCategories" class="block mb-2 text-sm font-normal text-[#75639C]">หมวดหมู่</label>
                                <select id="menuCategories" name="menuCategories" class="mb-6 optional:text-[#75639C] bg-gray-50 border border-gray-300 text-[#9CA3AF] text-sm rounded-xl focus:ring-[#75639C] focus:border-[#75639C] block w-full p-2.5">
                                    @foreach ($categoriesForEdit as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <span class="block mb-2 text-sm font-normal text-[#75639C]">ภาพอาหาร</span>
                                <input id="upload-input" name="upload-input" type="file" class="hidden" accept="image/*" />
                                <label for="upload-input" class="w-full group p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-300 rounded-lg items-center mx-auto text-center cursor-pointer">
                                    <div id="image-preview-container" class="relative">
                                        <div class="w-fit relative mx-auto">
                                            <img id="image-preview" class="max-h-48 rounded-lg mx-auto">
                                            <div id="image-preview-edit" class="absolute inset-0 m-auto bg-[#6d6d6db4] rounded-lg items-center justify-center flex flex-col opacity-0 group-hover:opacity-100">
                                                <div class="w-28">
                                                    <img class="invert" src="https://cdn-icons-png.flaticon.com/512/8304/8304794.png" alt="">
                                                </div>
                                                <p class="text-lg font-normal text-[#ffffff]">แก้ไขภาพเมนูอาหาร</p>
                                            </div>
                                        </div>
                                        <p id="filename" class="font-normal text-sm text-gray-400 py-1"></p>
                                    </div>                                    
                                    
                                
                                    <div id="upload-label">
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.4" stroke="currentColor" class="w-8 h-8 text-[#75639C] mx-auto mb-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" /></svg>
                                        <h5 class="mb-2 text-xl font-medium tracking-tight text-[#75639C]">ไม่พบไฟล์ภาพอาหาร</h5>
                                        <p class="font-normal text-sm text-gray-400 md:px-6">อัพโหลดรูปภาพ</p>
                                    </div>
                                </label>
                                <script>
                                        const uploadInput = document.getElementById('upload-input');
                                        const uploadLabel = document.getElementById('upload-label');
                                        const imagePreview = document.getElementById('image-preview');
                                        const imagePreviewEdit = document.getElementById('image-preview-edit');
                                        const filenameLabel = document.getElementById('filename');

                                        uploadInput.addEventListener('change', (event) => {
                                            const file = event.target.files[0];
                                            if (file) {
                                                uploadLabel.style.display = 'none';
                                                imagePreviewEdit.style.display = 'flex';
                                                filenameLabel.textContent = file.name;

                                                const reader = new FileReader();
                                                reader.onload = (e) => { imagePreview.src = e.target.result; }
                                                reader.readAsDataURL(file);
                                            }
                                        });
                                </script>
                        
                        <div class="mt-auto flex justify-between">
                            <button type="reset" onclick="hideMenuEditor()"   class="text-[#75639C] border-[#75639C] border rounded-lg py-1 px-9">ยกเลิก</button>
                            <button type="submit" class="bg-[#75639C] text-white py-2 px-9 rounded-lg hover:bg-[#5E4E8C]">บันทึกข้อมูล</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>


    <div id="menuAdder" class="hidden fixed inset-0 z-10 w-screen overflow-y-auto bg-[#e2dee49e]">
        <div class="flex min-h-full">
            <div class="relative bg-white w-1/3 ml-auto rounded-s-3xl px-9 py-5 flex flex-col">
                    <h1 class="py-6 font-extralight text-2xl">เพิ่มเมนูใหม่</h1>
                    <form id="menuEditForm" action="{{ url('/menumanagement/add') }}" method="post" class="relative flex flex-col h-full" enctype="multipart/form-data">
                        @csrf

                        <label for="adderName" class="block mb-2 text-sm font-normal text-[#75639C]">ชื่อเมนู</label>
                        <input required type="text" id="adderName" name="adderName" class="mb-6 bg-gray-50 border border-gray-300 text-[#321A6D] text-sm rounded-xl focus:ring-[#75639C] focus:border-[#75639C] block w-full p-2.5"/>
                    
                        <label for="adderDescription" class="block mb-2 text-sm font-normal text-[#75639C]">คำอธิบายเมนู</label>
                        <textarea id="adderDescription" name="adderDescription" class="resize-none mb-6 bg-gray-50 border border-gray-300 text-[#321A6D] text-sm rounded-xl focus:ring-[#75639C] focus:border-[#75639C] w-full p-2.5"></textarea>

                        <div class="flex flex-row gap-4">
                            <div class="flex-1 ">
                                <label for="adderPrice" class="block mb-2 text-sm font-normal text-[#75639C]">ราคา</label>
                                <input required type="number" step="0.01" id="adderPrice" name="adderPrice" class="mb-6 bg-gray-50 border border-gray-300 text-[#321A6D] text-sm rounded-xl focus:ring-[#75639C] focus:border-[#75639C] block w-full p-2.5"/>
                            </div>
                        
                            <div class="flex-1">
                                <label for="adderCategories" class="block mb-2 text-sm font-normal text-[#75639C]">หมวดหมู่</label>
                                <div class="flex">
                                    <select id="adderCategories" name="adderCategories" class="mb-6 optional:text-[#75639C] bg-gray-50 border border-gray-300 text-[#9CA3AF] text-sm rounded-xl focus:ring-[#75639C] focus:border-[#75639C] block w-full p-2.5" onchange="handleCategoryChange()">
                                        <option value="0" disabled selected></option>
                                        @foreach ($categoriesForAdder as $category)
                                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                        <option value="addNew">เพิ่มหมวดหมู่ใหม่</option>
                                    </select>
                                    <input placeholder="เพิ่มหมวดหมู่ใหม่" type="text" id="newCategory" name="newCategory" class="hidden mb-6 bg-gray-50 border border-gray-300 text-[#321A6D] text-sm rounded-xl focus:ring-[#75639C] focus:border-[#75639C] w-full p-2.5"/>
                                </div>
                                
                                <script>
                                    function handleCategoryChange() {
                                        const adderCategoriesSelect = document.getElementById('adderCategories');
                                        const newCategoryInput = document.getElementById('newCategory');
                                        
                                
                                        if (adderCategoriesSelect.value === 'addNew') {
                                            adderCategoriesSelect.classList.add('hidden');
                                            newCategoryInput.classList.remove('hidden');
                                        }
                                    }                        
                                </script>
                                
                            </div>
                        </div>

                        <span class="block mb-2 text-sm font-normal text-[#75639C]">ภาพอาหาร</span>
                                <input id="adderInput" name="adderInput" type="file" class="hidden" accept="image/*" />
                                <label for="adderInput" class="w-full group p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-300 rounded-lg items-center mx-auto text-center cursor-pointer">
                                    <div id="adderPreview-container" class="relative">
                                        <div class="w-fit relative mx-auto">
                                            <img id="adderPreview" class="max-h-48 rounded-lg mx-auto">
                                            <div id="adderPreviewEdit" class="hidden absolute inset-0 m-auto bg-[#6d6d6db4] rounded-lg items-center justify-center flex-col opacity-0 group-hover:opacity-100">
                                                <div class="w-28">
                                                    <img class="invert" src="https://cdn-icons-png.flaticon.com/512/8304/8304794.png" alt="">
                                                </div>
                                                <p class="text-lg font-normal text-[#ffffff]">แก้ไขภาพเมนูอาหาร</p>
                                            </div>
                                        </div>
                                        <p id="adderFileName" class="font-normal text-sm text-gray-400 py-1"></p>
                                    </div>                                    
                                    
                                
                                    <div id="adderUpload">
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.4" stroke="currentColor" class="w-8 h-8 text-[#75639C] mx-auto mb-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" /></svg>
                                        <h5 class="mb-2 text-xl font-medium tracking-tight text-[#75639C]">เพิ่มไฟล์ภาพเมนูใหม่</h5>
                                        <p class="font-normal text-sm text-gray-400 md:px-6">อัพโหลดรูปภาพ</p>
                                    </div>
                                </label>
                                <script>
                                        const adderInput = document.getElementById('adderInput');
                                        const adderUpload = document.getElementById('adderUpload');
                                        const adderPreview = document.getElementById('adderPreview');
                                        const adderPreviewEdit = document.getElementById('adderPreviewEdit');
                                        const adderFileName = document.getElementById('adderFileName');

                                        adderInput.addEventListener('change', (event) => {
                                            const file = event.target.files[0];
                                            if (file) {
                                                adderUpload.style.display = 'none';
                                                adderPreviewEdit.style.display = 'flex';
                                                adderFileName.textContent = file.name;

                                                const reader = new FileReader();
                                                reader.onload = (e) => { adderPreview.src = e.target.result; }
                                                reader.readAsDataURL(file);
                                            }
                                        });
                                </script>
                        
                        <div class="mt-auto flex justify-between">
                            <button type="reset" onclick="hideAdderMenu()"   class="text-[#75639C] border-[#75639C] border rounded-lg py-1 px-9">ยกเลิก</button>
                            <button type="submit" class="bg-[#75639C] text-white py-2 px-9 rounded-lg hover:bg-[#5E4E8C]">บันทึกข้อมูล</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
<script src="{{ asset('/js/menumanagement.js') }}"></script>
