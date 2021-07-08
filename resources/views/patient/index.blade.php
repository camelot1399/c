<x-app-layout>
    <div class="py-40px">
        <div class="mx-15px mx-auto max-w-540 sm:max-w-720 md:max-w-1140">
            <div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Домой</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Список пациентов</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title py-4">Список пациентов</h2>
                        </div>
                    </div>
                </div>
            </div>

            <x-patient.list :books="$books" />
            <x-patient.modal :books="$books" ></x-patient.modal>
        </div>
    </div>
</x-app-layout>
