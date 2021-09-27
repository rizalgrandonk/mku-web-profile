@extends("admin.layouts.main")

@section("content")

<form method="POST" action="{{ route("admin.post.store") }}" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-md w-full">
  @csrf
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="judul">Judul</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("judul") border-red-500 @enderror" id="judul" name="judul" type="text" placeholder="Judul" aria-label="judul" value="{{ old("judul") }}">
      @error("judul")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="slug">Slug</label>
      <input class="w-full px-5 py-1 text-gray-400 bg-gray-100 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("slug") border-red-500 @enderror" id="slug" name="slug" type="text" placeholder="Slug" aria-label="Slug" value="{{ old("slug") }}" readonly>
      @error("slug")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-4">
    <label class="block text-sm text-gray-700" for="kategori_id">Kategori</label>
    <select class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("kategori_id") border-red-500 @enderror" name="kategori_id" id="kategori_id">
      <option value=""> -- Pilih Kategori -- </option>
      @foreach ($listKategori as $kategori)
        @if (old("kategori_id") == $kategori->id)
          <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
        @else
          <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
        @endif
      @endforeach
    </select>
    @error("kategori_id")
      <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="sampul">Sampul</label>
      <div class="w-60 mb-1">
        <div class="aspect-h-4 aspect-w-6 hidden img-container">
          <img class="img-preview border border-gray-700 mb-2 object-center object-cover">
        </div>
      </div>
        
      <input onchange="previewImg()" class="img-input w-full px-0 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("sampul") border-red-500 @enderror" id="sampul" name="sampul" type="file">
      @error("sampul")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-6">
    <label class="block text-sm text-gray-700" for="body">Body</label>
    <input id="body" type="hidden" name="body" value="{{ old("body") }}" />
    <div class="p-1 border-2 rounded @error("body") border-red-500 @enderror"">
      <trix-editor input="body"></trix-editor>
    </div>
    @error("body")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
    @enderror
  </div>
  <div class="flex gap-3">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded" type="submit">Tambah Data</button>

    <a href="{{ route("admin.post.index") }}" class="px-4 py-1 text-white font-light tracking-wider bg-gray-700 hover:bg-gray-600 rounded">Batal</a>
  </div>
</form>

@endsection

@section("script")

<script src="{{ asset("js/trix.js") }}"></script>
<script src="{{ asset("js/imagePreview.js") }}"></script>
<script src="{{ asset("js/generateSlug.js") }}"></script>

<script>

  addEventListener("trix-file-accept", function(event) {
      event.preventDefault()
  })
  
</script>

@endsection

{{-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem ducimus cumque asperiores dolor? Libero a non animi ratione ipsam, ex fugit quaerat impedit blanditiis reiciendis culpa illum harum ullam quisquam.
Laudantium accusantium architecto explicabo ipsa officia magni sed, quas obcaecati, eligendi dolorum ab quasi iure quam! Enim alias adipisci nobis eum eius dolorum quas ipsam, fuga tenetur? Eaque, ullam architecto?
Illum, officiis quaerat fuga ex quam consectetur quibusdam repudiandae eaque modi pariatur, mollitia et placeat odio! Officiis rerum et voluptate? Iste adipisci voluptates nobis temporibus fugit cum quo maxime fuga. --}}