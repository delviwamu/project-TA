
                                    <div class="row align-items-center">
                                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi'))
                                        <div class="col-lg-6">
                                            <a href="{{ $btnCreate }}" class="btn btn-dark text-primary">
                                                <span class="btn-label">
                                                <i class="fa fa-plus"></i>
                                                </span>
                                                Buat Baru
                                            </a>
                                        </div>
                                        @endif
                                        
                                        <div class="{{ auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi') ? 'col-lg-6 px-2' : 'col-lg-12 px-2' }}">
                                            
                                            <form action="{{ $formAction }}" method="GET" class="position-relative">
                                                <div class="form-group mb-0">
                                                    <input type="text" 
                                                        class="form-control pr-5" 
                                                        name="search" 
                                                        id="searchInput"
                                                        placeholder="Cari nama anggota..." 
                                                        value="{{ request()->search ?? old('search') }}">
                                                    <a href="{{ route('client.index') }}" 
                                                            id="clearSearch" 
                                                            class="btn  position-absolute" 
                                                            style="top: 50%; right: 4rem; transform: translateY(-50%); display: none;">
                                                        &times;
                                                </a>
                                                    <button class="btn input-icon-addon position-absolute" style="top: 50%; right: 0.5rem; transform: translateY(-50%); cursor: pointer;">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>



@push('scripts')
    <script>
        const searchInput = document.getElementById('searchInput');
        const clearBtn = document.getElementById('clearSearch');

        function toggleClearBtn() {
            clearBtn.style.display = searchInput.value.length > 0 ? 'block' : 'none';
        }

        clearBtn.addEventListener('click', () => {
            searchInput.value = '';
            clearBtn.style.display = 'none';
            searchInput.focus();
        });

        searchInput.addEventListener('input', toggleClearBtn);

        // Inisialisasi saat halaman load
        toggleClearBtn();
    </script>
@endpush